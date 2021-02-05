<div class="row">
<?php
    if(isset($_POST['content']) && ($userType <> 'user')){
        include('dbConnect.php');

        $userName = htmlspecialchars($_POST['userName']);
        
        include('checkUser.php'); // check if the user is already in the database (header to index if true)

        $nif = htmlspecialchars($_POST['nif']);
        $name = htmlspecialchars($_POST['nombre'] . ' ' . $_POST['apellidos']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['password']) : null;
        $registeredOn = date('Y-m-d H:i:s');
        $type = isset($_POST['type']) ? $_POST['type'] : 'user';

        $sql = "INSERT INTO `_31_members` ( `nif`, `name`, `user_name`,`password`, `phone`, `email`, `type`, `registeredOn`, `penalty`) 
        VALUES('$nif', '$name', '$userName', '$password', '$phone', '$email', '$type', '$registeredOn', '0')" ;

        $result = mysqli_query($conn, $sql);
        if($result === FALSE) { 
            $_SESSION['message'] = "Lo sentimos, no se ha podido registrar el usuario";
            header("location: index.php");
        }
        else{
            $_SESSION['message'] = "Usuario registrado con exito";
            header("location: index.php");
        }
        mysqli_close($conn);
    }
?>
