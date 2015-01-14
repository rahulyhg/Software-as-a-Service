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
jQuery(window).bind("beforeunload",function(){
		$.ajax({
		url:'../date.php',		
		success:function(res){alert("You have to pay"+res);},
		error :function(err){alert("error")}
		});
		});
		});
</script>

	</head>
<body>
<div class="header">
	<span class="heading">Online Extractors</span>
</div>
<?php
	$base="/opt/lampp/htdocs/saas/saas.site40.net/extractor/files/";
	$download_base="/saas/saas.site40.net/extractor/files/";
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
	
      move_uploaded_file($_FILES["file"]["tmp_name"],"/opt/lampp/htdocs/saas/saas.site40.net/extractor/files/".$newname);
	  
	  		shell_exec("chmod 777 /opt/lampp/htdocs/saas/saas.site40.net/extractor/files/".$newname);
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
			
	
	switch ($ext) 
	{
		case 'zip':
				{




			$folder=basename($base.$newname,".zip");
			if (!file_exists($base.$folder))
			mkdir($base.$folder);
			else
			shell_exec("rm -rf ".$base.$folder);
			shell_exec("chmod 777 ".$base.$folder);
			$ex="unzip -jo ".$base.$newname." -d ".$base.$folder;
			$a=shell_exec($ex);
			
	  		
	  		
				}
			break;
			
			case 'rar':
				{
				$folder=basename($base.$newname,".rar");
				if (!file_exists($base.$folder))
				mkdir($base.$folder);
				else
					shell_exec("rm -rf ".$base.$folder);
				shell_exec("chmod 777 ".$base.$folder);
				//$ex="unrar -x ".$base.$newname." ".$base.$folder;
				//$ex="tar -xzf ".$base.$newname." -C ".$base.$folder;
				$ex="7z x -o".$base.$folder." ".$base.$newname;
				
				echo shell_exec($ex);
		  		
					
					
					}
				break;
			
			case 'gz':
				{
			$folder=basename($base.$newname,".tar.gz");
			if (!file_exists($base.$folder))
			mkdir($base.$folder);
			else
			shell_exec("rm -rf ".$base.$folder);
			shell_exec("chmod 777 ".$base.$folder);
			$ex="tar -xzf ".$base.$newname." -C ".$base.$folder;
			$a=shell_exec($ex);
			echo $a;
	  		//}
				}	
				
			break;
		
			case '7z':
			{
			$folder=basename($base.$newname,".7z");
			if (!file_exists($base.$folder))
			mkdir($base.$folder);
			else
			shell_exec("rm -rf ".$base.$folder);
			shell_exec("chmod 777 ".$base.$folder);
			$ex="7z x -o".$base.$folder." ".$base.$newname;
			echo $ex;
			$a=shell_exec($ex);
			//echo "hiiii".$a;
	  		//}
				}	
				
			break;
				
		
		default:
			
			break;
	}
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
