<?php include('server.php'); ?>
<?php include('actions/administrator_instructor_action.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mentor Connect</title>
    <!-- Link to the stylesheet for styling -->
    <link rel="stylesheet" href="LoginPage.css">
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="instructor">
        <div class="administratorInstructorClass">
            <!-- Form for inserting instructor details -->
            <form method="post" action="instructor.php">
                <!-- Include error messages if there are any -->
                <?php include('errors.php'); ?>
                <div class="admin_insert_instructordetails">
                    <label for="adminEmpId">Employee ID : </label>
                    <!-- Input field for Employee ID -->
                    <input style="color: antiquewhite;" type="text" name="adminEmployeeId" id="adminEmpId" placeholder="Enter EmployeeId" required>
                    <br>
                    <label for="adminFirstNameId">First Name :</label>
                    <!-- Input field for First Name -->
                    <input style="color: antiquewhite;" type="text" name="adminFirstName" id="adminFirstNameId" placeholder="Enter First Name" required>
                    <br>
                    <label for="adminLastNameId">Last Name :</label>
                    <!-- Input field for Last Name -->
                    <input style="color: antiquewhite;" type="text" name="adminLastName" id="adminLastNameId" placeholder="Enter Last Name" required>
                    <br>
                    <label for="adminEmailId">Email :</label>
                    <!-- Input field for Email -->
                    <input style="color: antiquewhite;" type="email" name="adminEmail" id="adminEmailId" placeholder="Enter Email" required>
                    <br>
                    <label for="adminPasswordId">Password :</label>
                    <!-- Input field for Password -->
                    <input style="color: antiquewhite;" type="password" name="adminPassword" id="adminPasswordId" placeholder="Enter Password" required>
                    <br>
                    <label for="adminConfirmPassId">Confirm Password :</label>
                    <!-- Input field for Confirming Password -->
                    <input style="color: antiquewhite;" type="password" name="adminConfirmPass" id="adminConfirmPassId" placeholder="Confirm New Password" required>
                    <br>
                    <label for="adminPublicationId">Publications :</label>
                    <!-- Input field for Publications -->
                    <input style="color: antiquewhite;" type="text" name="adminPublication" id="adminPublicationId" placeholder="Enter Publications" required>
                    <br>
                    <label for="adminAreaOfExpertiseId">Area of Expertise :</label>
                    <!-- Input field for Area of Expertise -->
                    <input style="color: antiquewhite;" type="text" name="adminAreaOfExpertise" id="adminAreaOfExpertiseId" placeholder="Enter Area Of Expertise" required>
                    <br>
                    <label for="adminCourseId">Teaching Course ID :</label>
                    <!-- Input field for Teaching Course ID -->
                    <input style="color: antiquewhite;" type="text" name="adminCourse" id="adminCourseId" placeholder="Enter Course Id" required>
                    <br>
                    <br>
                </div>
                <!-- Button to submit the form -->
                <button type="submit" class="btn btn-success btn-sm" name="adminInstructorSubmit">Submit</button>
                <br>
                <!-- Link to go back to the administrator home page -->
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
