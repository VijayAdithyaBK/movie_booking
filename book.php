<?php session_start(); ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>The Cinemas</title>
<link rel="shortcut icon" href="bg.jpg">
<link href="fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">

	<script type="text/javascript" language="javascript">
		function price(num)
		{
			var n=document.getElementById(num).value;
			var total=0;
			total=Number(n)*120;
			document.getElementById("print").innerHTML=total;
			return total;

		};

	</script>


	<style>
		
		body{
			background: #5CDB95;
			font-family: Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif;
		}
		
		button{
			border: none;
			cursor: pointer;
		}
		
		header{
			display: flex;
		}
		
		
		header .banner1, header .banner2{
			text-transform: uppercase;
			letter-spacing: 5px;
			color: #EDF5E1;
			font-weight: bolder;
		}
		
		header .banner1{
			text-align: center;
			font-size: 70px;
		}
		header .banner2{
			font-size: 120px;
			font-family: Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial," sans-serif";
		}
		
		header button{
			background-color: transparent;
			display: flex;
			padding: 20px;
		}
		
		i .fas, .fa-home, .fa-backward{
			font-size: 80px;
			padding: 10px;
			background-color: transparent;
		}
		
		h3{
			font-size: 40px;
			text-align: center;
		}
		
		strong{
			font-size: 60px;
			text-transform: uppercase;
			color: #05386B;
		}
		
		.form{
			font-size: 20px;
			margin: 0 auto 100px;
			max-width: 360px;
			padding: 40px;
			text-align: left;
			background: #FFFFFF;
		}
		
		.form input{
			border: none;
			background: #f2f2f2;
			padding: 15px;
			box-sizing: border-box;
			margin: 0 0 15px;
			width: 100%;
			color: black;
			font-size: 14px;
		}
		
		#print{
			text-align: center;
			font-weight: bold;
			font-size: 25px;
			color: #05386B;
		}
		
		.con, .con a{
			margin: 0 auto;
			text-align: center;
		}
		
		.con button:hover, .con button:active, .con button:focus{
			background: #14BDE8;
		}
		
		.btn{
			background: #05386B;
			color: #EDF5E1;
			padding: 5px;
			font-size: 20px;
			margin: 0 auto auto;
			width: 100px;
			font-family: Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif;
			text-align: center;
			display: block;
		}
	</style>




</head>
	
	<body onLoad="price()">


	<header>
		<table>
			<tr><button onclick="window.location.href='main.php'"><i class="fas fa-home"></i></button></tr>
			<tr><button onclick="history.go(-1)"><i class="fas fa-backward"></i></button></tr>
		</table>
		<div class="banner1">The </div><div class="banner2">cinemas</div>
	</header>
		<hr>
		
		
		<?php 
			$title=$_GET['tile'];	
			$timings=$_GET['time'];

			$ran=rand();


		?>
			
		<h3> Book my seats for <strong><?php echo($title)?></strong></h3>
		
		<div class="form">
			<form action="sms.php" method="post">

				Name <input type="text" name="name" maxlength="20" required/>
				Mobile <input type="text" name="mobile" placeholder="10 digits" pattern="[0-9]{10}" maxlength="10" required/>
				Timings<input type="text" name="timings" value="<?php echo($timings)?>" disabled>
				No of seats <input type="text" name="number" id="num" pattern="\d{2}" maxlength="2" onChange="return price('num')" required/>
				Card No <input type="password" name="card" placeholder="11 digit card no" pattern="[1-9][0-9]{10}" maxlength="11" required/>
				CVV <input type="password" name="cvv" placeholder="3 digit cvv" pattern="[0-9]{3}" maxlength="3" required/>
				Expiry <input type="text" name="expiry" placeholder="MM/YY" pattern="([0-9]{2}[/]?){2}" required/>
				<input type="hidden" name="title" value="<?php echo($title); ?>"/>
				<input type="hidden" name="timing" value="<?php echo($timings); ?>"/>
				<input type="hidden" name="ticketid" value="<?php echo($ran); ?>"/>
			

				<br/>

				Total :<p id="print"></p><br>


				<div class="con">Confirm Purchase <button class="btn" type="submit" name="submit" value="submit"/>Book</button></div>

				<?php

				error_reporting(E_ALL ^ E_NOTICE);//Disables error indicating variables are undefined
			
				date_default_timezone_set('Asia/Calcutta');

				$name=ucfirst($_POST['name']);
				$mobile=$_POST['mobile'];
				$seats=$_POST['number'];


				$date = date("yy-m-d h:i:sa");


				$file=fopen("ticket.txt",'a') or die("Could not open file!");

				$data = $ran."|".$name."|".$mobile."|".$title."|".$seats."|".$timings."|".$date."|"."\n";

				if(isset($_POST['submit']))
				{
					file_put_contents('ticket.txt',$data,FILE_APPEND) or die("Unable to save file!");
				}

				?>



			</form>
		</div>
		
		
	</body>
</html>