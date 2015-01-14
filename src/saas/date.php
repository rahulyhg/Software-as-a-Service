<?php
	session_start();
	$date1=$_SESSION['TIMEIN'];
	$user=$_SESSION['UNAME'];
	$date2=time();
	$_SESSION['TIMEOUT']=$date2;
	$used=$date2-$date1;
	echo $used;
	//$date1=date("Y:m:d",$date1);
	$money=$used/60;
	$_SESSION['MONEY']=$money;
	shell_exec("chmod 777 log");
	$fd=fopen("log",'w+');
	
	shell_exec("chmod 777 log");
	fwrite($fd,$money);
	$date1=date("Y-m-d h:i:s",$date1);
	$date2=date("Y-m-d h:i:s",$date2);
	echo $money;
	$flag=0;
	$con = mysql_connect("localhost","root","");
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }
	mysql_select_db("saasdb",$con);
	$result = mysql_query("select * from logs;");
	echo "insert into logs values('$user','$date1','$date2','$money');";


	{

		mysql_query("insert into logs values('','$user','$date1','$date2','$money');");
		mysql_close($con);
	}

			
	?>
