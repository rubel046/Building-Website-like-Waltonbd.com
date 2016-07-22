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
		<div id="main">
			<?php
			include 'admin_header.php';
			?>

			

	             <div id="view_product_category">
	             	<form action="view_product.php" method="POST" enctype="multipart/form-data">
	                 <select name="view_product_select">
	                 	<option>All Products</option>
	                 	<option>Refrigerator & Freezer</option>
	                 	<option>Television & Home Video</option>
	                 	<option>Mobile</option>
	                 	<option>Motorcycle</option>
	                 	<option>Air Conditioner</option>
	                 	<option>Generator</option>
	                 	<option>Home Kitchen Appliances</option>
	                 </select>
	                 <input type="submit" name ="submit" value="GO" />
	            
	                </form> 
	            </div>
	         
	             <div id="product_list">
	             <?php

	    //          	mysql_connect('localhost','root','') or die(mysql_error());
					// mysql_select_db("walton_database");
	             include 'connect_database.php';

					// if(isset($_POST['submit'])) 
					// 	{
					// 	$category = $_POST['view_product_select'];
					// 	if($category=='All Products')
					// 		$query = "SELECT * FROM post_product ORDER BY id DESC";
					// 	else if($category=='Refrigerator & Freezer')
					// 		$query = "SELECT * FROM post_product WHERE category='Refrigerator & Freezer' ORDER BY id DESC";
					// 	else if($category=='Television & Home Video')
					// 		$query = "SELECT * FROM post_product WHERE category='Television & Home Video'ORDER BY id DESC";
					// 	else if($category=='Mobile')
					// 		$query = "SELECT * FROM post_product WHERE category='Mobile'ORDER BY id DESC";
					// 	else if($category=='Motorcycle')
					// 		$query = "SELECT * FROM post_product WHERE category='Motorcycle'ORDER BY id DESC";
					// 	else if($category=='Air Conditioner')
					// 		$query = "SELECT * FROM post_product WHERE category='Air Conditioner'ORDER BY id DESC";
					// 	else if($category=='Generator')
					// 		$query = "SELECT * FROM post_product WHERE category='Generator'ORDER BY id DESC";
					// 	else if($category=='Home Kitchen Appliances')
					// 		$query = "SELECT * FROM post_product WHERE category='Home Kitchen Appliances'ORDER BY id DESC";
												

					// 	}
					// 	else
					// 		$query = "SELECT * FROM post_product ORDER BY id DESC";





	             	
	             if(isset($_POST['submit'])) 
						{
						$category = $_POST['view_product_select'];
						if($category=='All Products')
							$query = "SELECT * FROM post_product ORDER BY id DESC LIMIT 0, 8";
						else if($category=='Refrigerator & Freezer')
							$query = "SELECT * FROM post_product WHERE category='Refrigerator & Freezer' ORDER BY id DESC LIMIT 0, 8";
						else if($category=='Television & Home Video')
							$query = "SELECT * FROM post_product WHERE category='Television & Home Video'ORDER BY id DESC LIMIT 0, 8";
						else if($category=='Mobile')
							$query = "SELECT * FROM post_product WHERE category='Mobile'ORDER BY id DESC LIMIT 0, 8";
						else if($category=='Motorcycle')
							$query = "SELECT * FROM post_product WHERE category='Motorcycle'ORDER BY id DESC";
						else if($category=='Air Conditioner')
							$query = "SELECT * FROM post_product WHERE category='Air Conditioner'ORDER BY id DESC";
						else if($category=='Generator')
							$query = "SELECT * FROM post_product WHERE category='Generator'ORDER BY id DESC";
						else if($category=='Home Kitchen Appliances')
							$query = "SELECT * FROM post_product WHERE category='Home Kitchen Appliances'ORDER BY id DESC";
												

						 }
						 else
						 {
						 	$query = "SELECT * FROM post_product ORDER BY id DESC LIMIT 0, 8";
						 }
						// 	echo $category;
						// 	if (!isset($_GET["page"]))
						// 		{ 
						// 		// { $page  = $_GET["page"];
						// 		$query = "SELECT * FROM post_product ORDER BY id DESC LIMIT 0, 2";
						// 		 }
						// 	elseif(isset($_GET["page"])) 
						// 			{
						// 				$page  = $_GET["page"];
						// 				if($page==2)
						// 					$query = "SELECT * FROM post_product ORDER BY id DESC LIMIT  4";

						// 				  }
							
						// }
						// 	// echo $page;
							// $start_from = ($page-1) * 2;
							// if ( $page==1) {
							// 	$query = "SELECT * FROM post_product ORDER BY id DESC LIMIT $start_from, 5";
							// }
							// elseif( $page==2&& $category=='Refrigerator & Freezer')

							// {
							// 	echo "jgjhgjgj";
							// $query = "SELECT * FROM post_product ORDER BY id DESC LIMIT $start_from,10";
							// }

							// if ($category='All Products' && isset($_POST['submit2'])) {
							// 	$query = "SELECT * FROM post_product ORDER BY id DESC LIMIT 2, 3";
							// }

							// // if($category='Refrigerator & Freezer')
							// // {
							// // $query = "SELECT * FROM post_product WHERE category='Refrigerator & Freezer' ORDER BY id DESC";
							// // }
							// if ($category='Refrigerator & Freezer' && isset($_POST['submit2'])) {
							// 	$query = "SELECT * FROM post_product WHERE category='Refrigerator & Freezer' ORDER BY id DESC LIMIT 2, 3";
							// }

							// if ($category='Television & Home Video' && isset($_POST['submit2'])) {
							// 	$query = "SELECT * FROM post_product WHERE category='Television & Home Video'ORDER BY id DESC LIMIT 2, 3";
							// }

						//}


						$result = mysql_query($query);
						while($row = mysql_fetch_array($result))
     				   {


     				   	$row1=$row['id'];
     				   	echo "<table class='border'>";
     				   	echo"<col width='700'>";
     				   	echo"<col width='100'>";
     				   	echo"<col width='150'>";
     				   	echo "<tr >";
     				  if($row['category']=='Refrigerator & Freezer')
     				  {
     				   	echo"<td>".$row['subcategory']."  "."Model No :"."<a target='_blank' title='Click To View' href='refrigerator_view.php?ID=$row1'>".$row['model']."</a>"."</td>";
     				  
     				   }
     				   elseif($row['category']=='Television & Home Video')
     				   {
     				   	echo"<td>".$row['subcategory']."  "."Model No :"."<a target='_blank' title='Click To View' href='telivision_view.php?ID=$row1'>".$row['model']."</a>"."</td>";
     				   }

     				   elseif($row['category']=='Mobile')
     				   {
     				   	echo"<td>".$row['subcategory']."  "."Model No :"."<a target='_blank' title='Click To View' href='mobile_view.php?ID=$row1'>".$row['model']."</a>"."</td>";
     				   }
     				   	echo"<td >"."<a target='_blank'title='Click To Edit' href='edit_product.php?ID_edit=$row1'>"."<span class='edit'>"."Edit Product"."</span>"."</a>"."</td>";
     				   	echo"<td>"."<a onclick='myFunction()' title='Click To Delete ' href='deleating_item.php?ID_delete=$row1'>"."<span class='delete'>"."Delete Product"."</span>"."</a>"."</td>";
     				
     				   	echo"</tr>"."<br/>";
     				   	echo"</table>";

						}

	             ?>

	          

             </div>  
         
		</div>

</body>
</html>	