

<?php
session_start();
$login=$_SESSION['uname'];
$user4=$_POST['uname2'];

//$a=$user1;
$pass4=$_POST['pwd2'];
$_SESSION['pass']=$pass4;
$add=$_POST['add'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("saasdb", $con);
$query="insert into robo_records values('$login','$user4','$pass4','$add');";
mysql_query($query,$con);
header('Location:view.php');
mysql_close($con);
?>



