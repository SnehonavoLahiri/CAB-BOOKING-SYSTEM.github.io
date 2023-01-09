<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: Login.php");
    exit;
}



?>














<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Ride with RideNow | Request Rides 24/7</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <style>
    .dropbtn {
      background-color: #3498DB;
      /* background-color:white; */
      color: white;
      padding: 16px;
      font-size: 16px;
      display:inline-block;
      border: none;
      border-radius:10px;
      width:150px;
      cursor: pointer;
      margin-left:40px;
    }

    .dropbtn:hover,
    .dropbtn:focus {
      background-color: #2980B9;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      overflow: auto;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown a:hover {
      background-color: #ddd;
    }

    .show {
      display: block;
    }


    body {
      background-image: url("Pictures/C9.jpg");
    }

    header {
      background-color: white;
    }

    .container {

      display: flex;
      width: 200vh;
      margin: 109px 300px 300px 7px;
      height: 400px;
    }

    .ride {
      border: transparent;
      margin: 80px;
      width: 400px;
      padding: 50px;
      font-size: 40px;
      border-radius: 40px;
      background: linear-gradient(135deg, #00dbde 10%, #fc00ff 100%);
    }

    .cancel {
      border: transparent;
      margin: 80px;
      width: 400px;
      padding: 50px;
      font-size: 40px;
      border-radius: 40px;
      background: linear-gradient(135deg, #00dbde 10%, #fc00ff 100%);

    }

    .view {
      border: transparent;
      margin: 80px;
      width: 400px;
      margin-left: 170px;
      padding: 50px;
      font-size: 40px;
      border-radius: 40px;
      background: linear-gradient(135deg, #00dbde 10%, #fc00ff 100%);

    }

    .line {
      border: 2px solid black;
      color: black;
      border-radius: 5px;
    }

    .container a {
      color: black;
      text-decoration: none;
    }

    .ms-md-5 {
      margin-left: -9rem !important;
    }
    .name{
      margin-left:40px;
    }
  </style>
</head>

<body>
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-2 mb-4 border-bottom">
      <a href="/" class="d-lg-inline-flex align-items-center text-danger text-decoration-none"
        style="padding-left:30px; padding-right:700px; width-1164px;">
        <img src="Pictures/Ride Now (1).jpg" width="50px" height="50px">
        <h1 style="text-align: center; padding-left: 20px; font-style: oblique; color: rgb(59, 44, 132);">RideNow</h1>
      </a>
      <nav class="d-inline-flex  mt-2 mt-md-0 ms-md-5">
        <a class="mx-4 py-2 text-dark text-decoration-none" href="carbook.html"><i class="fas fa-home"></i></a>
        <!-- <a class="mx-4 py-2 text-dark text-decoration-none" href="ride_sublogin1.php"><i class="fas fa-user"></i></a> -->
        <!-- <a class="mx-4 py-2 text-dark text-decoration-none" href="terms.html">Terms & Conditions</a>
          <a class="mx-4 py-2 text-dark text-decoration-none" href="Aboutus.html"> About Us</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="features.html">Features</a> -->
        <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn">Basic Info</button>
          <div id="myDropdown" class="dropdown-content">
            <a href="update.php">Update Password</a>
            <a href="updatephn.php">Update Mobile</a>
            <a href="feedback.php">Share Feedback</a>
          </div>
        </div>

        <script>
          /* When the user clicks on the button, 
          toggle between hiding and showing the dropdown content */
          function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
          }

          // Close the dropdown if the user clicks outside of it
          window.onclick = function (event) {
            if (!event.target.matches('.dropbtn')) {
              var dropdowns = document.getElementsByClassName("dropdown-content");
              var i;
              for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                  openDropdown.classList.remove('show');
                }
              }
            }
          }
        </script>
    </nav>
    <div class="name">
    <a class="mx-4 py-2 text-dark text-decoration-none" id="badge"
    style=" font-weight:700; font-size:30px; text-decoration:underline; margin-left:100px;" href="#">
    <?php echo "Welcome," .strtoupper($_SESSION['username']); ?>
  </a>
  <!-- <a class="mx-4 py-2 text-dark text-decoration-none" href="ride_subl"><i class="fa-regular fa-power-off"></i></a> -->
  <a href="logout.php"><i class="fas fa-power-off"></i></a>
</div>
</div>
</div>
  </header>
  <div class="container">
    <div class="ride">
      <a href="bookcab.php"> Book</a>
      <div class="line">

      </div>
    </div>

    <div class="cancel">
            <a href="cancelbook.php"> Cancel Booking</a>
            <div class="line">
            </div>
        </div>

    <div class="view">
      <a href="view_history.php"> Ride History</a>
      <div class="line">
      </div>
    </div>
  </div>
  <marquee scrollamount="10" id="add"><strong>For more actions click on basic info.</strong></marquee>
</body>

</html>