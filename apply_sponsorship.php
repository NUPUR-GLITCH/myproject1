<?php
session_start();
$welcome = "Welcome, Guest";

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $family_name = $_POST['familyName'];
    $number_of_children = $_POST['numberOfChildren'];
    $specific_needs = $_POST['specificNeeds'];

    try {
        $stmt = $pdo->prepare("INSERT INTO sponsorship_applications (family_name, number_of_children, specific_needs) VALUES (?, ?, ?)");
        $stmt->execute([$family_name, $number_of_children, $specific_needs]);
        $success = "Application submitted successfully!";
    } catch (PDOException $e) {
        $error = "Error submitting application: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Sponsorship - Space ECE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f0f4f8;
            display: flex;
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
            flex-grow: 1;
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
        .sponsorship-box {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .sponsorship-box h2 {
            color: #2980b9;
            margin: 0 0 20px 0;
            font-size: 24px;
            text-align: center;
        }
        .sponsorship-box p {
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
            <h1>Apply for Sponsorship</h1>
            <p>Support for your family's growth</p>
        </div>
        <div class="sponsorship-box">
            <h2>Sponsorship Application</h2>
            <?php if (isset($success)) echo "<div class='message success'>$success</div>"; ?>
            <?php if (isset($error)) echo "<div class='message error'>$error</div>"; ?>
            <form method="post" action="">
                <div class="form-group">
                    <label for="familyName">Family Name:</label>
                    <input type="text" id="familyName" name="familyName" placeholder="Enter your family name" required>
                </div>
                <div class="form-group">
                    <label for="numberOfChildren">Number of Children:</label>
                    <input type="number" id="numberOfChildren" name="numberOfChildren" placeholder="Number of children" required>
                </div>
                <div class="form-group">
                    <label for="specificNeeds">Specific Needs:</label>
                    <textarea id="specificNeeds" name="specificNeeds" placeholder="Describe your needs..." required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Submit Application</button>
                </div>
            </form>
        </div>
    </div>
    <footer>
        © 2025 Space ECE. All rights reserved.
    </footer>
</body>
</html>