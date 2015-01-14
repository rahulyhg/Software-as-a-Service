
<html>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<head>
<style type="text/css">
body {
	margin:0px;
	padding:0px;
	background-color: #121213;
	color:silver;
}
.header{
	background:url('css/img/header.jpg');
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
.lines{
float:left;
padding-left:20px;
width:70%;
}
.lno
{
float:left;
width:10%;
border-right:3px ridge black;
}
.e_prgm
{
float:left;
display:none;
width:50%;
margin-left:10px;
height:400px;
margin-bottom:75px;

}
#left-disp-code
{
width:97%;
height:400px;
overflow:scroll;
border:2px ridge white;
border-top-left-radius:10px;
border-top-right-radius:10px;
padding:5px;
color:black;
background-color:silver;
margin-left:5px;

}
#richtxt{
	font-size:10.3pt;
	min-width:97%;
	min-height:430px;
	float:left;
	background-color:white;
	border-radius:5px;
}
.download_bt
{
	float:right;
	width:200px;
	height:50px;
	padding:5px;
	background-color:#344;
	display:none;
	border-radius:10px;
	border:5px ridge black;
}
#but
{
	margin-bottom:10px;
	padding-bottom:5px;
}
#code
{
font-size:10.3pt;
max-width:100%;
max-height:400px;
min-width:80%;
min-height:400px;

}
#result
{
clear:both;
float:left;
overflow:auto;
}
.box
{
color:black;
margin-left:5px;
border:2px ridge black;
width:45%;
height:90px;
padding:5px;
background:#dadede;
border-radius:10 10 10 10;
position:relative;
top:5px;
}
#inp
{
float:right;
}
</style>
 <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">

var idoc;
	function iframeon()
	{
		var ifrme=document.getElementById("richtxt");
		var ibody=ifrme.contentWindow.document.body;
		idoc=ifrme.contentWindow.document;
		idoc.getElementById("data1").contentEditable="true";
		idoc.getElementById("data1").focus();
	}



	$(document).ready(function(){
	
		$("button.edit").click(function(){
		$x=$(".lines").html();
		$x=$x.replace(/<br>/g,"");

		document.getElementById("richtxt").contentWindow.document.getElementById("prgm").innerHTML=$x;
			
		$(".e_prgm").css({"display":"inline"});
		
		$("#left-disp").css({"display":"none"});
		
		});
	
	jQuery(window).bind("unload",function(){
		$.ajax({
		url:'../date.php',		
		success:function(res){alert("You have to pay"+res);}
		});
		});
	$("button#run").click(function(){
			
		$.ajax
		({
		type:'POST',
		url:'run.php',
		data:{ input:$('.input').val()},
		success: function(res){
			$('#result').html(res);
			$(".download_bt").show();
		},
		error :function(err){alert("error")}
		});


		
		});
		$(".download_bt").click(function(){
		$(this).css("background-color","#444");
		$('.download-form').submit();
		});
	
	 $(".font_left").change(function(){
	    $("#left-disp").animate({fontSize:$(this).val()},"slow");
		});
	 $(".font_right").change(function(){
	    $("#code").animate({fontSize:$(this).val()},"slow");
		});

	
});
function running()
{
	$(".e_prgm").css({"display":"none"});
	$("#left-disp").css({"display":"inline"});
	//	$(".e_prgm").fadeOut();
	$.ajax({
 		type:'POST',
		url:'recompile.php',
		data:{cod:document.getElementById("richtxt").contentWindow.document.getElementById("prgm").innerHTML},
		success: function(res1){
			$('#result').html(res1);
			location.reload();
			//alert(res1);
		},
		error :function(err){alert("error")}
		});
	//window.location=window.location.href;		
}

	
</script>
<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link href="../css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />

<link href="../css/logout.css" rel="stylesheet" type="text/css" />
</head>

<body style="" onload="iframeon()">	
	<?php
	//Creation of program files and error files
		session_start();
		$_SESSION['prevpg']="compile2.php";
		$name=$_SESSION['name'];	
		$lang=$_SESSION['lang'];
		$foldername=substr($name,0,stripos($name,"."));
		$base="./".$foldername."/";
		shell_exec("mkdir ".$foldername);
		shell_exec("chmod 777 ".$foldername);
		//$dir=$_SESSION['dir'];

		if(isset($_SESSION['code']))
		$code=$_SESSION['code'];
		else
		{
			$fd=fopen($base.$name,'r+') or die("can't open file");
			shell_exec("chmod 777 ".$base.$name);
			$code=fread($fd,filesize($base.$name));
			fclose($fd);
		}
		$fd=fopen($base.$name,'w+') or die("can't open file");
		$fd2=fopen($base."error1",'w+');
		shell_exec("chmod 777 ".$base."error1");
		fwrite($fd,$code)	;
	?>


