<?php
    if($userType <> 'admin') header("location: index.php");
?>
<section class="container">
    <h4 class="center">Borrar Reserva Electronica</h4>
    <form class="white" action="index.php" method="POST">
        <label>Reserva ID</label>
        <input type="number" name="id" required>
        <div class="center">
            <input type="submit" name="content" value="Borrar Reserva Ebook" class="btn brand z-depth-0">
        </div>
    </form>
</section>
<?php include('forms/ebook/search.php'); ?>
