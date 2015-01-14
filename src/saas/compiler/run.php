<?php
	session_start();
	$name=$_SESSION['name']	;
	$inp=$_POST['input'];	
	$fd=fopen("./io/input",'w+') or die("can't open file");
	fwrite($fd,$inp);
	$fd1=fopen('./io/output','w+') or die("cant open ");
	$lan=$_SESSION['lang'];
	$foldername=substr($name,0,stripos($name,"."));
	$base="./".$foldername."/";
	$x="";
	//echo $lan;
	if($inp!="")
	{
		if($lan==1)
		{
		$x=shell_exec($base."shana<./io/input");
		shell_exec("i586-mingw32msvc-gcc -o $foldername.exe ".$base.$name);
		shell_exec("mv $foldername.exe $base");
		}
		else if($lan==2)
		{
		$x=shell_exec($base."shana<./io/input");
		shell_exec("i586-mingw32msvc-g++ -o $foldername.exe ".$base.$name);
		shell_exec("mv $foldername.exe $base");
		}
		else if($lan==3)
		{
		$z=$_SESSION['name'];
		$z=str_replace(".java","",$z);
		$x=shell_exec("cd ".$foldername.";java ".$z."<../io/input");
		}
		else 
		$x=shell_exec("bash ".$z);
//		shell_exec("rm -f input");
	}
	else
	{
	if($lan==1)
		{
		$x=shell_exec($base."shana");
		shell_exec("i586-mingw32msvc-gcc -o $foldername.exe ".$base.$name);
		shell_exec("mv $foldername.exe $base");
		}
		else if($lan==2)
		{
		$x=shell_exec($base."shana");
		shell_exec("i586-mingw32msvc-g++ -o $foldername.exe ".$base.$name);
		shell_exec("mv $foldername.exe $base");
		}
		else if($lan==3)
		{
		$z=$_SESSION['name'];
		$z=str_replace(".java","",$z); 
		$x=shell_exec("java -cp ".$base." ".$z);
		}
		else
		$x=shell_exec("bash ".$z);	
	}
	fwrite($fd1,$x);
	$x=str_replace("\n","<br>",$x);
	$x=str_replace(" ","&nbsp;",$x);
	//shell_exec("rm -f shana");
	//$x=str_replace(" ","\t\n",$x);
//	else
	echo $x;
?>
