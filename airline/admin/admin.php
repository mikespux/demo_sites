
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
		
			
		
		<!--                       Javascripts                       -->
  
		<!-- jQuery -->
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
		
		
<!--  Datepicker    -->
<link rel="stylesheet" href="css/datepicker/ui-lightness/jquery.ui.all.css">
	<script src="js/datepicker/jquery-1.8.0.js"></script>
	<script src="js/datepicker/jquery.ui.core.js"></script>
	<script src="js/datepicker/jquery.ui.widget.js"></script>
	<script src="js/datepicker/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="css/datepicker/demos.css">
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			showOn: "button",
			buttonImage: "css/images/calendar.gif",
			buttonImageOnly: true
		});
	});
	</script>
	<!--End of date picker  -->



	</head>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="admin.php">Admin</a></h1>
		  
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
						<li><a class="current" href="#">Add Routes</a></li>
						<li><a href="edit_products.php">Edit Routes</a></li> <!-- Add class "current" to sub menu items also -->
						<li><a href="#">Add Planes</a></li>
						<li><a href="edit_markets.php">Edit Planes</a></li>
						<li><a href="edit_users.php">Manage Users</a></li>
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
			<h2>Welcome Admin</h2>
			<p id="page-intro">Manage Database</p>
			

			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					<ul class="content-box-tabs">

						<li><a href="#tab1" class="default-tab">Add Route</a></li>
						<li><a href="#tab2">Edit Routes</a></li>
						<li><a href="#tab3">Add Planes</a></li>
						<li><a href="#tab4">Edit Planes</a></li>
						
												
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
						
					
						<!-- start #tab1 Add--> 
						
					<div class="tab-content default-tab" id="tab1">
					<div class="notification attention png_bg">
							<a href="#" class="close"><img src="#" title="Close this notification" alt="close" /></a>
							<div>
								Add new routes.
							</div>
						</div>
						<form name= "products" action="product_process.php" method="post" >
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<?php
								//this code is bringing in the values for the dropdown.
										require_once("connection.php");


											$sql="SELECT name FROM routes";
											$result=mysql_query($sql);
											//$options="";
									?>
											
											<p>
									       <label>Route</label> 
											<input type="text" name="name" value="" required autofocus/>
											</p>
											

								
							
								
								
								<p>
									<div class="text-input small-input" type="text" style="margin-left: 0px;">
		                               <p>
												<label>Date</label> 
												<input type="text" id="datepicker" name="sd" required autofocus>
											</p>
											</div><!-- End demo -->
								</p>
								
								<p>
									<input class="button" type="submit" value="Submit" onsubmit="document.products.reset()" /> 
									<input type="reset" class="button" value="Reset" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>

						</div>  <!-- End #tab1 --> 
						
							<!-- start #tab2 Edit products tab--> 
						<div class="tab-content" id="tab2">
						
											<div class="notification attention png_bg">
							<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								View and Edit routes.
							</div>
						</div>
<html>
<body>

					<?php
					$connect=mysql_connect("localhost","root","");
					mysql_select_db("swift",$connect);
					if(isset($_GET['operation'])){
					if($_GET['operation']=="edit"){
					?>
</form><form method="post" action="edit_product_process.php">

<p>
									<label>Route</label>              
									<select name="market_name" id="market_name" class="small-input" required autofocus >
								
										<option value="" <?php echo $_GET['name']; ?> </option>
																				
									</select> 
								
								</p>
								
								
								
								
								<p>
									<label>Date</label>
									
									<input type="text" name="sd" id="sd"  value="<?php echo $_GET['date']; ?>" />
								</p>
								
								<p>
									<input type="hidden" name="market_id" value="<?php echo $_GET['product_id'] ?>" />
									<input type="hidden" name="update" value="yes" />
									<input type="submit" value="update Record"/>
								</p>

	</form>							


<?php
}}
?>

<?php
$query="SELECT * from routes";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	echo "<table align='center' border='1'>";
	echo "<tr>";
	echo "<th><B>Route Id</th>";
	echo "<th><B>Name</th>";
	echo "<th><B>Date Added</th>";
	
	echo "<th><B>Edit</th>";
	echo "<th><B>Delete</th>";
	echo "</tr>";
	while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo "<td>".$row['id']."</td>";	
	echo "<td>".$row['name']."</td>";		
	echo "<td>".$row['date']."</td>";
	echo "<td><a href='edit_products.php?operation=edit&product_id=".$row['id']."&name=".$row['name']."&date=".$row['date']."'>Edit </a></td>";
	echo "<td><a href='edit_product_process.php?operation=delete&product_id=".$row['id']."'>Delete</a></td>";	
	echo "</tr>";
	}
	echo "</table>";
}
else{
echo "<center>No Records Found!</center>";	
}

