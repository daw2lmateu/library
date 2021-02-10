<?php
    if($userType <> 'admin') header("location: index.php"); 

    if(isset($_GET['id'])){ 
        include('dbConnect.php');
        $id = ($_GET['id']);
        //session_start();
        $_SESSION['id'] = $id;
        $sql = "SELECT * FROM _31_books
                WHERE id = '$id'" ;
        $result = mysqli_query($conn, $sql);
        $book = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
        ?>
        <section class="container green-text">
            <h4 class="center">Modificar Libro</h4>
            <form class="white" action="index.php" method="POST">
                <!-- <label>ID</label>
                <input type="number" name="id" value="<?php echo $id; ?>" required> -->
                <label>Titulo</label>
                <input type="text" name="title" value="<?php echo $book[0]['title']; ?>" required>
                <label>Nombre del Autor</label>
                <input type="text" name="author" value="<?php echo $book[0]['author']; ?>">
                <label>ISBN</label>
                <input type="text" name="isbn" value="<?php echo $book[0]['isbn']; ?>">
                <label>Año de publicación</label>
                <input type="number" name="publicationYear" value="<?php echo $book[0]['publication_year']; ?>">
                <label>Link de la imagen</label>
                <input type="text" name="image" value="<?php echo $book[0]['image']; ?>">
                <label>nombre del pdf (ebook)</label>
                <input type="text" name="ebook" value="<?php echo $book[0]['ebook']; ?>">
                <label>Precio</label>
                <input type="text" name="price" value="<?php echo $book[0]['price']; ?>">
                <label>Cantidad</label>
                <input type="text" name="quantity" value="<?php echo $book[0]['quantity']; ?>">
                <div class="center">
                    <img src="<?php echo $book[0]['image']; ?>" alt="" class="center">
                </div>
                <hr>
                <label>Location ID</label>
                <input type="number" name="location" value="<?php echo $book[0]['location_id']; ?>" required>
                <div class="center">
                    <label>Idioma</label>
                    <p class="center">
                        <label>
                        <input class="with-gap" value="spanish" name="language" type="radio" <?php if ($book[0]['language'] == "spanish") echo('checked'); ?> />
                        <span>Español</span>
                        </label>
                        <label>
                        <input class="with-gap" value="catalan" name="language" type="radio" <?php if ($book[0]['language'] == "catalan") echo('checked'); ?>/>
                        <span>Catalan</span>
                        </label>
                        <label>
                        <input class="with-gap" value="english" name="language" type="radio" <?php if ($book[0]['language'] == "english") echo('checked'); ?>/>
                        <span>Inglés</span>
                        </label>
                    </p>
                </div>
                <hr>
                <br><br><br>
                <div class="center">
                    <input type="submit" name="content" value="Update" class="btn brand z-depth-0">
                </div>
            </form>
        </section>
<?php
    } 
    else { ?>
        <section class="container green-text">
            <h4 class="center">Modificar Libro</h4>
            <form class="white" action="index.php" method="GET">
                <label>Libro ID</label>
                <input type="number" name="id" required>
                <div class="center">
                            <input type="submit" name="content" value="Editar" class="btn brand z-depth-0">
                </div>
        <?php
    }
?>



