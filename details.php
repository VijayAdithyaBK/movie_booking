<?php session_start() ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
</head>

<body>


	<header>
	<button onclick="window.location.href='main.php'"><i class="fas fa-home"></i></button>
	<button onclick="history.go(-1)"><i class="fas fa-backward"></i></button>
	</header>
	
	

	<h1><?php

	echo $_GET['tile'];
	
	?></h1>

</body>
</html>