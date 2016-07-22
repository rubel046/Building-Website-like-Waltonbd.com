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
       <!--  <link href="css/career.css" rel="stylesheet" type="text/css"/> -->
    <link href="css/New_Post_Css.css" rel="stylesheet" type="text/css"/>
	</head>

	<body>
		<div id="main_career">
			<?php
			include 'admin_header.php';
			?>
            <div class="career">
            
                <div class="career_level">
                			<label for="">Job Title:</label><br/>
                       		<label for="">No. of  Vacancies :</label><br/>
                       		<label for="">Job Nature :</label><br/>
                        	<label for="">Experience :</label><br/>
                        	<label for="">Gender :</label><br/>
                        	<label for="">Age :</label><br/>
                        	<label for="">Job Location :</label><br/>
                        	<label for="">Salary Range :</label><br/>
                        	<label for="">Application Deadline :</label><br/>
               </div>

              <div class="career_input">

                 <form action="career.php" method="POST" enctype="multipart/form-data">

              	    <input  type="text" name="title"/><br/>
               		<input id="No. of  Vacancies" type="text" name="vacancie"/><br/>
                    <input id="Job Nature" type="text" name="nature"/><br/>
                    <input id="Experience" type="text" name="experience"/><br/>
                    <select name="gender">
                    	<option>Male</option>
                    	<option>Female</option>
                    	<option>Both</option>
                    </select><br/>
                    <input id="Age" type="text" name="age"/><br/>
                    <input id="Job Location" type="text" name="location"/><br/>
                    <input id="Salary Range" type="text" name="salary_range"/><br/>
                    <input id="Application Deadline" type="text" name="deadline"/><br/>
              </div>
               <div id="details">
                        <label>Job Description :</label></br>
                        <textarea id="text" rows="5" cols="10" name="description"></textarea></br></br>
                        <label>Educational Requirements :</label></br>
                        <textarea id="text" rows="5" cols="10" name="educational_requirement"></textarea></br></br>
                        <label>Experience Requirements :</label></br>
                        <textarea id="text" rows="5" cols="10" name="experience_requirements"></textarea>
                </div>
                <div class="submit">
                    <input type="submit" name ="submit" value="Submit" >
                </div>
            
               </form>

<?php

if(isset($_POST['submit'])) {
	// mysql_connect('localhost','root','') or die(mysql_error());
 //  mysql_select_db("walton_database" );
  include 'connect_database.php';
if(!empty($_POST['title']) && !empty($_POST['vacancie']) && !empty($_POST['nature']) && !empty($_POST['experience'] ) && !empty($_POST['gender']) && !empty($_POST['age']) && !empty($_POST['location']) && !empty($_POST['salary_range']) && !empty($_POST['deadline']) && !empty($_POST['description']) && !empty($_POST['educational_requirement']) && !empty($_POST['experience_requirements'])) 
{

		$title = $_POST['title'];
		$vacancie = $_POST['vacancie'];
		$nature = $_POST['nature'];
		$experience = $_POST['experience'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$location = $_POST['location'];
		$salary_range = $_POST['salary_range'];
		$deadline = $_POST['deadline'];
		$description = $_POST['description'];
		$educational_requirement = $_POST['educational_requirement'];
		$experience_requirements = $_POST['experience_requirements'];

		$Query = "INSERT INTO  career ( title ,  vacancie , nature , experience , gender , age , location , salary_range , deadline , description , educational_requirement , experience_requirements ) VALUES ('$title','$vacancie','$nature','$experience','$gender','$age','$location','$salary_range','$deadline','$description','$educational_requirement','$experience_requirements')";
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