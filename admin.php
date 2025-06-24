<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

$welcome = "Welcome, Admin";
include 'db_connect.php';

$stmt = $pdo->query("SELECT * FROM sponsorship_applications ORDER BY submitted_at DESC");
$sponsorship_applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT * FROM child_sponsorships ORDER BY submitted_at DESC");
$child_sponsorships = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT * FROM survey_submissions ORDER BY submitted_at DESC");
$survey_submissions = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query("SELECT * FROM donations ORDER BY submitted_at DESC");
$donations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Space ECE</title>
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
        .admin-box {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-top: 20px;
        }
        .admin-box h2 {
            color: #2980b9;
            margin: 0 0 20px 0;
            font-size: 24px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background: #2980b9;
            color: white;
        }
        table tr:nth-child(even) {
            background: #f9f9f9;
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
        .logout {
            text-align: center;
            margin-top: 20px;
        }
        .logout a {
            color: #d9534f;
            text-decoration: none;
            font-weight: bold;
        }
        .logout a:hover {
            text-decoration: underline;
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
            <h1>Admin Portal - Space ECE</h1>
            <p>View sponsorship applications and preferences</p>
        </div>
        <div class="admin-box">
            <h2>Sponsorship Applications</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Family Name</th>
                    <th>Number of Children</th>
                    <th>Specific Needs</th>
                    <th>Submitted At</th>
                </tr>
                <?php foreach ($sponsorship_applications as $app): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($app['id']); ?></td>
                        <td><?php echo htmlspecialchars($app['family_name']); ?></td>
                        <td><?php echo htmlspecialchars($app['number_of_children']); ?></td>
                        <td><?php echo htmlspecialchars($app['specific_needs']); ?></td>
                        <td><?php echo htmlspecialchars($app['submitted_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <h2>Child Sponsorship Preferences</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Age Range</th>
                    <th>Location</th>
                    <th>Interests</th>
                    <th>Urgency</th>
                    <th>Submitted At</th>
                </tr>
                <?php foreach ($child_sponsorships as $sponsor): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($sponsor['id']); ?></td>
                        <td><?php echo htmlspecialchars($sponsor['age_range'] ?: 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($sponsor['location'] ?: 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($sponsor['interests'] ?: 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($sponsor['urgency'] ?: 'N/A'); ?></td>
                        <td><?php echo htmlspecialchars($sponsor['submitted_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <h2>Survey Submissions</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Feedback</th>
                    <th>Submitted At</th>
                </tr>
                <?php foreach ($survey_submissions as $submission): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($submission['id']); ?></td>
                        <td><?php echo htmlspecialchars($submission['name']); ?></td>
                        <td><?php echo htmlspecialchars($submission['feedback']); ?></td>
                        <td><?php echo htmlspecialchars($submission['submitted_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <h2>Donations</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount (USD)</th>
                    <th>Submitted At</th>
                </tr>
                <?php foreach ($donations as $donation): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($donation['id']); ?></td>
                        <td><?php echo htmlspecialchars($donation['name']); ?></td>
                        <td><?php echo htmlspecialchars($donation['email']); ?></td>
                        <td><?php echo htmlspecialchars($donation['amount']); ?></td>
                        <td><?php echo htmlspecialchars($donation['submitted_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="logout">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <footer>
        © 2025 Space ECE. All rights reserved.
    </footer>
</body>
</html>