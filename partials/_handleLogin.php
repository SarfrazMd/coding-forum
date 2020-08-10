<?php
$loginError="false";
if($_SERVER['REQUEST_METHOD']=='POST') { 
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];
    $Sql = "SELECT * FROM `users` where user_email = '$email'";
    $result = mysqli_query($conn, $Sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1) { 
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['useremail'] = $email;
            header("Location: /forum/index.php?loginsuccess=true");
            exit();
        } else {
            $loginError = "You've entered the wrong password.";
        }
        
    } else {
        $loginError = "User doesn't exists.";
    }
    header("Location: /forum/index.php?loginsuccess=false&error=$loginError");
}