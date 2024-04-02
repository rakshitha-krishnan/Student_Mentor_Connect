<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Student Mentor Connect</title>
    
    <link rel="stylesheet" href="LoginPage.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="administratorClass">
        <!-- Link to the Instructor page -->
        <div class="instructorPage">
            <a href="instructor.php"><h3><img src="images/instructor_logo.jpg" alt="img" width="40px" height="40px">&nbsp;Instructor</h3></a>
        </div>
        <br>
        <!-- Link to the Student page -->
        <div class="studentPage">
            <a href="student.php"><h3><img src="images/student_logo.jpg" alt="img" width="40px" height="40px">&nbsp;Student</h3></a>
        </div>
    </div>
    
    <!-- Logout section -->
    <div class="logoutAdministrator">
        <!-- Link to the main page with a logout button -->
        <a href="main.php"><button class="btn btn-danger">Logout</button>&nbsp;<i class="fa-solid fa-right-from-bracket"></i></a>
    </div>
</body>
</html>
