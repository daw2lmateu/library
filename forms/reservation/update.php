<?php
    if($userType <> 'admin') header("location: index.php"); 

    if(isset($_GET['id'])){ 
        include('dbConnect.php');
        $id = ($_GET['id']);

        $_SESSION['id'] = $id;
        $sql = "SELECT * FROM _31_reservations
                WHERE id = '$id'" ;
        $result = mysqli_query($conn, $sql);
        $reserve = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if (empty($reserve)){
            $_SESSION['message'] = "No se ha encontrado ninguna reserva con id: " . $id;
            header("location: index.php");
      }
      else
      { ?>
        <section class="container green-text">
            <h4 class="center">Modificar Reserva</h4>
            <form class="white" action="index.php" method="POST">
                <label>Usuario ID</label>
                <input type="text" name="userId" value="<?php echo $reserve[0]['member_id']; ?>">
                <label>Libro ID</label>
                <input type="text" name="bookId" value="<?php echo $reserve[0]['book_id']; ?>">
                <label>Dia Inicial</label>
                <input type="date" name="inicialDate" value="<?php echo $reserve[0]['start_date']; ?>">
                <label>Dia final</label>
                <input type="date" name="finalDate" value="<?php echo $reserve[0]['end_date']; ?>">
                <label>Dia Devolucion</label>
                <input type="date" name="returnDate">
                <br><br><br>
                <div class="center">
                    <input type="submit" name="content" value="Actualiza Reserva" class="btn brand z-depth-0">
                </div>
            </form>
        </section>
        <?php
        }
        mysqli_free_result($result);
        mysqli_close($conn);
    } 
    else { ?>
        <section class="container green-text">
            <h4 class="center">Modificar Reserva</h4>
            <form class="white" action="index.php" method="GET">
                <label>Reserva ID</label>
                <input type="number" name="id" required>
                <div class="center">
                            <input type="submit" name="content" value="Editar Reserva" class="btn brand z-depth-0">
                </div>
        <?php
    }
?>



