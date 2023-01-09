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
$note=false;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$servername="localhost";
$username="root";
$password="";
$database="customer database";
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo"not connected";
}
else{
    // echo"connected";
}
// echo"connected";
// echo $_SERVER['REQUEST_METHOD'] ; 
$pickup = $_POST["pickup"];
$dropp=$_POST["dropp"];
$time=$_POST["time"];
$type=$_POST["type"];
$Email=$_SESSION['Name'];
$Phone=$_SESSION['Phone'];

// $Date=$_POST["Date"];
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
    
        // $hash = password_hash($password, PASSWORD_DEFAULT);
        $in="SELECT * FROM `signup` WHERE EmailID='$Email'";
        $result=mysqli_query($conn, $in);
        // $row=mysqli_fetch_assoc($in);
        $NUM=mysqli_num_rows($result);
        // if($row['EmailID']==$Email){
        if($NUM==1){
        $plsql="SELECT * FROM `book` WHERE type='$type'";
        $r=mysqli_query($conn,$plsql);
        
        if(!$r){
            echo" NOT retrivede";
        }
        $n=mysqli_num_rows($r);
        
        if($n>0){
          $alert=true;
          $note=true;
          // 
          
        
        $row=mysqli_fetch_assoc($r);
        //  while($row=mysqli_fetch_assoc($r)){
            // echo $row['cab_id'];
             $i=$row['cab_id'];
             $_SESSION['type']=$row['type'];
             $na=$_SESSION['username'];
             $_SESSION['driver_id']=$row['driver_id'];
             $_SESSION['cab_id']=$i;
             $_SESSION['car_name']=$row['car_name'];
             $_SESSION['Serial_No']=$row['Serial_No'];
             $sql = "INSERT INTO `view` (`pickup`, `dropp`, `type` , `EmailID` , `Phone` ,`time` , `cab_id` , `Name`) VALUES ('$pickup', '$dropp', '$type' , '$Email' ,'$Phone' , '$time', '$i' , '$na')";
             $result = mysqli_query($conn, $sql);
             if ($result){
              
                  // echo"inserted";
             }
             else{
               echo"not inserted";
             }
            //  echo"CAB BOOKED SUCCESSFULLY";
            

                //  echo $_SESSION['driver_id'];
                //  echo $_SESSION['cab_id'];
                //  echo $_SESSION['car_name'];
                //  echo $_SESSION['Serial_No'];
                // $row=mysqli_fetch_assoc($r);
                // echo $row['cab_id'];
                // $row=mysqli_fetch_assoc($r);
                // echo $row['cab_id'];


                  // $i=$row['cab_id'];
                  // echo $i;

             echo"<br>";
              $d="DELETE FROM `book` WHERE `book`.`cab_id` = '$i'";
              $dr=mysqli_query($conn,$d);
              if(!$dr){
               echo" noot successful";
              }
             
             }
            
            
            // $dr=mysqli_query($conn,$d);
            
        }
        else {
            echo"CAB NOT AVAILABLE RIGHT NOW";
        }

    }
    else{
        $error=true;
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

  <title>BookCab | RideNow</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="sign_up.css">
</head>
<style>
  body{
    font-weight: 800;
  }
  .cab {
    padding: 5px;
    display: inline-block;

    margin: 3px;
  }

  .age li {
    display: inline-block;

  }

  .age li a {
    color: black;
    padding: 7px;
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
             margin-left: 36rem!important;
             width:307px;
        }
        .boxx{
          margin-bottom:2px;
        }
 
    

</style>

<body>
   <?php
if($alert){
  echo '<script type="text/JavaScript"> 
  confirm("CAB Is AVAILABLE..Click OK to BOOK CAB");
  </script>';

}
// if($error){
//   echo
//   '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//   <strong>Username already exists!!</strong>' .$error.'

// </div>';
// }
if($note){
  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>BOOKING has been successful,</strong> Click here to go to  <a href="ride_sublogin.php">PROFILE</a>
  
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($exists){
  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> Mobile Number Already Exists,Please Use Another one!
  <button type="button" onClick="return confirmation()";>Click HERE!</button>
</div>';
}
// if($alert){
//   header("location:carbook.html");
//  }
?> 

  <header>
    <script>
      function confirmation(){
        var x=confirm("Click ok to cab book");
        if(x==true){
          return true;
        }
        else{
          return false;
        }
      }
      </script>
    <!--NAV START-->
    <div class="d-flex flex-column flex-md-row align-items-center pb-2 mb-4 border-bottom">
      <a href="/" class="d-lg-inline-flex align-items-center text-danger text-decoration-none"
        style="padding-left:30px; padding-right:300px;">
        <img src="Pictures/Ride Now (1).jpg" width="50px" height="50px">
        <h1 style="text-align: center; padding-left: 20px; font-style: oblique; color: rgb(59, 44, 132);">RideNow</h1>
      </a>
      <nav class="d-inline-flex  mt-2 mt-md-0 ms-md-5">
        <a class="mx-4 py-2 text-dark text-decoration-none" href="carbook.html"><i class="fas fa-home"></i></a>
        <!-- <a class="mx-4 py-2 text-dark text-decoration-none" href="home.html"><i class="fas fa-home"></i></a> -->
        <!-- <a class="mx-4 py-2 text-dark text-decoration-none" href="terms.html">Terms & Conditions</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="Aboutus.html"> About Us</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="features.html">Features</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="#"> Contact Us</a> -->
      </nav> 
      <a class="mx-4 py-2 text-dark text-decoration-none"id="badge"style=" font-weight:700; font-size:30px; text-decoration:underline; width:313px; paddinh-left:129px;" href="#"> <?php echo "Welcome,".strtoupper($_SESSION['username']); ?></a>
      <!-- <a href="logout.php"><i class="fas fa-power-off"></i></a> -->
    </div>
  </header>
  <section>
    <h1 style="text-align: center;">Book </h1>
    <form action="/CBS/bookcab.php" method="POST">
      <div class="mb-1" style="width:50% ;margin-left:2%;">
        <label for="FormControl" class="form-label"> Pick Up Location</label>
        <input type="location" class="form-control " id="FormControl" placeholder="Enter pick up location" name="pickup" required>
        <label for="FormControl" class="form-label"> Drop Location</label>
        <input type="location" class="form-control " id="FormControl" placeholder="Enter drop location" name="dropp" required>
        <!-- <label for="FormControl" class="form-label">Email-ID</label>
        <input type="email" class="form-control "  id="FormControl" placeholder="xyz@gmail.com" name="EmailID" required> -->
        <!-- <label for="FormControl" class="form-label"><i class="fas fa-calendar-alt"></i> DATE</label>
        <input type="date" class="form-control " id="FormControl" placeholder="Enter Date " name="Date"
          required> -->
        <label for="FormControl" class="form-label"> Time</label>
        <input type="time" class="form-control " id="FormControl" placeholder="Enter your preferred time" name="time"required>
        <div class="cab">
          <label for="FormControl" class="form-label"> Car Type</label><br>
          
            <input type="radio" id="cab1" value="mini_sedan" name="type">
            <label for="FormControl">Mini-Sedan</label><br>
            <input type="radio" id="cab2" value="SUV" name="type">
            <label for="FormControl">SUV</label>
          
        </div>
        <br>
      <div class="mb-3" style=" margin-left:50%; margin-top: 20px; width: 216px;">
        <input type="submit" value="BOOK CAB"  class="btn">
        <input type="reset" value="RESET" style=" width:90px;" class="btn">


    </form>
    </div>
  </section>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>
<footer>
  <div class="d-flex justify-content-between py-4 my-4 border-top boxx">
    <p>&copy; 2022 Company, Inc. All rights reserved.</p>
  </div>
</footer>

</html>