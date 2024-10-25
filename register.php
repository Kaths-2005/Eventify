<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'database.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];  // Get name from form
    $pid = $_POST['pid'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    // Prepare SQL statement to insert user data
    $stmt = $pdo->prepare("INSERT INTO users (name, pid, email, password) VALUES (?, ?, ?, ?)");

    try {
        // Execute statement
        $stmt->execute([$name, $pid, $email, $password]);
        // Registration successful, redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // 23000 is the code for unique constraint violation
            echo "Registration failed! The email or PID is already in use.";
        } else {
            echo "An error occurred: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>

        <label for="pid">PID (6 digits):</label>
        <input type="text" name="pid" required pattern="\d{6}" title="Enter a 6-digit PID"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
