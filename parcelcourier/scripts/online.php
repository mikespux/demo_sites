<?php

ob_start();
$user = $_SESSION['username']; 	
//$usere =$_SESSION['useremail'];	
if($_SESSION['username']!='')
{
						
						echo '<ul class="nav navbar-nav navbar-right user-nav">
    <li class="dropdown profile_menu">
      <a href="form-validation.html#" class="dropdown-toggle" data-toggle="dropdown"><img alt="Avatar" src="images/avatar3.png" />'.$user.'<b class="caret"></b></a>
      <ul class="dropdown-menu">
      
        <li class="divider"></li>
        <li><a href="scripts/logout.php">Sign Out</a></li>
      </ul>
    </li>
  </ul>	';
							
								
							
														
}
else
{

}


?>