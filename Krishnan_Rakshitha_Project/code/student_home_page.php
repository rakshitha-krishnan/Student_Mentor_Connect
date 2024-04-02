<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the webpage -->
    <title>Student Mentor Connect</title>
    
    <!-- Custom CSS file (HMM02.css) for additional styling -->
    <link rel="stylesheet" href="HMM02.css">
    
    <!-- Include Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
    <!-- Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Container for the entire page -->
    <div class="container">
        <!-- Navigation section -->
        <div class="nav">
            <!-- Header with a link to an empty page -->
            <div class="head">
                <a href=""><h2><i class="fa-solid fa-bars"></i>  &nbsp;Menu</h2></a>
            </div>
            <!-- Items in the navigation menu -->
            <div class="items">
                <!-- Texas Tech University logo and site title -->
                <div class="ttu">
                    <p><img src="images/TexasTech_icon.png" alt="img" width="50px" height="50px">Student Mentor Connect</p>
                </div>
                <!-- Link to Mentor Feedback page -->
                <div class="menteeFb">
                    <a href="student_mentor_feedback.php"><h3><img src="images/Course_feedback.png" alt="img" width="40px" height="40px">&nbsp;Mentor Feedback</h3></a>
                </div>
                <!-- Link to Instructor Feedback page -->
                <div class="coursefb">
                    <a href="student_course_feedback.php"><h3><img src="images/Mentee_feedback.png" alt="img" width="40px" height="40px">&nbsp;Instructor Feedback</h3></a>
                </div>
                <!-- Link to Mentor Selection page -->
                <div class="menteereq">
                    <a href="student_mentor_selection.php"><h3><img src="images/Requests.png" alt="img" width="40px" height="40px">&nbsp;Mentor Selection</h3></a>
                </div>
                <!-- Link to Course Registration page -->
                <div class="courseApproval">
                    <a href="student_course_registration.php"><h3><img src="images/CourseApproval.png" alt="img" width="40px" height="40px">&nbsp;Course Registration</h3></a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Extra section with titles and user-specific information -->
    <div class="extra">
        <h1>Student Home Page</h1>
        <?php
            // Include server.php for database connectivity
            include('server.php');
            
            // Fetch user details from the database
            $rid = $_SESSION['R_number'];
            $sql = "select First_Name, Last_Name from student where R_Number='$rid'";
            $result = mysqli_query($db, $sql);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $name = $row['First_Name'] . " " . $row['Last_Name'];
                echo '<h2>Welcome ' . $name . '</h2>';
            }
        ?>
        <!-- Announcements section -->
        <div class="ann">
            <h3>Announcements</h3>
            <div class="info">
                <h5><i>No Institution Announcements have been posted in the last 7 days.
                    No Course or Organization Announcements have been posted in the last 7 days.</i></h5>
            </div>
            <div class="moreinfo">
                <h6>more info... <i class="fa-solid fa-arrow-right"></i></h6>
            </div>
        </div>
        
        <!-- My Courses section -->
        <div class="courses">
            <h3>My Courses</h3>
            <div class="subs">
            <?php
                // Fetch courses approved for the user
                $rid = $_SESSION['R_number'];
                $sql = "SELECT Course_ID FROM course_approval WHERE Domain_Approval = 'Approved' AND R_Number = '$rid'";
                $result = mysqli_query($db, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo '<p> Courses you have registered! </p><br>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        $course_ID = $row['Course_ID'];
                        $sql = "Select Course_Name from courses where Course_ID='$course_ID'";
                        $result1 = mysqli_query($db, $sql);
                        $row1 = mysqli_fetch_assoc($result1);
                        echo '<h6> <i> Fall 2023  ' . $row1['Course_Name'] . '(Course_ID : ' . $row['Course_ID'] . ')</i></h6>';
                    }
                }
            ?>
            </div>
        </div>
        
        <!-- Tools section -->
        <div class="task">
            <h3>Tools</h3>
            <div class="sbtask">
                <p> Announcements</p><br>
                <p> Calendar</p><br>
                <p> Tasks</p><br>
                <p> Grades</p><br>
                <p> Address Book</p><br>
                <p> Personal Information</p><br>
                <p> Course Materials</p>
            </div>
        </div>
        
        <!-- Logout button -->
        <div class="logout">
            <a href="main.php"><button class="btn btn-danger">Logout</button>&nbsp;<i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </div>
</body>
</html>
