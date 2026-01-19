<?php
session_start();
include("connection.php");

$showLogin = false;
$error = "";
$success = "";

if (isset($_POST['register'])) {

    $full_name = $conn->real_escape_string($_POST['full_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 
    if ($password !== $confirm_password) {
        $error = "Password and Confirm Password do not match!";
        $showLogin = false;
    } 
    else {
        
        $check = $conn->query("SELECT id FROM users WHERE email='$email'");
        if ($check->num_rows > 0) {
            $error = "This email is already registered!";
            $showLogin = false;
        } 
        else {
            
            $insert = $conn->query(
                "INSERT INTO users (full_name, email, password) 
                 VALUES ('$full_name', '$email', '$password')"
            );

            if ($insert) {
                $success = "Registration successful! Please login.";
                $showLogin = true; 
            } else {
                $error = "Something went wrong!";
                $showLogin = false;
            }
        }
    }
}


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
        $error = "Invalid Email or Password";
        $showLogin = true; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kawsar Mahmud Official</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
        <div class="main-logo">
        <img src="images/images.png" alt="Logo">
        
        
    </div>

    <!-- MAKE A LOGIN FORM -->
    <div class="containr <?php echo ($showLogin) ? 'active' : ''; ?>">

       <div class="curved-shape"></div>
         <div class="curved-shape2"></div>
        <div class="form-box login">
            <h2 class="animation" style="--D:0; --S:21;">Login</h2>
           <form action="" method="POST">

                <div class="input-box animation" style="--D:1;--S:22;">
                     <input type="email" name="email" required>
                    <label for="">Email</label>
                   <i class="fa fa-envelope"></i>
                </div>
                <div class="input-box animation" style="--D:2; --S:23;">
                     
                     <input type="password" name="password" required>
                    <label for="">Password</label>
                   <i class="fa fa-lock"></i>
                </div>
                <div class="input-box animation" style="--D:3; --S:24;">
            
                   <button class="btn" type="submit" name="login">Login</button>

                </div>
                <div class="regi-link animation"style="--D:4; --S:25;"  >
                    <p>Don't have an account ? <a href="#" class="signUpLink">Sign Up</a></p>
                </div>
            </form>
        </div>
        <div class="info-content login">
            <h2 class="animation" style="--D:0; --S:20">WELCOME BACK!</h2>
            <p class="animation" style="--D:1; --S:21">Log in to continue.
Your workspace is waiting.</p>
        </div>
         <div class="form-box register">
            <h2 class="animation" style="--li:17; --S:0;">Register</h2>
            <?php if (!empty($error)) { ?>
    <p style="color:#fff; font-weight: bold; text-align:center; margin-bottom:10px;">
        <?php echo $error; ?>
    </p>
<?php } ?>

<?php if (!empty($success)) { ?>
    <p style="color:#00ff9d; text-align:center; margin-bottom:10px;">
        <?php echo $success; ?>
    </p>
<?php } ?>

           <form action="" method="POST">

                <div class="input-box animation" style="--li:18; --S:1;">
                     <input type="text" name="full_name" required>
                    <label for=""> <span>Full</span> Name</label>
                    <i class="fa fa-user"></i>
                </div>
                
                     <div class="input-box animation" style="--li:18; --S:1;">
                      <input type="email" name="email" required>
                    <label for="">Email</label>
                    <i class="fa fa-envelope"></i>
                </div>
                      <div class="input-box animation" style="--li:19; --S:2;">
                     <input type="password" name="password" id="regPassword" required>
                    <label for="">Password</label>
                   <i class="fa fa-lock"></i>
                    <small class="error"></small>

                </div>
                   <div class="input-box animation" style="--li:19; --S:2;">
                            <input type="password" name="confirm_password" id="regConfirmPassword" required>

                    <label for="">Confirm Password</label>
                   <i class="fa fa-lock"></i>
                </div>
                <div class="input-box animation" style="--li:20; --S:3;">
                <button class="btn" type="submit" name="register">Register</button>

                </div>
                <div class="regi-link animation" style="--li:21; --S:4;">
                    <p>Don't have an account ? <a href="#" class="signInLink">Sign In</a></p>
                </div>
            </form>
        </div>
                <div class="info-content register">
            <h2 class="animation" style="--li:17; --S:0;">WELCOME BACK!</h2>
            <p class="animation" style="--li:18; --S:1;">Create an account.
Your journey starts here.</p>
        </div>
     </div>
     <script src="login.js"></script>
</body>

</html>

