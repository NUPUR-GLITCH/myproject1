<?php
session_start();
$welcome = "Welcome, Guest";

include 'db_connect.php';

// Create contact_submissions table with mobile_number field if it doesn't exist
try {
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS contact_submissions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            mobile_number VARCHAR(20),
            message TEXT NOT NULL,
            submitted_at DATETIME NOT NULL
        )
    ");
} catch (PDOException $e) {
    die("Table creation failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $mobile_number = $_POST['mobile_number'] ?? '';
    $message = $_POST['message'] ?? '';

    try {
        $stmt = $pdo->prepare("INSERT INTO contact_submissions (name, email, mobile_number, message, submitted_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->execute([$name, $email, $mobile_number, $message]);
        $success = "Thank you for your message! We'll get back to you soon.";
    } catch (PDOException $e) {
        $error = "Error submitting message: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Space ECE</title>
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
        .contact-box {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .contact-box h2 {
            color: #2980b9;
            margin: 0 0 20px 0;
            font-size: 24px;
            text-align: center;
        }
        .contact-box p {
            color: #7f8c8d;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #34495e;
            font-size: 14px;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #ecf0f1;
            font-size: 14px;
            box-sizing: border-box;
        }
        .form-group textarea {
            height: 100px;
            resize: vertical;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background: #2980b9;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }
        .form-group button:hover {
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
            <h1>Contact Us - Space ECE</h1>
            <p>Get in touch with us</p>
        </div>
        <div class="contact-box">
            <h2>Contact Form</h2>
            <?php if (isset($success)) echo "<div class='message success'>$success</div>"; ?>
            <?php if (isset($error)) echo "<div class='message error'>$error</div>"; ?>
            <form method="post" action="">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="mobile_number">Mobile Number:</label>
                    <input type="tel" id="mobile_number" name="mobile_number" placeholder="Enter your mobile number" pattern="[0-9]{10}" title="Please enter a valid 10-digit mobile number">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" placeholder="Your message..." required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Send Message</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        © 2025 Space ECE. All rights reserved.
    </footer>
</body>
</html>s