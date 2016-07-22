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
		<script language="javascript" src="js/list.js"></script>  <!--Load category & subcategory-->
		
	</head>

	<body onload="fillCategory();">
		<div id="main">
			<?php
			include 'admin_header.php';
			?>
			 <?php

				// mysql_connect('localhost','root','') or die(mysql_error());
				// mysql_select_db("walton_database");
			 include 'connect_database.php';

	
			 $id=$_GET['ID_edit'];

		if(isset($_POST['update_refrigerator']))
			{ 

			if($_POST['Category']=='' || $_POST["SubCategory"]=='')
				{
					echo '<span class="error">Select a category & a subcategory !!!...</span>';
					
				}
			else
				{
				if(!empty($_POST['post_types']) && !empty($_POST["model"]) && !empty($_POST["price"])) 
					{
			
				$post_types = $_POST['post_types'];
				$Category = $_POST['Category'];
				 $SubCategory=$_POST['SubCategory'];
				$model=$_POST['model'];
				$price=$_POST['price'];
				$imageData4 = mysql_real_escape_string(file_get_contents($_FILES["feature_image"]["tmp_name"]));
	    		$imageData5 = mysql_real_escape_string(file_get_contents($_FILES["gallery_image"]["tmp_name"]));

					if (empty($imageData4) && empty($imageData5)) {
						echo '<span class="error">You Do not set any picture !!!...</span>';
					}

    			$type=$_POST['type'];
    			$Gross_Volume_outer=$_POST['Gross_Volume_outer'];
    			$Gross_Volume=$_POST['Gross_Volume'];
    			$Net_Volume=$_POST['Net_Volume'];
    			$Climatic_Type=$_POST['Climatic_Type'];
    			$Volt_Hz_watt=$_POST['Volt_Hz_watt'];
    			$Temperature_Control=$_POST['Temperature_Contro'];
    			$Defrosting=$_POST['Defrosting'];
    			$Reversible_Door=$_POST['Reversible_Door'];
    			$Handle=$_POST['Handle'];
    			$lock=$_POST['lock'];
    			$Refrigerant=$_POST['Refrigerant'];
    			$Condenser=$_POST['Condenser'];
    			$Evaporator=$_POST['Evaporator'];
    			$Capillary=$_POST['Capillary'];
    			$Foaming_Chemical=$_POST['Foaming_Chemical'];
    			$Shelf=$_POST['Shelf'];
    			$Door_Basket=$_POST['Door_Basket'];
    			$Interior_Lamp_up=$_POST['Interior_Lamp_up'];
    			$Vegetable_Crisper=$_POST['Vegetable_Crisper'];
    			$Vegetable_Crisper_cover=$_POST['Vegetable_Crisper_cover'];
    			$Egg_Tray=$_POST['Egg_Tray'];
    			$Can_Storage=$_POST['Can_Storage'];
    			$Ice_cold_water=$_POST['Ice_cold_water'];
    			$Material=$_POST['Material'];
    			$Drawer=$_POST['Drawer'];
    			$Door_Basket_down=$_POST['Door_Basket_down'];
    			$Interior_Lamp=$_POST['Interior_Lamp'];
    			$Cooling_Effect=$_POST['Cooling_Effect'];
    			$Width_mm_Net=$_POST['Width_mm_Net'];
    			$Depth_mm_Net=$_POST['Depth_mm_Net'];
    			$Height_mm_Net=$_POST['Height_mm_Net'];
    			$Width_mm_Packing=$_POST['Width_mm_Packing'];
    			$Depth_mm_Packing=$_POST['Depth_mm_Packing'];
    			$Height_mm_Packing=$_POST['Height_mm_Packing'];
    			$Weight_Net_Packing=$_POST['Weight_Net_Packing'];

				$Query = "UPDATE  post_product SET  post_types='$post_types' , category='$Category' , subcategory='$SubCategory' , model='$model', price='$price',feature_picture='$imageData4',gallary_picture='$imageData5',type='$type' ,net_volume='$Net_Volume',Temperature='$Temperature_Control',Handle='$Handle',Condenser='$Condenser',Foaming_Chemical='$Foaming_Chemical',Interior_Lamp_up='$Interior_Lamp_up',Egg_Tray_or_Pocket='$Egg_Tray',Shelf_Material_No1='$Material',Interior_Lamp_low='$Interior_Lamp',Depth_mm_Net='$Depth_mm_Net',Depth_mm_Packing='$Depth_mm_Packing',Gross_Volume_outer='$Gross_Volume_outer',Climatic_Type='$Climatic_Type',Defrosting='$Defrosting',Evaporator='$Evaporator',Shelf_Material_No2='$Shelf',Vegetable_Crisper='$Vegetable_Crisper',Can_Storage_Dispenser='$Can_Storage',Drawer='$Drawer',Cooling_Effect='$Cooling_Effect',Height_mm_Net='$Height_mm_Net',Height_mm_Packing='$Height_mm_Packing',Gross_Volume='$Gross_Volume',Volt_Hz_watt='$Volt_Hz_watt',Reversible_Door='$Reversible_Door',Refrigerant='$Refrigerant',Capillary='$Capillary',Door_Basket_type='$Door_Basket',Vegetable_Crisper_Cover='$Vegetable_Crisper_cover',Ice_cold_water_Dispenser='$Ice_cold_water',Door_Basket='$Door_Basket_down',Width_mm_Net='$Width_mm_Net',Width_mm_Packing='$Width_mm_Packing' , Weight_Kg_Net='$Weight_Net_Packing' WHERE id='$id'";
				mysql_query($Query);
				echo '<span class="success">Update Successfull...</span>';
				}
			else
				echo '<span class="error">Fill Out All The Blanks !!!</span>';

			}
		}


			$query1=mysql_query("select *from post_product where id='$id' and  category='Refrigerator & Freezer'");
			$row=mysql_fetch_array($query1);

		?>	


			<div id="new_post">
				<FORM name="drop_list" action="" method="POST" enctype="multipart/form-data">
					<label for="post_types">Posting Type: </label><br/>
					<select name="post_types" >
						 <option>New Product</option>
						<option>Upcoming Product</option>
					</select><br/>
					<!--label >Category : </label><br/>								
					<select  style="width: 140px;" >
						<option>Refrigerator & Freezer</option>
						<option>Television & Home Video </option>
						<option>Mobile</option>
						<option>Motorcycle</option>
						<option>Air Conditioner</option>
						<option>Generator</option>
						<option>Home and Kitchen Appliances</option>
					</select><br/-->
					
		
						<SELECT  NAME="Category" onChange="SelectSubCat();">
						<Option value="">Category</option>
						</SELECT>&nbsp;
						<SELECT  NAME="SubCategory" >
						<Option value="">SubCategory</option>
						</SELECT>

						<?php

						$query2=mysql_query("select *from post_product where id='$id'");
						$row2=mysql_fetch_array($query2);
						?>
						<input type="text" name="model" placeholder="Model NO" value="<?php echo $row2['model']?>"/><br/>
						<label for="price">Price : </label><br/>
						<input type="text" name="price" placeholder="Price" value="<?php echo $row2['price']?>"/><br/>
					<div id="feature_gallery">
						<div id="left">	
							<label for="feature">Feature</label><br/>
							<input type="file" name="feature_image"/>

						</div>
						<div id="right">
							<label for="gallery">Picture Gallery : </label><br/>
							<input type="file" name="gallery_image"/>
						</div>
					</div>
				</div>
			
				<div id="specification">


					<section>
						<label for="specification">Technical Specification : (Select One Item)</label><br/>
						<input type=radio name=type value='' onclick="setVisibility('sub1', 'inline');setVisibility('sub2','none');setVisibility('sub3','none');setVisibility('sub4','none');setVisibility('sub5','none');setVisibility('sub6','none');setVisibility('sub7','none');";>Refrigerator & Freezer
						<input type=radio name=type value='' onclick="setVisibility('sub2', 'inline');setVisibility('sub1','none');setVisibility('sub3','none');setVisibility('sub4','none');setVisibility('sub5','none');setVisibility('sub6','none');setVisibility('sub7','none');";>Television & Home Video
						<input type=radio name=type value='' onclick="setVisibility('sub3', 'inline');setVisibility('sub1','none');setVisibility('sub2','none');setVisibility('sub4','none');setVisibility('sub5','none');setVisibility('sub6','none');setVisibility('sub7','none');";>Mobile
						<input type=radio name=type value='' onclick="setVisibility('sub4', 'inline');setVisibility('sub1','none');setVisibility('sub3','none');setVisibility('sub2','none');setVisibility('sub5','none');setVisibility('sub6','none');setVisibility('sub7','none');";>Motorcycle
						<input type=radio name=type value='' onclick="setVisibility('sub5', 'inline');setVisibility('sub1','none');setVisibility('sub3','none');setVisibility('sub4','none');setVisibility('sub2','none');setVisibility('sub6','none');setVisibility('sub7','none');";>Air Conditioner
						<input type=radio name=type value='' onclick="setVisibility('sub6', 'inline');setVisibility('sub1','none');setVisibility('sub3','none');setVisibility('sub4','none');setVisibility('sub5','none');setVisibility('sub2','none');setVisibility('sub7','none');";>Generator
						<input type=radio name=type value='' onclick="setVisibility('sub7', 'inline');setVisibility('sub1','none');setVisibility('sub3','none');setVisibility('sub4','none');setVisibility('sub5','none');setVisibility('sub6','none');setVisibility('sub2','none');";>Home Kitchen Appliances

					</section>
						<div id="sub1">
							<table>
							<tr>
								<td>Type: </td>
								<td><select name="type">
									<option >Direct cool</option>
									<option >Non Direct</option>
								</select></td>
								<td>Gross Volume:(outer)</td>
								<td><input  type="text" name="Gross_Volume_outer" value="<?php echo $row['Gross_Volume_outer']?>"/></td>
								<td>Gross Volume:</td>
								<td><input  type="text" name="Gross_Volume" value="<?php echo $row['Gross_Volume']?>"/></td>
							</tr>
							<tr>
								<td>Net Volume:</td>
								<td><input type="text" name="Net_Volume" value="<?php echo $row['net_volume']?>"/></td>
								<td>Climatic Type:</td>
								<td><select name="Climatic_Type">
									<option >SN</option>
									<option >N</option>
									<option >ST</option>
									<option >T</option>
								</select></td>
								<td>Volt/Hz/watt:</td>
								<td><select name="Volt_Hz_watt">
									<option >170-250/50/112</option>
									<option >170-250/80/112</option>
								</select></td>
							</tr>
							<tr>
								<td>Temperature Control:</td>
								<td><select name="Temperature_Contro">
									<option >Mechanical</option>
									<option >Manual</option>
								</select></td>
								<td>Defrosting (Automatic/Manual):</td>
								<td><select name="Defrosting">
									<option >Automatic</option>
									<option >Manual</option>
								</select></td>
								<td>Reversible Door:</td>
								<td><select name="Reversible_Door">
									<option >Yes</option>
									<option >No</option>
								</select></td>
							</tr>
							<tr>
								<td>Handle (Recessed/Grip): </td>
								<td><select name="Handle">
									<option >Recessed</option>
									<option >Grip</option>
								</select></td>
								<td>Lock:</td>
								<td><select name="lock">
									<option >Yes</option>
									<option >No</option>
								</select></td>
								<td>Refrigerant:</td>
								<td><select name="Refrigerant">
									<option >R134a</option>
									<option >R420a</option>
								</select></td>
							</tr>
							<tr>
								<td>Condenser:</td>
								<td><select name="Condenser">
									<option >copper</option>
									<option >Non copper</option>
								</select></td>
								<td>Evaporator: </td>
								<td><select name="Evaporator">
									<option >Aluminium</option>
									<option >Iron</option>
								</select></td>
								<td>Capillary: </td>
								<td><select name="Capillary">
									<option >copper</option>
									<option >Non copper</option>
								</select></td>
							</tr>
							<tr>
								<td>Foaming Chemical:</td>
								<td><select name="Foaming_Chemical">
									<option >Pentane [Eco-Friendly (100% CFC & HCFC Free) Green Technology]</option>
									<option >N/A</option>
								</select></td>
								<td>Shelf (Material/No.): </td>
								<td><select name="Shelf">
									<option >Wire/2</option>
									<option >N/A</option>
									</select></td>
								<td>Door Basket:</td>
								<td><select name="Door_Basket">
									<option >PS/3</option>
									<option >N/A</option>
									</select></td>
							</tr>
							<tr>
								<td>Interior Lamp:</td>
								<td><select name="Interior_Lamp_up">
									<option >Yes</option>
									<option >No</option>
									</select></td>
								<td>Vegetable Crisper:</td>
								<td><select name="Vegetable_Crisper">
									<option >Yes</option>
									<option >No</option>
									</select></td>
								<td>Vegetable Crisper Cover:</td>
								<td><select name="Vegetable_Crisper_cover">
									<option >Yes</option>
									<option >No</option>
									</select></td>
							</tr>
							<tr>
								<td>Egg Tray or Pocket:  </td>
								<td><select name="Egg_Tray">
									<option >Yes</option>
									<option >No</option>
									</select></td>
								<td>Can Storage Dispenser:</td>
								<td><select name="Can_Storage">
									<option >Yes</option>
									<option >No</option>
									</select></td>
								<td>Ice/cold water Dispenser:  </td>
								<td><select name="Ice_cold_water">
									<option >Normal</option>
									<option >N/A</option>
									</select></td>
							</tr>
							<tr>
								<td>Shelf (Material/No.): </td>
								<td><select name="Material">
									<option >Wire/1</option>
									<option >N/A</option>
									</select></td>
								<td>Drawer:</td>
								<td><select name="Drawer">
									<option >Yes</option>
									<option >No</option>
									</select></td>
								<td>Door Basket: </td>
								<td><select name="Door_Basket_down">
									<option >Yes</option>
									<option >No</option>
									</select></td>
							</tr>
							<tr>								
								<td>Interior Lamp: </td>
								<td><select name="Interior_Lamp">
									<option >Yes</option>
									<option >No</option>
									</select></td>
								<td>Cooling Effect:</td>
								<td><select name="Cooling_Effect">
									<option >Freezer-Cabinet Less than -18˚C @ Ambient 28°C</option>
									<option >N/A</option>
									</select></td>
								<td>Width/mm:(Net) </td>
								<td><input   type="text" name="Width_mm_Net" value="<?php echo $row['Width_mm_Net']?>"/></td>
							</tr>
							<tr>								
								<td>Depth/mm:(Net) </td>
								<td><input   type="text" name="Depth_mm_Net" value="<?php echo $row['Depth_mm_Net']?>" /></td>
								<td>Height/mm:(Net) </td>
								<td><input   type="text" name="Height_mm_Net" value="<?php echo $row['Height_mm_Net']?>"/></td>
								<td>Width/mm:(Packing)</td>
								<td><input   type="text" name="Width_mm_Packing" value="<?php echo $row['Width_mm_Packing']?>"/></td>
							</tr>
							<tr>								
								<td>Depth/mm:(Packing) </td>
								<td><input   type="text" name="Depth_mm_Packing" value="<?php echo $row['Depth_mm_Packing']?>"/></td>
								<td>Height/mm: (Packing)</td>
								<td><input   type="text" name="Height_mm_Packing"  value="<?php echo $row['Height_mm_Packing']?>"/></td>
								<td>Weight/Kg - Net/Packing: </td>
								<td><input   type="text" name="Weight_Net_Packing" value="<?php echo $row['Weight_Kg_Net']?>"/></td>
							</tr>

							<tr>
								<td></td>
								<td></td>
								<td><input type="submit" name ="update_refrigerator" value="Update"/></td>
							</tr>
		
						</table>
						
				</div>

			<?php



				if(isset($_POST['update_telivision']))
			{ 

			if($_POST['Category']=='' || $_POST["SubCategory"]=='')
				{
					echo '<span class="error">Select a category & a subcategory !!!...</span>';
					
				}
			else
				{
				if(!empty($_POST['post_types']) && !empty($_POST["model"]) && !empty($_POST["price"])) 
					{
			
				$post_types = $_POST['post_types'];
				$Category = $_POST['Category'];
				 $SubCategory=$_POST['SubCategory'];
				$model=$_POST['model'];
				$price=$_POST['price'];
				$imageData4 = mysql_real_escape_string(file_get_contents($_FILES["feature_image"]["tmp_name"]));
	    		$imageData5 = mysql_real_escape_string(file_get_contents($_FILES["gallery_image"]["tmp_name"]));

					if (empty($imageData4) && empty($imageData5)) {
						echo '<span class="error">You Do not set any picture !!!...</span>';
					}

    			$type=$_POST['type2'];
    			$Gross_Volume_outer=$_POST['Gross_Volume_outer2'];
    			$Gross_Volume=$_POST['Gross_Volume2'];
    			$Net_Volume=$_POST['Net_Volume2'];
    			$Climatic_Type=$_POST['Climatic_Type2'];
    			$Volt_Hz_watt=$_POST['Volt_Hz_watt2'];
    			$Temperature_Control=$_POST['Temperature_Control2'];
    			$Defrosting=$_POST['Defrosting2'];
    			$Reversible_Door=$_POST['Reversible_Door2'];
    			$Handle=$_POST['Handle2'];
    			$lock=$_POST['lock2'];
    			$Refrigerant=$_POST['Refrigerant2'];
    			$Condenser=$_POST['Condenser2'];
    			$Evaporator=$_POST['Evaporator2'];
    			$Capillary=$_POST['Capillary2'];
    			$Foaming_Chemical=$_POST['Foaming_Chemical2'];
    			$Shelf=$_POST['Shelf2'];
    			$Door_Basket=$_POST['Door_Basket2'];
    			$Interior_Lamp_up=$_POST['Interior_Lamp_up2'];
    			$Vegetable_Crisper=$_POST['Vegetable_Crisper2'];
    			$Vegetable_Crisper_cover=$_POST['Vegetable_Crisper_cover2'];
    			$Egg_Tray=$_POST['Egg_Tray2'];
    			$Can_Storage=$_POST['Can_Storage2'];
    			$Ice_cold_water=$_POST['Ice_cold_water2'];
    			$Material=$_POST['Material2'];
    			$Drawer=$_POST['Drawer2'];
    			$Door_Basket_down=$_POST['Door_Basket_down2'];
    			$Interior_Lamp=$_POST['Interior_Lamp2'];
    			$Cooling_Effect=$_POST['Cooling_Effect2'];
    			$Width_mm_Net=$_POST['Width_mm_Net2'];
    			$Depth_mm_Net=$_POST['Depth_mm_Net2'];
    			$Height_mm_Net=$_POST['Height_mm_Net2'];
    			$Width_mm_Packing=$_POST['Width_mm_Packing2'];
    			$Depth_mm_Packing=$_POST['Depth_mm_Packing2'];
    			$Height_mm_Packing=$_POST['Height_mm_Packing2'];
    			$Weight_Net_Packing=$_POST['Weight_Net_Packing2'];



				$Query = "UPDATE  post_product SET  post_types='$post_types' , category='$Category' , subcategory='$SubCategory' , model='$model', price='$price',feature_picture='$imageData4',gallary_picture='$imageData5',type='$type' ,net_volume='$Net_Volume',Temperature='$Temperature_Control',Handle='$Handle',Condenser='$Condenser',Foaming_Chemical='$Foaming_Chemical',Interior_Lamp_up='$Interior_Lamp_up',Egg_Tray_or_Pocket='$Egg_Tray',Shelf_Material_No1='$Material',Interior_Lamp_low='$Interior_Lamp',Depth_mm_Net='$Depth_mm_Net',Depth_mm_Packing='$Depth_mm_Packing',Gross_Volume_outer='$Gross_Volume_outer',Climatic_Type='$Climatic_Type',Defrosting='$Defrosting',Evaporator='$Evaporator',Shelf_Material_No2='$Shelf',Vegetable_Crisper='$Vegetable_Crisper',Can_Storage_Dispenser='$Can_Storage',Drawer='$Drawer',Cooling_Effect='$Cooling_Effect',Height_mm_Net='$Height_mm_Net',Height_mm_Packing='$Height_mm_Packing',Gross_Volume='$Gross_Volume',Volt_Hz_watt='$Volt_Hz_watt',Reversible_Door='$Reversible_Door',Refrigerant='$Refrigerant',Capillary='$Capillary',Door_Basket_type='$Door_Basket',Vegetable_Crisper_Cover='$Vegetable_Crisper_cover',Ice_cold_water_Dispenser='$Ice_cold_water',Door_Basket='$Door_Basket_down',Width_mm_Net='$Width_mm_Net',Width_mm_Packing='$Width_mm_Packing' , Weight_Kg_Net='$Weight_Net_Packing' WHERE id='$id'";
				mysql_query($Query);
				echo '<span class="success">Update Successfull...</span>';
				}
			else
				echo '<span class="error">Fill Out All The Blanks !!!</span>';

			}
		}
			$query1=mysql_query("select *from post_product where id='$id' and category='Television & Home Video'");
			$row=mysql_fetch_array($query1);

		?>	


						<div id="sub2">

							<table>
							<tr>
								<td>Screen size: </td>
								<td><input type="text" name="type2" value="<?php echo $row['type']?>"></td>
								<td>aspect ratio:</td>
								<td><input  type="text" name="Gross_Volume_outer2" value="<?php echo $row['Gross_Volume_outer']?>"/></td>
								<td>Resolution:</td>
								<td><input  type="text" name="Gross_Volume2" value="<?php echo $row['Gross_Volume']?>"/></td>
							</tr>
							<tr>
								<td>Viewing angle:</td>
								<td><input type="text" name="Net_Volume2" value="<?php echo $row['net_volume']?>"/></td>
								<td>Contrast:</td>
								<td><input type="text" name="Climatic_Type2" value="<?php echo $row['Climatic_Type']?>"></td>
									
								<td>Brightness:</td>
								<td><input type="text" name="Volt_Hz_watt2" value="<?php echo $row['Volt_Hz_watt']?>"></td>
								
							</tr>
							<tr>
								<td>Response time:</td>
								<td><input type="text" name="Temperature_Control2" value="<?php echo $row['Temperature']?>"></td>
									
								<td>Backlight type:</td>
								<td><select name="Defrosting2">
									<option >DLED</option>
									<option >Edge LED</option>
								</select></td>
								<td>Display device:</td>
								<td><select name="Reversible_Door2">
									<option >LCD</option>
									<option >LED</option>
								</select></td>
							</tr>
							<tr>
								<td>Dynamic backlight adjust: </td>
								<td><select name="Handle2">
									<option >YES</option>
									<option >NO</option>
								</select></td>
								<td>Comb Filter:</td>
								<td><select name="lock2">
									<option >3D</option>
									<option >2D</option>
								</select></td>
								<td>Noise Reduction:</td>
								<td><select name="Refrigerant2">
									<option >3D</option>
									<option >2D</option>
								</select></td>
							</tr>
							<tr>
								<td>Picture Improvement:</td>
								<td><select name="Condenser2">
									<option >CTI/LTI</option>
									<option >N/A</option>
								</select></td>
								<td>De-Interlace: </td>
								<td><select name="Evaporator2">
									<option >3D</option>
									<option >2D</option>
								</select></td>
								<td>Weak signal Enhancement: </td>
								<td><select name="Capillary2">
									<option >YES</option>
									<option >NO</option>
								</select></td>
							</tr>
							<tr>
								<td>HDMI:</td>
								<td><select name="Foaming_Chemical2">
									<option >1</option>
									<option >2</option>
								</select></td>
								<td>USB 2.0: </td>
								<td><select name="Shelf2">
									<option >2</option>
									<option >3</option>
									</select></td>
								<td>AV input:</td>
								<td><select name="Door_Basket2">
									<option >1</option>
									<option >2</option>
									</select></td>
							</tr>
							<tr>
								<td>AV output:</td>
								<td><select name="Interior_Lamp_up2">
									<option >1</option>
									<option >2</option>
									</select></td>
								<td>YPbPr IN:</td>
								<td><select name="Vegetable_Crisper2">
									<option >Yes</option>
									<option >No</option>
									</select></td>
								<td>Vegetable Crisper Cover:</td>
								<td><select name="Vegetable_Crisper_cover2">
									<option >1</option>
									<option >2</option>
									</select></td>
							</tr>
							<tr>
								<td>RF IN:  </td>
								<td><select name="Egg_Tray2">
									<option >1</option>
									<option >2</option>
									</select></td>
								<td>PC IN:</td>
								<td><select name="Can_Storage2">
									<option >1</option>
									<option >2</option>
									</select></td>
								<td>PC Audio IN:  </td>
								<td><select name="Ice_cold_water2">
									<option >1</option>
									<option >2</option>
									</select></td>
							</tr>
							<tr>
								<td>Head phone out: </td>
								<td><select name="Material2">
									<option >YES</option>
									<option >NO</option>
									</select></td>
								<td>Video system:</td>
								<td><input type="text" name="Drawer2" value="<?php echo $row['Drawer']?>"></td>
									
								<td>Sound system: </td>
								<td><input type="text" name="Door_Basket_down2" value="<?php echo $row['Door_Basket']?>"></td>
									
							</tr>
							<tr>								
								<td>Receive Channel: </td>
								<td><select name="Interior_Lamp2">
									<option >200</option>
									<option >300</option>
									</select></td>
								<td>Video:</td>
								<td><input type="text" name="Cooling_Effect2" value="<?php echo $row['Cooling_Effect']?>"></td>

								<td>Audio :</td>
								<td><input  type="text" name="Width_mm_Net2" value="<?php echo $row['Width_mm_Net']?>" /></td>
							</tr>
							<tr>								
								<td>Image: </td>
								<td><input   type="text" name="Depth_mm_Net2" value="<?php echo $row['Depth_mm_Net']?>"/></td>
								<td>audio output: </td>
								<td><input   type="text" name="Height_mm_Net2" value="<?php echo $row['Height_mm_Net']?>"/></td>
								<td>Speaker position:</td>
								<td><input   type="text" name="Width_mm_Packing2" value="<?php echo $row['Width_mm_Packing']?>"/></td>
							</tr>
							<tr>								
								<td>power supply: </td>
								<td><input   type="text" name="Depth_mm_Packing2" value="<?php echo $row['Depth_mm_Packing']?>" /></td>
								<td>Standby power consumption:</td>
								<td><input   type="text" name="Height_mm_Packing2" value="<?php echo $row['Height_mm_Packing']?>"/></td>
								<td>Maximum power consumption: </td>
								<td><input   type="text" name="Weight_Net_Packing2" value="<?php echo $row['Weight_Kg_Net']?>"/></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
								<td><input type="submit" name ="update_telivision" /></td>
							</tr>

						</table>
					</div>


		<?php

				if(isset($_POST['update_mobile']))
			{ 

			if($_POST['Category']=='' || $_POST["SubCategory"]=='')
				{
					echo '<span class="error">Select a category & a subcategory !!!...</span>';
					
				}
			else
				{
				if(!empty($_POST['post_types']) && !empty($_POST["model"]) && !empty($_POST["price"])) 
					{
			
				$post_types = $_POST['post_types'];
				$Category = $_POST['Category'];
				 $SubCategory=$_POST['SubCategory'];
				$model=$_POST['model'];
				$price=$_POST['price'];
				$imageData4 = mysql_real_escape_string(file_get_contents($_FILES["feature_image"]["tmp_name"]));
	    		$imageData5 = mysql_real_escape_string(file_get_contents($_FILES["gallery_image"]["tmp_name"]));

					if (empty($imageData4) && empty($imageData5)) {
						echo '<span class="error">You Do not set any picture !!!...</span>';
					}

    			$type=$_POST['type3'];
    			$Gross_Volume_outer=$_POST['Gross_Volume_outer3'];
    			$Gross_Volume=$_POST['Gross_Volume3'];
    			$Net_Volume=$_POST['Net_Volume3'];
    			$Climatic_Type=$_POST['Climatic_Type3'];
    			$Volt_Hz_watt=$_POST['Volt_Hz_watt3'];
    			$Temperature_Control=$_POST['Temperature_Contro3'];
    			$Defrosting=$_POST['Defrosting3'];
    			$Reversible_Door=$_POST['Reversible_Door3'];
    			$Handle=$_POST['Handle3'];
    			$lock=$_POST['lock3'];
    			$Refrigerant=$_POST['Refrigerant3'];
    			$Condenser=$_POST['Condenser3'];
    			$Evaporator=$_POST['Evaporator3'];
    			$Capillary=$_POST['Capillary3'];
    			$Foaming_Chemical=$_POST['Foaming_Chemical3'];
    			$Shelf=$_POST['Shelf3'];
    			$Door_Basket=$_POST['Door_Basket3'];
    			$Interior_Lamp_up=$_POST['Interior_Lamp_up3'];
    			$Vegetable_Crisper=$_POST['Vegetable_Crisper3'];
    			$Vegetable_Crisper_cover=$_POST['Vegetable_Crisper_cover3'];
    			$Egg_Tray=$_POST['Egg_Tray3'];
    			$Can_Storage=$_POST['Can_Storage3'];
    			$Ice_cold_water=$_POST['Ice_cold_water3'];
    			$Material=$_POST['Material3'];
    			$Drawer=$_POST['Drawer3'];
    			$Door_Basket_down=$_POST['Door_Basket_down3'];
    			$Interior_Lamp=$_POST['Interior_Lamp3'];
    			$Cooling_Effect=$_POST['Cooling_Effect3'];
    			$Width_mm_Net=$_POST['Width_mm_Net3'];
    			$Depth_mm_Net=$_POST['Depth_mm_Net3'];
    			$Height_mm_Net=$_POST['Height_mm_Net3'];
    			$Width_mm_Packing=$_POST['Width_mm_Packing3'];
    			$Depth_mm_Packing=$_POST['Depth_mm_Packing3'];
    			$Height_mm_Packing=$_POST['Height_mm_Packing3'];
    			$Weight_Net_Packing=$_POST['Weight_Net_Packing3'];



				$Query = "UPDATE  post_product SET  post_types='$post_types' , category='$Category' , subcategory='$SubCategory' , model='$model', price='$price',feature_picture='$imageData4',gallary_picture='$imageData5',type='$type' ,net_volume='$Net_Volume',Temperature='$Temperature_Control',Handle='$Handle',Condenser='$Condenser',Foaming_Chemical='$Foaming_Chemical',Interior_Lamp_up='$Interior_Lamp_up',Egg_Tray_or_Pocket='$Egg_Tray',Shelf_Material_No1='$Material',Interior_Lamp_low='$Interior_Lamp',Depth_mm_Net='$Depth_mm_Net',Depth_mm_Packing='$Depth_mm_Packing',Gross_Volume_outer='$Gross_Volume_outer',Climatic_Type='$Climatic_Type',Defrosting='$Defrosting',Evaporator='$Evaporator',Shelf_Material_No2='$Shelf',Vegetable_Crisper='$Vegetable_Crisper',Can_Storage_Dispenser='$Can_Storage',Drawer='$Drawer',Cooling_Effect='$Cooling_Effect',Height_mm_Net='$Height_mm_Net',Height_mm_Packing='$Height_mm_Packing',Gross_Volume='$Gross_Volume',Volt_Hz_watt='$Volt_Hz_watt',Reversible_Door='$Reversible_Door',Refrigerant='$Refrigerant',Capillary='$Capillary',Door_Basket_type='$Door_Basket',Vegetable_Crisper_Cover='$Vegetable_Crisper_cover',Ice_cold_water_Dispenser='$Ice_cold_water',Door_Basket='$Door_Basket_down',Width_mm_Net='$Width_mm_Net',Width_mm_Packing='$Width_mm_Packing' , Weight_Kg_Net='$Weight_Net_Packing' WHERE id='$id'";
				mysql_query($Query);
				echo '<span class="success">Update Successfull...</span>';
				}
			else
				echo '<span class="error">Fill Out All The Blanks !!!</span>';

			}
		}
			$query1=mysql_query("select *from post_product where id='$id' and category='Mobile'");
				$row=mysql_fetch_array($query1);

		?>	


					<div id="sub3" >
							<table>
							<tr>
								<td>Operating System: </td>
								<td><input type="text" name="type3" value="<?php echo $row['type']?>"></td>
								
								<td>Processor</td>
								<td><input  type="text" name="Gross_Volume_outer3" id="name" value="<?php echo $row['Gross_Volume_outer']?>"/></td>
								<td>GPU:</td>
								<td><input  type="text" name="Gross_Volume3" id="name" value="<?php echo $row['Gross_Volume']?>"/></td>
							</tr>
							<tr>
								<td>Audio:</td>
								<td><input type="text" name="Net_Volume3" id="name" value="<?php echo $row['net_volume']?>"/></td>
								<td>Number of Physical Cores:</td>
								<td><select name="Climatic_Type3">
									<option >4</option>
									<option >2</option>
						
								</select></td>
								<td>Call mode:</td>
								<td><select name="Volt_Hz_watt3">
									<option >Single Card</option>
									<option >Double Card</option>
								</select></td>
							</tr>
							<tr>
								<td>Network Type:</td>
								<td><select name="Temperature_Contro3">
									<option >UMTS/GSM</option>
									<option >UMTS</option>
								</select></td>
								<td>Network Band:</td>
								<td><input type="text" name="Defrosting3" value="<?php echo $row['Defrosting']?>"></td>
								
								<td>Network Speed:</td>
								<td><input type="text" name="Reversible_Door3" value="<?php echo $row['Reversible_Door']?>"></td>
								
							</tr>
							<tr>
								<td>ROM: </td>
								<td><select name="Handle3">
									<option >32 GB</option>
									<option >16 GB</option>
								</select></td>
								<td>Lock:</td>
								<td><select name="lock3">
									<option >Yes</option>
									<option >No</option>
								</select></td>
								<td>RAM:</td>
								<td><select name="Refrigerant3">
									<option >3 GB LP DDR3</option>
									<option >1 GB LP DDR3</option>
								</select></td>
							</tr>
							<tr>
								<td>Screen Size:</td>
								<td><input type="text" name="Condenser3" value="<?php echo $row['Condenser']?>"></td>
							
								<td>Resolution: </td>
								<td><input type="text" name="Evaporator3" value="<?php echo $row['Evaporator']?>"></td>
									
								<td>Display Type: </td>
								<td><input type="text" name="Capillary3" value="<?php echo $row['Capillary']?>"></td>
								
							</tr>
							<tr>
								<td>Screen Protector:</td>
								<td><input type="text" name="Foaming_Chemical3" value="<?php echo $row['Foaming_Chemical']?>"></td>
								
								<td>Rear Camera: </td>
								<td><input type="text" name="Shelf3" value="<?php echo $row['Shelf_Material_No2']?>"></td>
									
								<td>Front Camera:</td>
								<td><input type="text" name="Door_Basket3" value="<?php echo $row['Door_Basket_type']?>"></td>
									
							</tr>
							<tr>
								<td>Flash:</td>
								<td><input type="text" name="Interior_Lamp_up3" value="<?php echo $row['Interior_Lamp_up']?>"></td>
									
								<td>Mode:</td>
								<td><input type="text" name="Vegetable_Crisper3" value="<?php echo $row['Vegetable_Crisper']?>"></td>
								
								<td>Auto Scene Recognition Function:</td>
								<td><input type="text" name="Vegetable_Crisper_cover3" value="<?php echo $row['Vegetable_Crisper_Cover']?>"></td>
									
							</tr>
							<tr>
								<td>Capture Modes: </td>
								<td><input type="text" name="Egg_Tray3" value="<?php echo $row['Egg_Tray_or_Pocket']?>"></td>
								
								<td>Footprint mode:</td>
								<td><input type="text" name="Can_Storage3" value="<?php echo $row['Can_Storage_Dispenser']?>"></td>
									
								<td>Audio: </td>
								<td><input type="text" name="Ice_cold_water3" value="<?php echo $row['Ice_cold_water_Dispenser']?>"></td>
									
							</tr>
							<tr>
								<td>Video: </td>
								<td><input type="text" name="Material3" value="<?php echo $row['Shelf_Material_No1']?>"></td>
								
								<td>Radio:</td>
								<td><select name="Drawer3">
									<option >Yes</option>
									<option >No</option>
									</select></td>
								<td>Door Basket: </td>
								<td><select name="Door_Basket_down3">
									<option >Yes</option>
									<option >No</option>
									</select></td>
							</tr>
							<tr>								
								<td>Call Recording: </td>
								<td><select name="Interior_Lamp3">
									<option >Yes</option>
									<option >No</option>
									</select></td>
								<td>Battery Capacity:</td>
								<td><input  type="text"  name="Cooling_Effect3" value="<?php echo $row['Cooling_Effect']?>"></td>
									
								<td>Battery Type </td>
								<td><input   type="text" name="Width_mm_Net3" value="<?php echo $row['Width_mm_Net']?>"/></td>
							</tr>
							<tr>								
								<td>Connectivity Devices: </td>
								<td><input   type="text" name="Depth_mm_Net3" value="<?php echo $row['Depth_mm_Net']?>" /></td>
								<td>GPS: </td>
								<td><input   type="text" name="Height_mm_Net3" value="<?php echo $row['Height_mm_Net']?>"/></td>
								<td>Motion Sensors:</td>
								<td><input   type="text" name="Width_mm_Packing3" value="<?php echo $row['Width_mm_Packing']?>"/></td>
							</tr>
							<tr>								
								<td>Environment sensors: </td>
								<td><input   type="text" name="Depth_mm_Packing3" value="<?php echo $row['Depth_mm_Packing']?>"/></td>
								<td>Position Sensors:</td>
								<td><input   type="text" name="Height_mm_Packing3"  value="<?php echo $row['Height_mm_Packing']?>"/></td>
								<td>Weight: </td>
								<td><input   type="text" name="Weight_Net_Packing3" value="<?php echo $row['Weight_Kg_Net']?>"/></td>
							</tr>

							<tr>
								<td></td>
								<td></td>
								<td><input type="submit" name ="update_mobile" /></td>
							</tr>
		
						</table>
					</div>

			</form>
		</div>

</div>
			
	<!-- 	// <script type="text/javascript" src="js/jquery-1.11.1.js"></script> -->
		 <!-- <script type="text/javascript" src="js/javascript1.js"></script> -->

		<script language="JavaScript">
		function setVisibility(id, visibility) {
		document.getElementById(id).style.display = visibility;
		}
		</script>
		
	</body>
</html>	


				
				 
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		    
	
	
	
	
	
	
	
	
	
