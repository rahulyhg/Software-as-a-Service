<?php
$uname=$_POST['email'];
$pass=$_POST['password'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("saasdb", $con);
$flag=1;
$result = mysql_query("select * from users;");
while($row=mysql_fetch_array($result))
{
if($row['uname']==$uname &&  $row['password']==$pass)
  {
	session_start();
	$_SESSION['UNAME']=$uname;
	$_SESSION['APPS']=$row['apps'];
	$_SESSION['PAY']=$row['pay_type'];
	$flag=0;
	break;
  }

}

if($flag==1)
{header('Location:index.html');}
else
header('Location:selectapp.php');
?>
