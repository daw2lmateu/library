<?php
    if($userType == 'guest') header("location: index.php");
?>

<div class="row">
    <?php
            include('dbConnect.php');

            $sql = "SELECT * FROM _31_reservationsEbook" ;
            if($userType == 'user') $sql .=  " WHERE member_id = '$userId'";
            $result = mysqli_query($conn, $sql);
            $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            mysqli_free_result($result);
            
            if (empty($reservations))
            { 
                $_SESSION['message'] = "De momento no hay ninguna reserva";
                header("location: index.php");
            }
            else{

                ?>
                <div class="col s1 md1"></div>
                <div class="col s10 md10">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                        <table class="centered highlight">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario ID</th>
                                <th>Libro ID</th>
                                <th>Dia final</th>
                                <th>Ebook</th>
                            </tr>
                            </thead>
                            <tbody>
                <?php 
                $contador = count($reservations); // contador para ver quda algun libro despues de borrarlos
                foreach($reservations as $reservation){ 
                    $id = $reservation['id'];

                    if(strtotime($reservation['end_date']) - strtotime(date('Y-m-d')) < 0){
                        $sql = "DELETE FROM `_31_reservationsEbook` WHERE id = '$id'";
                        $contador--;
                        $result = mysqli_query($conn, $sql);
                    } 
                    else{ ?>
                        <tr class="hoverable">
                            <td><?php echo($id); ?></td> 
                            <td><?php echo($reservation['member_id']); ?></td>
                            <td><?php echo($reservation['book_id']); ?></td>
                            <td><?php echo($reservation['end_date']); ?></td>
                            <td>
                            <form action="index.php" method="POST">
                                <input name="bookId" type="text" hidden value="<?php echo($reservation['book_id']); ?>">
                                <button class="btn waves-effect waves-light blue" type="submit" value="DisplayEbook" name="content">Ebook
                                    <i class="material-icons right">local_library</i>
                                </button>
                            </form>
                            </td>
                            <?php 
                            if ($userType == 'admin'){ 
                            ?>
                            <td>
                                <form action="index.php" method="GET">
                                    <input name="id" type="num" hidden value="<?php echo($reservation['id']); ?>">
                                    <button class="btn-floating waves-effect waves-teal btn-small" type="submit" name="content" value="Editar Reserva Ebook">
                                        <i class="material-icons right">edit</i>
                                    </button>
                                </form>
                            </td>
                            <?php
                            } 
                            ?>
                            <td>
                            <form action="index.php" method="POST">
                                    <input name="id" type="num" hidden value="<?php echo($reservation['id']); ?>">
                                    <input name="bookId" type="num" hidden value="<?php echo($reservation['book_id']); ?>">
                                    <button class="btn-floating waves-effect waves-red red" type="submit" name="content" value="Borrar Reserva Ebook">
                                        <i class="material-icons right">delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                }} 
                mysqli_close($conn);
                if ($contador == 0){
                    $_SESSION['message'] = "De momento no hay ninguna reserva";
                    header("location: index.php");
                }
                ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
     <?php } ?>
</div>