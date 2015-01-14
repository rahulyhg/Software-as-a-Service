
<?php
session_start();
if(!isset($_SESSION['UNAME']))
header("Location:index.html");

if(!isset($_SESSION['PAY']))
header("Location:configure.html");
?>


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


<link href="css/cloudcss.css" rel="stylesheet" type="text/css" />
<link href="css/logout.css" rel="stylesheet" type="text/css" />
</head>
<body>




<div id="templatemo_menu_wrapper">

    <div id="templatemo_menu">
    
        <ul>
            <li><a href="selectapp.php" class="current">My Home</a></li>
              <li><a href="configure.html" >Configure</a></li>
               <li><a href="payments.php">Payments</a></li>
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






<div id="templatemo_top_row_wrapper">
  <div id="templatemo_top_row">
    
<?php
$_SESSION['TIMEIN']=time();
$start=0;
$app=$_SESSION['APPS'];

while(($comma=stripos($app,",",$start))!=null)
{
	$lcomma=$comma-$start;
	$list=substr($app,$start,$lcomma);
	$start=$comma+1;
	
	switch($list)
	{
	case 'compiler':
	echo "<div class='top_row_box'>
        	<h5>Online compiler </h5>
            <p>compile and edit your programs edit with our dynamic compiler . </p>
            <div class=btn><a href='./compiler/online.htm'></a></div>
        
    </div>";
	break;
	case 'extractor':
	echo " <div class=top_row_box>
        	<h5>Online Extractor </h5>
            <p>Extract files like zip , rar , tar.gz and many more with just one single click . </p>
            <div class=btn><a href='./extractor/form.html'></a></div>
        </div>
        ";
	break;
	case 'roboform':
	echo " <div class=top_row_box last>
        	<h5>Roboform </h5>
            <p>Single sign on facility for facebook , orkut , twitter any many more sites . </p>
            <div class=btn><a href='./roboform/index.html'></a></div>
    </div>";
	break;
	
	}
	
}

?>
   	
        
       
       
    
    	<div class="cleaner"></div>
  </div> 
  </div> 


</body>
</html>
