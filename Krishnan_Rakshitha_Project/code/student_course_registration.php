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
        
        <div class="extra"><h1>Student Mentor Connect</h1></div>
        <div class="extra"><h2>Course Registration</h2></div>
        
        <!-- PHP code to check if mentor is selected -->
        <?php 
        include('server.php');
        $rid = $_SESSION["R_number"];
        $query = "SELECT EID FROM mentor WHERE R_Number='$rid'";
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);
        if(!$user)
        {
            echo "<h2 style='text-align: center; color: brown'>Please select your Mentor in Mentor Selection Tab</h2>";
        }
        else
        {
        // PHP code to check the number of courses requested by the student
        $R_number=$_SESSION['R_number'];
        $numberofcourse_per_student = "SELECT count(Course_ID) as sak FROM course_approval where R_Number= '$R_number'";
        $result2 = mysqli_query($db, $numberofcourse_per_student);
        if(mysqli_num_rows($result2) > 0){
            $row2 = mysqli_fetch_assoc($result2);
            if ($row2['sak'] > 2)
            {
                echo "<div class='extra'><h2>You have successfully requested for 3 courses </h2></div>";
            }
            else
            {
        ?>
        <!-- HTML table for course registration -->
        <table  class="tab">
            <tr>
                <!-- Header row of the table -->
                <th rowspan="2" style="color:#007bff; font-size: larger;">Course Name</th>
            </tr>
            <tr>
                <!-- Subheaders for registration and submission -->
                <th style="color: #007bff; font-size: larger;">Registration</th>
                <th style="color:#007bff; font-size: larger;">Submit</th>
            </tr>
            <!-- PHP code to fetch data from rows -->
            <form action= "student_actions\student_coursereg_action.php" method="POST">
                <?php
                // SQL query to retrieve available courses for registration
                $email = $_SESSION['Email'];
                $rnumber = $_SESSION['R_number'];
                $sql3 = "SELECT * FROM courses WHERE Domain = 
                        (SELECT Area_of_Interest FROM student WHERE Email = '$email') 
                        AND Course_ID not in  (select Course_ID from course_approval where R_Number='$rnumber')";
                $result3 = mysqli_query($db, $sql3);
                if (mysqli_num_rows($result3) > 0) {
                    while ($row = mysqli_fetch_assoc($result3)) {
                        echo "<tr>";
                        echo "<td>" . $row['Course_Name'] . "</td>";
                        echo "<td><input type='radio' name='Register' value='" . $row['Course_ID'] . "' required> Register";
                        echo "<td><input type='submit' style='color: black; 
                                        background: green; 
                                        border: 1px solid #3c763d' name='course_registration_actions" . $row['Course_ID'] . "' value='Submit'></td>";
                        echo "</tr>";
                    }
                }
                ?>  
            </form>                  
        </table>  
        <?php } }?> 
        </div>
        
        <!-- HTML table for pending course approval -->
        <div>
            <table  class="tab2">
                <tr>
                    <!-- Header row of the table -->
                    <th rowspan="2" style="color:#007bff; font-size: larger;">Course Name</th>
                </tr>
                <tr>
                    <!-- Subheaders for pending approval and submission -->
                    <th style="color: #007bff; font-size: larger;">Pending Approval</th>
                    <th style="color:#007bff; font-size: larger;">Submit</th>
                </tr>
                <!-- PHP code to fetch data from rows -->
                <form action= "student_actions\student_coursedrop_action.php" method="POST">
                    <?php
                    $rnumber = $_SESSION['R_number'];
                    $sql = "select * from course_approval where Domain_Approval = 'pending' and R_Number= '$rnumber'";
                    $email = $_SESSION['Email'];
                    $result = mysqli_query($db, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) 
                        {
                            $cours_id= $row['Course_ID'];
                            $sql_cname = "select Course_Name from courses where Course_ID= '$cours_id'";
                            $result_cname = mysqli_query($db, $sql_cname);
                            $row2 = mysqli_fetch_assoc($result_cname);
                            echo "<tr>";
                            echo "<td>" . $row2['Course_Name'] . "</td>";
                            echo "<td><input type='radio' name='drop' value='" . $row['Course_ID'] . "' required> Drop";
                            echo "<td><input type='submit' style='color: black; 
                                            background: green; 
                                            border: 1px solid #3c763d' name='course_drop_actions" . $row['Course_ID'] . "' value='Submit'></td>";
                            echo "</tr>";
                        }
                    }
                    ?>  
                </form>                  
            </table> 
        </div>   
        <?php } ?> 
    </div>
</body>
</html>
