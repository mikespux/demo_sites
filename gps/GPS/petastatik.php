<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCeCAhmBV1aJRpEyTpQzwZV-NS_zIfGdSE&sensor=false&language=id"></script>
<title>Peta Google Pertamaku</title>

<style>
	html{
		height:100%;	
	}
	
	body{
		height:100%;	
	}
	#canvas{
		height:100%;	
	}
</style>
<script type="text/javascript">
// Membuat fungsi yang nantinya akan dipanggil pada saat halaman diload 
// untuk menampilkan peta
	function initialize(){
//Menentukan koordinat jambi pada peta secara statik
		var myLatLng = new google.maps.LatLng(-1.48518, 102.43806);
//Menentukan pengaturan pada peta
		var myOptions = {
//Tingkat zoom pada peta (bisa berisi dari 0.8-16)
			zoom: 8,
//Menentukan koodrinat tengah pada peta
			center:myLatLng,
//Menentukan tipe dari peta
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		
//Menampilkan peta pada div canvas yang disediakan
		map = new google.maps.Map( document.getElementById('canvas'),myOptions);
		var marker= new google.maps.Marker({
			position:myLatLng,
			map:map,
			title:"Saya disini"
		});
		
		var infowindow= new google.maps.InfoWindow({
												
			//Menampilkan tooltips jika disorot mouse
			content:"<img src='logo_JS.PNG' width=100 /> Hello World",
			//Ukuran balon informasi
			size: new google.maps.Size(50,50),
			//Set posisi balon informasi tepat pada marker
			position:myLatLng
		});
		
		marker.setIcon({ url: "pombensin.png", scaledSize: new google.maps.Size(30, 24) , anchor: new google.maps.Point(15, 12)});
		
		infowindow.open(map);
	}
</script>

</head>
<body onLoad="initialize()">
	<div id="canvas"></div>
</body>
</html>