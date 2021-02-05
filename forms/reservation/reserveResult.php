<?php
    if($userType == 'guest') {
        header("location: index.php?content=Register"); 
    }

    if(isset($_POST['content'])){
        include('dbConnect.php');

        $bookId = $_POST['bookId'] ?? $_SESSION['bookId'] ;
        $reservedOn = $_POST['date']; // TODO Check if it's available when it's reserved ( need calendar of books and if their available or not )
        
        $reserveId = $_POST['memberId'] ?? $userId;

        $insertedOn = date('Y-m-d H:i:s'); 
        $days =  $_POST['days'];
        $endDate = date('Y-m-d', strtotime($_POST['date']. ' + ' . $days . ' days'));
        $sql = "INSERT INTO `_31_reservations` (`id`, `member_id`, `book_id`, `start_date`, `end_date`, `return_date`, `reserved_on`) 
                    VALUES (NULL, '$reserveId', '$bookId', '$reservedOn', '$endDate', NULL ,  '$insertedOn')" ;
        $result = mysqli_query($conn, $sql);
        
        if($result === FALSE) { 
            mysqli_close($conn);
            $_SESSION['message'] = "Libro o usuario no existen";
            header("location: index.php");
        }
        else{
            $sql = "UPDATE `_31_books` SET quantity = quantity-1 WHERE id = '$bookId'"; // TODO MAKE CALENDAR
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            $_SESSION['message'] = "Libro reservado con exito";
            header("location: index.php");
        }
    }
    ?>


