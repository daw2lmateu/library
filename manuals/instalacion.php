<?php 
    if($userType <> 'admin') header("location: index.php"); 
?>

<div class="green-text">
    <h2 class="center">Manual Instalacion</h2>
    <div class="green-text manual flow-text">
        <p>
            Este Software ha sido testeado y funciona perfectamente con Apache 2.4.46, MYSQL 8.0.22, PHP 8.0.0
            Para usarlo es recomendable usar esas versiones o posteriores.
        </p>
        <hr>
        <p>
            Para instalar MYSQL 8.0.22 cabe hacer click <a href="https://dev.mysql.com/downloads/mysql/">aquí</a> y pulsar en Donwload
        </p>
        <img class="responsive-img" src="./img/instalacion1.PNG" alt="No imagen">
        <p>
            Registrarse si es necesario, pulsando en sign up, y rellenando el formulario con sus datos.
        </p>
            <img class="responsive-img" src="img/instalacion2.png" alt="Registrarse si es necesario">
        <p>
            Una vez descargado, hacer doble click en el ejecutable, y seguir los pasos de instalacion.
        </p>
        <hr>
        <p>
            Para instalar PHP cabe hacer click <a href="https://windows.php.net/download#php-8.0">aquí</a>, y luego descargar el zip mas seguro
        </p>
        <img class="responsive-img" src="img/instalacion3.png" alt="Descargar el Thread Safe zip mas reciente.">
        <p>
            Descomprimir la carpeta descargada, y pulasr en el ejecutable y Seguir los pasos de instalacion.
        </p>
        <img class="responsive-img" src="img/instalacion4.png" alt="Ejecutar">
        <hr>
        <p>
            Una vez instalado, debe importar la base de datos a MYSQL.
        </p>
        <img class="responsive-img" src="img/instalacion5.png" alt="Ejecutar">
        <p>
            Debe usar el comando, sustituyendo wp_users por el nombre de la bibliteca, y pPassword123 por su contraseña creada.
        </p>
        <img class="responsive-img" src="img/instalacion6.png" alt="Ejecutar">
            <h5>Enhorabuena! ya puede utilizar todas las funcionalidades de la base de datos.</h5>
    </div>
</div>
