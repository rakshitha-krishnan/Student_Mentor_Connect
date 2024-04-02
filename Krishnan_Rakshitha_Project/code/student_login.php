<?php 
    // Include server.php for database connectivity 
    include('server.php') ?>
<?php 
    // Include student_login_action.php for handling student login actions 
    include('actions/student_login_action.php') 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the webpage -->
    <title>Student Mentor Connect</title>
    <!-- Include Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <!-- Custom CSS file (Loginpage.css) for additional styling -->
    <link rel="stylesheet" href="Loginpage.css">
</head>
<body>
    <!-- Container for the entire page -->
    <div class="cotainer">
        <!-- Main content section -->
        <div class="main">
            <!-- Welcome heading -->
            <div class="welcome">
                <h1>Student Login</h1>
            </div>

            <!-- Login form -->
            <form method="post" action="student_login.php">
                <?php 
                    // Include errors.php to display login errors 
                    include('errors.php'); 
                ?>
                <div class="lgdetails">
                    <!-- Email input -->
                    <label for="email">Email : </label><br>
                    <input style="color: antiquewhite;" type="email" name="student_email" id="email" placeholder="Username">
                    <br>
                    <br>
                    <!-- Password input -->
                    <label for="pass">Password :</label><br>
                    <input style="color: antiquewhite;" type="password" name="student_password" id="password" placeholder="Enter Password">
                </div>
                <br>
                <!-- Remember me checkbox -->
                <div class="checkbox">
                    <input type="checkbox" name="check" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <br>
                <!-- Login button -->
                <button type="submit" class="btn btn-dark btn-lg" name="login_student">Login</button>
                <br>
                <br>
                <!-- Signup and password reset links -->
                <div class="signup">
                    <a class="btn-dark" href="main.php">Back</a>
                    <a style="text-decoration: none;" href="set_password.php"><p>Change account password ? </p></a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
