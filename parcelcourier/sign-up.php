<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/favicon.png">


	<title>Sign up: Parcel Courier</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

	<link rel="stylesheet" href="css/css/font-awesome.min.css">


	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet" />	

</head>

<body class="texture">

<div id="cl-wrapper" class="sign-up-container">

	<div class="middle-sign-up">
		<div class="block-flat">
			<div class="header">							
				<h3 class="text-center"><img class="logo-img" src="images/logo.png" alt="logo"/> Parcel Courier</h3>
			</div>
			<div>
				<form style="margin-bottom: 0px !important;" class="form-horizontal" action="signup.php" method="POST" methd parsley-validate novalidate>
					<div class="content">
						<h5 class="title text-center"><strong>Register a New User</strong></h5>
						<p class="title text-center"><strong><?php echo (isset($result)) ? $result : ''; ?></strong></p>
              <hr/>
             
              
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" name="username"  required placeholder="Username" class="form-control">
									</div>
                  <div id="nick-error"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input type="email" name="email" required='required' placeholder="E-mail" class="form-control">
									</div>
                  <div id="email-error"></div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12 col-xs-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input name="pass" type="password"  placeholder="Password" required class="form-control">
									</div>
                  
							</div>
							</div>
             <p class="spacer">Back to admin panel <a href="admin.php">Admin</a></p>
            <button class="btn btn-block btn-success btn-rad btn-lg" type="submit">Sign Up</button>
							
					</div>
			  </form>
			</div>
		</div>
		<div class="text-center out-links"><a href="pages-sign-up.html#">&copy; 2014 Parcel Courier</a></div>
	</div> 
	
</div>


  <script src="js/jquery.js"></script>
  <script src="js/jquery.parsley/dist/parsley.js" type="text/javascript"></script>
  <script src="js/behaviour/general.js" type="text/javascript"></script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/behaviour/voice-commands.js"></script>
<script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>
</body>
</html>
