<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
</head>

<body>
    <div class="container">
        <h1>1st php file</h1>
        <?php
            echo"welcome";
            ?>
            
</body>
<?php

$severname="localhost";
  $username="root";
  $password="";
  $database="smartparking";
  //create connection 
  $conn=mysqli_connect($severname,$username,$password,$database);
  if(!$conn)
      die("sorry we are failed to connect".mysqli_connect_error());

$query1=mysqli_query($conn,"SELECT * FROM `smartparking`");
while($row=$query1->fetch_assoc())
{
?>
<tr>
<td><?php echo $row['Date']?></td>
<td><?php echo $row['Time']?></td>
<td><?php echo $row['Action']?></td>
<td><?php echo $row['numberplate']?></td>
</tr>
<?php } ?>