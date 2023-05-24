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

        .header{
            background-color: burlywood;
            font-size: larger;
            display:grid;
            grid-template-columns: auto auto auto auto auto auto auto auto auto;
        }

        .about{
            text-align: center;
            margin-top: 20px;
            padding-top: 60px;
            
                }
         .info{
                    font-style: normal;
                    font-size: large;
                    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                }
      #headcolor{
        font-size: 120%;
        font:bolder;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
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
        <a id="headcolor" href="home.php"style=" color:#000000;">Home</a>
       <a id="headcolor" href="exitrecords.php" style="color:#000000;">Exit Records</a>
        <a id="headcolor" href="about.php" style="color:#000000;">About Us</a>
    </div>
    
    <div class="about">
        <h1>This is the smart parking system Webpage</h1>
        <h3>created by:</h3>
        <p class="info"> 1. Utkarsh Gharage</p>
        <p class="info"> 2.Rushabh Sawant</p>
        <p class="info"> 3.Dhruva Makwana</p>
        <p class="info"> 4.Rajvardhansingh Rajput</p>
    </div>
    </html>