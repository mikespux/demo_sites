
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		
		<title>Admin</title>
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		
			<!-- Datepicker Stylesheet -->

		<link rel="stylesheet" type="text/css" href="datepicker.css">
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		
		<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />  
	 
		-->
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
		
		


	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="#"><img id="logo" src="resources/images/logo.png" alt="Admin" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
				Hello, <a href="#" title="Edit your profile">Okumu Cool</a>, you have <a href="#messages" rel="modal" title="no Messages">no Messages</a><br />
				<br />
			 | <a href="logout.php" title="Sign Out">Sign Out</a> |
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li>
					<a href="#" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Dashboard
					</a>       
				</li>
				
				<li> 
					<a href="#" class="nav-top-item current"> <!-- Add the class "current" to current menu item -->
					Admin Task
					</a>
					<ul>
						<li><a href="admin.php">Add Routes</a></li>
						<li><a href="edit_products.php">Edit Routes</a></li> <!-- Add class "current" to sub menu items also -->
						<li><a href="admin.php">Add Planes</a></li>
						<li><a href="edit_markets.php">Edit Planes</a></li>
						<li><a class="current" href="#">Manage Users</a></li>
					</ul>
				</li>
				   
				
			</ul> <!-- End #main-nav -->
			

			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="#" title="Upgrade to a better browser">upgrade</a> 
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Welcome Martin</h2>
			<p id="page-intro">Manage users</p>
			

			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Manage users</a></li> <!-- href must be unique and match the id of target div -->
						
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
			   
								<?php
			$connect=mysql_connect("localhost","root","");
			mysql_select_db("swift",$connect);
			if(isset($_GET['operation'])){
			if($_GET['operation']=="edit"){
			?>
			<form method="post" action="edit_users_process.php">

			<table align="center" border="0">
	<tr>
	<td>Username:</td>
	<td><input type="text" name="username" value="<?php echo $_GET['name']; ?>" /></td>
	</tr>
	<tr>
	<td>Email:</td>
	<td><input type="text" name="email" value="<?php echo $_GET['email']; ?>" /></td>
	</tr>
	<tr>
	<td>Encrypted password:</td>
	<td><input type="text" name="password" value="<?php echo $_GET['password']; ?>"/></td>
	</tr>
	<tr>
	<td>&nbsp;</td>
	<td align="right">
	<input type="hidden" name="uid" value="<?php echo $_GET['uid'] ?>" />
	<input type="hidden" name="update" value="yes" />
	<input type="submit" value="update Record"/>
	</td>
	</tr>
	</table>
</form>


<?php
}}
?>

<?php
$query="SELECT * from flight_users";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	echo "<table align='center' border='1'>";
	echo "<tr>";
	echo "<th><B>User_Id</th>";
	echo "<th><B>User Name</th>";
	echo "<th><B>Email</th>";
	echo "<th><B>Encrypted Password</th>";
	echo "<th><B>Edit</th>";
	echo "<th><B>Delete</th>";
	echo "</tr>";
	while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo "<td>".$row['f_id']."</td>";	
	echo "<td>".$row['f_uname']."</td>";	
	echo "<td>".$row['f_mailid']."</td>";
	echo "<td>".$row['f_password']."</td>";
	echo "<td><a href='edit_users.php?operation=edit&uid=".$row['f_id']."&name=".$row['f_uname']."&email=".$row['f_mailid']."&password=".$row['f_password']."'>Edit</a></td>";
	echo "<td><a href='edit_users_process.php?operation=delete&uid=".$row['f_id']."'>Delete</a></td>";	
	echo "</tr>";
	}
	echo "</table>";
}
else{
echo "<center>No Records Found!</center>";	
}

?>
				</div>	<!-- End .content-box-content -->	

			</div>   <!-- End .content-box -->
			<div id="footer">
				<small>
						&#169; Copyright 2015  | <a href="mcharagu@gmail.com"> Airlines </a> | <a href="#"></a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div></body>
  
</html>
