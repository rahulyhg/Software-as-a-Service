<?php
//FOR RECOMPILATION OF C,C++,JAVA
session_start();
$name=$_SESSION['name'];
$foldername=substr($name,0,stripos($name,"."));
	$base="./".$foldername."/";
unset($_SESSION['code']);
shell_exec('rm -f '.$base.$name);
$fd=fopen($base.$name,'w') or die("can't open file");
shell_exec("chmod 777 ".$base.$name);
//$ffs=fopen("dsasda",'w') or die("can't open file");
//echo filesize($name)."  ".$name;
		$x=$_POST['cod'];
$x=str_replace("<br>","\n",$x);
$x=str_replace("&nbsp;"," ",$x);
$x=str_replace("&lt;","<",$x);
$x=str_replace("&gt;",">",$x);
$x=str_replace("&amp;","&",$x);
$x=str_replace("&quot;",'"',$x);
$x=str_replace("<span>",'',$x);
$x=str_replace("</span>",'',$x);
$x=str_replace("</code>",'',$x);
$x=str_replace('<code class="sgreen">','',$x);
$x=str_replace('<code class="sorange">','',$x);
$x=str_replace('<code class="sred">','',$x);
$x=str_replace('<code class="sblue">','',$x);
$x=str_replace('<code class="spink">','',$x);
	
$x=str_replace('<code id="sgreen">','',$x);
$x=str_replace('<code id="sorange">','',$x);
$x=str_replace('<code id="sred">','',$x);
$x=str_replace('<code id="sblue">','',$x);
$x=str_replace('<code id="spink">','',$x);

		fwrite($fd,$x);
		
		//fwrite($ffs,$name);
?>
