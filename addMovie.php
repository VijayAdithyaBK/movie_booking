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
		
		.con{
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
		
		#status{
			width: 100%;
			border: none;
			background: #f2f2f2;
			padding: 15px;
			box-sizing: border-box;
			margin: 0 0 15px;
			color: black;
			font-size: 14px;
		}
		
	</style>
	
	
	<script language="javascript" type="text/javascript">
	
		function check()
		{
			const fs = require("fs");
			var text = fs.readFile("movie_list.txt",'utf-8');
			var textByDelim = text.split("|");

			var t = document.getElementById(title).value;
			for(var i=0;i<textByDelim.length;i++)
				{
					if(textByDelim[i]==t)
						{
							alert("Movie Exists");
						}
				}
		}
	
	
	</script>


</head>

<body>

	<header>
		<table>
			<tr><button onclick="window.location.href='main.php'"><i class="fas fa-home"></i></button></tr>
			<tr><button onclick="window.location.href='admin.php'"><i class="fas fa-backward"></i></button></tr>
		</table>
		<div class="banner1">The </div><div class="banner2">cinemas</div>
	</header>
		<hr>



	<div class="form">
		<form method="post">
				Movie Title<input type="text" name="title" id="title" onChange="return change()" required/>
				Language<input type="text" name="language" required>
				Show Timings<input type="text" name="timings" placeholder="hh:mmAM/PM" required/>
				Duration<input type="text" name="duration" placeholder="In hours" pattern="([1-3]{1})?([1-3]+[.]+[0-9])?" maxlength="3" required/>
				Rating<input type="text" name="rating" placeholder="Out of 5" pattern="([1-5]{1})?([1-4]+[.]+[0-9])?" maxlength="3" required/>
				
				Status<select id="status" name="status"  required/>
				<option value="Available">Available</option>
				<option value="Fast Filling">Fast Filling</option>
				<option value="Filled">Filled</option>
				</select>
				
				<div class="con"><button class="btn" type="submit" name="submit" value="submit">Submit</button></div>
				
		<?php
		
		error_reporting(E_ALL ^ E_NOTICE);//Disables error indicating variables are undefined
		
		
		$title = ucfirst($_POST['title']);
		$movieid = md5($title);
		$language = $_POST['language'];
		$timings = $_POST['timings'];
		$duration = $_POST['duration'];
		$rating = $_POST['rating'];
		$status = $_POST['status'];
		
		$data = $movieid."|".$title."|".$language."|".$timings."|".$duration."Hr|".$rating."|".$status."|\n";
		
		$file = fopen("movie_list.txt",'a') or die("Could not open file!");
		
		if(isset($_POST['submit']))
		{
			file_put_contents("movie_list.txt",$data,FILE_APPEND) or die("Unable to save file!");
			echo("<script>alert('$title added!')</script>");
			echo("<script>window.location.href='admin.php'</script>");
		}
		
		?>
		</form>
	</div>
</body>
</html>