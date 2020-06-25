<?php session_start(); ?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
</head>

<body>


	<?php
	
	
		
		$title=$_GET['tile'];
		
		
		$line=$_GET['line'];
		
		echo("<script>alert('$title is removed successfully')</script>");
		echo("<script>window.location.href='admin.php'</script>");
		
			
	
		$fileName = "movie_list.txt";

		// the line to delete
		$lineNum = $line;

		delLineFromFile($fileName, $lineNum);


		function delLineFromFile($fileName, $lineNum){
		// check the file exists 
		  if(!is_writable($fileName))
			{
			// print an error
			print "The file $fileName is not writable";
			// exit the function
			exit;
			}
		  else
			  {
			// read the file into an array    
			$arr = file($fileName);
			}

		  // the line to delete is the line number minus 1, because arrays begin at zero
		  $lineToDelete = $lineNum-1;

		  // check if the line to delete is greater than the length of the file
		  if($lineToDelete > sizeof($arr))
			{
			  // print an error
			print "You have chosen a line number, <b>[$lineNum]</b>,  higher than the length of the file.";
			// exit the function
			exit;
			}

		  //remove the line
		  unset($arr["$lineToDelete"]);

		  // open the file for reading
		  if (!$fp = fopen($fileName, 'w+'))
			{
			// print an error
				print "Cannot open file ($fileName)";
			  // exit the function
				exit;
				}

		  // if $fp is valid
		  if($fp)
			{
				// write the array to the file
				foreach($arr as $line) { fwrite($fp,$line); }

				// close the file
				fclose($fp);
				}

		
		}
	
	?>


</body>
</html>