<?php 
    if($userType <> 'user') header("location: index.php"); 
?>

<ul id = "dropdownUser" class = "dropdown-content">
    <li><a href=index.php?content=Modificar>Cambiar Datos</a></li>
    </ul>

    <ul id = "dropdownBooks" class = "dropdown-content">
        <li><a href=index.php?content=Buscar>Buscar</a></li>
        <li><a href=index.php?content=Reservar>Reservar</a></li>
    </ul>

    <ul id = "dropdownReserves" class = "dropdown-content">
        <li><a href=index.php?content=Reservar>Reservar Libro</a></li>
        <li><a href=index.php?content=Reservas>Buscar</a></li>
</ul>

<div class="container">
    <a href="index.php" class="brand-logo">Biblioteca</a>

    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class = "btn dropdown-button" href = "#" data-activates = "dropdownBooks">Libros
            <i class = "mdi-navigation-arrow-drop-down right"></i></a>	 </li>
        <li><a class = "btn dropdown-button" href = "#" data-activates = "dropdownReserves">Reservas
            <i class = "mdi-navigation-arrow-drop-down right"></i></a></li>
        <li><a href=index.php?content=Modificar class="btn brand z-depth-0">Cambiar Datos</a></li>
        <li><a href=index.php?content=Buscar class="btn brand z-depth-0">Buscar</a></li>
        <li><a href=index.php?content=Logout class="btn brand z-depth-0">Logout</a></li>
        <li><a href=index.php?content=Carrito class="btn-floating btn-large waves-effect waves-light yellow darken-4"><i class="material-icons">shopping_cart</i></a></li>
    </ul>
</div>