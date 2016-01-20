<?php 
  include $_SERVER["DOCUMENT_ROOT"].'/airline/core/init.php';
  include $_SERVER["DOCUMENT_ROOT"].'/airline/includes/overall/header.php';
?>

<head>
<link rel="stylesheet" type="text/css" href="xres/css/style.css" />
<script type="text/javascript" src="xres/js/saslideshow.js"></script>
<script type="text/javascript" src="xres/js/slideshow.js"></script>
<script type="text/javascript">
		$("#slideshow > div:gt(0)").hide();

		setInterval(function() { 
		  $('#slideshow > div:first')
			.fadeOut(1000)
			.next()
			.fadeIn(1000)
			.end()
			.appendTo('#slideshow');
		},  3000);
	</script>
</head>
      <div class="row">
        <div class="col-lg-4">
          <div class="well bs-component">
            <form class="form-horizontal" action="" method="GET">
              <legend>Check Available Flights</legend>
              <div class="form-group">
                <div class="col-lg-10">
                  <div class="radio">
                    <label>
                      <input type="radio" name="path" value="oneway" onclick="setReadOnly(this)">
                      One Way
                    </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="path" value="return" checked onclick="setReadOnly(this)">
                      Return
                    </label>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-lg-12">
                  <label for="select" class="control-label">Class</label>
                  <select class="form-control" name="class" id="select">
                    <option name="economy" value="Economy">Economy</option>
                    <option name="business" value="Business">Business</option>
                  </select>
                  <br>
                </div>
              </div>
              <div class="form-group">
                <center><button type="submit" id="submit" value="submit" name="submit" class="btn btn-primary">Submit</button></center>
              </div>
            </form>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="well bs-component">
            <form class="form-horizontal" action="book.php" method="GET">
            <?php 
            
            if(isset($_GET['path'])===true 
               && isset($_GET['class'])===true) {
              
            
              $class = $_GET['class'];
              $path = $_GET['path'];
              

              if($path==='oneway') {
              
              $query = "SELECT * FROM `flight_search` ";
              $result = mysql_query($query);
              if($result) {
              if(mysql_num_rows($result) > 0) {
			  
              while($row = mysql_fetch_assoc($result)) {
			  echo '<legend>Flights from '.$row['from_city'].' to '.$row['to_city'].' , Depature date '.$row['departure_date'].'</legend>';
                ?>
				
                <table class="table">
                  <thead>
                  <tr>
                    <th>Flight No</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Seats Left</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php if($class==='Economy') {  ?>
                   <td><input type="radio" name="chose_to" value="<?php echo $row['fno']; ?>"/><?php echo $row['fno']; ?></td>
                   <td><?php echo $row['departure_time']; ?></td>
                   <td><?php echo $row['arrival_time']; ?></td>
                   <td><?php echo $row['e_seats_left']; ?></td>
                   <td><?php echo $row['e_price']; ?></td>
                   <?php } else if($class==='Business') { ?> 
                   <td><input type="radio" name="chose_to" value="<?php echo $row['fno']; ?>"/><?php echo $row['fno']; ?></td>
                   <td><?php echo $row['departure_time']; ?></td>
                   <td><?php echo $row['arrival_time']; ?></td>
                   <td><?php echo $row['b_seats_left']; ?></td>
                   <td><?php echo $row['b_price']; ?></td>
                <?php } else { 'Not enough seats left, please search again!'; }
              }?>
              </tr>
              </tbody>
              </table>
              <input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
              <input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
              <center><button type="submit" id="class" name="class" value="<?php echo $class; ?>" class="btn btn-primary">Choose Flights</button></center>
              <?php
            } else { echo 'No flights found';}
          }
              else {  die(mysql_error()); }
          } 
          else if($path==='return') {

              $query1 = "SELECT * FROM `flight_search` ";
              $result1 = mysql_query($query1);
              if($result1) {
              if(mysql_num_rows($result1) > 0) {
			 
              while($row1 = mysql_fetch_assoc($result1)) {
			   echo '<legend>Flights from '.$row1['from_city'].' to '.$row1['to_city'].' , Depature date '.$row1['departure_date'].'</legend>';
                ?>
                <table class="table">
                  <thead>
                  <tr>
                    <th>Flight No</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Seats Left</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php if($class==='Economy') {  ?>

                   <td><input type="radio" required name="chose_to" value="<?php echo $row1['fno']; ?>"/><?php echo $row1['fno']; ?></td>
                   <td><?php echo $row1['departure_time']; ?></td>
                   <td><?php echo $row1['arrival_time']; ?></td>
                   <td><?php echo $row1['e_seats_left']; ?></td>
                   <td><?php echo $row1['e_price']; ?></td>
                  </tr>
                </tbody>
                </table> 
				<center><button type="submit" id="class" name="class" value="<?php echo $class; ?>" class="btn btn-primary">Choose Flights</button></center>
				<?php } else { ?>  
                    <td><input type="radio" required name="chose_fro" value="<?php echo $row2['fno']; ?>"/><?php echo $row2['fno']; ?></td>
                   <td><?php echo $row2['departure_time']; ?></td>
                   <td><?php echo $row2['arrival_time']; ?></td>
                   <td><?php echo $row2['b_seats_left']; ?></td>
                   <td><?php echo $row2['b_price']; ?></td>
				   
                <?php }
              }
            } else { echo 'No flights found';}
          }
              else {  die(mysql_error()); }
             
              if(isset($_GET['return_date'])===true) {
                $returndate = $_GET['return_date'];
              $query2 = "SELECT * FROM `flight_search` ";
              $result2 = mysql_query($query2);
              if($result2) {
              if(mysql_num_rows($result2) > 0) {
              while($row2 = mysql_fetch_assoc($result2)) {
                ?>
                <table class="table">
                  <thead>
                  <tr>
                    <th>Flight No</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Seats Left</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php if($class==='Economy') {  ?>
                   <td><input type="radio" required name="chose_fro" value="<?php echo $row2['fno']; ?>"/><?php echo $row2['fno']; ?></td>
                   <td><?php echo $row2['departure_time']; ?></td>
                   <td><?php echo $row2['arrival_time']; ?></td>
                   <td><?php echo $row2['e_seats_left']; ?></td>
                   <td><?php echo $row2['e_price']; ?></td>
                  </tr>
                </tbody>
                </table> <?php } else { ?>  
                   <td><input type="radio" required name="chose_fro" value="<?php echo $row2['fno']; ?>"/><?php echo $row2['fno']; ?></td>
                   <td><?php echo $row2['departure_time']; ?></td>
                   <td><?php echo $row2['arrival_time']; ?></td>
                   <td><?php echo $row2['b_seats_left']; ?></td>
                   <td><?php echo $row2['b_price']; ?></td>
                <?php }
              }?>
              <input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
              <input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
              <center><button type="submit" id="class" value="<?php echo $class; ?>" name="class" class="btn btn-primary">Choose Flights</button></center>
              <?php
            } else { echo 'No flights found';}
          }
              else {  die(mysql_error()); }
          } 
         }
         }
          else { ?>
              <div id="content">
		  <div id="rotator">
				
            <ul>
                    <li class="show"><img src="vendor/img/kq12.png" width="100%"  alt="" /></li>
                    <li ><img src="vendor/img/kq13.png" width="100%"  alt="" /></li>
                    <li><img src="vendor/img/kq14.jpg"  width="100%"  alt="" /></li>
              </ul>
			  </div>
			  </div>
			  </br></br></br>
              <h3>Services offered by Kenya Airlines</h3>
              <h5>Travel across any 4 metro cities in the World</h5>
              <h5>Free 3 course meals for every passenger</h5>
              <h5>Free Wi-Fi services offered during your flight</h5>
              <h5>Upto 25 Kg Baggage limit for every passenger</h5>
              <h5>Unlimited Food and Alcohol in Business Class</h5>
              <h5>Book hotels via Swift Airlines and avail 10% discount per room</h5>
              <h5>Discounted travel coupons for every city</h5>
              <h5>Hire cabs or bus via Swift Airlines and avail 10% discount per ticket</h5>
              <h5>Avail wheelchairs and emergency services for disabled at free of cost</h5>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
    
<?php include $_SERVER["DOCUMENT_ROOT"].'/airline/includes/overall/footer.php'; ?>