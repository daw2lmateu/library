<?php
    if($userType <> 'admin') header("location: index.php");
    if(isset($_GET['id'])){ 
        //session_start();
        include('dbConnect.php');
        $id = ($_GET['id']);
        $_SESSION['id'] = $id;
        $sql = "SELECT * FROM _31_members
                WHERE id = '$id'" ;
        $result = mysqli_query($conn, $sql);
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
         if (empty($users))
                    { 
                        $_SESSION['message'] = "No se ha encontrado ningun usuario con ese id";
                        header("location: index.php");
                    }
                    foreach($users as $user){ ?>
            <section class="container green-text">
            <h4 class="center">¿Esta seguro que quiere borrar este usuario?</h4>
            <form action="index.php" method="POST">
            <div class="center">
                <input type="submit" name="content" value="Borrar Usuario" class="btn brand z-depth-0">
                <input type="submit" name="content" value="No borrar" class="btn brand z-depth-0">
            </div>
            </form>
                <div class="col s4 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6> ID: <?php echo($user['id']); ?></h6>
                            <h6> NIF: <?php echo($user['nif']); ?></h6>
                            <h6> Nombre y apellidos: <?php echo($user['name']); ?></h6>
                            <h6> Usuario: <?php echo($user['user_name']); ?></h6>
                            <h6> Telefono: <?php echo($user['phone']); ?></h6>
                            <h6> Email: <?php echo($user['email']); ?></h6>
                            <h6> Privilegios: <?php echo($user['type']); ?></h6>
                            <h6> Registrado en: <?php echo($user['registeredOn']); ?></h6>
                            <h6> Penalizacion hasta: <?php echo($user['penalty']); ?></h6>
                        </div>
                    </div>
                </div>
                <?php }
    } 
    else { ?>
        <section class="container green-text">
            <h4 class="center">Borrar Usuario</h4>
            <form class="white" action="index.php" method="GET">
                <label>ID Usuario</label>
                <input type="number" name="id" required>
                <div class="center">
                            <input type="submit" name="content" value="Borrar Usuario" class="btn brand z-depth-0">
                </div>
        <?php
    }
?>



