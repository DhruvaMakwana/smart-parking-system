<?php
        $Severname="localhost";
        $username="root";
        $password="";
        $database="dbname";

        $conn=new mysqli($Severname,$username,$password,$database);
        if($conn->connect_error)
        {
            die("connection failed:".$conn->conn_error);
        }

    ?>