<?php

if($userType <> 'admin') header("location: index.php"); 
?>
<form class="white" action="index.php" method="POST">
    <div class="center">
        <label>Libro ID</label>
        <input type="number" name="bookId" required>
        <label>Miembro ID</label>
        <input type="number" name="memberId" required>

        <input type="submit" name="content" value="Reservar Ebook" class="btn brand z-depth-0">
</form>