?>
</body>
</html>
						</div>  <!-- End #tab2 --> 

						<!-- start #tab3 Add market tab--> 
						<div class="tab-content" id="tab3">
										<div class="notification attention png_bg">
							<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								Add Planes.
							</div>
						</div>
						<form method="post" action="addplane.php">

			<table align="center" border="0">
			<tr>
			<p>
						<?php
								//this code is bringing in the values for the dropdown.
										require_once("connection.php");


											$sql="SELECT DISTINCT fno FROM flight_search";
											$result=mysql_query($sql);
											//$options="";
									?>
											
											<p>
									       <label>Flight Name</label> 
											<input type="text" name="flightname" value="" />
											</p>

					

									
									<?php
								//this code is bringing in the values for the dropdown.
										require_once("connection.php");


											$sql="SELECT Distinct name  FROM routes";
											$result=mysql_query($sql);
											//$options="";
									?>
											
											<p>
									       <label>From</label>     									
									<select name="from" class="small_input" id= "consti" >
										    <option>Select from</option>
											
											<?php
											while ($row=mysql_fetch_array($result)) 
											{
											?>
											<option><?php echo $row['name']; ?></option>
											<?php
											
											}
											?>	
											</select>
											</p>
											<p>
											<?php
								//this code is bringing in the values for the dropdown.
										require_once("connection.php");


											$sql="SELECT Distinct name  FROM routes";
											$result=mysql_query($sql);
											//$options="";
									?>	
									       <label>TO</label>     									
									<select name="to" class="small_input" id= "consti" >
										    <option>Select to</option>
											
											<?php
											while ($row=mysql_fetch_array($result)) 
											{
											?>
											<option><?php echo $row['name']; ?></option>
											<?php
											
											}
											?>	
											</select>
											</p>

								<p>
									<label>Departure Date  </label>  									
								<input type="text" name="depdate" value="" /> &nbsp;&nbsp;<img src="images2/cal.gif" onclick="javascript:NewCssCal('depdate')" style="cursor:pointer"/>
								</p>
								<p>
								<label>Arrival Date   </label>									
								<input type="text" name="arivdate" value="" /> &nbsp;&nbsp;<img src="images2/cal.gif" onclick="javascript:NewCssCal('arivdate')" style="cursor:pointer"/>
								</p>
								<p>
									<label>Departure Time</label>    									
								<input type="text" name="deptime" value="" />
								</p>
								<p>
									<label>Arrival Time</label>    									
								<input type="text" name="arivtime" value="" />
								</p>
								<p>
								
									<label>Number of Seats</label>    									
								<input type="text" name="seats" value="" />
								</p>
								<p>
								
									<label>Price</label>    									
								<input type="text" name="price" value="" />
								</p>
								
								<p>
									<input type="hidden" name="market_id" value="" />
									<input type="hidden" name="update" value="yes" />
									<input type="submit" value="Add Plane"/>
</td>
								</p>
	</tr>
</table>							
</form>

						</div>  <!-- End #tab3 --> 
						
						<!-- start #tab4 Edit market--> 
						<div class="tab-content" id="tab4">
											<div class="notification attention png_bg">
							<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							<div>
								Edit Planes.
							</div>
						</div>
						
