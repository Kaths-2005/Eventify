<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eventify</title>
  <link rel="stylesheet" href="styles.css">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    /* Apply background image to the entire page */
    .background {
      background-image: url('sfit.jpg'); /* Your background image */
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      height: 100%;
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    h1 {
      color: black; /* Set text color to black */
      font-size: 60px;
      margin: 20px 0;
      position: relative; /* Make sure it's above other elements */
      z-index: 10;
    }

    h2.tagline {
      color: black; /* Set text color to black */
      font-size: 24px;
      font-style: italic;
      margin-top: -10px;
      margin-bottom: 40px;
      position: relative; /* Ensure it's properly placed */
      z-index: 10;
    }

    .slideshow-container {
      position: relative;
      max-width: 1000px;
      margin: auto;
      z-index: 1;
    }

    .slides {
      display: none;
    }

    .slides img {
      width: 100%;
      height: 500px;
    }

    .prev, .next {
      cursor: pointer;
      position: absolute;
      top: 50%;
      width: auto;
      padding: 16px;
      margin-top: -22px;
      color: white;
      font-weight: bold;
      font-size: 18px;
      transition: 0.6s ease;
      border-radius: 0 3px 3px 0;
      user-select: none;
      z-index: 2;
    }

    .next {
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    .prev:hover, .next:hover {
      background-color: rgba(0, 0, 0, 0.8);
    }

    .dots {
      text-align: center;
      margin-top: 10px;
      z-index: 2;
    }

    .dots span {
      cursor: pointer;
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active, .dots span:hover {
      background-color: #717171;
    }

    /* Modal styles */
    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
      background-image: url('sfit.jpg'); /* Background image for the modal */
      background-size: cover;
      background-position: center;
      margin: 15% auto;
      padding: 20px;
      border-radius: 10px;
      width: 400px;
      text-align: center;
    }

    .modal-content h2 {
      color: white;
    }

    .login-options {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }

    .login-options button {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      background-color: #007BFF;
      color: white;
    }

    .login-options button:hover {
      background-color: #0056b3;
    }

    /* Close button */
    .close {
      color: white;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    /* Updated login button */
    .login-btn {
      position: absolute; /* Absolute positioning */
      top: 20px; /* Distance from the top */
      right: 20px; /* Distance from the right */
      padding: 8px 12px; /* Smaller padding */
      font-size: 14px; /* Adjusted font size */
      border-radius: 5px; /* Rounded edges */
      background-color: navy; /* Navy blue color */
      color: white;
      border: none;
      cursor: pointer;
      z-index: 2; /* Ensure it's clickable above other elements */
    }

    .login-btn:hover {
      background-color: #1a237e; /* Slightly darker navy on hover */
    }
  </style>
</head>
<body>
  <div class="background">
    <button class="login-btn" onclick="openModal()">Login</button>
    <h1>Eventify</h1>
    <h2 class="tagline">Where Events are Personified</h2>

    <!-- Slideshow container -->
    <div class="slideshow-container">
      <div class="slides">
        <img src="iris.jpg" alt="Iris Event">
      </div>

      <div class="slides">
        <img src="ad.jpg" alt="Ad Event">
      </div>

      <div class="slides">
        <img src="igni.jpg" alt="Igni Event">
      </div>

      <div class="slides">
        <img src="mos.jpg" alt="MOS Event">
      </div>

      <div class="slides">
        <img src="iv.jpg" alt="IV Event">
      </div>

      <div class="slides">
        <img src="rek.jpg" alt="Rek Event">
      </div>

      <div class="slides">
        <img src="trad.jpg" alt="Trad Event">
      </div>

      <div class="slides">
        <img src="garba.jpg" alt="Garba Event">
      </div>

      <div class="slides">
        <img src="dj.jpg" alt="DJ Event">
      </div>

      <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
      <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>

    <div class="dots">
      <span onclick="currentSlide(1)"></span>
      <span onclick="currentSlide(2)"></span>
      <span onclick="currentSlide(3)"></span>
      <span onclick="currentSlide(4)"></span>
      <span onclick="currentSlide(5)"></span>
      <span onclick="currentSlide(6)"></span>
      <span onclick="currentSlide(7)"></span>
      <span onclick="currentSlide(8)"></span>
      <span onclick="currentSlide(9)"></span>
    </div>

    <!-- Modal -->
    <div id="loginModal" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Select Login Type</h2>
        <div class="login-options">
          <button onclick="window.location.href='log.php'">Admin</button>
          <button onclick="window.location.href='login.php'">Student</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Modal functions
    function openModal() {
      document.getElementById("loginModal").style.display = "block";
    }

    function closeModal() {
      document.getElementById("loginModal").style.display = "none";
    }

    // Close modal when clicking outside of the modal
    window.onclick = function(event) {
      if (event.target == document.getElementById("loginModal")) {
        closeModal();
      }
    }

    // Slideshow script
    let slideIndex = 1;
    showSlides(slideIndex);

    function changeSlide(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      const slides = document.getElementsByClassName("slides");
      const dots = document.getElementsByClassName("dots")[0].getElementsByTagName("span");

      if (n > slides.length) { slideIndex = 1 }
      if (n < 1) { slideIndex = slides.length }

      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }

      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }

      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].className += " active";
    }
  </script>
</body>
</html>
