<?php
// Include the Composer autoloader
require 'vendor/autoload.php';

use Razorpay\Api\Api;

// Set your Razorpay API keys (use your actual keys)
$keyId = 'rzp_test_e1sCL0wRhDJmpj';
$keySecret = 'Vg37iMniMa08vMvJeeqFUn7A';

// Create an instance of Razorpay API
$api = new Api($keyId, $keySecret);

// Payment amount in INR (e.g., 500 INR = 50000 paise)
$amount = 50000; // 500 INR in paise

// Create a new order
$orderData = [
    'receipt'         => 'receipt#1',
    'amount'          => $amount, // Amount in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // Auto-capture the payment
];

try {
    $order = $api->order->create($orderData);
} catch (Exception $e) {
    die('Error creating Razorpay order: ' . $e->getMessage());
}

// Razorpay order ID
$order_id = $order['id'];
?>
