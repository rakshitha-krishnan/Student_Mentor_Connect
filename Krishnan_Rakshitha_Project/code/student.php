<?php include('server.php') ?>
<?php include('actions/administrator_student_action.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the web page -->
    <title>Student Mentor Connect</title>
    <!-- Link to custom stylesheet for login page -->
    <link rel="stylesheet" href="LoginPage.css">
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Container for the entire content -->
    <div class="student">
        <!-- Form for adding a new student by the administrator -->
        <div class="administratorStudentClass">
            <form method="post" action="student.php">
                <?php include('errors.php'); ?>
                <!-- Section for entering student details -->
                <div class="admin_insert_studentDetails">
                    <label for="adminRId">RID : </label>
                    <input style="color: antiquewhite;" type="text" name="adminRid" id="adminRId" placeholder="Enter RID" required>
                    <br>
                    <label for="adminFirstNameId">First Name :</label>
                    <input style="color: antiquewhite;" type="text" name="adminFirstName" id="adminFirstNameId" placeholder="Enter First Name" required>
                    <br>
                    <label for="adminLastNameId">Last Name :</label>
                    <input style="color: antiquewhite;" type="text" name="adminLastName" id="adminLastNameId" placeholder="Enter Last Name" required>
                    <br>
                    <label for="adminEmailId">Email :</label>
                    <input style="color: antiquewhite;" type="email" name="adminEmail" id="adminEmailId" placeholder="Enter Email" required>
                    <br>
                    <label for="adminPasswordId">Password :</label>
                    <input style="color: antiquewhite;" type="password" name="adminPassword" id="adminPasswordId" placeholder="Enter Password" required>
                    <br>
                    <label for="adminAreaOfInterestId">Area of Expertise :</label>
                    <input style="color: antiquewhite;" type="text" name="adminAreaOfInterest" id="adminAreaOfInterest" placeholder="Enter Area Of Interest" required>
                    <br>
                    <label for="adminConfirmPassId">Confirm Password :</label>
                    <input style="color: antiquewhite;" type="password" name="adminConfirmPass" id="adminConfirmPassId" placeholder="Confirm New Password" required>
                    <br>
                    <br>
                </div>
                <!-- Submit button for adding a new student -->
                <button type="submit" class="btn btn-success btn-sm" name="adminStudentSubmit">Submit</button>
                <br>
                <!-- Back link to administrator home page -->
                <a class="adminSubmit" href="administrator_home_page.php">Back</a>
            </form>
        </div>

        <!-- Logout button for the administrator -->
        <div class="logoutAdministrator">
            <a href="main.php"><button class="btn btn-danger">Logout</button>&nbsp;<i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </div>
</body>
</html>
