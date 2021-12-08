<?php

session_start();
include("../database/connection.php");
    

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        // $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $password = md5($password); // Password Encryption....

        
        // Checking emails recurring.
        $check = "SELECT * FROM `admin_user` WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($con, $check);
        $num = mysqli_num_rows($result);

        if($num == 1){
            $_SESSION['email'] = $email;
            header("Location: ../dashboard.php");
        }else{
            header("Location: ../index.php?error=1");

        }


}

?>