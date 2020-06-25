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
		
		.form button{
			background: #05386B;
			color: #EDF5E1;
			padding: 10px;
			font-size: 20px;
			margin: 0 auto auto;
			width: 100px;
			font-family: Cambria, Hoefler Text, Liberation Serif, Times, Times New Roman, serif;
			text-align: center;
			display: block;
		}
		
		/*.message, .message a{
			text-align: center;
			text-decoration: none;
		}
		
		.message a{
			color: #F64C72;
		}*/
		
		h1{
			text-align: center;
			text-transform: uppercase;
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


	<div class="form">
		<form action="" method="POST">
			<h1>admin login</h1>
			<input type="text" placeholder="Username" name="name" id="name" required/>
			<input type="password" placeholder="Password" name="password" required/>
			<button type="submit" value="submit">Login</button>
			<!--<p class="message">Not registered? <a href="register.php">Create an account</a></p>-->


			<?php
				
				error_reporting(E_ALL ^ E_NOTICE);//Disables error indicating variables are undefined
			
				session_start();

				if(isset($_POST['submit']))
				{
					$userN = $_POST['name'];
					$passW = md5($_POST['password']);

					if($userN!=' ' && $passW!=' ')
					{
						header("Location: admin.php");
					}
					else
					{
						?><span><?php echo("Please fill the credentials"); ?></span><?php
					}
				}



				$userN = trim($_POST['name']);
				$passW = md5($_POST['password']);
				$userlist = file('admin.txt');

				date_default_timezone_set('Asia/Calcutta');
				$timestamp = time();
				$date = date("yy-m-d h:i:sa");


				$success = false;
				foreach ($userlist as $user)
				{

					$user_details = explode('|',$user);
					if ($user_details[0] == $userN && $user_details[1] == $passW)
					{
						$success = true;

						$data = $userN." logged in at ".$date." ".$timestamp."\n";
						file_put_contents('login.txt',$data,FILE_APPEND) or die("Unable to save file!");
						header('Location: admin.php');
						break;
					}
				}






			?>
		</form>
	</div>

</body>
</html>