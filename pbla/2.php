<?php
$servername="localhost";
$username="root";
$password="";
$database="smartparking";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    die("sorry we are failed to connect".mysqli_connect_error());
}

$sql="SELECT * FROM 'smartparking'";
$result=mysqli_query($conn,$sql);



if($result==null)
{
    echo"There is no entriy ";

}
else
{
    if($result-> num_rows >0)
    {
        while($row=$result->fetch_assoc())
        {
            echo"<tr><td>";
				echo $row["Date"];
				echo "<tr><td>";
				echo $row["Time"];
				echo"<tr><td>";
				echo $row["Action"];
				echo "<tr><td>";
				echo $row["Numberplate"];
				echo "<tr><td>";

        }
    }

}















?>
