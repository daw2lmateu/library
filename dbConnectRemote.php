<?php
    $conn = mysqli_connect('remotehost.es', 'dwes1234', 'test1234.', 'dweslibrary');

    if(!$conn){
        echo 'Connection error: ' . mysqli_connect_error();
    }
?>