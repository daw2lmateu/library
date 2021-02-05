<div class="row">
    <?php
    if ($userType == 'guest') header("location: index.php");

    include('dbConnect.php');
    // TODO PROPERLY PUT AVAILABLE ON THE DAYS OF THE RESERVE
    $bookId = $_POST['bookId'];
    $sql = "UPDATE `_31_books` SET quantity = quantity+1 WHERE id = '$bookId'";
    $result = mysqli_query($conn, $sql);

    $id = $_POST['id'];


    $sql = "DELETE FROM `_31_reservations` WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);
    if ($result === FALSE) {
        $_SESSION['message'] = "La reserva no ha podido ser borrada";
        header("location: index.php");
    } else {
        $_SESSION['message'] = "Reserva borrada con exito";
        header("location: index.php?content=BorrarReserva");
    }
    mysqli_close($conn);
    ?>
</div>