<?php
include('../server.php');

try 
{
    $approval = $_POST['approval'];
    echo $approval;
    //echo $register;
    if (isset($approval)) 
    {
        $approvecourse = 'approve_course';

        $approvecourse .= $approval;
        echo $approvecourse;

        if (isset($approvecourse)) 
        {
            
            $approval = $_POST['approval'];
            $pieces = explode(" ", $approval);
            $rid = $pieces[1];
            $course_id = $pieces[0];
            $value = $pieces[2];

            echo $approval;
            echo $rid;
            echo $course_id;

            //foreach ($_POST['approval'] as $rid => $approval) {
            // Assuming $conn is your database connection object
            if ($value) 
            {
            // If the approval value is '1', set the status to 'Approved'
            $status = 'Approved';
            } 
            else 
            {
            // If the approval value is anything else, set the status to 'Rejected'
            $status = 'Rejected';
            }
            echo $status;
    
            // Performs the database update
            $sql = "UPDATE course_approval SET Domain_Approval = '$status' WHERE R_Number = '$rid' AND Course_ID = '$course_id' ";
            $result = mysqli_query($db,$sql);
            header('location: ../instructor_course_approval.php');
        }
    }
}

catch (Exception $e) 
{
    // Handle exceptions here
    echo "exception";
    echo "<script>alert('Caught exception: " . $e->getMessage() . "'); 
    window.location.href='../student_course_registration.php';</script>";

}

?>
