<?php
session_start();
$welcome = "Welcome, Guest";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Us - Space ECE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f0f4f8;
            overflow-x: hidden;
        }
        .sidebar {
            width: 60px;
            background: #2c3e50;
            color: white;
            height: 100vh;
            position: fixed;
            padding: 20px 0;
            transition: width 0.3s ease;
            overflow: hidden;
        }
        .sidebar:hover {
            width: 200px;
        }
        .sidebar h2 {
            font-size: 14px;
            text-align: center;
            margin: 0 0 20px 0;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            color: white;
            padding: 15px 20px;
            text-decoration: none;
            margin-bottom: 30px;
            background: #34495e;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .sidebar a:hover {
            background: #465c71;
        }
        .sidebar a .icon {
            margin-right: 10px;
            opacity: 1;
            flex-shrink: 0;
        }
        .sidebar a .text {
            margin-left: 0;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .sidebar:hover a .text {
            opacity: 1;
        }
        .content {
            margin-left: 60px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }
        .sidebar:hover ~ .content {
            margin-left: 200px;
        }
        .header {
            background: #2980b9;
            color: white;
            padding: 10px 20px;
            text-align: center;
            border-radius: 5px;
        }
        .section {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .section h2 {
            color: #2980b9;
            margin: 0 0 15px 0;
            font-size: 20px;
        }
        .section .subheader {
            background: #ADD8E6;
            color: #fff;
            padding: 10px;
            margin: -20px -20px 20px -20px;
            border-radius: 10px 10px 0 0;
            font-size: 18px;
            text-align: center;
        }
        .section p {
            color: #34495e;
            margin: 5px 0;
            font-size: 14px;
        }
        .section .placeholder {
            color: #7f8c8d;
            font-style: italic;
        }
        .section .donate-button {
            display: inline-block;
            padding: 10px 20px;
            background: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }
        .section .donate-button:hover {
            background: #219653;
        }
        footer {
            background: #2980b9;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
   <div class="sidebar">
    <h2><?php echo $welcome; ?></h2>
    <a href="index.php"><span class="icon">🏠</span><span class="text">Home</span></a>
    <a href="survey.php"><span class="icon">📋</span><span class="text">Survey</span></a>
    <a href="support_us.php"><span class="icon">💖</span><span class="text">Support Us</span></a>
    <a href="apply_sponsorship.php"><span class="icon">📝</span><span class="text">Apply for Sponsorship</span></a>
    <a href="sponsor_child.php"><span class="icon">👶</span><span class="text">Sponsor a Child</span></a>
    <a href="volunteer.php"><span class="icon">🙋‍♂️</span><span class="text">Volunteer</span></a>
    <a href="about.php"><span class="icon">ℹ️</span><span class="text">About Us</span></a>
    <a href="admin.php"><span class="icon">🔐</span><span class="text">Admin</span></a>
</div>
    <div class="content">
        <div class="header">
            <h1>Support Us</h1>
            <p>Join us in making a difference</p>
        </div>
        <div class="section">
            <div class="subheader">1. Make a Donation</div>
            <p>Support our mission by contributing financially. Every donation helps provide education, healthcare, and nutrition to underprivileged families.</p>
            <a href="donate.php" class="donate-button">Donate Now</a>
        </div>
        <div class="section">
            <div class="subheader">2. Sponsor a Child</div>
            <p>Change a child's life by sponsoring their education and well-being. Learn more about our sponsorship program.</p>
            <a href="sponsor_child.php" class="donate-button">Sponsor a Child</a>
        </div>
        <div class="section">
            <div class="subheader">3. Volunteer Your Time</div>
            <p>Join our team of dedicated volunteers to make a direct impact in communities. Your skills can help us grow.</p>
            <a href="volunteer.php" class="donate-button">Become a Volunteer</a Gen</a>
        </div>
    </div>
    <footer>
        © 2025 Space ECE. All rights reserved.
    </footer>
</body>
</html>