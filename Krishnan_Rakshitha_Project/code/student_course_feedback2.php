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
        <div><h5 style="text-align: center; color: brown;">Evaluate according to the scale given</h5></div>
        <div><p style="text-align: center; color: brown;">5-Strongly Agree; 4-Agree; 3-Neutral; 2-Disagree; 1-Stongly Disagree;</p></div>
        <br>
        <!-- Feedback dropdown display -->
        <div class="feedbackDropdown" style="text-align: center; position: absolute;top: 200px;left: 340px;">
            <h5>Give Feedback to the following course : 
            <?php
            // Display selected course for feedback
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $selectedCourse = $_POST['fbDPdown'];
                echo " " . htmlspecialchars($selectedCourse);
            }   
            ?>
            </h5>
        </div>
        
        <!-- Feedback form -->
        <div >
            <form action="student_actions/student_course_feedback_action.php" method="POST">
            <?php
            // Include server.php to access server-related functionality
            include('server.php');
            
            // Retrieve logged-in student's registration number
            $rid = $_SESSION["R_number"];
            
            // Query to check if feedback has already been provided for the selected course
            $query = "SELECT Feedback FROM instructor_feedback WHERE R_Number='$rid' AND Course_Name = '$selectedCourse'";
            $result = mysqli_query($db, $query);
            $user = mysqli_fetch_assoc($result);
            
            // Check if feedback has been provided, if not, display the feedback form
            if ($user) {
                echo "<h2 style='text-align: center; color: brown'>Thank you for providing feedback for the course : </h2>". htmlspecialchars($selectedCourse);
            } else {
            ?>
                <!-- Table for feedback form -->
                <table  class="tab" style="position: absolute;top: 250px;left: 380px;">
                    <tr>
                        <!-- Header row of the table -->
                        <th rowspan="2" style="color: burlywood; font-size: larger;">Course Name</th>
                        <th colspan="5" style="color: burlywood; font-size: larger;">Feedback</th>
                        <th rowspan="2"> </th>
                    </tr>
                    <tr>
                        <!-- Subcategories for feedback -->
                        <th>Teaching Skills</th>
                        <th>Presentation Skills</th>
                        <th>Classroom Environment</th>
                        <th>Student/Teacher Relationship</th>
                        <th>Curriculum Planning</th>
                    </tr>
                    <tr>
                        <!-- Row to provide feedback ratings -->
                        <td><h5><?php echo " " . htmlspecialchars($selectedCourse); ?></h5></td>
                        <!-- Dropdowns for each feedback subcategory -->
                        <td><select name="rating1" id="1" required>
                            <option value="">Rate</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select></td>
                        <td><select name="rating2" id="2" required>
                            <option value="">Rate</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select></td>
                        <td><select name="rating3" id="3" required>
                            <option value="">Rate</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select></td>
                        <td><select name="rating4" id="4" required>
                            <option value="">Rate</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select></td>
                        <td><select name="rating5" id="5" required>
                            <option value="">Rate</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select></td>
                        <!-- Submit button and hidden input to pass selected course name -->
                        <td>
                            <input type="submit" class="btn btn-success" name= "feedback" value ="submit">
                        </td>
                        <?php $selectedCourse = $_POST['fbDPdown']; 
                        echo " <input type='hidden' name='courseName' value='". $selectedCourse."'>";?>
                    </tr>
                </table>      
            </div> 
            <?php
            }
            ?>
            </form>
        </div>
    </div>
</body>
</html>
