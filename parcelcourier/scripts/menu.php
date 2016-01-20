<?php

ob_start();
echo '<div class="cl-sidebar">
			<div class="cl-toggle"><i class="fa fa-bars"></i></div>
			<div class="cl-navblock">
        <div class="menu-space">
          <div class="content">
            <div class="side-user">
              <div class="avatar"><img src="images/avatar3.png" alt="Avatar" /></div>
              <div class="info">
                <a href="form-validation.html#">'.$_SESSION['username'].'</a>
                <img src="images/state_online.png" alt="Status" /> <span>Online</span>
              </div>
            </div>
			 
			
            <ul class="cl-vnavigation">';
			if ($_SESSION['username']!='')
				 {
				 echo '<li class="active"><a href="admin.php#1"><i class="fa fa-dashboard"></i><span>Registered parcels</span></a>
                 </li>
				 <li><a href="sign-up.php"><i class="fa fa-user"></i><span>User Registration</span></a>
                 </li>';
				 echo'
              <li ><a href="parcel.php"><i class="fa fa-home"></i><span>Parcel Registration</span></a>
                
              </li>
              <li><a href="parcel-receival.php"><i class="fa fa-smile-o"></i><span>Parcel receival</span></a>
                 </li>
			   <li><a href="gps/index.php"><i class="fa fa-smile-o"></i><span>Parcel tracking</span></a>
                 </li>
			 
				 ';
				 }
			
				
           echo'   
            </ul>
          </div>
        </div>
        <div class="text-right collapse-button" style="padding:7px 9px;">
          <input type="text" class="form-control search" placeholder="Search..." />
          <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
        </div>
			</div>
		</div>';
?>