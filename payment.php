<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Portal - Eventify</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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
    <h2>Book Event Tickets</h2>
    
    <!-- Event Information -->
    <div class="event-details">
        <h3>DJ Garba Night 2024</h3>
        <p>Date: 19th October 2024</p>
        <p>Time: 6:00 PM - 9:00 PM</p>
        <p>Location: SFIT Campus</p>
        <p>Price: Rs. 250/- per person</p>
    </div>

    <!-- Booking Form -->
    <div class="booking-form">
        <form id="paymentForm">
            <label for="quantity">Number of Tickets:</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1" required>
            
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $_SESSION['name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" required>
            
            <label for="pid">PID No.:</label>
            <input type="text" id="pid" name="pid" value="<?php echo $_SESSION['pid']; ?>" readonly>

            <button type="button" id="payBtn">Pay Now</button>
        </form>
    </div>
</div>

<!-- Razorpay Integration -->
<script>
    document.getElementById('payBtn').onclick = function(e){
        e.preventDefault();

        var quantity = document.getElementById('quantity').value;
        var totalAmount = 250 * quantity; // Assuming Rs. 250 per ticket

        var options = {
            "key": "YOUR_RAZORPAY_KEY_ID", // Enter the Key ID generated from Razorpay Dashboard
            "amount": totalAmount * 100, // Amount in paisa (1 INR = 100 paisa)
            "currency": "INR",
            "name": "Eventify - DJ Garba Night",
            "description": "Ticket Booking",
            "image": "event_logo.png", // Optional
            "handler": function (response){
                // Handle payment success here
                alert("Payment Successful. Payment ID: " + response.razorpay_payment_id);
                
                // You can add a form submission or an AJAX call to update the server-side database
            },
            "prefill": {
                "name": document.getElementById('name').value,
                "email": document.getElementById('email').value,
                "contact": "ENTER_PHONE_NUMBER", // Optional
            },
            "theme": {
                "color": "#F37254"
            }
        };

        var rzp1 = new Razorpay(options);
        rzp1.open();
    }
</script>

</body>
</html>
