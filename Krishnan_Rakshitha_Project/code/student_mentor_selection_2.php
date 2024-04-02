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
                <br>
                <div class="coursefb">
                    <a href="student_course_feedback.php"><h3><img src="images/Mentee_feedback.png" alt="img" width="40px" height="40px">&nbsp;Instructor Feedback</h3></a>
                </div>
                <br>
                <div class="menteereq">
                    <a href="student_mentor_selection.php"><h3><img src="images/Requests.png" alt="img" width="40px" height="40px">&nbsp;Mentor Selection</h3></a>
                </div>
                <br>
                <div class="courseApproval">
                    <a href="student_course_registration.php"><h3><img src="images/CourseApproval.png" alt="img" width="40px" height="40px">&nbsp;Course Registration</h3></a>
                </div>
            </div>
        </div>

        <!-- Header with application title -->
        <div class="extra"><h1>Student Mentor Connect</h1></div>
        <!-- Sub-header with current page title -->
        <div class="extra"><h2>Mentors Instructing The Course</h2></div>
        <!-- PHP code for processing form data -->
        <div>
        <?php
        // Include server.php for database connectivity
        include('server.php');

        // Check if the form is submitted using POST method
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $selectedCourse = $_POST['fbDPdown'];

            // Modify the SQL query to retrieve professor information for the selected course
            $sql = "SELECT EID, First_Name, Last_Name FROM instructor 
                    WHERE Area_of_Expert = '$selectedCourse' 
                    and EID NOT IN(select EID from mentor group by EID having count(R_Number)>9)";
            $result = mysqli_query($db, $sql);

            // Display the results in a table
            if (mysqli_num_rows($result) > 0) {
                echo '<table border="1">';
                echo '<tr>';
                echo '<th>EID</th>';
                echo '<th>First_Name</th>';
                echo '<th>Last_Name</th>';
                echo '<th>Mentor Selection</th>';
                echo '</tr>';

                // Loop through the query results and create table rows
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['EID'] . '</td>';
                    echo '<td>' . $row['First_Name'] . '</td>';
                    echo '<td>' . $row['Last_Name'] . '</td>';
                    
                    // Form for selecting a mentor
                    echo '<form action="student_actions\student_mentor_actions.php" method="POST">';
                    echo '<input  type="hidden" name="domain" value="' . $selectedCourse . '">';
                    echo '<td><input type="radio" name="select" value="' . $row['EID'] . '" required> Select Mentor</td>';
                    echo '</tr>';
                }
                
                // Submit button and form closing tag
                echo '<tr class="submit-row">';
                echo '<td colspan="4" style="text-align:center;">';
                echo '<input class="btn btn-success" type="submit" name="submitmentor" value="Submit">';
                echo '</form>';
                echo '</td>';
                echo '</tr>';
                echo '</table>';
            } else {
                echo 'No records found.';
            }
        }
        ?>
        </div>
    </div>
</body>
</html>
