<section class="container green-text">
    <h4 class="center">Buscar Libro</h4>
    <form class="white" action="index.php" method="GET">
        <label>Titulo</label>
        <input id="bookTitle" type="text" name="title" onkeyup="bookSugestions()">
        <p id="bookSugestions"></p>
        <label>Autor</label>
        <input id="bookAuthor" type="text" name="author" onkeyup="authorSugestions()">
        <p id="authorSugestions"></p>
        <div class="center">
            <label>
                <input type="checkbox" name="available" />
                <span>Buscar solo libros disponibles</span>
            </label>
        </div>
        <div class="center">
            <p class="center">
                <label for="spanish">
                <input class="with-gap" id="spanish" value="spanish" name="language" type="radio" checked />
                <span>Español</span>
                </label>
                <label for="catalan">
                <input class="with-gap" id="catalan" value="catalan" name="language" type="radio"/>
                <span>Catalan</span>
                </label>
                <label for="english">
                <input class="with-gap" id="english" value="english" name="language" type="radio"/>
                <span>Inglés</span>
                </label>
            </p>
        </div>
        <div class="center">
        <br />
        <br />
           <input type="submit" name="content" value="buscar" class="btn brand z-depth-0"></input>
        </div>
    </form>
</section>

<?php
    if($userType == 'admin'){
        include("forms/book/bookTable.php");
    }
?>

<script src="js/showSugestions.js"></script>


