<?php

    $dbhost = "localhost";
    $username = "root";
    $password = "";
    $dbname = "new_cms";

    $conn = mysqli_connect($dbhost, $username, $password, $dbname);

    if($conn){
        
    } else {
        echo "Something went wrong";
    }

?>