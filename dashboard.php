<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kawsar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>

<!-- CLOCK BOX (head থেকে body তে আনা হয়েছে) -->
<div class="clock-box">
    <span id="time"></span><br>
    <small id="date"></small>
  
</div>

<div class="sidebar">
    <div class="logo">Kawsar</div>
    <ul>
     <li class="active">🏠 Home</li>


        <li><i class="fa fa-user"></i> Profile</li>
        <li>📊 Analytics</li>
        <li>⚙ Settings</li>
       <li>
    <a style="color:#fff;font-size:16px;text-decoration: none;" href="logout.php" class="logout-link">🚪Logout</a>
</li>

    </ul>
</div>

<div class="main-content">
    <div class="header">

        <!-- 🔥 DASHBOARD LOGO -->
        <img src="images/images.png" class="dashboard-logo" alt="Logo">

        <h2>Welcome, <?php echo $_SESSION['full_name'] ?? 'User'; ?>!</h2>
        <p>Here's your dashboard overview</p>
    </div>

    <div class="cards">
        <div class="card">
            <h3>Users</h3>
            <p>1,234</p>
        </div>
        <div class="card">
            <h3>Visitors</h3>
            <p>8,765</p>
        </div>
        <div class="card">
            <h3>Sales</h3>
            <p>$12,345</p>
        </div>
    </div>

    <div class="charts">
        <canvas id="lineChart"></canvas>
    </div>
    
</div>

<script src="dashboard.js"></script>
</body>
</html>

