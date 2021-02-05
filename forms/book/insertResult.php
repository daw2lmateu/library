<?php 
    if($userType <> 'admin') header("location: index.php"); 
?>

<div class="row">
            <?php
                if(isset($_POST['content']) && $userType == 'admin'){
                    $title = htmlspecialchars($_POST['title']);
                    $author = htmlspecialchars($_POST['author']);
                    $language = $_POST['language'];
                    $isbn = htmlspecialchars($_POST['isbn']);
                    $image = htmlspecialchars($_POST['image']);
                    $publicationYear = htmlspecialchars($_POST['publicationYear']);
                    $location = htmlspecialchars($_POST['location']);
                    $ebook = htmlspecialchars($_POST['ebook']);
                    $price = htmlspecialchars($_POST['price']);
                    $quantity = htmlspecialchars($_POST['quantity']);
                    $insertedOn = date('Y-m-d H:i:s');  
                    include('dbConnect.php');
                    
                    $sql = "INSERT INTO `_31_books` ( `image`, `isbn`, `title`, `author`,`publication_year`, `insertedOn`, `location_id`, `language`, `ebook`, `price`, `quantity`) 
                    VALUES('$image', '$isbn', '$title', '$author', '$publicationYear', '$insertedOn', '$location','$language', '$ebook', '$price', '$quantity')" ;

                    $result = mysqli_query($conn, $sql);
                    if($result === FALSE) { 
                        $_SESSION['message'] = "Ha habido un error al insertar el libro";
                        header("location: index.php");
                    }
                    else{
                        $_SESSION['message'] = "Libro insertado con exito";
                        header("location: index.php");
                    }
                    mysqli_close($conn);
                }
            ?>
</div>