<?php
$user=$_POST['uname'];
$pass=$_POST['pwd'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("saasdb",$con);

$result = mysql_query("select * from robo_users");
while($row=mysql_fetch_array($result))
{
if($row['uname']==$user)
{
header('Location:signintry.html');
}
}
//$stm="insert into record values('$_POST['uname']','$_POST['pwd']');"
$stmt="insert into robo_users values('$user','$pass');";
mysql_query($stmt);
//echo $pass | clip;
//echo "database updated";
//echo exec('whoami');
header('Location:index.html');
mysql_close($con);
?>
