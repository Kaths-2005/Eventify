<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Eventify</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="calendar.php">Personal Calendar</a></li>
            <li><a href="payment.php">Payment Portal</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Left Side: Personal Calendar -->
        <div class="left-panel">
            <h2>Your Calendar</h2>
            <iframe src="https://calendar.google.com/calendar/embed?src=your_public_calendar_id%40group.calendar.google.com&ctz=Asia/Kolkata" style="border: 0" width="300" height="300" frameborder="0" scrolling="no"></iframe>

        </div>

        <!-- Center Section: User Info & Events -->
        <div class="center-panel">
            <div class="user-info">
                <div class="info-box">
                    <p>Name: <?php echo isset($_SESSION['name']); ?></p>
                    <p>PID No.: <?php echo $_SESSION['pid']; ?></p>
                </div>
            </div>
            
            <!-- Event Section -->
            <div class="events">
                <!-- First Event -->
                <div class="event-post">
                    <img src="dj.jpg" alt="DJ Garba Event">
                    <p>🪩 The Much-Awaited DJ x Garba Night 2024 is here 🪩</p>
                    <p>🗓: 19th October 2024 🕕: 6:00 PM - 9:00 PM</p>
                    <p>📍: SFIT Campus 💸: Rs. 250/- Per Person</p>
                    <div class="reactions">
                        <span>❤️</span> <span>👍</span> <span>👎</span> <span>🎉</span>
                    </div>
                    <div class="comments">
                        <p><strong><?php echo isset($_SESSION['name'])."_".$_SESSION['pid']; ?>:</strong> Looking forward to it!</p>
                    </div>
                </div>

                <!-- Add More Event Posts Here -->
                <div class="event-post">
                    <img src="iris.jpg" alt="Git Smart Workshop">
                    <p>👾 Git Smart Workshop</p>
                    <p>🗓: 19th October 2024 🕒: 10 AM - 12 PM</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer for Extra Info -->
    <footer>
        <p>&copy; 2024 Eventify. All Rights Reserved.</p>
    </footer>
</body>
</html>
