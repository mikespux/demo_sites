<?php
session_start();
$con=mysql_connect("localhost","root", "") or die(mysql_error());

  

mysql_select_db("swift",$con) or die(mysql_error());

//$username= mysql_real_escape_string(trim($_POST['username']));
//$password= mysql_real_escape_string(trim($_POST['password']));
$username=($_POST['username']);
$password= ($_POST['password']);



$query = "SELECT 'u_id' FROM admin WHERE username = '$username' AND password ='$password'";
$result = mysql_query($query,$con);
if(!$result)
echo("fala wewe");
$count=mysql_num_rows($result);

if($count==1){
    while($row=mysql_fetch_array($query))
    {
      $id=$row['u_id'];
    }
    $_SESSION['u_id']=$id;
    $_SESSION['username']=$username;
    $_SESSION['password']=$password;
    echo "You are now  logged in";
    header("location:admin.php");
    exit();

}
else{
    echo("The user and password combination is incorrect...."."</br>");
       echo ("wait you will be redirected in 3 seconds to  previous page ");
    header('Refresh: 3; url=login.php');
}

mysql_close($con);


?>