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
            <!-- Home link -->
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
        
        <!-- Extra information -->
        <div class="extra"><h1>Student Mentor Connect</h1></div>
        <div class="extra"><h2>Mentee Feedback</h2></div>

        <?php
        // Include server-side script
        include('server.php');

        // Get instructor's ID from session
        $eid = $_SESSION['EID'];

        // Query to calculate average ratings for various aspects from mentor feedback
        $query = "SELECT AVG(mq1) AS avg_mq1, AVG(mq2) AS avg_mq2, AVG(mq3) AS avg_mq3, AVG(mq4) AS avg_mq4, AVG(mq5) AS avg_mq5, AVG(mq6) AS avg_mq6, AVG(mq7) AS avg_mq7, AVG(mq8) AS avg_mq8, AVG(mq9) AS avg_mq9, AVG(mq10) AS avg_mq10 FROM mentor_feedback WHERE EID = '$eid'";
        $result = mysqli_query($db, $query);

        // Check if the query was successful
        if (!$result) {
            die("Query failed: " . mysqli_error($db));
        }

        // Fetch average ratings
        $averages = mysqli_fetch_assoc($result);

        // Display average ratings if available
        if ($averages) {
            echo "<div style='text-align: center;'><h2>Average Ratings</h2></div>";
            echo "<table style='text-align: start; margin: auto;'>";
            echo "<tr><th>Aspect</th><th>Average Rating</th></tr>";
            foreach ($averages as $aspect => $average) {
                echo "<tr><td>$aspect</td><td>$average</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No data available.</p>";
        }
        ?>

        <!-- Display detailed feedback ratings in a table -->
        <table style="text-align: start;">
            <tr>
                <th style="color: #007bff; text-align:center;" >Aspects Related to Mentor Performance</th>
                <th style="color: #007bff; text-align:center;">Average Rating</th>
            </tr>
            <!-- The ratings for mentor -->
            <tr>
                <td>1. My mentor has been readily available and reachable</td>
                <td style="text-align: center;"><?php echo number_format($averages['avg_mq1'], 1); ?></td>
            </tr>
            <tr>
                <td>2. My mentor keeps in touch with me regularly</td>
                <td style="text-align: center;"><?php echo number_format($averages['avg_mq2'], 1); ?></td>
            </tr>
            <tr>
                <td>3. My mentor provided support in order to address my academic difficulties. </td>
                <td style="text-align: center;"><?php echo number_format($averages['avg_mq3'], 1); ?></td>
            </tr>
            <tr>
                <td>4. My mentor provided guidance and assistance in ensuring the submissions of my deliverables and performance.</td>
                <td style="text-align: center;"><?php echo number_format($averages['avg_mq4'], 1); ?></td>
            </tr>
            <tr>
                <td>5. My mentor explained to me the areas or topics which were difficult for me to understand</td>
                <td style="text-align: center;"><?php echo number_format($averages['avg_mq5'], 1); ?></td>
            </tr>
            <tr>
                <td>6. My mentor expressed concern towards me</td>
                <td style="text-align: center;"><?php echo number_format($averages['avg_mq6'], 1); ?></td>
            </tr>
            <tr>
                <td>7. My mentor demonstrated professionalism and courtesy all the time</td>
                <td style="text-align: center;"><?php echo number_format($averages['avg_mq7'], 1); ?></td>
            </tr>
            <tr>
                <td>8. My mentor has been beneficial to me </td>
                <td style="text-align: center;"><?php echo number_format($averages['avg_mq8'], 1); ?></td>
            </tr>
            <tr>
                <td>9. I look forward to another term of mentoring with my mentor</td>
                <td style="text-align: center;"><?php echo number_format($averages['avg_mq9'], 1); ?></td>
            </tr>
            <tr>
                <td>10. I highly recommend my mentor</td>
                <td style="text-align: center;"><?php echo number_format($averages['avg_mq10'], 1); ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
