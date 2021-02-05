<?php
    if($userType <> 'admin') header("location: index.php");
?>

<!-- This script uses variables from updateResult -->
<div class="row">
    <?php
        $penalty = max((strtotime($returnDate) - strtotime($finalDate)) / (60*60*24), 0);

        include('dbConnect.php');
        $sql = "INSERT INTO `_31_logs` (`id` ,`book_id`, `member_id`, `return_date`, `penalty`) 
                    VALUES (NULL, '$bookId', '$memberId', '$returnDate', '$penalty')";   
        $result = mysqli_query($conn, $sql);

        if($result){
            $sql = "DELETE FROM `_31_reservations` WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            
            // TODO PROPERLY PUT AVAILABLE ON THE DAYS OF THE RESERVE
            $sql = "UPDATE `_31_books` SET quantity = quantity + 1 WHERE id = '$bookId'";
            $result = mysqli_query($conn, $sql);

            if($penalty > 0){
                $sql = "SELECT penalty FROM _31_members WHERE id = '$memberId'";
                $result = mysqli_query($conn,$sql);
                $memberPenalty = mysqli_fetch_array($result, MYSQLI_ASSOC)['penalty'];
    
                // echo(date('Y-m-d', strtotime($memberPenalty. ' + ' . $penalty . ' days')));
                // echo("<br>\n");
                // $today = date('Y-m-d');
                // echo(date('Y-m-d', strtotime($today. ' + ' . $penalty . ' days')));
                // echo("<br>\n");
                // echo(date('Y-m-d'. ' + ' . $penalty . ' days'));
                // echo("<br>\n");
                // echo($memberPenalty);
                // echo("<br>\n");
                // echo($penalty);
    
                // user already had penalty
                if(strtotime($memberPenalty) - strtotime(date('Y-m-d')) > 0){
                    $sumaPenalty = date('Y-m-d', strtotime($memberPenalty. ' + ' . $penalty . ' days'));
                }
                else
                {
                    $today = date('Y-m-d');
                    $sumaPenalty = date('Y-m-d', strtotime($today. ' + ' . $penalty . ' days'));
                }
                mysqli_free_result($result);
    
                $sql = "UPDATE `_31_members` SET penalty = '$sumaPenalty' WHERE id = '$memberId'";
                $result = mysqli_query($conn, $sql);
            }
        }
        if($result === FALSE) {
            $_SESSION['message'] = "La reserva no ha podido ser modificada";
            header("location: index.php");
        }
        else{
            if ($penalty > 0) $_SESSION['message'] =  "Reserva finalizada y guardada en el registro <br> la penalizacion son " . $penalty . " dias";
            else $_SESSION['message'] = "Reserva finalizada y guardada en el registro";
            header("location: index.php");
        }
        mysqli_close($conn);        
    ?>
</div>