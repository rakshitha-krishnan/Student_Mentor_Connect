<?php
//include('server.php');

$_SESSION['R_number']="";
$_SESSION['Email']="";

// Login action
if (isset($_POST['login_student'])) {
    $student_email = $_POST['student_email'];
    $student_password = $_POST['student_password'];
    

    // Ensure fields are not empty
    if (empty($student_email) || empty($student_password)) 
    {
        array_push($errors, "Both email and password are required");
    }


    // If there are no errors, check the database for the user
    if (count($errors) == 0) {
        $password = hash('sha256', $student_password);
        //$password = $student_password; // You should hash your passwords securely

        // Query the database to check for the user
        $query = "SELECT * FROM student WHERE email='$student_email' AND password='$password'";
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);


        if (mysqli_num_rows($result) == 1) {
            //session_start();
            $_SESSION['R_number'] = $user['R_Number'];
            $_SESSION['Email'] = $student_email;
            // Redirect to the student home page or any other page upon successful login
            header('location: student_home_page.php');
        } 
        else 
        {
            array_push($errors, "Invalid email/password combination");
        }
    }
}
?>