<html>
<body>
							<?php
			$connect=mysql_connect("localhost","root","");
			mysql_select_db("swift",$connect);
			if(isset($_GET['operation'])){
			if($_GET['operation']=="edit"){
			?>
			<form method="post" action="edit_market_process.php">

			<table align="center" border="0">
			<tr>
			<p>
						<?php
								//this code is bringing in the values for the dropdown.
										require_once("connection.php");


											$sql="SELECT DISTINCT fno FROM flight_search";
											$result=mysql_query($sql);
											//$options="";
									?>
											
											<p>
									       <label>Flight Name</label> 
											<input type="text" name="flightname" value="<?php echo $_GET['name']; ?>" />
											</p>

					

									
									<?php
								//this code is bringing in the values for the dropdown.
										require_once("connection.php");


											$sql="SELECT Distinct from_city,to_city  FROM flight_search";
											$result=mysql_query($sql);
											//$options="";
									?>
											
											<p>
									       <label>From</label>     									
									<select name="from" class="small_input" id= "consti" >
										    <option><?php echo $_GET['from']; ?></option>
											
											<?php
											while ($row=mysql_fetch_array($result)) 
											{
											?>
											<option><?php echo $row['from_city']; ?></option>
											<?php
											
											}
											?>	
											</select>
											</p>
											<p>
											
									       <label>TO</label>     									
									<select name="to" class="small_input" id= "consti" >
										    <option><?php echo $_GET['to']; ?></option>
											
											<?php
											while ($row=mysql_fetch_array($result)) 
											{
											?>
											<option><?php echo $row['to_city']; ?></option>
											<?php
											
											}
											?>	
											</select>
											</p>

								<p>
									<label>Departure Date  </label>  									
								<input type="text" name="depdate" value="<?php echo $_GET['depdate']; ?>" /> &nbsp;&nbsp;<img src="images2/cal.gif" onclick="javascript:NewCssCal('depdate')" style="cursor:pointer"/>
								</p>
								<p>
								<label>Arrival Date   </label>									
								<input type="text" name="arivdate" value="<?php echo $_GET['arivdate']; ?>" /> &nbsp;&nbsp;<img src="images2/cal.gif" onclick="javascript:NewCssCal('arivdate')" style="cursor:pointer"/>
								</p>
								<p>
									<label>Departure Time</label>    									
								<input type="text" name="deptime" value="<?php echo $_GET['deptime']; ?>" />
								</p>
								<p>
									<label>Arrival Time</label>    									
								<input type="text" name="arivtime" value="<?php echo $_GET['arivtime']; ?>" />
								</p>
								<p>
									<label>Price</label>    									
								<input type="text" name="price" value="<?php echo $_GET['price']; ?>" />
								</p>
								
								<p>
									<input type="hidden" name="market_id" value="<?php echo $_GET['id'] ?>" />
									<input type="hidden" name="update" value="yes" />
									<input type="submit" value="update Record"/>
</td>
								</p>
	</tr>
</table>							
</form>


<?php
}}
?>

<?php
$query="SELECT * from flight_search";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
	echo "<table align='center' border='1'>";
	echo "<tr>";
	echo "<th><B>Flight No</th>";
	echo "<th><B>From City</th>";
	echo "<th><B>To City</th>";
	echo "<th><B>Departure Date</th>";
	echo "<th><B>Arrival Date</th>";
	echo "<th><B>Departure Time</th>";
	echo "<th><B>Arrival Time</th>";
	echo "<th><B>Price</th>";
	echo "<th><B>Seats</th>";
	echo "<th><B>Edit</th>";
	echo "<th><B>Delete</th>";
	echo "</tr>";
	while($row=mysql_fetch_array($result)){
	echo "<tr>";
	echo "<td>".$row['fno']."</td>";	
	echo "<td>".$row['from_city']."</td>";	
	echo "<td>".$row['to_city']."</td>";
	echo "<td>".$row['departure_date']."</td>";
	echo "<td>".$row['arrival_date']."</td>";
	echo "<td>".$row['departure_time']."</td>";
	echo "<td>".$row['arrival_time']."</td>";
	echo "<td>".$row['e_price']."</td>";
	echo "<td>".$row['e_seats_left']."</td>";
	echo "<td><a href='edit_markets.php?operation=edit&id=".$row['id']."&name=".$row['fno']."&from=".$row['from_city']."&to=".$row['to_city']."&depdate=".$row['departure_date']." &arivdate=".$row['arrival_date']." &deptime=".$row['departure_time']."&arivtime=".$row['arrival_time']." &price=".$row['e_price']."'>Edit</a></td>";
	echo "<td><a href='edit_market_process.php?operation=delete&market_id=".$row['id']."'>Delete</a></td>";	
	echo "</tr>";
	}
	echo "</table>";
}
else{
echo "<center>No Records Found!</center>";	
}

?>
</body>
</html>

				

						</div>  <!-- End #tab4 --> 

						

				</div>	<!-- End .content-box-content -->	

			</div>   <!-- End .content-box -->
			<div id="footer">
				<small>
						&#169; Copyright 2015  | <a href="mcharagu@gmail.com"> airlines </a> | <a href="#"></a>
				</small>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->
		
	</div></body>
  
</html>
