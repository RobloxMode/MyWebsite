<?php

@include 'config.php';

session_start(); 
if(isset($_POST['submit'])){
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass  = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    
    // Check if the email already exists
    $select = "SELECT * FROM admin_db WHERE email = '$email'";
    $result = mysqli_query($conn, $select);
    
    if(mysqli_num_rows($result) > 0){
        $error[] = 'User already exists!';
    } else {
        if($pass != $cpass){
            $error[] = 'Password not matched';
        } else {
            // Corrected INSERT statement without extra comma
            $insert = "INSERT INTO admin_db (fullname, email, password) 
                       VALUES ('$fullname', '$email', '$pass')";
            mysqli_query($conn, $insert);
            header('location:login.php');
            exit(); // Prevent further execution
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
      <form action="" method="post">
         <h3>Register Now</h3>
         
         <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            }
         ?>

         <input type="text" name="fullname" placeholder="Fullname" class="box" required>
         <input type="email" name="email" placeholder="Email" class="box" required>
         <input type="password" name="password" placeholder="Password" class="box" required>
         <input type="password" name="cpassword" placeholder="Confirm your password" class="box" required>
         <input type="submit" value="Submit" name="submit" class="form-btn">
         <p>Already have an account? <a href="login.php">Login</a></p>
      </form>
   </div>
</body>
</html>
