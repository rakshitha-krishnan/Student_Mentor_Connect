<?php
include('../server.php');

try {
    // Get the selected course to register from the submitted form.
    $register = $_POST['Register'];
    echo $register;

    // Check if a course is selected for registration.
    if (isset($register)) {
        // Constructs the form action name based on the selected course.
        $submitname = 'course_registration_actions';
        $submitname .= $register;
        echo $submitname;

        // Checks if the specific registration action for the selected course is submitted.
        if (isset($_POST[$submitname])) {
            // Gets necessary information for the registration process.
            $Course_ID = $_POST['Register'];
            $domain_approved = "pending";
            $R_number = $_SESSION["R_number"];
            echo $R_number;

            // Retrieves course information from the database.
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

            // Checks if the student can register additional courses.
            if ($row2['sak'] <= 2) {
                echo "Hello";
                // Inserts the course registration into the database.
                $sql2 = "INSERT INTO course_approval  VALUES ('$R_number','$Course_ID','$domain_approved')";
                if (mysqli_query($db, $sql2)) {
                    // Redirects to the registration page after successful registration.
                    header('location: ../student_course_registration.php');
                } else {
                    // Throws an exception if there is an error inserting data into the database.
                    throw new Exception("Error inserting data: " . mysqli_error($db));
                }
            } else {
                // Throws an exception if the student is trying to register more than 3 courses.
                throw new Exception("You can only register up to 3 courses ");
            }
        }
    } else {
        // Throws an exception if no course is selected for registration.
        throw new Exception("Please select the course you want to register");
    }
} catch (Exception $e) {
    // Handle exceptions here
    echo "exception";
    // Displays an alert with the exception message and redirect to the registration page.
    echo "<script>alert('Caught exception: " . $e->getMessage() . "'); 
    window.location.href='../student_course_registration.php';</script>";
}
?>
