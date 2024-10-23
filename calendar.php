<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Calendar</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>Your Personal Calendar</h1>
    <div id="calendar"></div>
    <button id="addEventBtn">Add Event</button>

    <script src="assets/js/calendar.js"></script>
</body>
</html>
