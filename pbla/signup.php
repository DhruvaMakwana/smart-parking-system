
<?php 
require("connect.php");
?>
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

        .header {
            background-color: burlywood;
            font-size: larger;

             font:bolder;
            font-family: 'Times New Roman', Times, serif; 
           
            display: grid;
            grid-template-columns: auto auto auto auto auto auto auto auto auto;
        }
       #headcolor{
        font-size: 120%;
        font:bolder;
        font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      }

        .about {
            text-align: center;
            text-size-adjust: 25px;
        }

         .container{
                width: 500px;
                background-color: #fff;
                box-shadow: 0px 0px 20px #000;
                padding: 20px;
                text-align: center;
                margin: auto;
                margin-top: 50px;
            }
            .form-group{
               padding: 15px;
               margin :auto;
               font-size: large;

            }
            .form{
                  text-align: left;
                 background-color: #fff ; 
                margin-left: 20px;
                box-shadow: 0px 0px 20px;
                margin: auto;
                font-size: large;
                padding: 2px;
                margin-top: 25px;
            }
            .btn-block{
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
            .signup{
              font-size: large;
              font-family: inherit;
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
        <a id="headcolor" href="login.php" style="color:#000000;">Login</a>
        <a id="headcolor" href="about.php" style="color:#000000;">About Us</a>
    </div>

    <div class="Div2">
        <div class="container">
            <h1> Sign Up</h1>
            <form method="POST" action="">
                <div class="form">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password">
                </div>

                <div class="form-group">
                    <label>Confirm_Password</label>
                    <input type="password" name="cpassword" class="form-control" placeholder="Re-enter your password">
                </div>
                <div class="form-group">
                    <label>Car_model</label>
                    <input type="text" name="carmodel" class="form-control" placeholder="Enter car model">
                </div>
                <div class="form-group">
                    <label>Car_Number</label>
                    <input id="alpha" name="carnumber" type="text" pattern="[a-zA-Z0-9]+"  placeholder="Enter car number" required>
                </div>
                
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-block">Register</button>
                </div>
                <div class="signup">
                    <label for="signup">If you already  have an account </label>
                    <a href="login.php" style="color:rgb(55, 19, 139)">Sign In</a>
                
                </div>
            </form>
        </div>
    </div>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST["name"];
    $Email = $_POST["email"];
    $Password = $_POST["password"];
    $Confirm_Password = $_POST["cpassword"];
    $Car_model = $_POST["carmodel"];
    $Car_Number = $_POST["carnumber"];

    // Check if the password and confirm password match
    if ($Password !== $Confirm_Password) {
        echo "Error: Passwords do not match.";
    } else {
        // Insert the record into the database
        $sql = "INSERT INTO dbname (name, email, password, cpassword, carmodel, carnumber) VALUES ('$Name', '$Email', '$Password', '$Confirm_Password', '$Car_model', '$Car_Number')";
        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting the record: " . $conn->error;
        }
    }
}
?>


<?php
$conn->close();
?>
