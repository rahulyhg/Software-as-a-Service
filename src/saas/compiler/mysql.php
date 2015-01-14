<html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
jQuery(window).bind("unload",function(){
		$.ajax({
		url:'../date.php',		
		success:function(res){alert("You have to pay"+res);},
		error :function(err){alert("error")}
		});
		});
</script>
<link href="../css/logout.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
session_start();
$uname=$_SESSION['uname'];
//$stmt="use test;";
$stmt=$_POST['n1'];

//$stmt="show databases;";
$file=fopen("stmt",'w+');
$error=fopen("error",'w+');
fwrite($file,$stmt);	
$file2=fopen("output",'w+');
shell_exec("chmod 777 error");
shell_exec("chmod 777 stmt");
shell_exec("chmod 777 output");
$x=shell_exec("mysql -u ".$uname." compiler_DB".$uname." < stmt 2>error");

fwrite($file2,$x);
$y="<div style='border:2px ridge black;height:20px'><b>";

$pos=stripos($x,"\n");
$x=substr_replace($x,"</b></div><div style='border:2px ridge black'>",$pos,1);
$x=$y.$x;
if($x!='')
{
$x=str_replace("\n","<br>",$x);
$x=$x."</div>";
$x=$x."SQL Statement Executed";
//else
//fread($error,$x);
echo $x;
}
else
echo shell_exec("Statment error");
?>
</body>
</html>
