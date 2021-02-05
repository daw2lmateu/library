<?php

    $conn = mysqli_connect('localhost', 'dwes1234', 'test1234', 'biblioteca');
    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }

?>