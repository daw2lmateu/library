<?php

if($userType <> 'admin') header("location: index.php"); 
?>
<form class="white" action="index.php" method="POST">
    <div class="center">
        <label>Libro ID</label>
        <input type="number" name="bookId" required>
        <label>Miembro ID</label>
        <input type="number" name="memberId" required>
        <label>Fecha reservada</label>
        <input type="date" name="date" min="<?php echo date("Y-m-d");?>" required><br><br>
        <label>Numero de dias a reservar:</label>
        <input type="number" name="days" min="1" max="7" required>

        <input type="submit" name="content" value="Reservar" class="btn brand z-depth-0">
</form>



