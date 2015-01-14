<?php

session_start();
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
$user=$_SESSION['UNAME'];

$flag=0;
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("saasdb",$con);

{
	mysql_query("update users set  apps='".$apps."'  where uname='".$user."' ;");
	mysql_query("update users set  payment='".$pay."'  where uname='".$user."' ;");
	header('Location:selectapp.php');
	mysql_close($con);
}	
?>
