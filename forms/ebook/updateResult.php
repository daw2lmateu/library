<?php 
    if($userType <> 'admin') header("location: index.php"); 
?>

<div class="row">
            <?php
                if(isset($_POST['content'])){
                    $id = $_SESSION['id'];
                    $bookId = htmlspecialchars($_POST['bookId']);
                    $memberId = htmlspecialchars($_POST['userId']);
                    $finalDate = htmlspecialchars($_POST['finalDate']);
                    include('dbConnect.php');
                    // if (!empty($finalDate)) 
                    // {
                    //     include('forms/reservation/end.php');
                    // }
                    // else 
                    // {
                        $sql = "UPDATE `_31_reservationsEbook` SET member_id = '$memberId', book_id = '$bookId', end_date = '$finalDate'  
                        WHERE id = '$id'";
    
                        $result = mysqli_query($conn, $sql);
                        if($result === FALSE) { 
                            $_SESSION['message'] = "No se ha podido modificar la reserva electronica";
                            header("location: index.php");
                        }
                        else{
                            $_SESSION['message'] = "Reserva electronica editada con exito";
                            header("location: index.php");
                        }
                        mysqli_close($conn);
                    // }

                }        
            ?>
</div>