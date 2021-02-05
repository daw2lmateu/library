<div class="row">
            <?php
            if($userType <> 'admin') header("location: index.php");
                $id = $_SESSION['id'];

                include('dbConnect.php');

                $sql = "DELETE FROM `_31_members` WHERE id = '$id'";

                $result = mysqli_query($conn, $sql);
                if($result === FALSE) { 
                    $_SESSION['message'] = "No se ha podido borrar al usuario";
                    header("location: index.php");
                }
                else{
                    if ($id == $userId) include('forms/logout.php');

                    $_SESSION['message'] = "Usuario borrado con exito";
                    header("location: index.php");
                }
                mysqli_close($conn);        
            ?>
</div>