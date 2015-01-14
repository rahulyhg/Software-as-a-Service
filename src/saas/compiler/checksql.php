<?php
session_start();
$flag=0;
$uname=$_POST['login'];
$_SESSION['uname']=$uname;
$pwd=$_POST['pwd'];
$con=mysql_connect("localhost","root","");
mysql_select_db("onlinesql",$con);
$res=mysql_query("select * from login");
while($row=mysql_fetch_array($res))
{
	if($row['uname']==$uname && $row['pwd']=$pwd)
	{
	$flag=0;
	header("Location:sqlstmts.html");
	break;
	}
	else
		$flag=1;
	
}
if($flag==1)
header("Location:loginsql.html");
?>
