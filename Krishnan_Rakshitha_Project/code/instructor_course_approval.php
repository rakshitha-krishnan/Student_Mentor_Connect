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
                <a href="instructor_home_page.php"><h2><i class="fa-solid fa-bars"></i>  &nbsp;Home</h2></a>
            </div>
            <div class="items">
                <div class="ttu">
                    <p><img src="images/TexasTech_icon.png" alt="img" width="50px" height="50px">Student Mentor Connect </p>
                </div>
                <div class="menteeFb">
                    <a href="instructor_mentor_feedback.php"><h3><img src="images/Course_feedback.png" alt="img" width="40px" height="40px">&nbsp;Mentee Feedback</h3></a>
                </div>
                <div class="coursefb">
                    <a href="instructor_course_feedback.php"><h3><img src="images/Mentee_feedback.png" alt="img" width="40px" height="40px">&nbsp;Course Feedback</h3></a>
                </div>
                <div class="menteereq">
                    <a href=""><h3><img src="images/Requests.png" alt="img" width="40px" height="40px">&nbsp;Requests</h3></a>
                </div>
                <div class="courseApproval">
                    <a href="instructor_course_approval.php"><h3><img src="images/CourseApproval.png" alt="img" width="40px" height="40px">&nbsp;Course Approvals</h3></a>
                </div>
            </div>
        </div>
        
        <div class="extra"><h1>Student Mentor Connect</h1></div>
        <div class="extra"><h2>Course Approvals</h2></div>
        
        <!-- Form for course approvals -->
        <form action='actions/course_approval_actions.php' method='POST'>
            <?php
             // Displays a table for course approvals
             echo "<table  class='tab'>";
             echo "<tr>";
             echo "<th style='color: #007bff; text-align:center;'>R_Number</th>";
             echo " <th style='color: #007bff; text-align:center;'>Course_ID</th>";
             echo "<th style='color: #007bff; text-align:center;'>Course_Name</th>";
             echo "<th style='color: #007bff; text-align:center;'>Domain</th>";
             echo "<th style='color: #007bff; text-align:center;'>Domain Approval</th>";
             echo "<th style='color: #007bff; text-align:center;'>Submit</th>";
             echo "</tr>";
             
            // Include the server.php for database connection
            include('server.php');
            // Get the instructor's EID from the session
            $eid = $_SESSION['EID'];
            // SQL query to retrieve courses pending approval for the instructor
            $sql = "select * from course_approval where Domain_Approval = 'pending' AND R_Number IN (
                select R_Number from mentor where EID='$eid')";
            $result = mysqli_query($db,$sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    // Get additional details for the course
                    $cid = $row['Course_ID'];
                    $sql_nd = "select Course_Name, Domain from courses where Course_ID='$cid'";
                    $result2 = mysqli_query($db,$sql_nd);
                    $row_nd = mysqli_fetch_assoc($result2);

                    // Display a row for each course pending approval
                    echo "<tr>";
                    echo "<td>" . $row['R_Number'] . "</td>";
                    echo "<td>" . $row['Course_ID'] . "</td>";
                    echo "<td>" . $row_nd['Course_Name'] . "</td>";
                    echo "<td>" . $row_nd['Domain'] . "</td>";
                    echo "<td><input type='radio' name='approval' value='". $row['Course_ID'] ." ". $row['R_Number'] ." 1' required> Approve";
                    echo "<input type='radio' name='approval' value='". $row['Course_ID'] ." ". $row['R_Number'] ." 0'> Reject";
                    echo "<input type='hidden' name='RID' value='" . $row['R_Number'] . "'>";
                    echo "<input type='hidden' name='Course_ID' value='" . $row['Course_ID'] . "'></td>";
                    echo "<td><input type='submit' style='color: black; 
                    background: green; 
                    border: 1px solid #3c763d' name='approve_course". $row['Course_ID'] ." ". $row['R_Number'] ."' value='Submit'></td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                // Display a message if no records are found
                echo "<tr><td colspan='6'>No records found</td></tr>";
                echo "</table>";
                echo "</form>";
            }
            ?>
        </form>  
    </div>
</body>
</html>
