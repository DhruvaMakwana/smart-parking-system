
<?php
require("connect.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["email"];
    $Password = $_POST["password"];

    // Retrieve the user record from the database
    $sql = "SELECT * FROM dbname WHERE email = '$Email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result === false) {
        // Query execution failed, handle the error
        die("Error executing the query: " . $conn->error);
    }

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $storedPassword = $row["password"];

        // Verify the password
        if (password_verify($Password, $storedPassword)) {
            // Password is correct, create a session
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_email"] = $row["email"];
            // Redirect to the desired page
            header("Location: home.php");
            exit();
        } else {
            // Invalid password
            $errorMessage = "Invalid email or password.";
        }
    } else {
        // User not found
        $errorMessage = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS styles for your login page */
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
    </style>
</head>
<body>
    <div class="Div1">
        <title>Smart Parking System</title>
        <div class="park_logo">
            <img src="logo1.png">
        </div>
        <img src="https://lh3.googleusercontent.com/N8LxEaBwVEQ_B31XdQL1_NZ-4QbGK2Jhpvp1i_wJ3HFJASijQtU6BPnGGmSNwF9K_j9lExWOvnT4L96PNH0Vaq4lJM5Qga0_ukTl8g">
    </div>
    <div class="header">
        <a></a>
        <a></a>
        <a></a>
        <a id="headcolor" href="home.php" style="color:#000000;">Home</a>
        <a id="headcolor" href="login.php" style="color:#000000;">Login</a>
        <a id="headcolor" href="about.php" style="color:#000000;">About Us</a>
    </div>
    <div class="div2"></div>
    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="">
            <div class="username">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter email" required>
            </div>
            <div class="password">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn-primary">Login</button>
            <div class="signup">
                <label for="signup">If you do not have an account </label>
                <a href="signup.php" style="color:rgb(55, 19, 139)">Signup</a>
            </div>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
