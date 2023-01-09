<?php
$login=false;
$error=false;
 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
     
     
     
    $servername="localhost";
    $username="root";
    $password="";
    $database="customer database";
    $conn=mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        echo"not connected";
    }
        $EmailID = $_POST["EmailID"];
        $Password = $_POST["Password"];
    $sql = "SELECT * FROM signup WHERE EmailID='$EmailID' and Password= '$Password'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $num = mysqli_num_rows($result);
    // echo $num;
    
    if($num == 1){
        //   while($row=mysqli_fetch_assoc($result)){
            //          if(password_verify($Password,$row["Password"])){
                
                
                $login=true;
                session_start();
                $_SESSION['loggedin'] = true;
                $username=$row['Name'];
                $phnno=$row['Phone'];
                $pass=$row['Password'];
         $_SESSION['Name'] = $EmailID;
          $_SESSION['username']= $username;
          $_SESSION['Phone']= $phnno;
          $_SESSION['Password']= $pass;
           header("location: ride_sublogin.php");
            }
            else{
                $error=true;
            }
    }

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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-OXTEbYDqaX2ZY/BOaZV/yFGChYHtrXH2nyXJ372n2Y8abBhrqacCEe+3qhSHtLjy" crossorigin="anonymous"> -->
    
    <title>LOG IN| RIDE 24/7</title>
  </head>
  <style>
    body {
    margin: 0%;
    padding: 0%;
    background: url(Pictures/C3.jpg);
}
h1{
    font-size: 50px;
    font-weight: 300;
    font-style: normal;
    color: red;
    border-bottom: 2px rgb(128, 127, 127);
}

.box {
    border:  3px solid red;
    background-color: white;
    border-radius: 15px;
    border: 2px gray;
    display: inline-block;
    margin: 263px;
    margin-left: 551px;
    margin-top: 130px;
    text-align: center;
    width: 407px;
    height: 500px;

}
input{
    width: 340px;
    line-height: 28px;

}
.gap{
    width: 348px;
    text-align: center;
    margin-left: 30px;
    height: 2px;
    background-color: rgb(34, 34, 192);
}
.gap0{
    width: 348px;
    text-align: center;
    margin-left: 30px;
    height: 2px;
    background-color: rgb(34, 34, 192);
}
.forgot{
    margin-top: 34px;
}
.sign{
    margin-top: 25px;;
}
.sign label{
    font-size: 20px;
    margin-top: 20px;
}
.sign label a{
    text-decoration: none;
}
.gap1{
    margin-left: -43px;
    width: 10px;
    height: -1px;
    border-radius: 25px;
}
.gap1 input{
    text-align: center;
    width: 100px;
    height: 50px;

    margin-top: 20px;
    margin-left: 190px;
    background-color: rgb(36, 216, 204);
    border: none;
    border-radius: 25px;

}
button{
    background-color: aqua;
    margin: 50px 180px;
    border-radius: 25px;
    border-radius: 15px;
    width: 100px;
    height: 50px;
    text-align: center;
    padding: 2px 2px;
}
alertdan{
    background-color: brown;
}
  </style>
  <body>




<header>
<?php
if($login){
    echo
    '<div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:white; height: 70px; font-size:30px;text-align:center;padding-top:2px;">
    <strong>Success!</strong> You are logged in.
</div>';
  }
    if($error){
        echo '<script type="text/JavaScript"> 
        alert("INVALID EmailID OR Password,Enter Correct Credentials!");
        </script> 
        ';
    }
        
?>
</header>




    <div class="box">
        <form action="/CBS/Login.php" method="post">
        <h1>LOGIN</h1>
        <div class="username">
            <input type="text" placeholder="Username" name="EmailID" id="">
        </div>
        <div class="gap">

        </div>
        <div class="pass">
            <input type="password" placeholder="Password" name="Password" id="">
        </div>
        <div class="gap0">

        </div>
        <div class="gap1">
        <button type="submit">LOG IN</button>
        </div>
        <div class="forgot">
            <label for=""><a href="forgot.php">Forgot Password</a></label>
        </div>
        <div class="sign">
            <label for="">Don't Have an Account? <a href="sign_up.php">Sign up</a></label>
        </div>
        </form>
    </div>
</body>

</html>