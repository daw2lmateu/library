<div class="row">
            <?php
            if($userType <> 'admin') header("location: index.php");
                $id = $_SESSION['id'];

                include('dbConnect.php');

                $sql = "DELETE FROM `_31_books` WHERE id = '$id'";

                $result = mysqli_query($conn, $sql);
                if($result === FALSE) { 
                    $_SESSION['message'] = "Ha habido un error al borrar el libro";
                    header("location: index.php");
                }
                else{
                    $_SESSION['message'] = "Libro borrado con exito";
                    header("location: index.php");
                }
                mysqli_close($conn);        
            ?>
</div>