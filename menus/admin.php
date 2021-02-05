<?php 
    if($userType <> 'admin') header("location: index.php"); 
?>
<ul id = "dropdownUser" class = "dropdown-content">
        <li><a href=index.php?content=Miembros>Buscar</a></li>
        <li><a href=index.php?content=Modificar>Modificar</a></li>
        <li><a href=index.php?content=Registrarse>Crear</a></li>
        <li><a href=index.php?content=BorrarUsuario>Borrar</a></li>
      </ul>

      <ul id = "dropdownManuals" class = "dropdown-content">
         <li><a href=index.php?content=manualInstalacion>Instalacion</a></li>
         <li><a href=index.php?content=manualUsuario>Usuario</a></li>
         <li><a href=index.php?content=manualTecnico>Tecnico</a></li>
      </ul>

    <ul id = "dropdownBooks" class = "dropdown-content">
        <li><a href=index.php?content=Buscar>Buscar</a></li>
        <li><a href=index.php?content=Reservar>Reservar</a></li>
        <li><a href=index.php?content=Editar>Modificar</a></li>
        <li><a href=index.php?content=Insertar>Insertar</a></li>
        <li><a href=index.php?content=Borrar>Borrar</a></li>
    </ul>

    <ul id = "dropdownReserves" class = "dropdown-content">
        <li><a href=index.php?content=Reservas>Buscar</a></li>
        <li><a href=index.php?content=BorrarReserva>Borrar</a></li>
        <li><a href=index.php?content=InsertarReserva>Insertar</a></li>
        <li><a href=index.php?content=Editar+Reserva>Modificar</a></li>
</ul>

<div class="container">
    <a href="index.php" class="brand-logo">Biblioteca</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class = "btn dropdown-button" href = "#" data-activates = "dropdownBooks">Libros
            <i class = "mdi-navigation-arrow-drop-down right"></i></a>	 </li>
        <li><a class = "btn dropdown-button" href = "#" data-activates = "dropdownReserves">Reservas
            <i class = "mdi-navigation-arrow-drop-down right"></i></a></li>
        <li><a class = "btn dropdown-button" href = "#" data-activates = "dropdownUser">Usuarios
            <i class = "mdi-navigation-arrow-drop-down right"></i></a>	 </li>
        <li><a class = "btn dropdown-button" href = "#" data-activates = "dropdownManuals">Manuales
            <i class = "mdi-navigation-arrow-drop-down right"></i></a>	</li>
        <li><a href=index.php?content=Logout class="btn brand z-depth-0">Logout</a></li>
        <li><a href=index.php?content=Carrito class="btn-floating btn-large waves-effect waves-light yellow darken-4"><i class="material-icons">shopping_cart</i></a></li>
    </ul>
</div>