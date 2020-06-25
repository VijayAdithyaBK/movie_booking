<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>The Cinemas</title>
<link rel="shortcut icon" href="bg.jpg">

	<style>

		body{
			background: #5CDB95;
		}


		.tab{
			border: 2px solid;
			border-radius: 10px 10px 10px 10px;
			align-items: center;
			align-content: center;
			padding-left: 30px;
			margin: auto auto auto auto;
			width: 300px;
			align: center;
			font-family: Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif;
		}

		.btn{
			margin: 100px auto auto auto;
		}

		.btn, .boxbtn{
			display: block;
			z-index: 1;
			text-align: center;
			float: right;
			padding: 30px;

		}

		.btn button, .btn input, .boxbtn button, .boxtxt input{
			border: none;
			font-family: Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif;
			font-size: 30px;
			color: #EDF5E1;
			text-transform: uppercase;
		}

		.btn button, .boxbtn button{
			width: 300px;
			float: right;
			cursor: pointer;
			background: #05386B;
			padding: 10px;
			margin: 10px;
			-webkit-transition: all 0.3 ease;
			transition: all 0.3 ease;
		}
		
		.btn button:hover, .btn button:active, .btn button:focus{
			background: #14BDE8;
		}

		.boxbtn button:hover, .boxbtn button:active, .boxbtn button:focus{
			background: #14BDE8;
		}
		
		.boxtxt input{
			float: right;
			color: #000000;
			height: 50px;
			width: 300px;
			font-size: 30px;
		}

		.banner{
			line-height: 0;
			float: left;
			color: #EDF5E1;
			padding: 30px;
			text-align: center;
		}

		.banner h1, .banner h2{
			text-transform: uppercase;
			letter-spacing: 5px;
		}

		.banner h1{
			font-size: 150px;
			font-family:Gill Sans, Gill Sans MT, Myriad Pro, DejaVu Sans Condensed, Helvetica, Arial," sans-serif";
		}

		.banner h2{
			font-size: 100px;
		}
	</style>


</head>

<body>
	<table>
	
		<div><table align="center" class="banner">
			<tr><td><h2>The</h2></td></tr>
			<tr><td><h1>cinemas</h1></td></tr>
		</table></div>
	
  
		
		

			
		<div class="btn">
			<table>
				<tr><td><button onClick="window.location.href='all.php'" >All Movies</button></td></tr>
				<tr><td><button onClick="window.location.href='login1.php'">Admin Portal</button></td></tr>
			</table>
		</div>

		<div>
			<table class="tab">
				<tr class="box">
					<form method="post" action="searchTicket.php">
						<td class="boxtxt"><input type="text" name="ticketId" placeholder="Ticket ID" pattern="[0-9]*" autocomplete="off" required></td>
						<td class="boxbtn"><button type="submit" value="submit" name="submit">My Ticket</button></td>
					</form>
				</tr>
			</table>
		</div>
	</table>	
</body>
</html>