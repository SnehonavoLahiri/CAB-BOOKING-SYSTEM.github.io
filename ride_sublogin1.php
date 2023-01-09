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
        body{
            background-image: url("Pictures/C9.jpg");
        }
        header{
            background-color: white;
        }
        .container{
            
            display: flex;
            width: 200vh;
            margin: 109px 300px 300px 7px;
            height: 450px;
        }
        .update{
            border: transparent;
            margin: 80px;
            width: 300px;
            padding: 50px;
            font-size: 40px;
            border-radius: 40px;
            background: linear-gradient(135deg, #00dbde 10%, #fc00ff 100%);
        }
        .update1{
            border: transparent;
            margin: 80px;
            margin-left:178px;
            width: 300px;
            padding: 50px;
            font-size: 40px;
            border-radius: 40px;
            background: linear-gradient(135deg, #00dbde 10%, #fc00ff 100%);
        }
        .delete{
            border: transparent;
            margin: 80px;
            margin-left:411px;
            width: 300px;
            padding: 50px;
            font-size: 40px;
            border-radius: 40px;
            background: linear-gradient(135deg, #00dbde 10%, #fc00ff 100%);
        }
        .line{
            border: 2px solid black;
            color: black;
            border-radius: 5px;
        }
        .container a{
            color: black;
            text-decoration: none;
        }
        .ms-md-5 {
             margin-left: -21rem!important;
        }
        .delete a{
            height:125px;
            width:90px;
        }


    </style>
</head>
<body>
    <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-2 mb-4 border-bottom">
        <a href="/" class="d-lg-inline-flex align-items-center text-danger text-decoration-none"
          style="padding-left:30px; padding-right:800px;">
          <img src="Pictures/Ride Now (1).jpg" width="50px" height="50px" >
          <h1 style="text-align: center; padding-left: 20px; font-style: oblique; color: rgb(59, 44, 132);">RideNow</h1>
        </a>
        <nav class="d-inline-flex  mt-2 mt-md-0 ms-md-5">
          <a class="mx-4 py-2 text-dark text-decoration-none" href="carbook.html"><i class="fas fa-home"></i></a>
          <a class="mx-4 py-2 text-dark text-decoration-none" href="ride_sublogin.php"><i class="fas fa-user"></i></a>
          <a class="mx-4 py-2 text-dark text-decoration-none" href="terms.html">Terms & Conditions</a>
          <a class="mx-4 py-2 text-dark text-decoration-none" href="Aboutus.html"> About Us</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="features.html">Features</a>
        </nav>
        <a class="mx-4 py-2 text-dark text-decoration-none"id="badge"style=" font-weight:700; font-size:30px; text-decoration:underline;" href="#"> <?php echo strtoupper($_SESSION['username']); ?></a>
        <a href="logout.php"><i class="fas fa-power-off"></i></a>
      </div>
    </header>
    <div class="container">
        <div class="update">
            <a href="update.php"> Update Password</a>
            <div class="line">
            </div>
        </div>

        <!-- <div class="update1">
            <a href="#"> Update Info</a>
            <div class="line">
            </div>
        </div> -->
    
        <div class="delete">
            <a href="feedback.php"> Share Feedback!</a>
            <div class="line">
            </div>
        </div>  
    </div>
</body>
</html>