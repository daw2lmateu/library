<?php 
    if($userType <> 'admin') header("location: index.php"); 
?>

<div class="green-text manual flow-text">
    <h2>Manual Tecnico</h2>
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
        <p>
            Ahora se pueden comprar libros, Se añaden al carrito pulsando al boton comprar. De momento se guarda en sql, asi que solo miembros pueden hacerlo
        </p>
        <p>
            En el carrito de la compra, uno puede cambair la cantidad de los libros, y se actualiza al momento mediante javascript
        </p>
        <hr>
        <p>
            TODO CHECK CORRECT VALUES IN INSERT AND UPDATE <br>
            TODO Check if it's available when it's reserved ( need calendar of books and if their available or not ) <br>
            TODO ALLOW RESERVATION OF BOOKS FROM SEARCH MENU <br>
            TODO When a reserve gets devolutioned, put delete from reserve and put it on logs <br>
            TODO Make reserve button send you to login with a button of register, and keep the id of the book requested to then send you to the reservation page for it <br>
            TODO search users correctly <br>
            TODO Page settings <br>
            update sql when update quantity js dwes ( AJAX )
            Comprobar que no puedas ir comprando si ya tienes la cantidad máxima en el carrito

        </p>
</div>
