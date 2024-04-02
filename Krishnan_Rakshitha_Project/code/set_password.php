<?php
include('server.php');

// Include set_password_actions.php for handling password change actions
include('actions/set_password_actions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mentor Connect</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="Loginpage.css">
</head>
<body>
    <!-- Container for the entire page -->
    <div class="cotainer">
        <!-- Main section for changing password -->
        <div class="main">
            <div class="welcome">
                <h1>Change Password</h1>
            </div>
            <!-- Form for password change -->
            <form method="post" action="set_password.php">
                <?php include('errors.php'); // Include error messages, if any ?>
                <div class="lgdetails">
                    <!-- Input field for email -->
                    <label for="email">Email : </label><br>
                    <input style="color: antiquewhite;" type="email" name="email_id" id="email" placeholder="Enter Email">
                    <br><br>
                    <!-- Input field for old password -->
                    <label for="email">Old Password : </label><br>
                    <input style="color: antiquewhite;" type="password" name="old_password" id="pwd" placeholder="Enter old password" required>
                    <br><br>
                    <!-- Input field for new password -->
                    <label for="pass">Create New Password :</label><br>
                    <input style="color: antiquewhite;" type="password" name="instructor_password_1" id="pass" placeholder="Create new Password">
                    <br><br>
                    <!-- Input field for confirming new password -->
                    <label for="pas">Confirm New Password :</label><br>
                    <input style="color: antiquewhite;" type="password" name="instructor_password_2" id="pas" placeholder="Confirm new Password">
                </div>
                <br><br>
                <!-- Button to submit the form for changing password -->
                <button type="submit" class="btn-dark" name="set_instructor_password">Change Password</button>
                <br>
                <!-- Link to go back to the instructor login page -->
                <a class="btn-dark" href="instructor_login.php">Back</a>
            </form>
        </div>
    </div>
</body>
</html>
