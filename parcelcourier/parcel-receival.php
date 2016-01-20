<?php
include './scripts/auth.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Parcel Courier</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>
	
    <!-- Bootstrap core CSS -->
  <link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.switch/bootstrap-switch.css" />
	<link rel="stylesheet" type="text/css" href="js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
	<link rel="stylesheet" type="text/css" href="js/jquery.select2/select2.css" />
	<link rel="stylesheet" type="text/css" href="js/bootstrap.slider/css/slider.css" />
  <link href="css/style.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/pygments.css">
  <link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />
 <script type="text/javascript" src="jquery-1.9.1.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#wait_1').hide();
	$('#result_1').hide();
	$('#display').show();
	$('#displayimage').show();
	$('#recphone').change(function(){
	  $('#wait_1').show();
	  $('#display').hide();
	  $('#displayimage').hide();
	  $('#result_1').hide();
	  $('#result_freebeds').hide();
      $.get("scripts/func.php", {
		func: "recphone",
		drop_var: $('#recphone').val()
		 }, function(response){
        $('#result_1').fadeOut();
        setTimeout("finishAjax('result_1', '"+escape(response)+"')", 400);
		
      });
    	return false;
	});
});

function finishAjax(id, response) {
  $('#wait_1').hide();
  $('#'+id).html(unescape(response));
  $('#'+id).fadeIn();
  doing.html('Nice');
}

</script>
  </head>

<body>


<!-- Fixed navbar -->
<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="fa fa-gear"></span>
      </button>
      <a class="navbar-brand" href="form-validation.html#"><span>Parcel Courier</span></a>
    </div>
    <div class="navbar-collapse collapse">
      
 <?php include 'scripts/online.php'; ?>		
  

    </div><!--/.nav-collapse -->
  </div>
</div>



<div id="cl-wrapper">
		<?php include 'scripts/menu.php'; ?>
   <div class="container-fluid" id="pcont">
    <div class="page-head">
      <h4 class="blue">Parcel</h4>
      
    </div>
    <div class="cl-mcont">
   <div class="row">		
				
				<div class="col-sm-12 col-md-12">
					
					<div class="tab-container tab-left">
						<ul class="nav nav-tabs flat-tabs">
						  <li class="active"><a href="ui-tabs-accordions.html#tab3-1" data-toggle="tab"><i class="fa fa-truck fa-4x"></i> Add new courier</a></li>
						  <li><a href="ui-tabs-accordions.html#tab3-2" data-toggle="tab"><i class="fa fa-location-arrow fa-4x"></i> Update Track Location</a></li>
						  <li><a href="ui-tabs-accordions.html#tab3-3" data-toggle="tab"><i class="fa  fa-briefcase"></i> Clear Parcel</a></li>
						</ul>
						<div class="tab-content">
						  <div class="tab-pane active cont fade in" id="tab3-1">
						  <!--- new courier-->
								 
								  <div class="content col-md-7">

								  <form role="form" method="POST"> 
								  <div class="form-group">
									  <label  class="result" id="result"></label> 
									  <label class="resultcname" id="resultcname"></label> 
									  <label class="resultcplate" id="resultcplate"></label> 
									 
									</div>
									<div class="form-group">
									  <label>Courier Name</label> 
									  <input type="email" name="cname" id="cname" placeholder="Courier Name" class="form-control">
									</div>
									<div class="form-group"> 
									  <label>Courier Number-plate</label> 
									  <input type="text" name="cplate" id="cplate"  data-mask="track-plate" placeholder="Courier Number plate" class="form-control">
									</div> 
									
									  <button class="btn btn-primary" type="submit" name="csubmit" id="csubmit">Submit</button>
									  <button class="btn btn-default">Cancel</button>
									
								  </form>
								  </div>
								  
								</div>
						  
						  <div class="tab-pane cont fade" id="tab3-2">
								  <div class="content col-md-7">

								  <form role="form" method="POST"> 
								  <div class="form-group">
									  <label  class="resultupdate" id="resultupdate"></label> 
									  
									 
									</div>
									<div class="form-group">
								   <label>Current Location</label> 
								  <select required name="destination" id="destination" class="select2">
										 <optgroup label="Current Location">
										   <option disabled>Current Location</option>
										   <option >Nyeri</option>
										   <option >Karatina</option>
										   <option >Nairobi</option>
										 </optgroup>
								</select>
								  </div>
									<div class="form-group"> 
									  <label>Courier Number-plate</label> 
									  <input type="text" name="updatecplate" id="updatecplate"  data-mask="track-plate" placeholder="Courier Number plate" class="form-control">
									</div> 
									
									  <button class="btn btn-primary" type="submit" name="updatesubmit" id="updatesubmit">Update</button>
									  <button class="btn btn-default">Cancel</button>
									
								  </form>
								  </div>


								</div>
						  <div class="tab-pane fade" id="tab3-3">
						  <span id="wait_1" style="display: none;">
						<img alt="Please Wait" src="ajax-loader.gif"/>
						</span>
                <h2 class="hthin">Parcel Clearance</h2>
								<div class="form-group">
								  <label class="resultclear"></label>
								  <select required name="recphonenumber" id="recphone" class="select2">
										 <optgroup label="Recipient Phone Number">
										   <option disabled>Recipient Phone Number</option>
										   <?php
										   include('scripts/func.php');
										   echo getRec();
										   ?>
										 </optgroup>
								</select>
								  </div>
								  <span id="result_1" style="display: none;"></span>
								
              </div>
						</div>
					</div>
				</div>					
				
				
			</div>
    
  
    
    </div>
  </div> 
