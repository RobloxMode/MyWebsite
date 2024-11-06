<?php

@include 'config.php';

session_start(); 
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass =md5($_POST['cpassword']);
  
   
    $select = " SELECT * FROM admin_db WHERE email = '$email' && password = '$pass'";
                                             
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
      
        $_SESSION['email'] = $email;
        header('location:admin.php');
    }else {
       $error[] = 'incorrect email or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="loginStyle5.css">
</head>
<body> 
   <div class="form-container">
      <form action=" " method="post">
         <h3>Login</h3>

         <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            }
         ?>

         <input type="email" name="email" placeholder="Email" class="box" required>
         <input type="password" name="password" placeholder="Password" class="box" required>
         <input type="submit" value="Login now" name="submit" class="form-btn">
         <p>Don't have an account? <a href="regAdmin.php">Register Now</a></p>
      </form>
   </div>
</body>
</html>
