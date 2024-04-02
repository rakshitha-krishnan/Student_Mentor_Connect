<?php include('server.php') ?>
<?php include('actions/administrator_login_action.php') ?>


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
	<!-- Container for the login form -->
    <div class="cotainer">
        <div class="main">
            <div class="welcome">
                <h1>Administrator Login</h1>
            </div>
			<!-- Login form with action set to the current page -->
			<form method="post" action="administrator_login.php">
    		<?php include('errors.php'); ?>
				<div class="lgdetails">
					<label for="email">Email : </label><br>
					<input style="color: antiquewhite;" type="email" name="administrator_email" id="email" placeholder="Username">
					<br>
					<br>
					<label for="pass">Password :</label><br>
					<input style="color: antiquewhite;" type="password" name="administrator_password" id="password" placeholder="Enter Password">
				</div>
				<br>
				<!-- Checkbox for "Remember Me" option -->
				<div class="checkbox">
					<input type="checkbox" name="check" id="remember">
					<label for="remember">Remember me</label>
				</div>
				<br>
				<!-- Login button -->
				<button type="submit" class="btn btn-dark btn-lg" name="login_administrator">Login</button>
				<br>
			</form>
        </div>
        
    </div>
    
</body>
</html>