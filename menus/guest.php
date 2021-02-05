<?php 
    if($userType <> 'guest') header("location: index.php"); 
?>

<div class="container">
    <a href="index.php" class="brand-logo">Biblioteca</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href=index.php?content=Buscar class="btn brand z-depth-0">Buscar Libro</a></li>
        <li><a href=index.php?content=Login class="btn brand z-depth-0">Login</a></li>
        <li><a href=index.php?content=Registrarse class="btn brand z-depth-0">Registrarse</a></li>
        <li><a href=index.php?content=Carrito class="btn-floating btn-large waves-effect waves-light yellow darken-4"><i class="material-icons">shopping_cart</i></a></li>
    </ul>
</div>