<?php
session_start();
	$name=$_SESSION['name']	;
	$foldername=substr($name,0,stripos($name,"."));
	$base="./".$foldername."/";
header("Content-Disposition: attachment; filename=\"$base$name\"");
?>
