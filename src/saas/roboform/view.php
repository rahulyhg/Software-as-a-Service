<?php
session_start();
if(!isset($_SESSION['UNAME']))
header("Location:index.html");
?>

<html>
<head>
<style type="text/css">
body {
	margin:0px;
	padding:0px;
	background-color: #121213;
	color:silver;
}
.header{
	background:url('css/img/header.jpg');
	width:100%;
	height: 80px;
}
.heading{
	text-align:left;
	font-family:"Verdana";
	color:white;
	font-size:30px;
	font-weight:bold;
	font-style:oblique ;
}
</style>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
</script>

<script type="text/javascript">
var as;
function give(x){
//alert(x);
as=x;
}
function f1(){
    		var s = document.getElementById('text'+as).value;
    		var div = document.createElement('div');
    		div.innerText = '"' + s + '" copied to clipboard.';
    		document.body.appendChild(div);
    		
    		if (window.clipboardData)
    			window.clipboardData.setData('text', s);
    		else
    			return (s);
    	}	
    	</script>
    	<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link href="../css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
<link href="../css/logout.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="templatemo_menu_wrapper">

    <div id="templatemo_menu">
    
        <ul>
            <li><a href="../selectapp.php">My Home</a></li>

            <li><a href="index.html" class="current">RoboLogin</a></li>

        </ul>    	
    
    </div> <!-- end of templatemo_menu -->
</div> <!-- end of menu wrapper -->

<div class="header">
	<span class="heading">Roboform</span>
	<div class="logbtn"><a href="../signout.php">Signout</a></div>
</div>

<?php
$login=$_SESSION['uname'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("saasdb", $con);
$flag=0;
$result = mysql_query("select * from robo_records;");
$i=1;
while($row=mysql_fetch_array($result))
{

if($row['login']==$login)
{
if($flag==0)
{
echo "<table border=1><tr id=".$i."><th>Login name</th><th>Account</th><th>Password<br>(double click)</th></tr>";
$flag=1;
}

echo "<tr><td>".$row['unames']."</td><td>".$row['account']."</td><td><object id='clipboard' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0' width='16' height='16' align='middle'>
		<param name='allowScriptAccess' value='always' />
		<param name='allowFullScreen' value='false' />
		<param name='movie' value='clipboard.swf' />
		<param name='quality' value='high' />
		<param name='bgcolor' value='#ffffff' />
		<param name='wmode' value='transparent' />
		<param name='flashvars' value='callback=f1' />
		<embed onclick=give(".$i.") src='clipboard.swf' flashvars='callback=f1' quality='high' bgcolor='#ffffff' width='16' height='16' wmode='transparent' name='clipboard' align='middle' allowscriptaccess='always' allowfullscreen='false' type='application/x-shockwave-flash' pluginspage='http://www.adobe.com/go/getflashplayer' />
	</object>
	<input type=hidden value=".$row['pwd']." id=text".$i.">
	</td></tr>";
	
$i++;
}
}

echo "<hr>
<h3>Add Entry</h3>
<form name=f3 method=post action=update.php>
Username<input type=text name=uname2 value='' /><br>
Password<input type=password name=pwd2 value='' ><br>
Account<input type=text name=add value='' /><br>
<input type=submit name=submit2 value='Remember me'><br>
<br><br><br><hr><br>
</form>
<h3>Entries</h3>
";
if($flag==0)
echo "<h3>No data</h3>";

?>
</body>
</html>
