<?php 
    if($userType == 'guest') header("location: index.php"); 
?>

<div class="row">
            <?php
                if(isset($_POST['content'])){
                    include('dbConnect.php');
                    $userName = htmlspecialchars($_POST['userName']);
                    
                    if ($userName != $_SESSION['oldUserName']) include('checkUser.php'); // chekc if the user is already in the database (header to index if true)

                    $id = $_SESSION['id'];
                    $nif = htmlspecialchars($_POST['nif']);
                    $name = htmlspecialchars($_POST['name']);
                    $email = htmlspecialchars($_POST['email']);
                    $password = htmlspecialchars($_POST['password']);
                    $type = isset($_POST['type']) ? $_POST['type'] : 'user';
                    $phone = $_POST['phone'];
                    $penalty = $_POST['penalty'];
                    $sql = "UPDATE `_31_members` SET nif = '$nif', name = '$name', user_name = '$userName', email = '$email', 
                    password = '$password', type = '$type', phone = '$phone', penalty = '$penalty' WHERE id = '$id'";

                    $result = mysqli_query($conn, $sql);
                    if($result === FALSE) { 
                        $_SESSION['message'] = "No se ha podido modificar al usuario";
                        header("location: index.php");
                    }
                    else{
                        // cambia los datos de session si te has modificado a ti mismo
                        if ( $_SESSION['userId'] == $id){
                            $_SESSION['userName'] = $userName;
                            $_SESSION['type'] = $type;
                            $_SESSION['email'] = $email;
                        }
                        $_SESSION['message'] = "Usuario modificado con exito";
                        header("location: index.php");
                    }
                    mysqli_close($conn);
                }        
            ?>
</div>