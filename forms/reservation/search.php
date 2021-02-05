<?php
    if($userType == 'guest') header("location: index.php");
?>

<div class="row">
    <?php
            include('dbConnect.php');

            $sql = "SELECT * FROM _31_reservations" ;
            if($userType == 'user') $sql .=  " WHERE member_id = '$userId'";
            $result = mysqli_query($conn, $sql);
            $reservations = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            mysqli_free_result($result);
            
            mysqli_close($conn);
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
                                <th>Dia inicial</th>
                                <th>Dia final</th>
                                <th>Reservado en</th>
                            </tr>
                            </thead>
                            <tbody>
                <?php 
                foreach($reservations as $reservation){ ?>
                        <tr class="hoverable">
                            <td><?php echo($reservation['id']); ?></td> 
                            <td><?php echo($reservation['member_id']); ?></td>
                            <td><?php echo($reservation['book_id']); ?></td>
                            <td><?php echo($reservation['start_date']); ?></td>
                            <td><?php echo($reservation['end_date']); ?></td>
                            <td><?php echo($reservation['reserved_on']); ?></td>
                            <?php 
                            if ($userType == 'admin'){ 
                            ?>
                            <td>
                                <form action="index.php" method="GET">
                                    <input name="id" type="num" hidden value="<?php echo($reservation['id']); ?>">
                                    <button class="btn-floating waves-effect waves-teal btn-small" type="submit" name="content" value="Editar Reserva">
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
                                    <button class="btn-floating waves-effect waves-red red" type="submit" name="content" value="Borrar Reserva">
                                        <i class="material-icons right">delete</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                }
                ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
     <?php } ?>
</div>