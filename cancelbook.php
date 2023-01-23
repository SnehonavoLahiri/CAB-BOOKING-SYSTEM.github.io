<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: Login.php");
    exit;
}



?>














<?php
$alert=false;
$error=false;
$exists=false;
 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$servername="localhost";
$username="root";
$password="";
$database="customer database";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo"not connected";
}
//  echo"connected";
//  echo $_SERVER['REQUEST_METHOD'] ; 
 $serialno=$_SESSION['Serial_No'];
//  echo $serialno;
 $cabid= $_SESSION['cab_id'];
 $carname=$_SESSION['car_name'];
 $type=$_SESSION['type'];
 $driverid=$_SESSION['driver_id'];
// echo $Gender;
// $exists=false;

// // Check whether this username exists
// $plsql = "Select * from signup where Name='$Name' ";
//  $result = mysqli_query($conn, $plsql);
//  $num = mysqli_num_rows($result);
//  if($num > 0){
//      $exists = true;
//      $error = "Username Already Exists";
//  }
//  else{
    // $exists = false; 
    // if(($Password == $cpassword)){
        // $hash = password_hash($password, PASSWORD_DEFAULT);
         $sql = "INSERT INTO `book` (`Serial_No`, `type`, `cab_id`, `car_name`, `driver_id`) VALUES ('$serialno', '$type', '$cabid', '$carname', '$driverid')";
         $result = mysqli_query($conn, $sql);
         if ($result){
             $alert=true;
         }
         else{
             $error="Your Booking has been cancelled";
         }
         $d="DELETE FROM `view` WHERE `view`.`cab_id` = '$cabid'";
              $dr=mysqli_query($conn,$d);

     }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel CAB | RideNow</title>
    <link rel="stylesheet" href="faqs.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
 body{
      background:aliceblue;
    }
    label{
      font-size: 30px;
    }
    .phn{
      width: 300px;
    }
    .btn{
      background-color: black;
      color:white;
    }

</style>
<body>
  <?php
if($alert){
  echo
  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Your Booking has been cancelled!! Click here to go to  <a href="ride_sublogin.php">PROFILE</a></strong>' .$error.'
 
</div>';
}

  ?>
<header>
    <!--NAV START-->
    <div class="d-flex flex-column flex-md-row align-items-center pb-2 mb-4 border-bottom">
      <a href="/" class="d-lg-inline-flex align-items-center text-danger text-decoration-none"
        style="padding-left:30px;padding-right: 327px; padding-right:300px;">
        <img src="Pictures/Ride Now (1).jpg" width="50px" height="50px">
        <h1 style="text-align: center; padding-left: 20px;margin-left:20px; font-style: oblique; color: rgb(59, 44, 132);">RideNow</h1>
      </a>
      <nav class="d-inline-flex  mt-2 mt-md-0 ms-md-5">
        <a class="mx-4 py-2 text-dark text-decoration-none" href="index.html"><i class="fas fa-home"></i></a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="terms.html">Terms & Conditions</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="Aboutus.html"> About Us</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="features.html">Features</a>
        
      </nav> 
      <a class="mx-4 py-2 text-dark text-decoration-none"id="badge"style=" font-weight:700; font-size:30px; text-decoration:underline;" href="#"> <?php echo strtoupper($_SESSION['username']); ?></a> 
      <a href="logout.php"><i class="fas fa-power-off"></i></a>
    </div>
  </header>


    <h1>Your booking will be canceled here!!</h1>
    <form action="/CBS/cancelbook.php" method="POST">
    <label for="">Do you want to cancel your booking?? Confirm Your Phone Number to Continue...</label><br>
    <input type="text" name="phone" class="phn">
    <input type="submit" value="Submit" class="btn">
    </form>
</body>
</html>
