<?php

@include 'config.php';

session_start(); 
if(isset($_POST['submit'])){
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $studentno = mysqli_real_escape_string($conn, $_POST['studentno']);
    $lrn = mysqli_real_escape_string($conn, $_POST['lrn']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $mobileno = mysqli_real_escape_string($conn, $_POST['mobileno']);
    $program = mysqli_real_escape_string($conn, $_POST['program']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    $pass  = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    
    if (isset($_FILES['profile_picture'])) {
        $file_name = $_FILES['profile_picture']['name'];
        $file_tmp = $_FILES['profile_picture']['tmp_name'];
        $file_size = $_FILES['profile_picture']['size'];
        $file_error = $_FILES['profile_picture']['error'];
        
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp',];
        $file_type = $_FILES['profile_picture']['type'];
        
       // Check for valid file type and size
       if (in_array($file_type, $allowed_types) && $file_size < 2000000) { // Limit to 2MB
        // Convert the image to BLOB
        $image_blob = addslashes(file_get_contents($file_tmp)); // read image and prepare for BLOB
    } else {
        $error[] = 'Invalid file type or size.';
    }
} else {
    $error[] = 'Profile picture is required.';
}

    $select = " SELECT * FROM tblstudent WHERE lrn = '$lrn' && studentno = '$studentno'";

    $result = mysqli_query($conn, $select);
    
    if(mysqli_num_rows($result) > 0){
        $error[] = 'User already exists!';
    } else {
        if($pass != $cpass){
            $error[] = 'Password not matched';
        } else {
            $insert = "INSERT INTO tblstudent(fullname, email, password, studentno, lrn, address, mobileno, program, section, profile_picture) 
                       VALUES('$fullname', '$email', '$pass', '$studentno', '$lrn', '$address', '$mobileno', '$program', '$section', '$file_name')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register Form</title>
   <link rel="stylesheet" href="loginStyle4.css">
</head>
<body>
   <div class="form-container">
      <form action="" method="post" enctype="multipart/form-data">
         <h3>Register Now</h3>
         
         <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            }
         ?>
         
         <div class="form-row">
            <div class="form-column">
               <input type="text" name="fullname" placeholder="Fullname" class="box" required>
               <input type="text" name="studentno" placeholder="Student No." class="box" required>
               <input type="text" name="lrn" placeholder="Enter your LRN" class="box" required>
               <input type="email" name="email" placeholder="Email" class="box" required>
               <input type="text" name="address" placeholder="Address" class="box" required>
            </div>
            <div class="form-column">
               <input type="text" name="mobileno" placeholder="Mobile No." class="box" required>
               <input type="text" name="program" placeholder="Program" class="box" required>
               <input type="text" name="section" placeholder="Section" class="box" required>
               <input type="password" name="password" placeholder="Password" class="box" required>
               <input type="password" name="cpassword" placeholder="Confirm your password" class="box" required>
            </div>
         </div>
         <input type="file" name="profile_picture" class="box" required>
         <input type="submit" value="Submit" name="submit" class="form-btn">
         <p>Already have an account? <a href="login.php">Login</a></p>
      </form>
   </div>
</body>
</html>

