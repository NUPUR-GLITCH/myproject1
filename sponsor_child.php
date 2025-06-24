<?php
session_start();
$welcome = "Welcome, Guest";

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $age = $_POST['age'] ?? '';
    $location = $_POST['location'] ?? '';
    $interests = $_POST['interests'] ?? '';
    $urgency = $_POST['urgency'] ?? '';

    try {
        $stmt = $pdo->prepare("INSERT INTO child_sponsorships (age_range, location, interests, urgency) VALUES (?, ?, ?, ?)");
        $stmt->execute([$age, $location, $interests, $urgency]);
        $success = "Sponsorship preferences submitted successfully!";
    } catch (PDOException $e) {
        $error = "Error submitting preferences: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsor a Child - Space ECE</title>
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
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #ecf0f1;
            font-size: 14px;
            box-sizing: border-box;
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
        .sponsor-results {
            text-align: center;
            color: #7f8c8d;
            font-size: 14px;
            margin-top: 20px;
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
            <h1>Sponsor a Child</h1>
            <p>Make a difference in a child's life</p>
        </div>
        <div class="sponsorship-box">
            <h2>Find a Child to Sponsor</h2>
            <?php if (isset($success)) echo "<div class='message success'>$success</div>"; ?>
            <?php if (isset($error)) echo "<div class='message error'>$error</div>"; ?>
            <form method="post" action="">
                <div class="form-group">
                    <label for="age">Age:</label>
                    <select id="age" name="age">
                        <option value="">All Ages</option>
                        <option value="0-5">0-5</option>
                        <option value="6-10">6-10</option>
                        <option value="11-15">11-15</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="location">Location:</label>
                    <select id="location" name="location">
                        <option value="">All Locations</option>
                        <option value="location1">Location 1</option>
                        <option value="location2">Location 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="interests">Interests:</label>
                    <select id="interests" name="interests">
                        <option value="">All Interests</option>
                        <option value="sports">Sports</option>
                        <option value="arts">Arts</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="urgency">Urgency:</label>
                    <select id="urgency" name="urgency">
                        <option value="">All</option>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit">Apply Filters</button>
                </div>
            </form>
            <div class="sponsor-results">
                Children Available for Sponsorship
                <p>*All information shared with guardian consent</p>
            </div>
        </div>
    </div>
    <footer>
        © 2025 Space ECE. All rights reserved.
    </footer>
</body>
</html>