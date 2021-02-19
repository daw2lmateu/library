
<?php
    if($userType == 'guest') header("location: index.php"); 
    
    if ($userType == 'admin') { ?>
        <section class="container green-text">
            <h4 class="center">Modificar otro usuario</h4>
            <form class="white" action="index.php" method="GET">
                <label>Nombre usuario</label>
                <input type="text" name="user" required>
                <div class="center">
                    <input type="submit" name="content" value="Modificar" class="btn brand z-depth-0">
                </div>
            </form>
        <?php
    }
    
    if(isset($_GET['user']) && $userType == 'admin') $user = ($_GET['user']);
    else $user = $userName;
    include('dbConnect.php');
    
    $sql = "SELECT * FROM _31_members
                WHERE user_name = '$user'" ;
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);

        $_SESSION['id'] = $data[0]['id'];
        $_SESSION['oldUserName'] = $data[0]['user_name'];
        ?>
        <section class="container green-text">
            <h4 class="center">Modificar Datos de usuario</h4>
            <form class="white" action="index.php" method="POST">
                <label>NIF</label>
                <input type="text" name="nif" value="<?php echo $data[0]['nif']; ?>" required>
                <label>Nombre y apellidos</label>
                <input type="text" name="name" value="<?php echo $data[0]['name'];?>" required>
                <label>Usuario</label>
                <input type="text" name="userName" value="<?php echo $data[0]['user_name']; ?>" required>
                <label>Contraseña:</label>
                <input type="password" name="password" value="<?php echo $data[0]['password']; ?>" id="password" onkeyup='check();' required>
                <br>
                <label>Confirmar contraseña:
                    <input type="password" name="confirm_password" value="<?php echo $data[0]['password']; ?>" id="confirm_password"  onkeyup='check();' required/>
                    <span id='message'></span>
                </label>
                <br>
                <label>Email</label>
                <input type="email" name="email" value="<?php echo $data[0]['email']; ?>" required>
                <label>Numero de telefono</label>
                <input type="number" name="phone" value="<?php echo $data[0]['phone']; ?>">
                <label>Direccion de envio</label>
                <input type="text" name="address" value="<?php echo $data[0]['address']; ?>">
                <?php if ($userType == 'admin'){ ?>
                    <label>Penalty</label>
                    <input type="date" name="penalty" value="<?php echo $data[0]['penalty']; ?>">
                    <div class="center">
                        <label>Tipo usuario</label>
                        <p class="center">
                            <label>
                                <input class="with-gap" value="user" name="type" type="radio" <?php if ($data[0]['type'] == "user") echo('checked'); ?> />
                                <span>Usuario</span>
                            </label>
                            <label>
                                <input class="with-gap" value="admin" name="type" type="radio" <?php if ($data[0]['type'] == "admin") echo('checked'); ?>/>
                                <span>Administrador</span>
                            </label>
                        </p>
                    </div>
                <?php } ?>
                <br><br>
                <div class="center">
                    <input type="submit" name="content" value="Modificar" class="btn brand z-depth-0">
                </div>
            </form>
        </section>
        
        <script src="js/confirmPass.js"></script>
        
        
        