</div>


  <script src="js/jquery.js"></script>
  <script src="js/jquery.parsley/dist/parsley.min.js" type="text/javascript"></script>
  <script src="js/jquery.parsley/src/extra/dateiso.js" type="text/javascript"></script>
  <script src="js/jquery.select2/select2.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.slider/js/bootstrap-slider.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
	<script type="text/javascript" src="js/jquery.nestable/jquery.nestable.js"></script>
	<script type="text/javascript" src="js/behaviour/general.js"></script>
  <script src="js/jquery.ui/jquery-ui.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/bootstrap.switch/bootstrap-switch.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
	<script src="js/jquery.maskedinput/jquery.maskedinput.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      //initialize the javascript
      App.init();
	   App.masks();
      $('form').parsley();
    });
  </script>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/behaviour/voice-commands.js"></script>
  <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript">
$(document).ready(function(){	
	$('#csubmit').click(function(){ 
		var csubmit = $('#csubmit'); 
		var cplate = $('#cplate'); 
		var cname = $('#cname'); 		
		var result = $('.result'); 
		 var resultcplate = $('.resultcplate'); 
		var resultcname = $('.resultcname'); 
		 
		if(cplate.val() == ''){ 
			cplate.focus(); // focus to the filed
			result.html('<font color="red"><span class="error"><small>Enter the plate number</small></span></font>');
			
			return false;
		}
		if(cname.val() == ''){ 
			cname.focus(); // focus to the filed
			result.html('<font color="red"><span class="error"><small>Enter the courier name</small></span></font>');
			
			return false;
		} 
		
		
		
		if(cplate.val() != '' && cname.val() != ''){ 
			
			var UrlToPass = 'action=savecourier&cplate='+cplate.val()+'&cname='+cname.val()+'&csubmit='+csubmit.val();
			$.ajax({ 
			type : 'POST',
			data : UrlToPass,
			url  : 'scripts/func.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 0){
					result.html('<div class=\'alert alert-danger text-center\'><button type=\'button\' class=\'close\' data-dismiss=\'alert\'><i class=\'icon-remove\'></i></button>Please set up the correct name and plate.<br /></div>');
					
					
				}
				else if(responseText == 1){
					result.html('<div class=\'alert alert-warning text-center\'><button type=\'button\' class=\'close\' data-dismiss=\'alert\'><i class=\'icon-remove\'></i></button>You successfully added a new track.<br /></div>');
					 	
								
				}
				
				else{
					alert('Problem with sql query');
				}
			}
			});
		}
		return false;
	});
});
</script>
<!----end ---->
<!--update location-->
  <script type="text/javascript">
$(document).ready(function(){	
	$('#updatesubmit').click(function(){ 
		var updatesubmit = $('#updatesubmit'); 
		var updatecplate = $('#updatecplate'); 			
		var destination = $('#destination'); 			
		var resultupdate = $('.resultupdate'); 
		 
		
		 
		if(destination.val() == ''){ 
			destination.focus(); // focus to the filed
			resultupdate.html('<font color="red"><span class="error"><small>Please enter destination</small></span></font>');
			
			return false;
		}
		if(updatecplate.val() == ''){ 
			updatecplate.focus(); // focus to the filed
			resultupdate.html('<font color="red"><span class="error"><small>Enter the plate number</small></span></font>');
			
			return false;
		}
		
		
		if(updatecplate.val() != ''){ 
			
			var UrlToPass = 'action=updatetracklocation&updatecplate='+updatecplate.val()+'&destination='+destination.val()+'&updatesubmit='+updatesubmit.val();
			$.ajax({ 
			type : 'POST',
			data : UrlToPass,
			url  : 'scripts/func.php',
			success: function(responseText){ // Get the result and asign to each cases
				if(responseText == 3){
					resultupdate.html('<div class=\'alert alert-danger text-center\'><button type=\'button\' class=\'close\' data-dismiss=\'alert\'><i class=\'icon-remove\'></i></button>Please set up the correct name and plate.<br /></div>');
					
					
				}
				else if(responseText == 2){
					resultupdate.html('<div class=\'alert alert-warning text-center\'><button type=\'button\' class=\'close\' data-dismiss=\'alert\'><i class=\'icon-remove\'></i></button>Message successfully sent to customers.<br /></div>');
					 	
								
				}
				
				else{
					alert('Problem with sql query');
				}
			}
			});
		}
		return false;
	});
});
</script>


</body>
</html>
