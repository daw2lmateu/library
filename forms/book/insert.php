<?php 
    if($userType <> 'admin') header("location: index.php"); 
?>

<section class="container green-text">
    <h4 class="center">Insertar Libro</h4>
    <form class="white" action="index.php" method="POST">
        <label>Titulo</label>
        <input type="text" name="title" required>
        <label>Nombre del Autor</label>
        <input type="text" name="author">
        <label>ISBN</label>
        <input type="text" name="isbn">
        <label>Fecha de publicación</label>
        <input type="date" name="publicationYear">
        <label>Link de la imagen</label>
        <input type="text" name="image">
        <label>Location ID</label>
        <input type="number" name="location" required>
        <label>Precio</label>
        <input type="number" name="price" required>
        <label>Cantidad</label>
        <input type="number" name="quantity" required>
        <label>Ebook</label>
        <input type="text" name="ebook">
        <div class="center">
            <label>Idioma</label>
            <p>
                <label>
                <input class="with-gap" value="spanish" name="language" type="radio" checked />
                <span>Español</span>
                </label>
                <label>
                <input class="with-gap" value="catalan" name="language" type="radio"/>
                <span>Catalan</span>
                </label>
                <label>
                <input class="with-gap" value="english" name="language" type="radio"/>
                <span>Inglés</span>
                </label>
            </p>
        </div>
        <hr>

        <br><br><br>
        <div class="center">
            <input type="submit" name="content" value="Insert" class="btn brand z-depth-0">
        </div>
    </form>
</section>

