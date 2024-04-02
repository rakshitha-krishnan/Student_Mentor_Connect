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

        <!-- Heading for the page -->
        <div class="extra"><h1>Student Mentor Connect</h1></div>
        <div class="extra"><h2>Mentor Selection</h2></div>

        <?php 
        // Check if a mentor is already assigned
        include('server.php');
        $R_number=$_SESSION['R_number'];
        $mentorassigned = "SELECT EID FROM mentor where R_Number= '$R_number'";
        $result2 = mysqli_query($db, $mentorassigned);

        if (mysqli_num_rows($result2) > 0) {
            // Display a success message if a mentor is assigned
            $row2 = mysqli_fetch_assoc($result2);
            $mentorid=$row2['EID'];
            echo "<div class='extra'><h2>You have successfully selected the mentor </h2></div>";
            $mentorname = "SELECT concat(First_Name,' ', Last_Name) as Name FROM instructor where EID='$mentorid'";
            $result_mentorname = mysqli_query($db, $mentorname);
            $row_mentorname = mysqli_fetch_assoc($result_mentorname);
            echo "<div class='extra'><h2>Your Mentor: ".$row_mentorname['Name']." </h2></div>";
        } else {
        ?>
        <!-- Form for mentor selection if a mentor is not assigned -->
        <div class="feedbackDropdown" style="text-align: center; position: absolute; top: 150px; left: 340px;">
            <form action="student_mentor_selection_2.php" method="POST">
                <h3>Select your area of interest: 
                    <!-- Dropdown for selecting area of interest -->
                    <select name="fbDPdown" id="course_name" required>
                        <option value="">Select</option>
                        <?php
                        // Fetch distinct domains from the database
                        include('server.php');
                        $sql = "SELECT DISTINCT Domain FROM courses"; 
                        $result = mysqli_query($db, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['Domain'] . "'>" . $row['Domain'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No records found</option>";
                        }
                        ?>
                    </select>
                    &nbsp;&nbsp;
                    <!-- Submit button -->
                    <input type="submit" class="btn btn-success" value="Submit">
                </h3>
            </form> 
        </div>
        <?php } ?> 
    </div>
</body>
</html>
