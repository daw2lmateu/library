
<?php
include('dbConnect.php');
$sql = "SELECT * FROM _31_members
                WHERE user_name = '$userName'" ;
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        
        // Can't reserve with penalty
        // if(intval($data[0]['penalty']) > 0){
        //     $_SESSION['message'] = "Lo sentimos, no puede reservar otro libro durante " . $data[0]['penalty'] . " dias";
        //     mysqli_close($conn);
        //         header("location: index.php");
        // }
        $memberId = $data[0]['id'];

        $sql = "SELECT penalty FROM _31_members WHERE id = '$memberId'";
        $result = mysqli_query($conn,$sql);
        $penaltyDate = mysqli_fetch_array($result, MYSQLI_ASSOC)['penalty'];
        mysqli_free_result($result);

        // TODO user shoudn't be able to evade penalty by modifying their own system time. ( windows )
        if(strtotime($penaltyDate) - strtotime(date('Y-m-d')) > 0){
            $_SESSION['message'] = "Lo sentimos, no puede reservar otro libro hasta " . $penaltyDate;
            mysqli_close($conn);
            header("location: index.php");
        }
        
        // ONLY 3 reservations allowed
        $sql = "SELECT COUNT(id) as booksReserved FROM _31_reservations WHERE member_id = '$userId'";
        $result = mysqli_query($conn,$sql);
        $data = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);

        if($data['booksReserved'] >= 3){   
            $_SESSION['message'] = "No puedes reservar mas de 3 libros";
            header("location: index.php");
        }
?>