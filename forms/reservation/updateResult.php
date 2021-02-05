<?php 
    if($userType <> 'admin') header("location: index.php"); 
?>

<div class="row">
            <?php
                if(isset($_POST['content'])){
                    $id = $_SESSION['id'];
                    $bookId = htmlspecialchars($_POST['bookId']);
                    $memberId = htmlspecialchars($_POST['userId']);
                    $inicialDate = $_POST['inicialDate'];
                    $finalDate = htmlspecialchars($_POST['finalDate']);
                    $returnDate = htmlspecialchars($_POST['returnDate']);
                    include('dbConnect.php');
                    if (!empty($returnDate)) 
                    {
                        include('forms/reservation/end.php');
                    }
                    else 
                    {
                        $sql = "UPDATE `_31_reservations` SET member_id = '$memberId', book_id = '$bookId', start_date = '$inicialDate', end_date = '$finalDate', 
                        return_date = '$returnDate' WHERE id = '$id'";
    
                        $result = mysqli_query($conn, $sql);
                        if($result === FALSE) { 
                            $_SESSION['message'] = "No se ha podido modificar la reserva";
                            header("location: index.php");
                        }
                        else{
                            $_SESSION['message'] = "Reserva editada con exito";
                            header("location: index.php");
                        }
                        mysqli_close($conn);
                    }

                }        
            ?>
</div>