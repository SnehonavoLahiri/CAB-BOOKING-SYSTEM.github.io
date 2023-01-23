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
// echo"connected";
// echo $_SERVER['REQUEST_METHOD'] ; 
$Name = $_POST["Name"];
$lastName = $_POST["lastName"];
// echo $lastName;
$EmailID=$_POST["EmailID"];
$Phone=$_POST["Phone"];
$Gender=$_POST["Gender"];
$DOB=$_POST["DOB"];
$Password = $_POST["Password"];
$cpassword = $_POST["cpassword"];
$Description=$_POST['Description'];
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
    if(($Password == $cpassword)){
        // $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `signup` (`Name`,`lastname`,`EmailID`, `Phone`, `Gender`, `DOB`, `Password` , `Description`) VALUES ('$Name','$lastName', '$EmailID', '$Phone', '$Gender', '$DOB', '$Password' , '$Description')";
        $result = mysqli_query($conn, $sql);
        if ($result){
          
             $alert = true;
        //     echo '<script type="text/JavaScript"> 
        // alert("congratulations !Your account has been created!,");
        // </script> 
        // ';
        // header("location: Login.php");
        }
        else{
          echo"not inserted";
        }
    }
     else{
         $error =true;;
     }
 }
  //  }

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

  <title>SignUp | Ride Now</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="sign_up.css">
</head>
<style>
  body{
    font-weight:800;
  }
  .age {
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
  .desc{
    height: 126px;
    width: 550px;
  }
  .ms-md-5 {
    margin-left: 15rem!important;
  }
</style>

<body>
   <?php
if($alert){
echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> Your account has been created!Click here to <a href="Login.php">Login</a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($error){
  echo
  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Passwords do not match!!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($exists){
  echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> Mobile Number Already Exists,Please Use Another one!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?> 

<header>
    <!--NAV START-->
    <div class="d-flex flex-column flex-md-row align-items-center pb-2 mb-4 border-bottom">
      <a href="/" class="d-lg-inline-flex align-items-center text-danger text-decoration-none"
        style="padding-left:30px; padding-right:300px;">
        <img src="Pictures/Ride Now (1).jpg" width="50px" height="50px">
        <h1 style="text-align: center; padding-left: 20px; font-style: oblique; color: rgb(59, 44, 132);">RideNow</h1>
      </a>
      <nav class="d-inline-flex  mt-2 mt-md-0 ms-md-5">
        <a class="mx-4 py-2 text-dark text-decoration-none" href="index.html"><i class="fas fa-home"></i></a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="terms.html">Terms & Conditions</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="Aboutus.html"> About Us</a>
        <a class="mx-4 py-2 text-dark text-decoration-none" href="features.html">Features</a>
       
      </nav>
    </div>
  </header>
  <section>
    <h1 style="text-align: center;">Sign Up </h1>
    <form action="sign_up.php" method="POST">
      <div class="mb-1" style="width:50% ;margin-left:2%;">
        <label for="FormControl" class="form-label"><i class="fas fa-user-alt"></i>First Name</label>
        <input type="text" class="form-control " id="FormControl" placeholder="First Name" name="Name" name required>
        <label for="FormControl" class="form-label"><i class="fas fa-user-alt"></i>Last Name</label>
        <input type="text" class="form-control " id="FormControl" placeholder="Last Name" name="lastName" name required>
        <label for="FormControl" class="form-label"><i class="fas fa-envelope"></i> Email-address</label>
        <input type="email" class="form-control " id="FormControl" placeholder="xyz@example.com" name="EmailID"
          required>
        <label for="FormControl" class="form-label"><i class="fas fa-phone-volume"></i> Phone Number</label>
        <input type="tel" class="form-control " maxlength="10" id="FormControl" placeholder="xxxxxxxxxx" name="Phone"
          required>
        <div class="age">
          <label for="FormControl" class="form-label"><i class="fas fa-venus-mars"></i> Gender</label>
          <ul>
            <li><input type="radio" id="age1" value="Male" name="Gender"></a></li>
            <li><label for="FormControl">Male</label></a></li>
            <li><input type="radio" id="age2" value="Female" name="Gender"></a></li>
            <li><label for="FormControl">Female</label></a></li>
            <li><input type="radio" id="age3" value="Others" name="Gender"></a></li>
            <li><label for="FormControl">Others</label></a></li>
          </ul>
        </div>
        <br>
        <label for="FormControl" class="form-label"><i class="fas fa-calendar-alt"></i> DOB</label>
        <input type="date" class="form-control " id="FormControl" placeholder="Enter Your Date of birth" name="DOB"
          required>
        <label for="FormControl" class="form-label"><i class="fas fa-key"></i> Enter password</label>
        <input type="password" class="form-control" maxlength="8" id="FormControl"
          placeholder="Password should be 8 digited" name="Password" required>
        <label for="FormControl" class="form-label"><i class="fas fa-key"></i> Confirm password</label>
        <input type="password" class="form-control" maxlength="8" id="FormControl" name="cpassword"
          placeholder="Re-enter password" required>
          <label for="FormControl" class="form-label"><i class="fas fa-key"></i>Description(SECURITY KEY)</label><br>
        <input type="text" placeholder="Describe About You...(MAX 30 WORDS)"  class="desc" maxlength="100" name="Description" required >

      </div>
      <div class="mb-3" style=" margin-left:50%; margin-top: 20px; width: 216px;">
      <input type="submit" value="SUBMIT"  class="btn">
      
      <input type="reset" value="RESET" style=" width:90px;" class="btn">
      <p clcass="term" style=" width: 500px;
    margin-right: 121px;
    align-items: center;
    justify-content: center;
    padding: 7px;
" >By clicking on SUBMIT ,You Agree to the <a href="terms.html">Terms&Conditions</a>  of RideNow.</p>



    </form>
    </div>
    <script src="mailvalidate.js"></script>
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
  <div class="d-flex justify-content-between py-4 my-4 border-top">
    <p>&copy; 2022 Company, Inc. All rights reserved.</p>
  </div>
</footer>

</html>
