<?php
    if($userType != 'guest') {
        header("location: index.php?content=Login"); 
    }

    if(isset($_POST['content'])){

        $bookId = $_POST['id'] ?? $_SESSION['bookId'] ;

        $temp = json_decode($_SESSION["shoppingCart"], true);

        unset($temp[$bookId]);

        $json = json_encode($temp);

        // se reinicia el tiempo de las cookies 30 dias
        $_SESSION["shoppingCart"] = $json;

        $_SESSION['message'] = "Libro borrado del carrito";
        header("location: index.php?content=Carrito");
    }
?>

