<?php
    if($userType != 'guest') {
        header("location: index.php?content=Login"); 
    }

    if(isset($_POST['content'])){

        $bookId = $_POST['id'] ?? $_SESSION['bookId'] ;

        $temp = json_decode($_COOKIE[$cookies], true);

        unset($temp[$bookId]);

        $json = json_encode($temp);

        // se reinicia el tiempo de las cookies 30 dias
        setcookie($cookies, $json, time() + 86400 * 30, "/");

        $_SESSION['message'] = "Libro borrado del carrito";
        header("location: index.php?content=Carrito");
    }
?>

