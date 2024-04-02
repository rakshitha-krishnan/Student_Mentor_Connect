<?php
//include('../server.php');
// SET INSTRUCTOR PASSWORD
if (isset($_POST['adminStudentSubmit'])) 
{
  // receive all input values from the form
  $rid = mysqli_real_escape_string($db, $_POST['adminRid']);
  $fname = mysqli_real_escape_string($db, $_POST['adminFirstName']);
  $lname = mysqli_real_escape_string($db, $_POST['adminLastName']);
  $email = mysqli_real_escape_string($db, $_POST['adminEmail']);
  $pwd = mysqli_real_escape_string($db, $_POST['adminPassword']);
  $pwd2 = mysqli_real_escape_string($db, $_POST['adminConfirmPass']);
  $area_of_interest = mysqli_real_escape_string($db, $_POST['adminAreaOfInterest']);
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if ($pwd != $pwd2) 
  {
	  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // an email exist in the table or not
  $user_check_query = "SELECT * FROM student WHERE Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if(count($errors) == 0)
  {
  if($user)
    {
        array_push($errors, "Email already exists!");
    }

    // Finally, set password for instructor errors in the form
    if (count($errors) == 0) 
    {
        $pwd = hash('sha256', $pwd);

        $query = "INSERT INTO student(R_Number, First_Name, Last_Name, Email, Area_of_Interest, password)
        VALUES ('$rid', '$fname', '$lname', '$email', '$area_of_interest', '$pwd')";
        mysqli_query($db, $query);
        //$_SESSION['username'] = $username;
        //$_SESSION['success'] = "You are now logged in";
        header('location: administrator_home_page.php');
    }
}
}

?>