<?php 
session_start();
if(!isset($_SESSION['username']) && !isset($_SESSION['password']))
header("location:login.php");
?>


<!DOCTYPE html>
<html>

	<head>
		<title>Walton At Every Home</title>
		<link rel="shortcut icon" href="resource/favicon.png"/>
		<link  type="text/css" rel="stylesheet" href="css/style.css"/>
        <link href="css/New_Post_Css.css" rel="stylesheet" type="text/css"/>
       
	</head>

	<body>
		<div id="main_slider">
			 <?php
			include 'admin_header.php';
			?>

			 <div id="slider">
			 	<form action="slider.php" method="POST" enctype="multipart/form-data">
				<div>
					<label for="name">Upload Slider Picture :</label><br/>
					<input type="file" name="upload_pic"/>
				</div>
				<div>
				<input type="submit" name="submit" value="submit">
			 </div>
			 
			</form>

			<?php

			if(isset($_POST['submit'])) 
			{
  				include 'connect_database.php';
				$imageData = mysql_real_escape_string(file_get_contents($_FILES["upload_pic"]["tmp_name"]));
    			$imageType = mysql_real_escape_string($_FILES["upload_pic"]["type"]);
    			if(substr($imageType,0,5)=="image")
    			{

						$Query = "INSERT INTO  slider ( slider_image ) VALUES ('$imageData')";
						mysql_query($Query); 
						echo '<span class="success">Insertion Successfull...</span>';     
				}

				else
					echo '<span class="error">only images are allowed !!!</span>'; 

			}

?>
 
			 
			 
			 
		</div>
</body>
</html>	