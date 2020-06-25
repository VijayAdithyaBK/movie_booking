<?php session_start(); ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>The Cinemas</title>
<link rel="shortcut icon" href="bg.jpg">
<link href="fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">

	<style>
	
		body{
			background: #5CDB95;
		}
		
		button{
			border: none;
			cursor: pointer;
		}
		
		header button{
			background-color: transparent;
			display: grid;
			align-items: center;
			justify-content: center;
		}
		
		i .fas, .fa-home, .fa-backward{
			font-size: 80px;
			padding: 10px;
			background-color: transparent;
		}
		
		.content{
			display: inline-block;
			font-family: Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif;
			text-align: center;
			position: absolute;
			transform: translate(-50%, -50%);
			top: 50%;
			left: 50%;
			font-size: 30px;
		}
		
		.content a{
			text-decoration: none;
			color: #EDF5E1;
		}
		
		.content button{
			background: #05386B;
			color: #EDF5E1;
			font-size: 30px;
		}
		
		.content button:hover, .content button:active, .content button:focus{
			background: #14BDE8;
			column-fill: auto;
		}
	
	</style>


</head>

<body>
	
	<header>
		<table>
			<tr><button onclick="window.location.href='main.php'"><i class="fas fa-home"></i></button></tr>
			<tr><button onclick="history.go(-1)"><i class="fas fa-backward"></i></button></tr>
		</table>
	</header>

	<div class="content">
		<?php

			$ticketId=$_POST['ticketId'];
			$success=false;

			$file=file("ticket.txt");
			foreach($file as $tick)
			{
				$ticket_details=explode("|",$tick);
				if($ticket_details[0]==$ticketId)
				{
					$success=true;
					$name=$ticket_details[1];
					$title=$ticket_details[3];
					$timings=$ticket_details[5];
					break;
				}


			}

			if($success)
			{
				$msg="Hey ".$name.", get set to watch ".$title." today at ".$timings."!<br/>Your ticket id is : ".$ticketId.".<br/>Have a great day:)";
				echo($msg);
			}
			else
			{
				echo("Ticket not found");
				echo("<br/>Yet to book your ticket?");?>
				
				<button onClick="window.location.href='all.php'">Book Now!</button>
				
				<?php
			}
		?>
	</div>

</body>
</html>