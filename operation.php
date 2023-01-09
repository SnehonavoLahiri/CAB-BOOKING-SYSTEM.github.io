<?php
{
    {
             $sql = "INSERT INTO `view` (`pickup`, `dropp`, `time`, `type` , `EmailID` , `Date`) VALUES ('$pickup', '$dropp', '$time', '$type' , '$Email' , '$Date')";
             $result = mysqli_query($conn, $sql);
             if ($result){
              
                  echo"inserted";
             }
             else{
               echo"not inserted";
             }
             echo"CAB BOOKED SUCCESSFULLY";
            

            $row=mysqli_fetch_assoc($r);
            //  while($row=mysqli_fetch_assoc($r)){
                // echo $row['cab_id'];
                 $i=$row['cab_id'];
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
        ?>