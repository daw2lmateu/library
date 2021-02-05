

<section class="container green-text">
    <h4 class="center">Registro</h4>
    <form class="white" action="index.php" method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <label>Apellidos:</label>
        <input type="text" name="apellidos" required>
        <label>Numero de Identificación Fiscal (NIF):</label>
        <input type="text" name="nif" required>
        <label>Correo electronico:</label>
        <input type="email" name="email" required>
        <label>Número de teléfono:</label>
        <input type="text" name="phone">
        <label>Nombre usuario:</label>
        <input type="text" name="userName" required>
        <label>Contraseña:</label>
        <input type="password" name="password" id="password" onkeyup='check();' required>
        <br>
        <label>Confirmar contraseña:
            <input type="password" name="confirm_password" id="confirm_password"  onkeyup='check();' required/>
            <span id='message'></span>
        </label>
        <?php
        if($userType == 'admin'){
        ?>
            <div class="center">
                <label>Tipo usuario</label>
                <p class="center">
                    <label>
                        <input class="with-gap" value="user" name="type" type="radio" checked />
                        <span>Usuario</span>
                    </label>
                    <label>
                        <input class="with-gap" value="admin" name="type" type="radio" />
                        <span>Administrador</span>
                    </label>
                </p>
            </div>
        <?php
        }
        ?>
        <br>
        <div class="center">
            <input type="submit" id="submit" name="content" value="Registrarse" class="btn brand z-depth-0" id="submit" disabled>
        </div>
    </form>
</section>


<script src="js/confirmPass.js"></script>