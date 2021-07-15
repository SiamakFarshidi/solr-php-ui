<?php
    session_start();



    if(isset($_POST['GoogleSignIn'])){
        $_SESSION['userid'] = $_POST["userid"];
        $_SESSION['username'] = $_POST["username"];
        $_SESSION['email'] = $_POST["email"];
        $_SESSION['role'] = $_POST["role"];
        $_SESSION['success'] = "You are now logged in";
        header('location: /search');
    }
?>
