


<!DOCTYPE html>
<html>

<head>

    <style>
        body {
            overflow-x: hidden;

        }

        .Div1 {
            margin: -10px;
            background-color: burlywood;
            display: grid;
            grid-template-columns: auto auto;
            padding-top: 20px;
            padding-bottom: 20px;
            justify-items: left;
            column-gap: 200px;
        }

        .div2{
            padding-top: 100px;
        }

        .header{
            background-color: burlywood;
            font-size: larger;
            font: bold;
            font-family:'Times New Roman', Times, serif;
            display:grid;
            grid-template-columns: auto auto auto auto auto auto auto auto auto;
        }
         body{
                background-color: #f2f2f2;
            }
            .container{
                width: 490px;
                height: 330px;
                background-color: #fff;
                box-shadow: 0px 0px 20px #000;
                padding: 20px;
                text-align: center;
                margin: auto;
                margin-top: 50px;
            }
            .form-control{
                width: 300px;
                font-size:medium;   
            }

            .username{
                text-align: center;
                background-color: #fff ;
                box-shadow: 0px 0px 20px;
                margin: auto;
                font-size: large;
                padding: 40px;

                margin-top: 25px;
                margin-left: 10px;
                margin-right: 10px;
            }

            .btn-primary{
                background-color: #2c9f31;
                  border: none;
                  color: white;
                  padding: 15px 32px;
                  text-align: center;
                  text-decoration: none;
                  display: inline-block;
                  font-size: 16px;
                  margin: 4px 2px;
                  cursor: pointer;
                  border-radius: 8px;
            }

            .password{
                text-align: center;
                background-color: #fff ;
                /* box-shadow: 0px 0px 20px; */
                margin: auto;
                font-size: large;
                margin-top: 25px;

            }
            #headcolor{
        font-size: 120%;
        font:bolder;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      }
      .signup{
        font-size: large;
        font-family: inherit;
      }
      .table_box{
        display: flex;
        justify-content: center;
        padding: 5px;
        border-radius: 14px;
        box-shadow: 2px 2px 20px 5px rgba(0, 0, 0, 0.468);        
        width:500px;
        margin: 0px 32vw;

      }
      .table_b{
        width:500px;
      }
      table {
  font-family: Arial, sans-serif;
  width:500px;
  /* border-collapse: collapse; */
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
    </style>
</head>

<body>


    <div class="Div1">
        <title>Smart Parking System</title>
        <div class="park_logo">
            <img src=logo1.png>
        </div>

        <img
            src=https://lh3.googleusercontent.com/N8LxEaBwVEQ_B31XdQL1_NZ-4QbGK2Jhpvp1i_wJ3HFJASijQtU6BPnGGmSNwF9K_j9lExWOvnT4L96PNH0Vaq4lJM5Qga0_ukTl8g>

    </div>
    <div class="header">
        <a></a>
        <a></a>
        <a></a>
        <a id="headcolor" href="home.php" style=" color:#000000;">Home</a>
        <a id="headcolor" href="exitrecords.php" style="color:#000000;">Exit Records</a>
        <a id="headcolor" href="about.php" style="color:#000000;">About Us</a>
    </div>
    <h2>Exit Record</h2>
<div class="table_box">
  <div class=".table_b">
    <table>
    <tr>
      <th style="width: 80px;">Serial No.</th>
      <th>Car Number</th>
      <th>Time-Date</th>
    </tr>
    <?php
        $Severname="localhost";
        $username="root";
        $password="";
        $database="parking";

        $conn=new mysqli($Severname,$username,$password,$database);
        if($conn->connect_error)
        {
            die("we will connect you soon".$conn->conn_error);
        }
// Assuming you have a database connection, perform a query to fetch the exit records
$sql = "SELECT serialno,carnumber,datetimes FROM parking";
$result = $conn->query($sql);

// Check if the query was successful
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["serialno"]. "</td><td>" . $row["carnumber"] . "</td><td>"
. $row["datetimea"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
?>
    </table>
  </div>
</div>
</body>
    </html>