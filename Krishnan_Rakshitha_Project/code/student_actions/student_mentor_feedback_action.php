<?php
include('../server.php');

// Checks if the mentor feedback form is submitted.
if (isset($_POST['mentor_feedback_by_student'])) 
{
  // Receives input values from the feedback form.
  $rid = $_SESSION['R_number'];
  $mq1 = mysqli_real_escape_string($db, $_POST['mq1']);
  $mq2 = mysqli_real_escape_string($db, $_POST['mq2']);
  $mq3 = mysqli_real_escape_string($db, $_POST['mq3']);
  $mq4 = mysqli_real_escape_string($db, $_POST['mq4']);
  $mq5 = mysqli_real_escape_string($db, $_POST['mq5']);
  $mq6 = mysqli_real_escape_string($db, $_POST['mq6']);
  $mq7 = mysqli_real_escape_string($db, $_POST['mq7']);
  $mq8 = mysqli_real_escape_string($db, $_POST['mq8']);
  $mq9 = mysqli_real_escape_string($db, $_POST['mq9']);
  $mq10 = mysqli_real_escape_string($db, $_POST['mq10']);

  // Query to retrieve the mentor's EID based on the student's registration number.
  $query = "SELECT EID FROM mentor WHERE R_Number='$rid'";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);
  $eid = $user['EID'];

  // Inserts the mentor feedback into the database.
  $query = "INSERT INTO mentor_feedback(R_Number, EID, MQ1, MQ2, MQ3, MQ4, MQ5, MQ6, MQ7, MQ8, MQ9, MQ10, feedback_completed) 
            VALUES('$rid', '$eid', '$mq1', '$mq2', '$mq3', '$mq4', '$mq5', '$mq6', '$mq7', '$mq8', '$mq9', '$mq10', 'Yes')";
  $result = mysqli_query($db, $query);

  // Redirects to the mentor feedback page after successful submission.
  header('location: ../student_mentor_feedback.php');
}
?>
