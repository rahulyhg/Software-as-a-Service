<?php
session_start();
$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
$con=mysql_connect("localhost","root","");
mysql_query("create database compiler_DB".$uname.";");
mysql_select_db("onlinesql");
mysql_query("grant usage on *.* to ".$uname."@localhost;");
mysql_query("GRANT ALL privileges ON compiler_DB".$uname.".* TO ".$uname."@localhost;");
mysql_query("FLUSH PRIVILEGES;");
mysql_query("insert into login values('".$uname."','".$pwd."');");
header("Location:loginsql.html");
?>
