<?php
    if($userType == 'guest') {
        header("location: index.php?content=Login"); 
    }

    if(isset($_POST['content'])){
        include('dbConnect.php');

        $buyId = $_POST['memberId'] ?? $userId;

        $sql = "SELECT * FROM _31_shoppingCart
        WHERE member_id = '$buyId'";

        $result = mysqli_query($conn, $sql);
        $cart = mysqli_fetch_all($result, MYSQLI_ASSOC);

        mysqli_free_result($result);

        $orderTotal = 0;
        $sqlInsert = "INSERT INTO `_31_orders` (`member_id`, `book_id`, `price`, `quantity`, `date`) VALUES";

        foreach($cart as $item){
            $bookId = $item['book_id'];
            $sql = "SELECT * FROM _31_books
                            WHERE id = '$bookId'" ;
            $result = mysqli_query($conn,$sql);
            $book = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            $quantity = $item['quantity'];
            $price = $book[0]['price'];
            $maxQuantity = $book[0]['quantity'];

            if($quantity < 1) {
                continue;
            }
            if($quantity > $maxQuantity){
                mysqli_close($conn);
                $_SESSION['message'] = "Lo sentimos, uno de los libros ya no se encuentra en stock.";
                header("location: index.php");
            }
            $total = $price * $quantity;
            $orderTotal += $total;
            $insertedOn = date('Y-m-d H:i:s');

            $sqlInsert .= " ('$buyId', '$bookId', '$price', '$quantity', '$insertedOn'),";

            $sql = "DELETE FROM `_31_shoppingCart` WHERE member_id = '$buyId'";
            $result = mysqli_query($conn, $sql);
            
            // delete shopping cart from cookies
            if($cookiesEnabled && isset($_COOKIE[$cookies]))
            {
                setcookie($cookies, $_COOKIE[$cookies], time() - 3600, "/");
            }

            $sql = "UPDATE `_31_books` SET quantity = quantity-$quantity WHERE id = '$bookId'";
            mysqli_query($conn, $sql);
        }
        // TODO  ------ CODIGO QUE REALIZA LA COMPRA
        // TODO  ------ CODIGO QUE REALIZA LA COMPRA
        // TODO  ------ CODIGO QUE REALIZA LA COMPRA
        // TODO  ------ CODIGO QUE REALIZA LA COMPRA

        $sqlInsert =  rtrim($sqlInsert, ",");
        $sqlInsert .= ";";
        $result = mysqli_query($conn, $sqlInsert);

        
        mysqli_close($conn);
        if($result === FALSE) {
            $_SESSION['message'] = $_SESSION['message'] . "Ha habido un error al realizar la compra.";
            header("location: index.php");
        }
        else{
            $_SESSION['message'] = "Compra finalizada con exito por " . $orderTotal . " euros.";
            header("location: index.php");
        }
        
    }
?>


