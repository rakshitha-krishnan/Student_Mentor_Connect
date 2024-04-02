<?php
// SET INSTRUCTOR PASSWORD
if (isset($_POST['set_instructor_password'])) 
{
  // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email_id']);
  $oldpwd = mysqli_real_escape_string($db, $_POST['old_password']);
  $password_1 = mysqli_real_escape_string($db, $_POST['instructor_password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['instructor_password_2']);
  $current_user="";

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) 
  {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // an email exist in the table or not
  $user_check_query = "SELECT * FROM instructor WHERE Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  $user_check_query2 = "SELECT * FROM student WHERE Email='$email' LIMIT 1";
  $result2 = mysqli_query($db, $user_check_query2);
  $user2 = mysqli_fetch_assoc($result2);

  // if email doesn't exists
  if (count($errors) == 0 && !$user && !$user2) 
  {
    array_push($errors, "Email doesn't exists");
  }
  else 
  { 
    if (count($errors) == 0) 
    {
        $user_check_query = "SELECT password FROM instructor WHERE email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);

        $user_check_query2 = "SELECT password FROM student WHERE email='$email' LIMIT 1";
        $result2 = mysqli_query($db, $user_check_query2);

        
          if (mysqli_num_rows($result) > 0)
          {
            $current_user = "instructor";
            $user = mysqli_fetch_assoc($result);
            $oldpwd = hash('sha256', $oldpwd);
            if($user['password'] != $oldpwd)
            array_push($errors, "Old password incorrect");
          }
          else if(mysqli_num_rows($result2) > 0)
          {
            $current_user = "student";
            $user2 = mysqli_fetch_assoc($result2);
            $oldpwd = hash('sha256', $oldpwd);
            if($user2['password'] != $oldpwd)
            array_push($errors, "Old password incorrect");
          }
       
    }
  }
  //echo $current_user;
  // Finally, set password for instructor errors in the form
  if (count($errors) == 0) 
  {
    $password = hash('sha256', $password_1);
  	//$password = $password_1;//encrypt the password before saving in the database

    if($current_user == "instructor")
    {
  	  $query = "UPDATE instructor SET password = '$password' WHERE instructor.email = '$email' ";
  	  mysqli_query($db, $query);
      header('location: instructor_login.php');
    }
    else if($current_user == "student")
    {
      $query = "UPDATE student SET password = '$password' WHERE student.email = '$email' ";
  	  mysqli_query($db, $query);
      header('location: student_login.php');
    }
  	//$_SESSION['username'] = $username;
  	//$_SESSION['success'] = "You are now logged in";
  	//header('location: instructor_login.php');
  }
}

?>