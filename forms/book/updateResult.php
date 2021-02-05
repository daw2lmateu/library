<?php 
    if($userType <> 'admin') header("location: index.php"); 
?>

<div class="row">
            <?php
                if(isset($_POST['content'])){
                    $id = $_SESSION['id'];
                    $title = htmlspecialchars($_POST['title']);
                    $author = htmlspecialchars($_POST['author']);
                    $language = $_POST['language'];
                    $isbn = htmlspecialchars($_POST['isbn']);
                    $image = htmlspecialchars($_POST['image']);
                    $publicationYear = htmlspecialchars($_POST['publicationYear']);
                    $location = htmlspecialchars($_POST['location']);
                    $price = htmlspecialchars($_POST['price']);
                    $ebook = htmlspecialchars($_POST['ebook']);
                    $quantity =  htmlspecialchars($_POST['quantity']);
                    include('dbConnect.php');

                    $sql = "UPDATE `_31_books` SET image = '$image', isbn = '$isbn', author = '$author', title = '$title', 
                    author = '$author', publication_year = '$publicationYear', location_id = '$location', price = '$price', ebook = '$ebook', quantity = '$quantity' WHERE id = '$id'";

                    $result = mysqli_query($conn, $sql);
                    if($result === FALSE) { 
                        $_SESSION['message'] = "No se ha podido modificar el libro";
                        header("location: index.php");
                    }
                    else{
                        $_SESSION['message'] = "Libro editado con exito";
                        header("location: index.php");
                    }
                    mysqli_close($conn);
                }        
            ?>
</div>