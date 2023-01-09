<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
    header("location: Login.php");
    exit;
}



?>
<?php
$login=false;
$error=false;
$alert=false;
//  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
     
     
     
  $servername="localhost";
  $username="root";
  $password="";
      $database="customer database";
    $conn=mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        echo"not connected";
    }

    if(isset($_GET['delete'])){
      $book_no = $_GET['delete'];
      //  echo $book_no;
       $delete = true;
       $sql = "DELETE FROM `view` WHERE `book_no` = $book_no";
       $result = mysqli_query($conn, $sql);
       if($result){
        $alert=true;
       }
    }
    
    // echo"connected";
     $type=$_SESSION['drivertype'];
    // echo $type;
    $sql="SELECT * FROM `view` WHERE type='$type'";
    $result=mysqli_query($conn,$sql);
    $n=mysqli_num_rows($result);
    // echo $n;
    if(!$result){
        echo"not found";
    }
    // $customername=$_SESSION['username'];
    // $customerphone=$_SESSION['Phone'];
    // $driverid= $_SESSION['driverid'];
    // echo $driverid;
    // $insert = "INSERT INTO `suv` (`pickup`, `dropp` ,`time` , `customername` , `customerphone`,`driver_id`) VALUES ('$pickup', '$dropp','$time', '$i' , '$na')";
    // $result = mysqli_query($conn, $sql);

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
<style>
  .table thead th{
    background-image: linear-gradient(#fff, #ccc);
  }
</style>
<body>
  <header>
    <?php
  if($alert){
echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
  Your Drive has been ALLOTED FOR respective BOOK ID!<strong>Have a safe journey!!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
</header>
    
<!-- Accept Modal -->
<div class="modal fade" id="acceptModal" tabindex="-1" role="dialog" aria-labelledby="acceptModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="acceptModalLabel">Allot Your Drive</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      </div>
    </div>
  </div>



<table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">Book ID</th>
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
    $sno=0;
  while($row=mysqli_fetch_assoc($result)){
    $sno = $sno + 1;     
      echo"<tr>
      
      <td>".$row['book_no']."</td>
            <td>".strtoupper($row['Name'])."</td>
            <td>".$row['pickup']."</td>
            <td>".$row['dropp']."</td>
             <td>".$row['time']."</td>
             <td>".$row['Phone']."</td>
             <td><button class='delete btn btn-sm btn-success' id=d".$row['book_no']."> ACCEPT</button>  <button class='accept btn btn-sm btn-warning'>REJECT</button>
        </tr>";
        }
?>
  </tbody>
</table>


<script > 
      deletes = document.getElementsByClassName('delete');
     Array.from(deletes).forEach((element) => {
       element.addEventListener("click", (e) => {
         console.log("edit ");
         book_no = e.target.id.substr(1);

         if (confirm("Drive will be ALLOTED for you.Click OK to Continue!")) {
           console.log("yes");
           window.location = `/CBS/cab.php?delete=${book_no}`;
           
         }
         else {
           console.log("no");
         }
       })
     }) 
  </script>

</body>
</html>