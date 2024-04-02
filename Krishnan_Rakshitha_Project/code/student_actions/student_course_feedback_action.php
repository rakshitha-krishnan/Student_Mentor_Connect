<?php
// Include the server.php file, which likely contains the database connection and other essential configurations.
include('../server.php');

// Display a simple message.
echo "Hello...!!";

// Check if the 'feedback' form is submitted.
if (isset($_POST['feedback'])) {

  // Get the user's registration number from the session.
  $rid = $_SESSION['R_number'];

  // Get the course name from the submitted form.
  $courseName = $_POST['courseName'];

  // Display the registration number and course name for debugging purposes.
  echo $rid;
  echo "CourseName: " . $courseName;

  // Get and escape the values for the ratings from the submitted form.
  $rating1 = mysqli_real_escape_string($db, $_POST['rating1']);
  $rating2 = mysqli_real_escape_string($db, $_POST['rating2']);
  $rating3 = mysqli_real_escape_string($db, $_POST['rating3']);
  $rating4 = mysqli_real_escape_string($db, $_POST['rating4']);
  $rating5 = mysqli_real_escape_string($db, $_POST['rating5']);

  // SQL query to insert feedback into the database.
  $query = "INSERT INTO instructor_feedback VALUES('$rid', '$courseName', $rating1, $rating2, $rating3, $rating4, $rating5, 'Yes')";

  // Execute the query.
  $result = mysqli_query($db, $query);

  // Redirect the user to the student_course_feedback page after submitting the feedback.
  header('location: ../student_course_feedback.php');
  

}
?>
