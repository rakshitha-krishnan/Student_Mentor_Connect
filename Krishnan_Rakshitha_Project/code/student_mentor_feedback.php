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
        <div class="extra"><h2>Mentor Feedback</h2></div>
        <!-- Information for rating scale -->
        <div><h5 style="text-align: center; color: brown;">Evaluate according to the scale given</h5></div>
        <div><p style="text-align: center; color: brown;">5-Strongly Agree; 4-Agree; 3-Neutral; 2-Disagree; 1-Stongly Disagree</p></div>

        <!-- Feedback form -->
        <form action="student_actions/student_mentor_feedback_action.php" method="POST">
            <?php
            // Include server.php for database connectivity
            include('server.php');
            // Get the student's R_number
            $rid = $_SESSION["R_number"];
            // Check if the student has selected a mentor
            $query = "SELECT EID FROM mentor WHERE R_Number='$rid'";
            $result = mysqli_query($db, $query);
            $user = mysqli_fetch_assoc($result);
            if (!$user) {
                echo "<h2 style='text-align: center; color: brown'>Please select your Mentor in the Mentor Selection Tab</h2>";
            } else {
                // Check if the student has already provided feedback
                $query = "SELECT feedback_completed FROM mentor_feedback WHERE R_Number='$rid'";
                $result = mysqli_query($db, $query);
                $user = mysqli_fetch_assoc($result);
                if ($user) {
                    echo "<h2 style='text-align: center; color: brown'>Thank you for providing feedback to your Mentor!</h2>";
                } else {
            ?>
            <!-- Feedback questionnaire table -->
            <table style="text-align: start;">
                <tr>
                    <th style="color: #007bff; text-align:center;" >Aspects Related to Mentor Performance</th>
                    <th style="color: #007bff; text-align:center;">Rating</th>
                </tr>
                <!-- Question 1 -->
                <tr>
                    <td>1. My mentor has been readily available and reachable</td>
                    <td style="width: 100px; text-align: center;">
                        <select name="mq1" id="a" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <!-- Question 2 -->
                <tr>
                    <td>2. My mentor keeps in touch with me regularly</td>
                    <td style="width: 100px; text-align: center;">
                        <select name="mq2" id="b" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <!-- Question 3 -->
                <tr>
                    <td>3. My mentor provided support in order to address my academic difficulties.</td>
                    <td style="width: 100px; text-align: center;">
                        <select name="mq3" id="c" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <!-- Question 4 -->
                <tr>
                    <td>4. My mentor provided guidance and assistance in ensuring the submissions of my deliverables and performance.</td>
                    <td style="width: 100px; text-align: center;">
                        <select name="mq4" id="d" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <!-- Question 5 -->
                <tr>
                    <td>5. My mentor explained to me the areas or topics which were difficult for me to understand</td>
                    <td style="width: 100px; text-align: center;">
                        <select name="mq5" id="e" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <!-- Question 6 -->
                <tr>
                    <td>6. My mentor expressed concern towards me</td>
                    <td style="width: 100px; text-align: center;">
                        <select name="mq6" id="f" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <!-- Question 7 -->
                <tr>
                    <td>7. My mentor demonstrated professionalism and courtesy all the time</td>
                    <td style="width: 100px; text-align: center;">
                        <select name="mq7" id="g" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <!-- Question 8 -->
                <tr>
                    <td>8. My mentor has been beneficial to me</td>
                    <td style="width: 100px; text-align: center;">
                        <select name="mq8" id="h" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <!-- Question 9 -->
                <tr>
                    <td>9. I look forward to another term of mentoring with my mentor</td>
                    <td style="width: 100px; text-align: center;">
                        <select name="mq9" id="i" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <!-- Question 10 -->
                <tr>
                    <td>10. I highly recommend my mentor</td>
                    <td style="width: 100px; text-align: center;">
                        <select name="mq10" id="j" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
            </table>
            <!-- Submit button -->
            <button class="btn btn-success" style=" position: absolute;top: 620px;left: 800px;" name="mentor_feedback_by_student">Submit</button>
            <?php
                }
            }
            ?>
        </form>
    </div>
</body>
</html>
