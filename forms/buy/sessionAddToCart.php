<?php
    if($userType != 'guest') {
        header("location: index.php?content=Login"); 
    }

    if(isset($_POST['content'])){

        $bookId = $_POST['id'] ?? $_SESSION['bookId'] ;
        $quantity = $_POST['quantity'];
        
        if(isset($_SESSION["shoppingCart"]))
        {
            $temp = json_decode($_SESSION["shoppingCart"], true);
            echo $temp;
            if (!isset($temp[$bookId]))
                $temp[$bookId] = $quantity;
        }
        else
        {
            $temp = [
                $bookId => $quantity,
            ];
        }

        $json = json_encode($temp, true);
        
        // cookies duran 30 dias
        $_SESSION["shoppingCart"] = $json;

        $_SESSION['message'] = "Libro añadido al carrito";
        header("location: index.php");
    }
?>


