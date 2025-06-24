<?php
session_start();
$welcome = "Welcome, Guest";

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $feedback = $_POST['feedback'] ?? '';

    try {
        $stmt = $pdo->prepare("INSERT INTO survey_submissions (name, feedback, submitted_at) VALUES (?, ?, NOW())");
        $stmt->execute([$name, $feedback]);
        $success = "Thank you for your feedback!";
    } catch (PDOException $e) {
        $error = "Error submitting feedback: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey - Space ECE</title>
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
            margin-bottom: 20px;
        }
        .survey-box {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .survey-box h2 {
            color: #2980b9;
            margin: 0 0 20px 0;
            font-size: 24px;
        }
        .survey-box p {
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .survey-box form {
            display: flex;
            flex-direction: column;
        }
        .survey-box label {
            margin-bottom: 5px;
            color: #34495e;
        }
        .survey-box input,
        .survey-box textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #ecf0f1;
        }
        .survey-box button {
            padding: 10px;
            background: #2980b9;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .survey-box button:hover {
            background: #2471a3;
        }
        .message {
            text-align: center;
            margin-bottom: 15px;
        }
        .message.success {
            color: green;
        }
        .message.error {
            color: red;
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
            <h1>Survey - Space ECE</h1>
        </div>
        <div class="survey-box">
            <h2>Share Your Feedback</h2>
            <p>Help us improve by sharing your thoughts and suggestions.</p>
            <?php if (isset($success)) echo "<div class='message success'>$success</div>"; ?>
            <?php if (isset($error)) echo "<div class='message error'>$error</div>"; ?>
            <form method="post" action="">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="feedback">Feedback:</label>
                <textarea id="feedback" name="feedback" rows="5" required></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <footer>
        © 2025 Space ECE. All rights reserved.
    </footer>
</body>
</html>