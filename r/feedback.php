<?php

@include 'config.php';

session_start(); 
 

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);  
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
  
    // Check if the user already submitted feedback
    $select = "SELECT * FROM feedback_tbl WHERE name = '$name' AND email = '$email'";
    $result = mysqli_query($conn, $select);
        
    if(mysqli_num_rows($result) > 0){
        $error[] = 'User already submitted feedback!';
    } else {
        // Insert new feedback
        $insert = "INSERT INTO feedback_tbl(name, email, feedback_text, submitted_at) 
                   VALUES('$name', '$email', '$feedback', NOW())";
        mysqli_query($conn, $insert);
        header('location:admin.php');
    }
}
?>
