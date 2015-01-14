<html>
<head>
<style type="text/css">



body {
	margin:0px;
	padding:0px;
	background-color: #121213;
	color:silver;
}

</style>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
jQuery(window).bind("unload",function(){
		$.ajax({
		url:'../date.php',		
		success:function(res){alert("You have to pay"+res);}
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
            <?php
             session_start();
             echo"<li><a href=".$_SESSION['prevpg'].">Back</a></li>"; 
             ?>
            <li><a href="online.htm">Compiler</a></li>
             <li><a href="../payments.php">Payments</a></li>
        </ul>    	
    
    </div> <!-- end of templatemo_menu -->
</div> <!-- end of menu wrapper -->


	<div class="layer" style="height:100%">
		<div class="header">
			<div class="heading">Online compilers</div>
			<span class="logbtn"><a href="../signout.php">Signout</a></span>	
		</div>
<?php
	
	$name=$_SESSION['name']	;
	$lan=$_SESSION['lang'];
	$foldername=substr($name,0,stripos($name,"."));
	$base="./".$foldername."/";
	$sizesrc=shell_exec("stat ".$base.$name." -c=%s");
	
	if($lan<3)
	{
	$sizeexe=shell_exec("stat ".$base.$foldername.".exe -c=%s");
	$sizebin=shell_exec("stat ".$base."shana -c=%s");
	echo "<img src='css/img/exe.png'> <a href=".$base.$foldername.".exe>executable(Windows)</a>".$sizeexe." bytes<br>";
	echo "<img src='css/img/lin.png' width=32 height=32><a href=".$base."shana>executable(Linux)</a>$sizebin bytes<br>";
	}
	else if($lan==3)
	{
	$sizeexe=shell_exec("stat ".$base.$foldername.".class -c=%s");
	echo "<img src='css/img/exe.png' width=32 height=32><a href=".$base.$foldername.".class>ClassFile</a>".$sizeexe." bytes<br>";
	}
	echo "<img src='css/img/txt.png' width=32 height=32><a href=downloadsrc.php>Source-code</a> $sizesrc bytes<br>";
	?>	
	</body>
	</html>
