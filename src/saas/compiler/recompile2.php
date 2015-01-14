<?php
				//FOR RECOMPILATION OF SCRIPTS
session_start();
$name=$_SESSION['name'];
$foldername=substr($name,0,stripos($name,"."));
	$base="./".$foldername."/";
unset($_SESSION['code']);
unset($_SESSION['lan-ip']);
shell_exec('rm -f '.$base.$name);
$ip="input";
shell_exec('rm -f '.$base.$ip);

$fd=fopen($base.$name,'w') or die("can't open file");
shell_exec("chmod 777 ".$base.$name);
				$x=$_POST['cod'];
				$x=str_replace("<br>","\n",$x);
				$x=str_replace("&nbsp;"," ",$x);
				$x=str_replace("&lt;","<",$x);
				$x=str_replace("&gt;",">",$x);
				$x=str_replace("&amp;","&",$x);
				$x=str_replace("&quot;",'"',$x);
				$x=str_replace("<span>",'',$x);
				$x=str_replace("</span>",'',$x);
						fwrite($fd,$x);
		
		
		$fdip=fopen($base.$ip,'w') or die("can't open file");
			shell_exec("chmod 777 ".$base.$ip);
			fwrite($fdip,$_POST['ip']);
			fclose($fdip);
		
?>
