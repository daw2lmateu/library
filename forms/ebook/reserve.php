<?php

if($userType == 'guest') header("location: index.php"); 
if($userType == 'user') {
    include('forms/ebook/canUserReserve.php');
}
    $id = null;
    if(isset($_POST['id']))
        $id = ($_POST['id']);

    if(isset($_GET['id']))
        $id = ($_GET['id']);
    
    if($id != NULL){ 
        //session_start();
        include('dbConnect.php');
        $_SESSION['bookId'] = $id;
        $sql = "SELECT * FROM _31_books
                WHERE id = '$id'" ;
        $result = mysqli_query($conn, $sql);
        $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
         if (empty($books)) 
            { 
                $_SESSION['message'] = "No se ha encontrado ningun libro con ese id";
                header("location: index.php");
            }
        foreach($books as $book){ ?>
            <section class="container green-text">
                <div class="col s4 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <img src="<?php echo $book['image']; ?>" alt="imagen de <?php echo($book['title']);?>" class="responsive-img small">
                            <h6><?php echo($book['title']); ?></h6>
                            <h6> Isbn: <?php echo($book['isbn']); ?></h6>
                            <h6> Año de publicacion: <?php echo($book['publication_year']); ?></h6>
                            <h6> Idioma: <?php echo($book['language']); ?></h6>
                            <h6> Autor: <?php echo($book['author']); ?></h6>
                            <h6><?php echo($book['quantity'] > 0 ? "Disponible" : "<b>No Disponible</b>"); ?></h6>
                        </div>
                    </div>
                </div>
            <h4 class="center">¿Esta seguro que quiere reservar este libro electronicamente?</h4>
            <form class="white" action="index.php" method="POST">
                <div class="center">
                        <h5>Reservar durante 7 dias?</h5>
                        <br>
                        <input type="submit" name="content" value="Reservar Ebook" class="btn brand z-depth-0">
                        <input type="submit" name="content" value="No" class="btn brand z-depth-0">
                </div>
            </form>
        <?php }
    } 
    else { ?>
        <section class="container green-text">
            <h4 class="center">Reservar Ebook</h4>
            <form class="white" action="index.php" method="GET">
                <label>Libro ID</label>
                <input type="number" name="id" required>
                <div class="center">
                            <input type="submit" name="content" value="Reservar Ebook" class="btn brand z-depth-0">
                </div>
            </form>
        <?php
    }
?>



