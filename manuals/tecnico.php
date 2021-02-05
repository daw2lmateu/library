<?php 
    if($userType <> 'admin') header("location: index.php"); 
?>

<div class="green-text manual flow-text">
    <h2>Manual Tecnico</h2>
    <a href="https://github.com/daw2lmateu/library">Github del proyecto</a>
        <p>
            Header i Footer son universales, rutas de ficheros son relativas, 
            para poder reutilizarlo i testear con localhost
        </p>
        <p>
            Los archivos han sido nombrados seguiendo el esquema camelCase, y estan organizados en carpetas
        </p>
        <img class="responsive-img" src="./img/fileStructure.png" alt="No imagen">
        <hr>
        <p>
            Para enseñar los mensajes de resultado al usuario, se usa la variable $_SESSION['message'], donde el en index.php se enseña si no esta vacia, i luego se pone a vacia.
            De manera que los mensajes se enseñan solo una vez.
        </p>
        <p>
            Sigue el esquema One-Page, en el que siempre te encuentras en el indice.
            Index contiene un switch que, mediante GET, elige qué es lo que debe incluir.brand

            Para la navegacion se usa GET, y para Logins y consultas se usa el POST.
        </p>
        <p>
            Para la hoja de estilos se ha usado materialize 1.0.0 en formato web, a la vez que
            una hoja de estilos propio, ubicado en la carpeta css.
        </p>
        <p>
            Los usuarios son identificados por su nombre de usuario, por lo que puede haber mas de un usuario por email, o por dni, pero no por nombre de usuario
        </p>
        <p>
            Solo se permiten tres reservas por usuario. Excepto si la inserta el bibliotecario.
            
            El usuario puede ver y borrar sus reservas.
        </p>
        <p>
            La penalizacion ahora funciona por fecha, entonces cuando el usuario intenta reservar un libro, no puede hasta la fecha indicada (puede simplemente cambiar la hora de windows)
        </p>
        <hr>
        <p>
            TODO online books
        </p>
        <h2>Carrito de la compra</h2>
        <p>
            Ahora se pueden comprar libros, Se añaden al carrito pulsando al boton comprar. De momento se guarda en sql, asi que solo miembros pueden hacerlo
        </p>
        <p>
            En el carrito de la compra, uno puede cambair la cantidad de los libros, y se actualiza al momento mediante javascript
        </p>
        <p>
            Cuando uno esta logeado, se guarda el carrito en la base de datos, mientras que si uno no lo esta ('guest'), se guarda la cookie "_31_library_cookies_31_31"
            Al ir a comprar, se requiere que se registre, i entonces se pasa el carrito de cookies a sql. ( no se borra de cookies hasta que se realiza la compra ).
            <br>
            Si el usuario tenia un carrito previo en la base de datos, cuando se logea, se borra el carrito de la base de datos, y se sustituye por el nuevo carrito proviniente de las cookies.
        </p>
        <p>
            Ahora Usando ajax, aparecen sugerencias de los libros que existen en la base de datos al buscar libros. (Posiblemente se deberia limitar a 10 si aparecen muchos libros)
        </p>
</div>
