<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Student Mentor Connect</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="HMM02.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container-fluid">
        <div class="nav">
            <div class="head">
                <a href="student_home_page.php"><h2><i class="fa-solid fa-bars"></i>  &nbsp;Home</h2></a>
            </div>
            <div class="items">
                <div class="ttu">
                    <p><img src="images/TexasTech_icon.png" alt="img" width="50px" height="50px">Student Mentor Connect</p>
                </div>
                <div class="menteeFb">
                    <a href="student_mentor_feedback.php"><h3><img src="images/Course_feedback.png" alt="img" width="40px" height="40px">&nbsp;Mentor Feedback</h3></a>
                </div>
                <div class="coursefb">
                    <a href="student_course_feedback.php"><h3><img src="images/Mentee_feedback.png" alt="img" width="40px" height="40px">&nbsp;Instructor Feedback</h3></a>
                </div>
                <div class="menteereq">
                    <a href="student_mentor_selection.php"><h3><img src="images/Requests.png" alt="img" width="40px" height="40px">&nbsp;Mentor Selection</h3></a>
                </div>
                <div class="courseApproval">
                    <a href="student_course_registration.php"><h3><img src="images/CourseApproval.png" alt="img" width="40px" height="40px">&nbsp;Course Registration</h3></a>
                </div>
            </div>
        </div>
        
        <!-- Extra section with titles -->
        <div class="extra"><h1>Student Mentor Connect</h1></div>
        <div class="extra"><h2>Instructor Feedback</h2></div>
        
        <!-- Feedback dropdown form -->
        <div class="feedbackDropdown" style="text-align: center; position: absolute; top: 150px; left: 340px;">
            <form action="student_course_feedback2.php" method="POST">  
                <h3>Give Feedback to the following courses:
                    <!-- Dropdown to select a course -->
                    <select name="fbDPdown" id="course_name" required>
                        <option value="">Select</option>
                        <?php
                        // Include server.php to access server-related functionality
                        include('server.php');
                        
                        // Retrieve courses for feedback
                        $rid = $_SESSION["R_number"];
                        $sql = "SELECT Course_Name FROM courses where Course_ID IN (SELECT Course_ID from 
                            course_approval WHERE Domain_Approval = 'Approved' AND R_Number = '$rid')";
                        $result = mysqli_query($db, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['Course_Name'] . "'>" . $row['Course_Name'] . "</option>";
                            }
                        } else {
                            // No records found
                        }
                        ?>
                    </select>&nbsp;&nbsp;
                    <!-- Button to submit the form -->
                    <a href="student_course_feedback2.php"><button class="btn btn-success">Submit</button></a>
                </h3>
            </form>
        </div>
    </div>
</body>
</html>
