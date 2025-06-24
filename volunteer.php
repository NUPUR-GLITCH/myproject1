<?php
session_start();
$welcome = "Welcome, Guest";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer - Space ECE</title>
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
            position: relative;
            padding-bottom: 60px; /* Space for footer */
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
        .section ul {
            color: #34495e;
            margin: 5px 0 5px 20px;
            font-size: 14px;
        }
        .apply-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background: #27ae60;
            color: white;
            text-decoration: none;
            border: 2px solid #219653;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
        }
        .apply-button:hover {
            background: #219653;
            transform: scale(1.05);
        }
        .apply-button::before {
            content: "👆 Apply Now";
        }
        .signin-link-box {
            text-align: center;
            margin: 20px auto;
            background: #2980b9;
            padding: 10px 20px;
            border-radius: 25px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            display: block;
            width: fit-content;
        }
        .signin-link {
            color: white;
            font-size: 16px;
            text-decoration: none;
            font-weight: bold;
        }
        .signin-link:hover {
            color: #ecf0f1;
            text-decoration: underline;
        }
        .separator {
            border: 0;
            height: 1px;
            background: #34495e;
            margin: 20px 0;
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
            <h1>SPACƎECE Volunteering</h1>
            <p>Join our mission to make a difference</p>
        </div>
        <a href="https://docs.google.com/forms/d/10GUZ3CJfuGkzVAIAqLYbdXBi5nV1cLEZ5RB5vMioNJk/edit" target="_blank" class="apply-button"></a>
        <div class="section">
            <div class="subheader">Benefits of Volunteering</div>
            <p>Some of the benefits of volunteering in early childhood education at SpaceECE India Foundation include:</p>
            <ul>
                <li>Developing skills and experience: Volunteering in early childhood education can help you to develop a range of skills and gain valuable experience that can be beneficial for your personal and professional growth.</li>
                <li>Making a difference in the lives of young children: Volunteering in early childhood education can be a fulfilling experience as you work to support the development and education of young children.</li>
                <li>Building connections with the community: Volunteering at SpaceECE India Foundation can help you to build connections with the community and meet new people who share your interests and values.</li>
                <li>Contributing to a meaningful cause: By volunteering at SpaceECE India Foundation, you can contribute to a meaningful cause and make a positive impact in the world.</li>
            </ul>
            <p>Overall, volunteering at SpaceECE India Foundation in the field of early childhood education can be a valuable and rewarding experience that can help you to develop skills, make a difference in the lives of young children, build connections, and contribute to a meaningful cause.</p>
        </div>
        <div class="section">
            <div class="subheader">About Volunteering at SpaceECE</div>
            <p>Volunteering at SPACEƎCE India Foundation in the field of early childhood education can be a rewarding experience. As a volunteer, you will have the opportunity to make a positive impact in the lives of young children and contribute to their development and education.</p>
            <p>Working in early childhood education at SPACEƎCE India Foundation may involve a range of activities, including helping to plan and run educational programs and activities, assisting with the development of educational resources and materials, and providing support to all organizational functions.</p>
            <p>Volunteering at SPACEƎCE India Foundation in the field of early childhood education can be a valuable and rewarding experience that can help you to develop skills, make a difference in the lives of young children, build connections, and contribute to a meaningful cause.</p>
        </div>
        <div class="section">
            <div class="subheader">Responsibilities of Regular Volunteers</div>
            <ol>
                <li>Conducting regular activities with children or youth: Volunteers may be expected to conduct regular educational or recreational activities with children or youth, such as tutoring, mentoring, or coaching.</li>
                <li>Assisting with administrative tasks: Volunteers may be asked to help with administrative tasks, such as data entry, filing, or answering phone calls.</li>
                <li>Supporting program staff: Volunteers may be required to support program staff in various ways, such as providing assistance with program design, implementation, or evaluation.</li>
                <li>Engaging with the community: Volunteers may be asked to engage with the community to promote the organization's mission and goals.</li>
                <li>Fundraising: Volunteers may be asked to help raise funds for the organization by organizing events, writing grant proposals, or soliciting donations.</li>
                <li>Assisting with marketing and communication: Volunteers may be required to assist with marketing and communication tasks, such as creating social media posts, designing flyers, or drafting press releases.</li>
                <li>Providing support to other volunteers: Volunteers may be asked to provide support to other volunteers, such as helping them with training or mentoring.</li>
            </ol>
        </div>
        <div class="section">
            <div class="subheader">Expectations from the Volunteers</div>
            <ol>
                <li>Participating in regular training sessions: Volunteers may be required to attend regular training sessions to enhance their skills and knowledge.</li>
                <li>Participating in meetings: Volunteers may be expected to participate in meetings with program staff, board members, or other volunteers.</li>
                <li>Completing reports: Volunteers may be asked to complete reports documenting their activities, achievements, and challenges.</li>
            </ol>
        </div>
        <hr class="separator">
        <div class="signin-link-box">
            <a href="volunteer_signin.php" class="signin-link">Already a volunteer? Sign in</a>
        </div>
    </div>
    <footer>
        © 2025 Space ECE. All rights reserved.
    </footer>
</body>
</html>