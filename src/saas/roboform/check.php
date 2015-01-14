
<?php
session_start();
$user1=$_POST['uname1'];

$pass1=$_POST['pwd1'];
//$a=$user1;
$flag=0;

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("saasdb", $con);

$result = mysql_query("select * from robo_users;");
  	echo "AS";
while($row=mysql_fetch_array($result))
{
if($row['uname']==$user1 &&  $row['pwd']==$pass1)
  {
  	$flag=0;

  	$_SESSION['uname']=$user1;
	header('Location:view.php');
	break;
  }
  else
  	$flag=1;
}

//echo "try try till u succeed";
if($flag==1)
	header('Location:index.html');
mysql_close($con);

?>






