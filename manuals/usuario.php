<?php 
    if($userType <> 'admin') header("location: index.php"); 
?>

    <div class="flow-text green-text manual">
        <h2>Manual Usuario</h2>
        <p>
            Cada libro, miembro, y reserva tienen un id. El qual será utilizado al intentar modificarlos, reservarlos o borrarlos.
        </p>
        <p>
            Puede registrar usuarios rellendo en formulario en el boton Registrar-se en la esquina superior derecha.
        </p>
        <p>
            El bibliotecarios puede crear otros usuarios, y otros bibliotecarios (administradores).
        </p>
        <p>
            A la hora de insertar la portada de un libro, tan solo hace falta insertar el link de la imagen encontrada por internet.
        </p>
        <p>
            Para marcar un libro como no disponible, cabe ir a libros / Modificar, en el menu superior, entonces introducir el id del libro, Pulsar en Editar, 
            Al fondo del formulario, Marcar si el libro esta disponible o no.
        </p>
        <p>
            Para buscar un miembro por usuario, es tan séncillo pulsar el boton buscar, y cuando aparezca la tabla, usar el comando ctrl+f e insertar el nombre de usuario.
        </p>
        <p>
            Cuando el bibliotecario introduce dia de devolucion en una reserva:
        </p>
            <ul>
                <li>
                    La reserva se inserta automaticamente en el log de reservas,
                </li>
                <li>
                    El libro vuelver a estar disponible
                </li>
                <li>
                    Si ha devuelto el libro con retraso, se aplica una penalizacion al usuario. No podra reservar durante 1 dia por cada dia de retraso
                </li>
            </ul>
        <p>
            Los usuarios son identificados por su nombre de usuario, por lo que puede haber mas de un usuario por email, o por dni, pero no por nombre de usuario
        </p>
        <p>
            Solo se permiten tres reservas por usuario. Excepto si la inserta el bibliotecario.
            
            El usuario puede ver y borrar sus reservas.
        </p>
        <p>
            Para insertar un libro, hacer click en libro ( en el menu superior ) y hacer click en insertar.
        </p>
        <p>
            Los libros electronicos se reservan, y despues se pueden leer en la lista de libros electronicos reservados.
            La reserva dura 7 dias, pero se pueden cancelar en cualquier momento.
        </p>
    </div>
</body>
</html>
