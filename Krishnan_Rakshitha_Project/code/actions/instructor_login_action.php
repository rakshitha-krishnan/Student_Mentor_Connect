<?php
//include('server.php');
// Login action
$_SESSION['EID']="";

if (isset($_POST['login_instructor'])) {
    $instructor_email = $_POST['instructor_email'];
    $instructor_password = $_POST['instructor_password'];
    

    // Ensure fields are not empty
    if (empty($instructor_email) || empty($instructor_password)) 
    {
        array_push($errors, "Both email and password are required");
    }

    // If there are no errors, check the database for the user
    if (count($errors) == 0) {
        $password = hash('sha256', $instructor_password);
        //$password = $instructor_password; // You should hash your passwords securely

        // Query the database to check for the user
        $query = "SELECT * FROM instructor WHERE email='$instructor_email' AND password='$password'";
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);


        if (mysqli_num_rows($result) == 1) {
            $_SESSION['EID'] = $user['EID'];
            // Redirect to the instructor home page or any other page upon successful login
            header('location: instructor_home_page.php');
        } 
        else 
        {
            array_push($errors, "Invalid email/password combination");
        }
    }
}
?>
