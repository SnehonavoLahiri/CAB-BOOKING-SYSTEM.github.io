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
else{
    // echo"connected";
}
// echo"connected";
// echo $_SERVER['REQUEST_METHOD'] ; 
$pickup = $_POST["pickup"];
$dropp=$_POST["dropp"];
$time=$_POST["time"];
$type=$_POST["type"];
$Email=$_POST["EmailID"];
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
        
        if($n>1){
            $booking=true;
            $sql = "INSERT INTO `view` (`pickup`, `dropp`, `time`, `type` , `EmailID`) VALUES ('$pickup', '$dropp', '$time', '$type' , '$Email')";
            $result = mysqli_query($conn, $sql);
            if ($result){
              
                // echo"inserted";
            }
            else{
              echo"not inserted";
            }
            echo"CAB BOOKED SUCCESSFULLY";
            $row=mysqli_fetch_assoc($r);
            // while($row=mysqli_fetch_assoc($r)){
                //  echo $row['cab_id'];
                 $i=$row['cab_id'];
                //  echo $i;

            //     // echo"<br>";
             $d="DELETE FROM `book` WHERE `book`.`cab_id` =$i";
            //     // $dr=mysqli_query($conn,$d);
            // }
            
            
            // $dr=mysqli_query($conn,$d);
            
        }
        else {
            echo"CAB NOT AVAILABLE RIGHT NOW";
        }

    }
    else{
        $error=true;
    }
     
 
   }

?>

















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            border: 3px solid red;
            display: inline-block;
            width: 500px;
            height: 350px;
            margin: 218px 400px 400px 500px;
            
        }
        body{
            margin: 0;
            padding: 0%;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background: url("/Pictures/C2.jpg");
        }
        .box{
            margin: 30px auto;

            padding: 10px;
            align-items: center;
        }
        .box input{
            width: 300px;
        }
        .box1{
            margin: 30px auto;

            padding: 10px;
            align-items: center;
        }
        .btn{
            margin-left: 200px;
        }
    </style>
</head>
<body>
<?php 
if($error){
echo '<script type="text/JavaScript"> 
     alert("EmailId should be same");
     </script>'
;}
?>
    <div class="container">
        <form action="/CBS/book.php" method="post">
        <div class="box">
            <label for="">PICKUP LOCATION</label>
            <input type="text" name="pickup">
        </div>
        <div class="box">
            <label for="">DROP LOCATION</label>
            <input type="text" name="dropp">
        </div>
        <div class="box1">
            <label for="">TIME</label>
            <input type="text" name="time">
        </div>
        <div class="box1">
            <label for="">CAB TYPE</label>
            <input type="text" name="type" id="">
        </div>
        <div class="box1">
            <label for="">EMAILID</label>
            <input type="text" name="EmailID" id="">
        </div>
        <button class="btn">BOOK CAB</button>
    </form>
    </div>
</body>
</html>