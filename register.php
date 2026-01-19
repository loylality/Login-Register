<?php
include("connection.php");

if(isset($_POST['register'])){
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password !== $confirm_password){
        echo "<script>alert('Passwords do not match'); window.history.back();</script>";
        exit();
    }

    $checkEmail = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($checkEmail->num_rows > 0){
        echo "<script>alert('Email already registered'); window.history.back();</script>";
        exit();
    }

    $sql = "INSERT INTO users (full_name, email, password) VALUES ('$full_name','$email','$password')";
    if($conn->query($sql) === TRUE){
        // Registration successful → redirect to login page
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
