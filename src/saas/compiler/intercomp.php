<?php
session_start();
$_SESSION['name']=$_POST['nm'];
$_SESSION['lang']=$_POST['lan'];
$x=$_POST['val'];
$x=str_replace("<span>","",$x);
$x=str_replace("</span>","",$x);
$x=str_replace("<br>","\n",$x);
$x=str_replace("&nbsp;","  ",$x);
$x=str_replace("&lt;","<",$x);
$x=str_replace("&gt;",">",$x);
$x=str_replace("&amp;","&",$x);
$x=str_replace("&quot;",'"',$x);
$_SESSION['code']=$x;

//$x=strstr($x,'.',true);
//shell_exec("mkdir /home/guest");
//shell_exec("mkdir /home/guest/".$x);
//$_SESSION['dir']="/home/guest/".$x;
//echo $_SESSION['lang'];
if($_POST['lan']>4)
{
$_SESSION['lan-ip']=$_POST['ip'];	
}
if($_POST['lan']=="5")
header('Location:cmpl_php.php');
else if ($_POST['lan']=="6")
header('Location:cmpl_ruby.php');
else if ($_POST['lan']=="7")
header('Location:cmpl_perl.php');
else if ($_POST['lan']=="8")
header('Location:cmpl_pyth.php');
else if ($_POST['lan']=="9")
header('Location:loginsql.html');
else
header('Location:compile2.php');

?>
