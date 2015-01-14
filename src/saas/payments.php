<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SAAS</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link href="css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />

<style type="text/css">
<!--
.style4 {
	color: #FFFFFF;
	font-size: 36px;
}
.style5 {color: #FFFFFF}

-->
.btn a{
	clear: both;
	display: block;
	width: 109px;
	height: 50px;
	padding: 4px 0 0 0;
	background:url(images/startbtn.png) no-repeat;
}

</style>
<link href="css/logout.css" rel="stylesheet" type="text/css" />
<link href="css/cloudcss.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />

</head>
<body>
<div id="templatemo_menu_wrapper">

    <div id="templatemo_menu">
    
        <ul>
            <li><a href="selectapp.php">My Home</a></li>
           <li><a href="configure.html" >Configure</a></li>
             <li><a href="payments.php"  class="current">Payments</a></li>
              <li><a href="signout.php">Signout</a></li>
        </ul>    	
    
    </div> <!-- end of templatemo_menu -->
	   
</div> <!-- end of menu wrapper -->

<div id="templatemo_header_wrapper">
  <div id="templatemo_header">
    <div id="site_title">
      <h1><a href="index.html"><img src="images/company_logo.gif" alt="img" width="115" height="83" /></a></h1>
      <p>&nbsp;</p>
      <p><span class="style4">SaaS.com</span></p>
    </div>
    
    </div>
  </div>
  <br>
<center>
<h2>Transactions</h2>

<br>
<h3>
1Rs/min usage
</h3>
</center>
<?php
session_start();
$user=$_SESSION['UNAME'];
$x=0;
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("saasdb",$con);
$result = mysql_query("select * from logs;");
echo "<center><table border=1>";
echo "<tr><th>Username</th><th>Time in </th><th>Timeout</th><th>Money</th></tr>";
while($row=mysql_fetch_array($result))
{
if($row['uname']==$user)
  {
	echo "<tr><td>".$user."</td>  <td>".$row['timein']."</td><td> ".$row['timeout']."</td><td> ".$row['money']."</tr>";
  }
  $x+=$row['money'];
}
$pay=$_SESSION['PAY'];
if($pay!="paygo")
echo "<tr><td>".$user."</td><td colspan='3'><center><font color=red><b>".$x."</td></tr></table>";
else
{
if($x>50)
{
echo "<tr><td>".$user."</td><td colspan='3'><center><font color=red><b>".$x."Disabled</td></tr></table>";
unset($_SESSION['PAY']);
}
else
echo "<tr><td>".$user."</td><td colspan='3'><center><font color=red><b>".$x."</td></tr></table>";
}
?>
</body>
</html>

