<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
$user=$_POST['email'];
$pass=$_POST['password'];
$apps="";
session_start();
$_SESSION['UNAME']=$user;
if(isset($_POST['compiler']))
$apps=$apps."compiler,";

if(isset($_POST['roboform']))
$apps.="roboform,";

if(isset($_POST['extractor']))
$apps.="extractor,";
	
if(isset($_POST['pay']) && $_POST['pay']=="paygo")
$pay="1";
else
$pay="2";
$_SESSION['APPS']=$apps;
$_SESSION['PAY']=$pay;


$flag=0;
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("saasdb",$con);
$result = mysql_query("select * from users;");

while($row=mysql_fetch_array($result))
{
if($row['uname']==$user)
  {
	$flag=1;
	break;
  }
}
if($flag==1)
	header('Location:signup.html');
else
{
	mysql_query("insert into users values('$user','$pass','$apps','$pay');");
	header('Location:index.html');
	mysql_close($con);
}	
?>
</body>
</html>
