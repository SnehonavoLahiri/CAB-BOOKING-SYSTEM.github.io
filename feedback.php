<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: Login.php");
    exit;
}



?>


<?php
$alert=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $servername="localhost";
  $username="root";
  $password="";
  $database="customer database";
  $conn=mysqli_connect($servername,$username,$password,$database);
  if(!$conn){
      echo"not connected";
  }
  // echo"connected";
  // echo $_SERVER['REQUEST_METHOD'] ; 
  $EmailID=$_SESSION['Name'];
  // echo $EmailID;
  $feedback=$_POST['feedback'];
  $sql = "INSERT INTO `feedback` ( `EmailID`, `feedback`) VALUES ('$EmailID' , '$feedback')";
        $result = mysqli_query($conn, $sql);
        // echo var_dump($result);
        if ($result){
          
            $alert = true;
        }
        else{
          echo"not inserted";
        }
      }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback | RideNow</title>
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
    header{
      background:white;
    }
    .form-label{
      font-size: 50px;
      margin-top: 30px;
      
    }
    .btn{
      background-color: black;
      color: white;
      margin-top: 51px;
    margin-left: 600px;
    width: 100px;
    height: 50px;
    border-radius: 10px;
    }
    h1{
      margin-left: 400px;
    }
    h3{
      margin-top: 50px;
    }
    .desc{
      height: 200px;
      width: 800px;
      display: inline-block;
      margin-left: 200px;
      padding: 2px;
      border-radius: 20px;
    }
    .action{
      margin-top: 85px;
      background-color: rgb(179, 217, 232);
      color: black;
      display: block;
      border-radius: 10px;
      /* margin-left: 100px; */
    }
</style>

    <body>
      <?php
    if($alert){
       echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>OK!</strong> Your FEEDBACK has been Accepted Successfully!! Click here to go to  <a href="ride_sublogin.php">PROFILE</a>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
       }
    ?>
<header>
    <!--NAV START-->
    <div class="d-flex flex-column flex-md-row align-items-center pb-2 mb-4 border-bottom">
      <a href="/" class="d-lg-inline-flex align-items-center text-danger text-decoration-none"
        style="padding-left:30px;padding-right: 327px; padding-right:700px;">
        <img src="Pictures/Ride Now (1).jpg" width="50px" height="50px">
        <h1 style="text-align: center; padding-left: 20px;margin-left:20px; font-style: oblique; color: rgb(59, 44, 132);">RideNow</h1>
      </a>
      <nav class="d-inline-flex  mt-2 mt-md-0 ms-md-5">
        <a class="mx-4 py-2 text-dark text-decoration-none" href="carbook.html"><i class="fas fa-home"></i></a>
        <!-- <a class="mx-4 py-2 text-dark text-decoration-none" href="terms.html">Terms & Conditions</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="Aboutus.html"> About Us</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="features.html">Features</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="#"> Contact Us</a> -->
      </nav> 
       <a class="mx-4 py-2 text-dark text-decoration-none"id="badge"style=" font-weight:700; font-size:30px; text-decoration:underline;"> <?php echo "Welcome,".strtoupper($_SESSION['username']); ?></a>
      <a href="logout.php"><i class="fas fa-power-off"></i></a>
    </div>
    </header>
    <h1>Your Feedback is our Improvement</h1>
    <marquee scrollamount="10" id="add"><strong>Please kindly Share Your Feedback to Motivate Us!!!</strong></marquee>
    <label for="FormControl" class="form-label" style="margin-left:10px;">  Give Your Feedback Here.</label><br>
    <form action="/CBS/feedback.php" method="POST">
        <input type="text" placeholder="Share Your FEEDBACK...(MAX 100 WORDS)."  class="desc" maxlength="100" name="feedback" required >
        <div class="sub">
          <input type="submit" value="SUBMIT"  class="btn">
        </div>
      </form>
    <ul class="action">
      <caption><strong> NOTE</strong></caption>
      <li>Immediate Actions will be taken In Any case of Passenger Harassment/Harsh Driving or any sort of Ill Behaviour... </li>
      <li>Unnecessary or ILLOGICAL Complains will not be taken into considerations.</li>
    </ul>
    </body>

</html>