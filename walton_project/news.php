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
		<link  type="text/css" rel="stylesheet" href="css/New_Post_Css.css"/>
		
	</head>

	<body>
		
		<div id="main_news">
			<?php
			include 'admin_header.php';
			?>
			 
			<div id="news">
				<form action="news.php" method="POST" enctype="multipart/form-data">
					<input type="radio" name="font" value="english"/>English<br/>
					<input type="radio" name="font" value="bangla"/>Bangla<br/>
					<label for="name">Post New News :</label><br/>
					<input   type="text" name="name"   style="width: 450px;" /><br/>
					<label for="name">News Category :</label><br/>
					<select name="category_dropdown"   style="width: 170px;" >
						<option>Local News</option>
						<option>International News</option>
						<option>Press Release</option>
					</select><br/>
					<label for="desccription">Description : </label><br/>
					<textarea  id="text" name="desccription" cols="54" rows="10">
					</textarea><br/>
					
					Upload a picture:				
					<input type="file" name="image"><br/><br/>
				<input type="submit" name="submit" value="submit">
			
				</form>

<?php


if(isset($_POST['submit'])) 
{
// mysql_connect('localhost','root','') or die(mysql_error());
// mysql_select_db("walton_database");
	include 'connect_database.php';

//mysql_query('SET CHARACTER SET utf8');
//mysql_query("SET SESSION collation_connection ='utf8_general_ci'"); 


		
		//$imageName =  mysql_real_escape_string($_FILES['image']['name']);
    //$imageData = mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
   


if(!empty($_POST['font']))
	{
		if(!empty($_POST['name']) && !empty($_POST['category_dropdown']) && !empty($_POST['desccription']) && !empty($_FILES["image"]["tmp_name"])) 
			{
				$name = $_POST['name'];
				$category_dropdown = $_POST['category_dropdown'];
				$desccription = $_POST['desccription'];
				$imageName =  mysql_real_escape_string($_FILES['image']['name']);
    			$imageData = mysql_real_escape_string(file_get_contents($_FILES["image"]["tmp_name"]));
    			$imageType = mysql_real_escape_string($_FILES["image"]["type"]);
    			$answer = $_POST['font']; 

    			if(substr($imageType,0,5)=="image")
    			{
    				if ($answer == "english" && isset($_POST['submit'])) 
					{          
		    			$Query = "INSERT INTO  news ( title ,  category , description , name , image ) VALUES ('$name','$category_dropdown','$desccription','$imageName','$imageData')";
						mysql_query($Query); 
						echo '<span class="success">Insertion Successfull...</span>';     
					}
					else 
					{
						//mysql_query('SET CHARACTER SET utf8');
						//mysql_query("SET SESSION collation_connection ='utf8_general_ci'"); 

		    			$Query = "INSERT INTO  bangla_news ( title ,  category , description , name , image ) VALUES ('$name','$category_dropdown','$desccription','$imageName','$imageData')";
						mysql_query($Query);
						echo '<span class="success">Insertion Successfull...</span>';   
					}       



    			} 
   				else
   					echo '<span class="error">only images are allowed !!!</span>'; 




			}
	else
		echo '<span class="error">Fill Out All The Blanks !!!</span>';

	}
	else
		echo 'Please Select Font Type';
}
?>
			
			
				
			</div>

			
		    </div>

		</div>
			
			
	</body>
</html>	