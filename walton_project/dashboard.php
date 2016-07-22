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
		<div id="main">
			<?php
			include 'admin_header.php';
			?>
		</div>
</body>
</html>	