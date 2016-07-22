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
        <link href="css/message.css" type="text/css" rel="stylesheet"/>
        <link href="css/New_Post_Css.css" rel="stylesheet" type="text/css"/>
        
	</head>

	<body>
		<div id="main_news">
			<?php
			include 'admin_header.php';
			?>
		
             <div class="message">
                 Write Message Here:<br/>
                <form action="message.php" method="POST" enctype="multipart/form-data">
                 	<textarea id="text" rows="13" cols="50" name="description"></textarea><br/>
         			<input type="submit" name ="submit" value="Submit" >
             	 </form>
<?php
 //    mysql_connect('localhost','root','') or die(mysql_error());
 //    mysql_select_db("walton_database" );

	// mysql_query('SET CHARACTER SET utf8');
	// mysql_query("SET SESSION collation_connection ='utf8_general_ci'"); 
include 'connect_database.php';

if(isset($_POST['submit'])) 
	{
	
	if(!empty($_POST['description'])) 
		{

	     	$description = $_POST['description'];
			$Query = "INSERT INTO  message ( description ) VALUES ('$description')";
			mysql_query($Query);
	        echo '<span class="success">insertion successfull...........</span>';
   
		}

	else
		echo '<span class="error">Fill Out All The Blanks !!!</span>';

  	}
?>
         
             </div>  
             
		</div>
</body>
</html>	