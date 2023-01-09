<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: Login.php");
    exit;
}



?>


<?php
$error=false;
$servername="localhost";
$username="root";
$password="";
$database="customer database";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo"not connected";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$EmailID=$_POST["EmailID"];
// $in="SELECT * FROM `signup` WHERE EmailID='$Email'";
//         $result=mysqli_query($conn, $in);
//         $row=mysqli_fetch_assoc($in);
}
?>








<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Ride History | Ride Now</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="#">
</head>
<style>
    body{
      background:white;
    }
    .box2{
        background:url("c2.jpg");
    }
    tr{
        margin: 30px;
        padding: 30px;
        border: 2px solid black;
            }
    h1{
        margin-left: 287px;
    }
    .box{

    }
    label{
        font-size: 40px;
        margin-left: 300px;
        font-weight: 200;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

    }
    #email{
        margin-left: 300px;
        height: 40px;
        padding-top: 3px;
        box-sizing: border-box;
        margin-top: 26px;
        border-top:transparent;
        width: 800px;

    }
    button{
        margin-left: 600px;
        margin-top: 50px;
        width: 177px;
        height: 65px;
        padding: 20px;
        font-weight: 400;
    }
    button text{
        font-size: 20px;
    }
    table{
        margin-top: 33px;
        margin-left: 15px;
        display: inline-block;
        width: 1200px;
    }
    tbody, td, tfoot, th, thead, tr {
        width: 1200px;
        border-radius: 2px solid black;
    }
    th{
        font-size: 35px;
    }
    td{
        font-size: 15px;
    }
    .btn{
    /* border: 2px solid red; */
    background-color: black;
    border-radius: 10px;
    display: inline;
    font-weight: 400;
    color: white;

  }
  .ms-md-5 {
    margin-left: 7rem!important;
  }
 
</style>

        <?php
        if($error){
            echo
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalid credentials!!</strong>Passwords DO NOT Match...
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
<body>
<header>
    <!--NAV START-->
    <div class="d-flex flex-column flex-md-row align-items-center pb-2 mb-4 border-bottom">
      <a href="/" class="d-lg-inline-flex align-items-center text-danger text-decoration-none"
        style="padding-left:30px;padding-right: 327px; padding-right:300px;">
        <img src="Pictures/Ride Now (1).jpg" width="50px" height="50px">
        <h1 style="text-align: center; padding-left: 20px;margin-left:20px; font-style: oblique; color: rgb(59, 44, 132);">RideNow</h1>
      </a>
      <nav class="d-inline-flex  mt-2 mt-md-0 ms-md-5">
        <a class="mx-4 py-2 text-dark text-decoration-none" href="carbook.html"><i class="fas fa-home"></i></a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="terms.html">Terms & Conditions</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="Aboutus.html"> About Us</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="features.html">Features</a>
       
      </nav> 
      <a class="mx-4 py-2 text-dark text-decoration-none"id="badge"style=" font-weight:700; font-size:30px; text-decoration:underline;" href="#"> <?php echo strtoupper($_SESSION['username']); ?></a> 
      <a href="logout.php"><i class="fas fa-power-off"></i></a>
    </div>
  </header>
    <!-- <div class="box2">
    <form action="/CBS/view_history.php" method="post">
        
            <h1>Please Enter Your EmailID to View Your Booking History!!</h1>
            <label for="">EMAIL-ID</label><br>
            <input type="text" name="EmailID" id="email">
        </div>
        <button class="btn">SUBMIT</button>
    </form> -->
    <!-- <caption>VIEW HISTORY</caption> -->
    <table class="table table-striped">
        
        <thead>
        <tr>
            <th>PICKUP LOCATION</th>
            <th>DROP LOCATION</th>
            <th>TIME</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // $EmailID=$_POST["EmailID"];

        $i=$_SESSION['Name'];
        $sql="SELECT * FROM view WHERE EmailID='$i'";
        $result=mysqli_query($conn,$sql);
        if(!$result){
            echo"no view";
        }
        $n=mysqli_num_rows($result);
        if($n<1){
            $error=true;
            echo
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invalid credentials!!</strong>Passwords DO NOT Match...
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        $row=mysqli_fetch_assoc($result);
        // echo var_dump($row);
        while($row=mysqli_fetch_assoc($result)){
            // echo $row["pickup"];
      echo"<tr>
            <td>".$row['pickup']."</td>
            <td>".$row['dropp']."</td>
            <td>".$row['time']."</td>
        </tr>";
        }
        ?>
    </tbody>
    </table>
    </div>
</body>

</html>