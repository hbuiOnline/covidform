<?php

    $dbServername = "remotemysql.com";
    $dbUsername = "66kQPlk8Vv";
    $dbPwd = "ubFfcJicob";
    $dbName = "66kQPlk8Vv";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPwd, $dbName);

    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
