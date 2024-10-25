<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event = $_POST['event'];
    $quantity = $_POST['quantity'];
    
    // Event pricing
    $event_prices = [
        "garba" => 250,
        "git_smart" => 150
    ];

    $amount = $event_prices[$event] * $quantity; // Calculate total price
    
    // Store total price in session (to be sent to Razorpay)
    $_SESSION['amount'] = $amount * 100; // Convert to paisa for Razorpay
}
?>
