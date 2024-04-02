<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Title of the page -->
    <title>Student Mentor Connect</title>

    <!-- Link to external CSS files -->
    <link rel="stylesheet" href="HMM02.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <!-- Navigation bar -->
        <div class="nav">
            <!-- Header with menu icon -->
            <div class="head">
                <h2><i class="fa-solid fa-bars"></i>  &nbsp;Menu</h2>
            </div>
            
            <!-- Navigation items -->
            <div class="items">
                <!-- Institution logo and name -->
                <div class="ttu">
                    <p><img src="images/TexasTech_icon.png" alt="img" width="50px" height="50px">Student Mentor Connect</p>
                </div>

                <!-- Mentor feedback link -->
                <div class="menteeFb">
                    <a href="instructor_mentor_feedback.php"><h3><img src="images/Course_feedback.png" alt="img" width="40px" height="40px">&nbsp;Mentee Feedback</h3></a>
                </div>

                <!-- Course feedback link -->
                <div class="coursefb">
                    <a href="instructor_course_feedback.php"><h3><img src="images/Mentee_feedback.png" alt="img" width="40px" height="40px">&nbsp;Course Feedback</h3></a>
                </div>

                <!-- Requests link -->
                <div class="menteereq">
                    <a href=""><h3><img src="images/Requests.png" alt="img" width="40px" height="40px">&nbsp;Requests</h3></a>
                </div>

                <!-- Course Approvals link -->
                <div class="courseApproval">
                    <a href="instructor_course_approval.php"><h3><img src="images/CourseApproval.png" alt="img" width="40px" height="40px">&nbsp;Course Approvals</h3></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional content in the main section -->
    <div class="extra">
        <!-- Heading with instructor's name -->
        <h1>Instructor Home Page</h1>
        <?php
            // Include server file for database connection
            include('server.php');

            // Get instructor's EID from session
            $eid = $_SESSION['EID'];

            // SQL query to retrieve instructor's name
            $sql = "SELECT First_Name, Last_Name FROM instructor WHERE EID='$eid'";
            $result = mysqli_query($db, $sql);

            // Check if there are results
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
                    // SQL query to retrieve courses where the instructor is an instructor
                    $sql = "SELECT Course_name, Course_ID FROM courses WHERE Course_ID = (SELECT Course_ID FROM instructor WHERE EID='$eid')";
                    $result = mysqli_query($db, $sql);

                    // Check if there are results
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<p> Courses where you are an Instructor </p><br>';
                            echo '<h6> <i> Fall 2023  ' . $row['Course_name'] . '(Course_ID : ' . $row['Course_ID'] . ')</i></h6>';
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
