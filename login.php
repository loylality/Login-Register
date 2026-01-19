<?php
session_start();
include("connection.php");

if(isset($_POST['login'])){
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
    if($result->num_rows == 1){
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['full_name'] = $user['full_name'];

        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid Email or Password'); window.history.back();</script>";
    }
}
?>
