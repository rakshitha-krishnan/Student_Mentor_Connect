<?php
// Include the server.php file, which likely contains the database connection and other essential configurations.
include('../server.php');

try {
    // Get the selected course to drop from the submitted form.
    $register = $_POST['drop'];
    echo $register;

    // Check if a course is selected for dropping.
    if (isset($register)) {
        // Constructs the form action name based on the selected course.
        $submitname = 'course_drop_actions';
        $submitname .= $register;
        echo $submitname;

        // Check if the specific drop action for the selected course is submitted.
        if (isset($_POST[$submitname])) {
            // Get necessary information for the drop process.
            $Course_ID = $_POST['drop'];
            $domain_approved = "pending"; // Corrected variable name
            $R_number = $_SESSION["R_number"];
            echo $R_number;

            // Retrieve course information from the database.
            $sql = "SELECT * FROM courses where Course_ID = $Course_ID";
            $result = mysqli_query($db, $sql);

            // Query to get the number of courses approved for the student.
            $numberofcourse_per_student = "SELECT count(Course_ID) as sak FROM course_approval where R_Number= '$R_number'";
            $result2 = mysqli_query($db, $numberofcourse_per_student);

            // Checks for database query errors.
            if (!$result) {
                throw new Exception("Error in database query: " . mysqli_error($db));
            }

            $row = mysqli_fetch_assoc($result);
            $row2 = mysqli_fetch_assoc($result2);

            // Checks if the course record exists in the database.
            if (!$row) {
                throw new Exception("No record found for Course ID: $Course_ID");
            }

            // Checks if the student is trying to drop their last course.
            if ($row2['sak'] == 1) {
                throw new Exception("You cannot drop all the courses ");
            } else {
                // Performs the course drop operation.
                $sql2 = "delete from course_approval  where R_Number= '$R_number' and Course_ID = $Course_ID ";
                if (mysqli_query($db, $sql2)) {
                    echo "hi";
                    header('location: ../student_course_registration.php');
                } else {
                    echo "hi2";
                    throw new Exception("Error inserting data: " . mysqli_error($db));
                }
            }
        }
    } else {
        // Throws an exception if no course is selected for dropping.
        throw new Exception("Please select the course you want to drop");
    }
} catch (Exception $e) {
    // Handle exceptions here
    echo "exception";
    echo "<script>alert('Caught exception: " . $e->getMessage() . "'); 
    window.location.href='../student_course_registration.php';</script>";
}
?>
