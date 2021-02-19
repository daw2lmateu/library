
<?php
    if($userType == 'guest') header("location: index.php"); 

    $user = $userName;
    include('dbConnect.php');
    
    $sql = "SELECT * FROM _31_members
                WHERE user_name = '$user'" ;
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<section class="container green-text">
    <h4 class="center">Modificar Datos de usuario</h4>
    <form class="white" action="index.php" method="POST">
        <label>NIF</label>
        <input type="text" name="nif" value="<?php echo $data[0]['nif']; ?>" required>
        <label>Nombre y apellidos</label>
        <input type="text" name="name" value="<?php echo $data[0]['name'];?>" required>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $data[0]['email']; ?>" required>
        <label>Numero de telefono</label>
        <input type="number" name="phone" value="<?php echo $data[0]['phone']; ?>" required>
        <label>Direccion de envio</label>
        <input type="text" name="address" value="<?php echo $data[0]['address']; ?>" required>
        <br><br>
        <div class="center">
            <input type="submit" name="content" value="Realizar Compra" class="btn brand z-depth-0">
        </div>
    </form>
</section>
        
        
        
        