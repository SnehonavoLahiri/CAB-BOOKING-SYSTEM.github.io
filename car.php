<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: Login.php");
    exit;
}



?>








<?php
$login=false;
$error=false;
//  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
     
     
     
    $servername="localhost";
    $username="root";
    $password="";
    $database="customer database";
    $conn=mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        echo"not connected";
    }
    // echo"connected";
    $type=$_SESSION['type'];
    $sql="SELECT * FROM `view` WHERE type='$type'";
    $result=mysqli_query($conn,$sql);
    $n=mysqli_num_rows($result);
    // echo $n;
    if(!$result){
        echo"not found";
    }
    // else{
    //      $row=mysqli_fetch_assoc($result);
    //       while($row=mysqli_fetch_assoc($result)){
    //         $pickup=$row['pickup'];
    //         $dropp=$row['dropp'];
    //         $time=$row['time'];
    //         $phone=$row['Phone'];
    //         // // $name=$row['Name'];
    //          $username=$row['EmailID'];
    //         echo $username;
    //         echo"<br>";

    //     }
    //  }
// }
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
  <link rel="stylesheet" href="#">
</head>
<body>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Customer Name</th>
      <th scope="col">Pickup Location</th>
      <th scope="col">Drop Location</th>
      <th scope="col">Time</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
  while($row=mysqli_fetch_assoc($result)){
            // echo $row["pickup"];
      echo"<tr>
            <td>".$row['Name']."</td>
            <td>".$row['pickup']."</td>
            <td>".$row['dropp']."</td>
            // <td>".$row['time']."</td>
            // <td>".$row['Phone']."</td>
        </tr>";
        }
?>
  </tbody>
</table>
</body>
</html>