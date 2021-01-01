<?php
    //connect to the database
    $server = "localhost";
    $user = "root";
    $password = "";
    $db = "nerdsway";

    $conn = mysqli_connect($server,$user,$password,$db);

    if(!$conn){
        die("Connection to database failed. Error ==> " . mysqli_connect_error());
    }
    else{
        // echo "Connection to db successful";
    }
?>