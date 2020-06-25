<html>
	<head>
		<meta charset="utf-8">
	<title>The Cinemas</title>
	<link href="fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
	<link rel="shortcut icon" href="bg.jpg">
	
	
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
			
		.msg{
			font-size: 50px;
			text-align: center;
			padding: 30px;
		}
			
		.btn button{
			display: flex;
			margin: 0 auto;
			padding: 10px;
			border: none;
			font-family: Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif;
			font-size: 30px;
			color: #EDF5E1;
			text-transform: uppercase;
			cursor: pointer;
			background: #05386B;
			-webkit-transition: all 0.3 ease;
			transition: all 0.3 ease;
		}
			
		.btn button:hover, .btn button:active, .btn button:focus{
			background: #14BDE8;
		}
		
	</style>
			
				
						
	</head>
	
	
	<body>
	
		<header>
			<table>
				<tr><button onclick="window.location.href='main.php'"><i class="fas fa-home"></i></button></tr>
				<tr><button onclick="history.go(-1)"><i class="fas fa-backward"></i></button></tr>
			</table>
			<div class="banner1">The </div><div class="banner2">cinemas</div>
		</header>
			<hr>
	
		<div class="msg">
			<?php
				session_start();

				$name=ucfirst($_POST['name']);
				$number=$_POST['mobile'];
				$title=$_POST['title'];
				$timings=$_POST['timing'];
				$id=$_POST['ticketid'];

				$msg="Hey ".$name.", get set to watch ".$title." today at ".$timings."!Your ticket id is : ".$id.". Have a great day:)";


					//post
					$url="https://www.sms4india.com/api/v1/sendCampaign";
					$message = urlencode($msg);// urlencode your message
					$curl = curl_init();
					curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
					curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=S3RA2PC4WJGZ6HEJTVYBH7L4TOQ17DEX&secret=AAOTOA3JDBUQD1FY&usetype=stage&phone=$number&senderid=vijayadithya666@gmail.com&message=$message");// post data
					// query parameter values must be given without squarebrackets.
					 // Optional Authentication:
					curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
					curl_setopt($curl, CURLOPT_URL, $url);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
					$result = curl_exec($curl);
					curl_close($curl);
					echo $result;



				echo($msg);
			?>
		</div>
		<div class="btn"><button onClick="window.location.href='all.php'">Book More!</button></div>
	</body>
</html>


