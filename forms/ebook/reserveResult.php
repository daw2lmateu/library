<?php
    if($userType == 'guest') {
        header("location: index.php?content=Register"); 
    }

    if(isset($_POST['content'])){
        include('dbConnect.php');

        $bookId = $_POST['bookId'] ?? $_SESSION['bookId'] ;
        $reservedOn = date('Y-m-d H:i:s');
        
        $reserveId = $_POST['memberId'] ?? $userId;

        $insertedOn = date('Y-m-d H:i:s'); 
        $days =  7; // Ebooks are reserved for 7 days by default
        $endDate = date('Y-m-d', strtotime($insertedOn . ' + ' . $days . ' days'));
        $sql = "INSERT INTO `_31_reservationsEbook` (`id`, `member_id`, `book_id`, `end_date`) 
                    VALUES (NULL, '$reserveId', '$bookId', '$endDate')" ;
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        
        if($result === FALSE) { 
            $_SESSION['message'] = "Libro o usuario no existen";
            header("location: index.php");
        }
        else{
            $_SESSION['message'] = "Libro Electronico reservado con exito, <br> Puede leerlo en el menu de reservas Ebooks.";
            header("location: index.php");
        }
    }
?>
