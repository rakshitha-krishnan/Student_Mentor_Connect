<?php
//include('../server.php');
// SET INSTRUCTOR PASSWORD
if (isset($_POST['adminInstructorSubmit'])) 
{
  // receive all input values from the form
  $empid = mysqli_real_escape_string($db, $_POST['adminEmployeeId']);
  $fname = mysqli_real_escape_string($db, $_POST['adminFirstName']);
  $lname = mysqli_real_escape_string($db, $_POST['adminLastName']);
  $email = mysqli_real_escape_string($db, $_POST['adminEmail']);
  $pwd = mysqli_real_escape_string($db, $_POST['adminPassword']);
  $pwd2 = mysqli_real_escape_string($db, $_POST['adminConfirmPass']);
  $publication = mysqli_real_escape_string($db, $_POST['adminPublication']);
  $area_of_expertise = mysqli_real_escape_string($db, $_POST['adminAreaOfExpertise']);
  $course_id = mysqli_real_escape_string($db, $_POST['adminCourse']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ($pwd != $pwd2) 
  {
	  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // an email exist in the table or not
  $user_check_query = "SELECT * FROM instructor WHERE Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if($user)
  {
    array_push($errors, "Email already exists!");
  }

  // Finally, set password for instructor errors in the form
  if (count($errors) == 0) 
  {
    $pwd = hash('sha256', $pwd);
  	//$pwd = $pwd;//encrypt the password before saving in the database

  	$query = "INSERT INTO instructor(EID, First_Name, Last_Name, Email, password, Publications, Area_of_Expert, Course_ID)
     VALUES ('$empid', '$fname', '$lname', '$email', '$pwd', '$publication', '$area_of_expertise', '$course_id')";
  	mysqli_query($db, $query);
  	//$_SESSION['username'] = $username;
  	//$_SESSION['success'] = "You are now logged in";
  	header('location: administrator_home_page.php');
  }
}

?>