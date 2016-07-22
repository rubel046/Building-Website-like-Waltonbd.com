
<?php 
include 'connect_database.php';
if (!empty($_GET['ID_delete']) ) 
		{
							
				$ID_delete = $_GET['ID_delete'];
				$query ="DELETE FROM post_product
				WHERE id = $ID_delete";
				$result = mysql_query($query);		
				header('Location: view_product.php');
							
			}

?>