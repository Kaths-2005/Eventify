<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'database.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = $_POST['pid'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL statement to fetch the user with the provided PID and email
    $stmt = $pdo->prepare("SELECT * FROM users WHERE pid = ? AND email = ?");
    $stmt->execute([$pid, $email]);
    $user = $stmt->fetch();

    // Check if user exists and verify password
    if ($user && password_verify($password, $user['password'])) {
        // Start a session and store user data if needed
        session_start();
        $_SESSION['user_id'] = $user['id']; // Store user ID or any relevant data
        $_SESSION['pid'] = $user['pid'];

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Display error message if login fails
        $error_message = "Invalid PID, email, or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if (isset($error_message)) : ?>
        <p style="color: red;"><?= htmlspecialchars($error_message) ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <label id="pid" for="pid">PID (6 digits):</label>
        <input type="text" name="pid" required pattern="\d{6}" title="Enter a 6-digit PID"><br>

        <label id="email" for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label id="password" for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input id="login_submit" type="submit" value="Login">
    </form>
</body>
</html>
