<?php
    if($userType == 'guest') {
        header("location: index.php?content=Login"); 
    }

    if(isset($_POST['content'])){
        include('dbConnect.php');

        $bookId = $_POST['id'] ?? $_SESSION['bookId'] ;
        $quantity = $_POST['quantity'];
        
        $buyId = $_POST['memberId'] ?? $userId;

        $sql = "SELECT * FROM _31_shoppingCart
        WHERE member_id = '$buyId' AND book_id = '$bookId'";

        $result = mysqli_query($conn, $sql);
        $cart = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        if (empty($cart))
        { 
            $sql = "INSERT INTO `_31_shoppingCart` (`id`, `member_id`, `book_id`, `quantity`) 
                        VALUES (NULL, '$buyId', '$bookId', '$quantity')";
            $result = mysqli_query($conn, $sql);
        }
        else 
        {
            // La cantidad ya esta a 1 y se puede aumentar desde el carrito.

            // $cartId = $cart[0]['id'];
            // $sql = "UPDATE `_31_shoppingCart` SET quantity = quantity+1 WHERE id = '$cartId'";
            // $result = mysqli_query($conn, $sql);
        }
        
        if($result === FALSE) { 
            mysqli_close($conn);
            $_SESSION['message'] = "Libro o usuario no existen";
            header("location: index.php");
        }
        else{
            // $sql = "UPDATE `_31_books` SET quantity = quantity-1 WHERE id = '$bookId'"; // TODO MAKE CALENDAR
            // mysqli_query($conn, $sql);
            mysqli_close($conn);
            $_SESSION['message'] = "Libro añadido al carrito";
            header("location: index.php");
        }
    }
?>


