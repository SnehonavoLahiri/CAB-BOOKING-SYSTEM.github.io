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
$desc=false;
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
$Email=$_SESSION['Name'];
$pass=$_POST["currentpassword"];
$Password = $_POST["Password"];
$cpassword = $_POST["cpassword"];
$_SESSION['word']=$Password;
// echo $_SESSION['word'];

// echo $Gender;
// $exists=false;

// // Check whether this username exists
$plsql = "SELECT * FROM signup WHERE EmailId='$Email'";
  $result = mysqli_query($conn, $plsql);
 $num = mysqli_num_rows($result);
  if($num != 1){
    $exists = true;
  }
  else{
//      $error = "Username Already Exists";
//  }
//  else{
  if($pass == $_SESSION['Password']){
    // $exists = false;
    // $mysql="SELECT * FROM signup WHERE Description='$Description'";
    // $res=mysqli_query($conn,$mysql);
    // $number=mysqli_num_rows($res);
    // // echo $number;
    // if($number==1){
    if(($Password == $cpassword)){
        // $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE signup SET Password='$Password' WHERE EmailID='$Email'";
        $result = mysqli_query($conn, $sql);
        if ($result){
        
            $alert = true;
            
            // header("location: Login.php");
        }
    }
     else{
         $error =true;
     }
 }
 else{
  $desc=true;
 }
}
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

  <title>Reset | RideNow</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="sign_up.css">
</head>
<style>
  body{
    font-weight: 800;
    /* height: 210px; */
  }
  .age {
    padding: 5px;
    display: inline-block;

    margin: 3px;
  }

  .age li {
    display: inline-block;

  }

  .ms-md-5 {
    margin-left: 11rem!important;
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
  footer{
    margin-top:100px;
  }
  .ms-md-5 {
    margin-left: 8rem!important;
}
</style>

<body>
<?php
if($alert){
echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulations!</strong> Your password has been RESET Successfully! Click here to go to  <a href="ride_sublogin.php">PROFILE</a>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($error){
  echo
  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Invalid Confirm Password!!</strong>Passwords DO NOT Match...
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($exists){
  echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Invalid EMAILID!!</strong> EmailID Doesnt Match,Please Enter Correct EmailID
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($desc){
  echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Invalid Credentials!!</strong> Passwords DO NOT Match...
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

  <header>
   
    <!--NAV START-->
    <div class="d-flex flex-column flex-md-row align-items-center pb-2 mb-4 border-bottom">
      <a href="/" class="d-lg-inline-flex align-items-center text-danger text-decoration-none"
        style="padding-left:30px; padding-right:700px;">
        <img src="Pictures/Ride Now (1).jpg" width="50px" height="50px">
        <h1 style="text-align: center; padding-left: 20px; font-style: oblique; color: rgb(59, 44, 132);">RideNow</h1>
      </a>
      <nav class="d-inline-flex  mt-2 mt-md-0 ms-md-5">
        <a class="mx-4 py-2 text-dark text-decoration-none" href="index.html"><i class="fas fa-home"></i></a>
      </nav> 
      <a class="mx-4 py-2 text-dark text-decoration-none"id="badge"style=" font-weight:700; font-size:30px; text-decoration:underline;"> <?php echo "Welcome,".strtoupper($_SESSION['username']); ?></a>
      <a href="logout.php"><i class="fas fa-power-off"></i></a> 
    </div>
  </header>
  <section>
    <h1 style="text-align: center;">Reset Password </h1>
    <form action="/CBS/update.php" method="POST">
      <div class="mb-1" style="width:50% ;margin-left:2%;">
      <label for="FormControl" class="form-label"><i class="fas fa-key"></i> Current password</label>
        <input type="password" class="form-control" maxlength="8" id="FormControl"
          placeholder="Enter Current Password" name="currentpassword" required>
        <label for="FormControl" class="form-label"><i class="fas fa-key"></i> Reset password</label>
        <input type="password" class="form-control" maxlength="8" id="FormControl"
          placeholder="Password should be 8 digited" name="Password" required>
        <label for="FormControl" class="form-label"><i class="fas fa-key"></i> Confirm password</label>
        <input type="password" class="form-control" maxlength="8" id="FormControl" name="cpassword"
          placeholder="Re-enter password" required>
          <!-- <label for="FormControl" class="form-label"><i class="fas fa-key"></i>Description</label><br>
        <input type="text" placeholder="Describe About You...(MAX 30 WORDS)"  class="desc" maxlength="100" name="Description" required > -->

      </div>
      <div class="mb-3" style=" margin-left:50%; margin-top: 20px; width: 216px;">
      <input type="submit" value="SUBMIT"  class="btn">
        <input type="reset" value="RESET" style=" width:90px;" class="btn">

      </div>
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
  <div class="d-flex justify-content-between py-4 my-4 border-top boxx">
    <p>&copy; 2022 Company, Inc. All rights reserved.</p>
  </div>
</footer>

</html>
