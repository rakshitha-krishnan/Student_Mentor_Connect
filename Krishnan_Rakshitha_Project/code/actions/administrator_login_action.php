<?php
//include('server.php');
// Login action
$_SESSION['EID']="";

if (isset($_POST['login_administrator'])) {
    $administrator_email = $_POST['administrator_email'];
    $administrator_password = $_POST['administrator_password'];
    

    // Ensure fields are not empty
    if (empty($administrator_email) || empty($administrator_password)) 
    {
        array_push($errors, "Both email and password are required");
    }

    // If there are no errors, check the database for the user
    if (count($errors) == 0) {
        $password = $administrator_password; // You should hash your passwords securely

        // Query the database to check for the user
        $query = "SELECT * FROM administrator WHERE email='$administrator_email' AND password='$password'";
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);


        if (mysqli_num_rows($result) == 1) {
            $_SESSION['EID'] = $user['EID'];
            // Redirect to the administrator home page or any other page upon successful login
            header('location: administrator_home_page.php');
        } 
        else 
        {
            array_push($errors, "Invalid email/password combination");
        }
    }
}
?>
