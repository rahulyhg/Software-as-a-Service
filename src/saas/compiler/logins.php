<?php
session_start();

$_SESSION['uname']=$_POST['uname'];
$_SESSION['pwd']=$_POST['pwd'];
$a=$_SESSION['uname'];
$b=$_SESSION['pwd'];
$con=mysql_connect('localhost','root','');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$sql="select uname,pwd from login where uname='".$a."' AND pwd='".$b."';";
mysql_select_db("sava",$con);
$res=mysql_query($sql);

while($row=mysql_fetch_array($res))
{

		header('Location:online.htm');
break;

}
mysql_close($con);


if($row=='')
header('Location:nologin.htm');
session_destroy();
?>
