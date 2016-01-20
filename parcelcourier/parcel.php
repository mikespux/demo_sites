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
      <h4 class="blue">Parcel Registration</h4>
      
    </div>
    <div class="cl-mcont">
    <div class="row">
      <div class="col-sm-12 col-md-12">
	  <?php
		  
		  
		  ?>
        <div class="block-flat col-md-12">
          
          <div class="content col-md-6">
          <form action="parcelreg.php" method="POST" data-parsley-validate novalidate> 
            <div class="form-group">
              <label>Parcel Name</label> <input type="text" name="parcel_name" parsley-trigger="change" required placeholder="Parcel Name" class="form-control">
            </div>
            <div class="form-group">
              <label>Parcel Weight</label> <input type="text" name="parcel_weight" parsley-trigger="change" required placeholder="Parcel Weight" class="form-control">
            </div>
            <div class="form-group"> 
              <label>Sender Number</label> <input type="text" data-mask="phone-number" name="sender_number"  placeholder="Sender Number" required class="form-control">
            </div> 
            <div class="form-group"> 
              <label>Sender IDNO</label> 
			  <input  type="text" name="id_no"  required placeholder="Receiver Number" class="form-control">
            </div> 
             
                    
          </div>
		  <div class="content col-md-6"> 
			<div class="form-group"> 
              <label>Receiver Number</label> 
			  <input  type="text" data-mask="phone-number" name="receiever_no" required placeholder="Receiver Number" class="form-control">
            </div> 
            <div class="form-group">
              <label>Courier Name</label> 
			  
			  <select required  name="courier_name" required="required" class="select2">
										 <optgroup label="Track Name">
										   <option disabled>Track Name</option>
										   <?php
										   include('scripts/func.php');
										   echo getTname();
										   ?>
										 </optgroup>
								</select>
            </div>
			  <div class="form-group">
			   <label>Destination</label> 
			  <select name="destination" class="select2">
                     <optgroup label="Destination">
                       <option disabled>SELECT DESTINATION</option>
                       <option >Nyeri</option>
                       <option >Karatina</option>
                       <option >Nairobi</option>
                     </optgroup>
			</select>
			  </div>
           
            <div class="form-group"> 
              <label>Courier Numberplate</label>
			
			  <select required name="number_plate"  required="required" class="select2">
										 <optgroup label="Track Number plate">
										   <option disabled>Track Number plate</option>
										   <?php
										  
										   echo getPlate();
										   ?>
										 </optgroup>
								</select>
            </div> 
			<div class="form-group"> 
              <label>Payable Amount</label> 
			  <input  type="text" name="amount"  required placeholder="amount_payable" class="form-control">
            </div> 
            
            &nbsp;
				   <div class="">
				   <button class="btn btn-primary col-md-8" type="submit">Submit</button>
						 
				  </div>	
            </form>
          
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
</body>
</html>
