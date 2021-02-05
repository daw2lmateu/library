<?php
    if($userType == 'guest') {
        header("location: index.php?content=Login"); 
    }

    if(isset($_POST['content'])){
        include('dbConnect.php');

        $bookId = $_POST['id'];
    
        $buyId = $_POST['memberId'] ?? $userId;

        $sql = "DELETE FROM _31_shoppingCart 
        WHERE member_id = '$buyId' AND book_id = '$bookId'";

        $result = mysqli_query($conn, $sql);
        
        if($result === FALSE) { 
            mysqli_close($conn);
            $_SESSION['message'] = "Error al borrar libro del carrito";
            header("location: index.php?content=Carrito");
        }
        else{
            mysqli_close($conn);
            $_SESSION['message'] = "Libro quitado del carrito.";
            header("location: index.php?content=Carrito");
        }
    }
?>