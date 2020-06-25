<?php header("login1.php"); ?>
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

		.main
		{
			background-color: #C5F1CC;
			width: 100%;
			color: #05386B;
			font-size: 18px;
		}
				
		.main tr, .main  th, .main  td
		{
			padding-top: 13px;
			padding-bottom: 13px;
			text-align: center;
			border-bottom: 1px solid #ddd;
		}
		
		.main th
		{
			background-color: cornflowerblue;
			height: 30px;
			font-size: 25px;
			text-transform: uppercase;
			font-family: monospace;
			color: #EDF5E1;
		}
		
		.main tr:nth-child(even)
		{
			background-color: #f2f2f2;
		}
		
		.main tr:hover
		{
			background-color: #B6B6B6;
		}
		
		.main a
		{
			text-decoration: none;
			color: #05386B;
		}
		
		.con{
			padding: 5px;
			float: right;
			text-align: center;
		}
		
		.con a{
			text-decoration: none;
			color: #EDF5E1;
		}
		
		.con button{
			padding: 15px;
			font-size: 25px;
			background: #05386B;
			font-family: Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif;
		}
		
		.con button:hover, .con button:active, .con button:focus{
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


	<div class="con"><button class="btn"><a href="addMovie.php">Add Movie</a></button></div>
	

	<table class="main">
		<tr>
			<th>Movie Title</th>
			<th>Language</th>
			<th>Show Timings</th>
			<th>Duration</th>
			<th>Rating</th>
			<th>Status</th>
			<th></th>
		</tr>
		
		<?php
		session_start();
		
		
		$line=0;
		
		$list=file("movie_list.txt");
		
		foreach($list as $movie)
		{
			$movie_details=explode('|', $movie);
			$no=$movie_details[0];
			$title=$movie_details[1];
			$language=$movie_details[2];
			$timings=$movie_details[3];
			$duration=$movie_details[4];
			$rating=$movie_details[5];
			$status=$movie_details[6];
			
			$line++;
			
			echo("<tr><td>"."<a href='details.php?tile=$title' >$title</a>"."</td><td>".$language."</td><td>"."<href='book.php?time=$timings>".$timings."</td><td>".$duration."</td><td>".$rating."</td><td>".$status."</td><td>"."<a href='remove.php?&tile=".$title."&line=".$line."' >Remove</a>"."</td></tr>");
		}
		
		?>
	</table>



</body>
</html>