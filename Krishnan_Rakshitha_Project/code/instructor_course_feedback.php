<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mentor Connectt</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
    ">
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
                    <p><img src="images/TexasTech_icon.png" alt="img" width="50px" height="50px">Student Mentor Connect</p>
                </div>
                <div class="menteeFb">
                    <a href="instructor_mentor_feedback.php"><h3><img src="images/Course_feedback.png" alt="img" width="40px" height="40px">&nbsp;Mentee Feedback</h3></a>
                </div>
                <br>
                <div class="coursefb">
                    <a href="instructor_course_feedback.php"><h3><img src="images/Mentee_feedback.png" alt="img" width="40px" height="40px">&nbsp;Course Feedback</h3></a>
                    
                </div>
                <br>
                <div class="menteereq">
                    <a href=""><h3><img src="images/Requests.png" alt="img" width="40px" height="40px">&nbsp;Requests</h3></a>
                    
                </div>
                <br>
                <div class="courseApproval">
                    <a href="instructor_course_approval.php"><h3><img src="images/CourseApproval.png" alt="img" width="40px" height="40px">&nbsp;Course Approvals</h3></a>
                    
                </div>
                
            </div>
            
        </div>
        <div class="extra"><h1>Student Mentor Connect</h1></div>
        <div class="extra"><h2>Course Feedbacks</h2></div>
         <!-- Table for displaying course feedback -->
        <div >
        <table  class="tab">
                
        <tr>
                <th style="color: #007bff; text-align:center;">Course Name</th>
                <th style="color: #007bff; text-align:center;">Teaching Skills</th>
                <th style="color: #007bff; text-align:center;">Presentation Skills</th>
                <th style="color: #007bff; text-align:center;">Classroom Environment</th>
                <th style="color: #007bff; text-align:center;">Student/Teacher Relationship</th>
                <th style="color: #007bff; text-align:center;">Curriculum Planning</th>
            </tr>
            <?php
            // Include the server.php for database connection

            include('server.php');

            // Fetch course names and feedback for the instructor
            $eid = $_SESSION['EID'];
            $query = "SELECT courses.*
            FROM courses
            INNER JOIN instructor ON courses.course_id = instructor.course_id
            WHERE EID = '$eid'";

          $result = mysqli_query($db, $query);


          while ($row = mysqli_fetch_assoc($result)) {
            $course_id = $row['Course_ID'];
            $course_name = $row['Course_Name'];

    // // SQL query to calculate average feedback ratings for each aspect for a specific course
    $feedback_query = "SELECT 
    AVG(Rating1) AS avg_teaching_skills, 
    AVG(Rating2) AS avg_presentation_skills, 
    AVG(Rating3) AS avg_classroom_environment,
    AVG(Rating4) AS avg_student_teacher_relationship,
    AVG(Rating5) AS avg_curriculum_planning
  FROM instructor_feedback WHERE Course_Name = '$course_name'";
    $feedback_result = mysqli_query($db, $feedback_query);
    $feedback_row = mysqli_fetch_assoc($feedback_result);

// Display a table row with the course name and its corresponding average feedback ratings
    echo "<tr>";
    echo "<td>" . $course_name . "</td>";
    
    echo "<td>" . number_format($feedback_row['avg_teaching_skills'], 1) . "</td>";
    echo "<td>" . number_format($feedback_row['avg_presentation_skills'],1) . "</td>";
    echo "<td>" . number_format($feedback_row['avg_classroom_environment'],1) . "</td>";
    echo "<td>" . number_format($feedback_row['avg_student_teacher_relationship'],1) . "</td>";
    echo "<td>" . number_format($feedback_row['avg_curriculum_planning'],1) . "</td>";
    echo "</tr>";}
            ?>
               
        </table>          
        </div>   
    </div>
    
    
</body>
</html>