<div id="templatemo_menu_wrapper">

    <div id="templatemo_menu">
    
        <ul>
            <li><a href="../selectapp.php">My Home</a></li>
            <li><a href="../configure.html" >Configure</a></li>
            <li><a href="online.htm" class="current">Compiler</a></li>
             <li><a href="../payments.php">Payments</a></li>
             <li><a href="../signout.php">Signout</a></li>
        </ul>    	
    
    </div> <!-- end of templatemo_menu -->
</div> <!-- end of menu wrapper -->


	<div class="layer" style="height:100%">
		<div class="header">
			<div class="heading">Online compilers</div>
		
		</div>

<!--LAYER 1-->
<div class="layer" style="width:1100px;margin:0 auto 0;height:100%;background:url(note11.jpg) repeat;">
		
	<?php
	echo "<h3 style='color:blue'>Program :".$name."</h3>";
	?>
	
	<!--left side half-->
	
	
	<div style="float:left;width:50%" id="left-disp">
		<span style="float:right;position:relative;z-index:1;top:10px;right:20px;">
			<button class="edit">Edit</button>
		</span>
	<span style="clear:both;float:left">Font size<select class="font_left">

<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13" selected>13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
</select>
	</span>
			
	<!--Disply Code -->
		<div id="left-disp-code">
			<div class="lno">
				<?php 
					$len=shell_exec("wc -l ".$base.$name);
					for($i=1;$i<=$len+1;$i++)
					{
						echo "<span id='".$i."'>".$i."</span><br>";
					}
				?>
			</div>	
			<div class="lines"><?php
				$fd=fopen($base.$name,'r') or die("can't open file");
				while(!feof($fd))
				{
					$x=fgets($fd);
					$x=str_replace("<","&lt;",$x);
					$x=str_replace(">","&gt;",$x);
					$x=str_replace(" ","&nbsp;",$x);
					echo "<span>$x</span><br>";
				}  
				fclose($fd);
			?>
			</div>
		</div>	
	<!--left side ends-->
	</div>
	<!--right side half-->
	
	<div class="e_prgm">
		<!-------Hidden Text AREA--------->
		<span style="float:left;position:relative;top:10px;right:20px;">
		<button id="but" class="share" onclick="sharing()">Share</button>
		<button id="but" class="recompile" onclick="running()">Compile</button>
		</span>
		<iframe id="richtxt" src="../test/test3.html"></iframe>
		
	</div>
	<form action="downloadpg.php" method="get" class="download-form">
	<button class="download_bt">
		<h2 style="margin-left:15px;color:white;align:center;font-size:10pt">Download >></h2>
	</button>
	</form>
<!--RESULTS OF COMPILATION ADN RUN--->
	
	<div id="result" class="box" style="width:540px;">
	<?php
		//Compile dependng on LAnguage

		if($lang==1)		
		shell_exec("gcc -o ".$base."shana ".$base.$name." 2> ".$base."error1");
		else if($lang==2)
		shell_exec("g++ -o ".$base."shana ".$base.$name." 2> ".$base."error1");
		else if($lang==3)
		{	
			shell_exec("chmod -R 777 $base");
			shell_exec("javac ".$base.$name." 2> ".$base."error1");
			shell_exec("mv ".$foldername.".class ".$base); 
		
		}
			$k=1;			//K variable for not consiedering start 
		while(! feof($fd2))
		  {
		 	 $z=fgets($fd2);
			//Show compilation Message
					//$k=1;
					//if($k!=1)// || $lang==3)
					{
					if(strncmp($z,$base.$name,strlen($base.$name))==0)
					{
					$pos1=stripos($z,':',0);
					
					$pos2=stripos($z,':',$pos1+1);
			
					$lno=substr($z,$pos1+1,$pos2-$pos1-1);
				
					if(is_numeric($lno))
					echo "<script type=text/javascript>
				myObj = document.getElementById('".$lno."');
				myObj.style.background = 'red';
								
				</script>";
					}
					}
					
					
				
			
			//if($z=="" && $lang==3 && $k==1)echo "Compiled successfully";
			//'as' used  linux shows error if compltn succesfuull (Platform dependent)
			if(strcmp($z,"")!=0)
			{
				echo $z. "<br />";
				$cont=0;
			}
			else
			{
				if($k==1)
				{
				echo "Compiled Successfully.";
				echo $z;
				$cont=1;
				break;
				}
			}
			$k=2;
		  }
		fclose($fd2);
	?>
	</div>
	<div class="box" id="inp" style="top:0px;height:95px;width:400px;right:100px;">
		<legend>Input</legend><button id='run' style='clear:both;z-index:1;position:relative;right:10px;float:right'> Run </button>
		<textarea class="input" rows="4" cols="40" style="overflow:auto;max-height:75px;max-width:450px"></textarea>
	</div>
	<div style="clear:both;"></div>
</div>
</body>
</html>
