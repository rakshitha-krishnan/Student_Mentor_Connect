<?php
include('../server.php');

try {
    // Checks if the mentor selection form is submitted.
    if (isset($_POST['submitmentor'])) {
        // Gets the selected mentor's EID and the student's registration number and selected course.
        $EID = $_POST['select'];
        $selectedcourse = $_POST['domain'];
        $R_number = $_SESSION["R_number"];

        // Updates the student's area of interest in the database.
        $sql = " UPDATE student SET Area_of_interest ='$selectedcourse' where R_number = '$R_number' ";
        $result = mysqli_query($db, $sql);

        // Inserts the mentor selection into the 'mentor' table.
        $sql2 = "INSERT INTO mentor  VALUES ('$R_number','$EID')";
        if (mysqli_query($db, $sql2)) {
            echo "hi";
            // Redirects to the mentor selection page after successful mentor selection.
            header('location: ../student_mentor_selection.php');
        } else {
            echo "hi2";
            // Throws an exception if there is an error inserting data into the database.
            throw new Exception("Error inserting data: " . mysqli_error($db));
        }
    } else {
        // Throws an exception if no mentor is selected.
        throw new Exception("Please select the mentor ");
    }
} catch (Exception $e) {
    // Handles exceptions here
    echo "exception";
    // Displays an alert with the exception message and redirect to the mentor selection page.
    echo "<script>alert('Caught exception: " . $e->getMessage() . "'); 
    window.location.href='../student_mentor_selection.php';</script>";
}
?>
