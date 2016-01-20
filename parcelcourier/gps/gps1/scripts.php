    		<style type="text/css">
      			.tooltip {
	      		  background-color:#aaaaaa;
	        	font-weight:bold;
		        border:2px #006699 solid;
	      }
	    </style>
	
    <script type="text/javascript">
    //<![CDATA[

    if (GBrowserIsCompatible()) { 
	
      // Display the map, with some controls and set the initial location 
      var Icon = new GIcon(G_DEFAULT_ICON);
      Icon.image = "images/marker<? echo $device; ?>.png";

      var map = new GMap2(document.getElementById("map"));
      map.addControl(new GLargeMapControl());
      map.addControl(new GMapTypeControl());
      map.setCenter(new GLatLng(0,0),0);
      // arrays to hold copies of the markers and html used by the side_bar
      // because the function closure trick doesnt work there

      var side_bar_html = "";
      var gmarkers = [];

      var htmls = [];
      var i = 0;
    
  

//    function createMarker(point,name,html) {
//        var marker = new GMarker(point);
//        GEvent.addListener(marker, "click", function() {
//          marker.openInfoWindowHtml(html);
//        });
//        gmarkers[i] = marker;
//        gmarkers[i].label = name;
//        i++;
//        return marker;
//      }
      
     
     var degreesPerRadian = 180.0 / Math.PI;
     var radiansPerDegree = Math.PI / 180.0;
 
     // Returns the bearing in degrees between two points.
     // North = 0, East = 90, South = 180, West = 270.
     function bearing( from, to ) {
       // See T. Vincenty, Survey Review, 23, No 176, p 88-93,1975.
       // Convert to radians.
       var lat1 = from.latRadians();
       var lon1 = from.lngRadians();
       var lat2 = to.latRadians();
       var lon2 = to.lngRadians();

       // Compute the angle.
       var angle = - Math.atan2( Math.sin( lon1 - lon2 ) * Math.cos( lat2 ), Math.cos( lat1 ) * Math.sin( lat2 ) - Math.sin( lat1 ) * Math.cos( lat2 ) * Math.cos( lon1 - lon2 ) );
       if ( angle < 0.0 )
	angle  += Math.PI * 2.0;

       // And convert result to degrees.
       angle = angle * degreesPerRadian;
       angle = angle.toFixed(1);

       return angle;
     }
      





      // A function to create the marker and set up the event window
      function createMarker(point,name,html) {
        var marker = new GMarker(point,Icon);
//     	var myicon = new GIcon(G_DEFAULT_ICON);
//        myicon.sprite = {image:"images/marker99.png", top:34*SpriteNum};
//        var marker = new GMarker(point, {icon:myicon});

       GEvent.addListener(marker, "click", function() {
          marker.openInfoWindowHtml(html);
        });



        // Switch icon on marker mouseover and mouseout
        GEvent.addListener(marker, "mouseover", function() {
          marker.setImage("images/blank.png");
        });

 

       GEvent.addListener(marker, "mouseout", function() {
          marker.setImage("images/marker<? echo $device; ?>.png");
        });


	marker.tooltip = '<div class="tooltip">'+name+'<\/div>';
         // save the info we need to use later for the side_bar
        gmarkers[i] = marker;
        htmls[i] = html;
	gmarkers[i].label = name;

	if (i%3) {
     	 	x = '&nbsp;';
    	} else {
		x = '<br>';
		
	}

        // add a line to the side_bar html
        side_bar_html += '(<a style="text-decoration: none;" href="javascript:myclick(' + i + ')">' + name + '<\/a>)' + x;
        i++;
        return marker;

      }


      // This function picks up the click and opens the corresponding info window
      function myclick(i) {
        gmarkers[i].openInfoWindowHtml(htmls[i]);
      }

// ===== Start with an empty GLatLngBounds object =====     
      var bounds = new GLatLngBounds();
      

      
      var request = GXmlHttp.create();
      request.open("GET", "data.xml", true);
      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          var xmlDoc = GXml.parse(request.responseText);
          // obtain the array of markers and loop through it
          var markers = xmlDoc.documentElement.getElementsByTagName("marker");
          
          for (var i = 0; i < markers.length; i++) {
            // obtain the attribues of each marker
            var lat = parseFloat(markers[i].getAttribute("lat"));
            var lng = parseFloat(markers[i].getAttribute("lng"));
            var point = new GLatLng(lat,lng);
            var html = markers[i].getAttribute("html");
            var label = markers[i].getAttribute("label");

            var label = markers[i].getAttribute("label");
	    var icon  = "images/marker99.png";
            // create the marker
            var marker = createMarker(point,label,html);
            map.addOverlay(marker);
	    bounds.extend(point);

          }

     // ================================================  
	  var info_html="Straight line distances<br>";
          for (var i = 0; i<markers.length; i++) {
            for (var j=0; j<markers.length; j++) {
              if (i != j) {
                var d=gmarkers[i].getPoint().distanceFrom(gmarkers[j].getPoint())/1000; 
	        var label = markers[i].getAttribute("label");
                var htm = "<b>From "+gmarkers[i].label+ " To "+gmarkers[j].label;


                htm += "<\/b> "+ d.toFixed(5) +" kilometres ";
                htm += "  Bearing: "+bearing(gmarkers[i].getPoint(),gmarkers[j].getPoint())+" degrees<br>";
                info_html += htm;
              }
            }
          }
          
          // put the assembled results into the info div
		
<?	if ($showdistance==1){ 
		echo           'document.getElementById("info").innerHTML = info_html;';

		}
?>

  	 // ========= Distance 

          // put the assembled side_bar_html contents into the side_bar div
          document.getElementById("side_bar").innerHTML = side_bar_html;
          


         

          // ========= Now process the polylines ===========
          var lines = xmlDoc.documentElement.getElementsByTagName("line");
          // read each line
          for (var a = 0; a < lines.length; a++) {
            // get any line attributes
            var colour = lines[a].getAttribute("colour");
            var width  = parseFloat(lines[a].getAttribute("width"));
            // read each point on that line
            var points = lines[a].getElementsByTagName("point");
            var pts = [];
            for (var i = 0; i < points.length; i++) {
               pts[i] = new GLatLng(parseFloat(points[i].getAttribute("lat")),
                                   parseFloat(points[i].getAttribute("lng")));
            }
            map.addOverlay(new GPolyline(pts,colour,width));
 	

          }


	// ===== determine the zoom level from the bounds =====
          map.setZoom(map.getBoundsZoomLevel(bounds));

          // ===== determine the centre from the bounds ======
          map.setCenter(bounds.getCenter());

     

        }
      }
      request.send(null);

    }
    
    // display a warning if the browser was not compatible
    else {
      alert("Sorry, the Google Maps API is not compatible with this browser");
    }


    //]]>



    </script>

	
    <noscript><b>JavaScript must be enabled in order for you to use Google Maps.</b> 
      However, it seems JavaScript is either disabled or not supported by your browser. 
      To view Google Maps, enable JavaScript by changing your browser options, and then 
      try again.
    </noscript>







