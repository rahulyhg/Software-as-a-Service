
<?php
$inc=$_POST['t1'];
$selected_radio = $_POST['r1'];

if($selected_radio =="male")
{
if ($inc<=200000){

					$result = 0;

				}

				if ($inc>200001 && $inc <=500000){

					$result = $result+((($inc-180000) * 10)/100);

				}

				if ($inc>500001 && $inc <=800000){

					$result = 32000+((($inc-500000) * 20)/100);

				}

				if ($inc>800001){

					$result = 92000;

					$result = $result+((($inc-800000) * 30)/100);

				}



}

if($selected_radio =="female")
{
if ($inc<=200000){

					$result = 0;

				}

			if ($inc>200001 && $inc <=500000){

				$result = ((($inc-190000) * 10)/100);

			}

			if ($inc>500001 && $inc <=800000){

				$result = 31000+((($inc-500000) * 20)/100);

			}

			if ($inc>800001){

				$result = 91000+((($inc-800000) * 30)/100);

			}

		



}

if($selected_radio =="seniorcitizen")
{
if ($inc<=250000){

			$result = 0;

		}

		if ($inc>250001 && $inc <=500000){

			$result = ((($inc-250000) * 10)/100);

		}

		if ($inc>500001 && $inc <=800000){

			$result = 25000+((($inc-500000) * 20)/100);

		}

		if ($inc>800001){

			$result = 85000+((($inc-800000) * 30)/100);

		}




}
?>
<html>
<head>
<title> Tax Calculator</title>
<style type="text/css">
b{
color:white;
font-size:16px;

}
</style>
<link href="../css/templatemo_style.css" rel="stylesheet" type="text/css" />

<link href="../css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />
<link href="../css/logout.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="templatemo_menu_wrapper">

    <div id="templatemo_menu">
    
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="../services.html" >Services</a></li>
            <li><a href="../Architecture.html">Architecture</a></li>
            <li><a href="signup.html" >Signup</a></li>
            <li><a href="../contact.html">Contact Us</a></li>
	    <li><a href="tax.html" class="current">Tax Calculator</a></li>
        </ul>    	
    
    </div> <!-- end of templatemo_menu -->
</div> <!-- end of menu wrapper -->

<div class="header">
	<span class="heading">Tax Calculator</span>
</div>
<font size="4">
<form name=f1 method=post >
<br>
<br>
Enter your Annual Income &nbsp;<b><?php echo $inc?></b><br><br>
You Have Selected  &nbsp;<b><?php echo $selected_radio ?> </b><br><br>

Payable Income Tax &nbsp;<b><?php echo $result;?></b><br><br>
Income after deduction &nbsp;<b><?php echo $inc-$result;?></b><br>
<br>
<b><a href="tax.html">Click to calculate again</a>

</font>
</form>
</body>
</html>



















