<?php
    $conn = new mysqli("localhost", 'root', '','recipies','3390');
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
?>