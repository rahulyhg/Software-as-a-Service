<html>
	<head>
		<title> online extractor </title>
		<style type="text/css">
body {
	margin:0px;
	padding:0px;
	background-color: #121213;
	color:silver;
}
.header{
	background:url('img/header.jpg');
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
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">

$(document).ready(function(){
jQuery(window).bind("unload",function(){
		$.ajax({
		url:'../date.php',		
		success:function(res){alert("You have to pay"+res);}
		});
		});
		});
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
            <li><a href="../configure.html" >Configure</a></li>
            <li><a href="form.html">Extractor</a></li>
             <li><a href="../payments.php">Payments</a></li>
        </ul>    	
    
    </div> <!-- end of templatemo_menu -->
</div> <!-- end of menu wrapper -->


	<div class="layer" style="height:100%">
		<div class="header">
			<div class="heading">Online Extractor</div>
			<span class="logbtn"><a href="../signout.php">Signout</a></span>	
		</div>
	<?php
//phpinfo();
	$base="/opt/lampp/htdocs/saas/extractor/files/";
	$download_base="/saas/extractor/files/";
	function get_file_extension($file_name)
	{
	return substr(strrchr($file_name,'.'),1);
	}
	
	
if ($_FILES["file"]["error"] > 0)
    {
//    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    shell_exec("chmod 777 ".$_FILES["file"]["tmp_name"]);

$naam=$_FILES["file"]["name"];	
$newname=str_ireplace(" ","_",$naam);$newname=str_ireplace("&","_",$newname);
$newname=str_ireplace("(","_",$newname);$newname=str_ireplace(")","_",$newname);

	//echo $newname;
	//rename($base.$naam,$base.$newname);
	
      move_uploaded_file($_FILES["file"]["tmp_name"],"/opt/lampp/htdocs/saas/extractor/files/".$newname);
	  
	  		shell_exec("chmod 777 /opt/lampp/htdocs/saas/extractor/files/".$newname);
			echo "The file  ".$_FILES["file"]["name"] . " is successfully uploaded <br />";
    
		//}
    }
	$naam=$_FILES["file"]["name"];
	$newname=str_ireplace(" ","_",$naam);$newname=str_ireplace("(","_",$newname);
	$newname=str_ireplace(")","_",$newname);
	$newname=str_ireplace("&","_",$newname);
	$folder=str_ireplace(".", "_", $newname);
	if (!file_exists($base.$folder))
			mkdir($base.$folder);
	else
	shell_exec("rm -rf ".$base.$folder);
			shell_exec("chmod 777 ".$base.$folder);
			
	
	//$folder=basename($base.$newname,".rar");
	$ext=get_file_extension($_FILES["file"]["name"]);
			if($ext=="gz")
			shell_exec("tar -xzf ".$base.$newname." -C ".$base.$folder);
			//$a=shell_exec($ex);
			else 
			shell_exec("7z x -o".$base.$folder." ".$base.$newname);
			//echo $ex;
			//$a=shell_exec($ex);
			
	
	   shell_exec("chmod 777 ".$base.$folder);
	shell_exec("chmod 777 ".$base.$folder."/*");
	if ($handle = opendir($base.$folder)) 
	{	$no=1;
		echo "<h1><center>YOUR EXTRACTED FILES ARE</center></h1>";
		echo "
	      	<form>
	       <br>
		<center>
		<table border=1 align='center' cellspacing='2'><tr><th>File No </th><th> click to download </th></tr>";
    while(FALSE !=($entry = readdir($handle))) 
    {				
    if($entry!="." && $entry!="..")
    {
    	shell_exec("chmod 777 ".$base.$entry);
	       echo "<tr><td>
	   ".$no."</td><td><a href='".$download_base.$folder."/".$entry."' target=_blank>".$entry."</a></td></tr>";
			$no=$no+1;
	}
	    }
	}
echo "</table></center>
	       </form>
	        </body>
	        </html>";
		//provide_links($base.$folder);
  ?>
