<?php
session_start();

// initializing variables
$errors = array(); 
$email = "";

// connect to the database
$db = mysqli_connect("127.0.0.1:3306", "root", '', "student_feedback_system");
?>