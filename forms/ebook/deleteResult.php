<div class="row">
    <?php
    if ($userType == 'guest') header("location: index.php");

    include('dbConnect.php');

    $id = $_POST['id'];

    $sql = "DELETE FROM `_31_reservationsEbook` WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);
    if ($result === FALSE) {
        $_SESSION['message'] = "La reserva electronica no ha podido ser borrada";
        header("location: index.php");
    } else {
        $_SESSION['message'] = "Reserva Electronica borrada con exito";
        header("location: index.php?content=BorrarReservaEbook");
    }
    mysqli_close($conn);
    ?>
</div>