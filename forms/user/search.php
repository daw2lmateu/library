<?php
    if($userType <> 'admin') header("location: index.php");
?>

<div class="row">        
            <?php
                    include('dbConnect.php');
                    $sql = "SELECT * FROM _31_members";
                    
                    $result = mysqli_query($conn, $sql);
                    $members = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    
                    mysqli_free_result($result);
                    
                    mysqli_close($conn);
                    // only for security ( should be imposible )
                    if (empty($members))
                    { 
                        $_SESSION['message'] = "No se ha encontrado ningun miembro";
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
                                        <th>NIF</th>
                                        <th>Nombre y apellidos</th>
                                        <th>Usuario</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Privilegios</th>
                                        <th>Registrado en</th>
                                        <th>Penalizacion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                        <?php 
                        foreach($members as $member){ ?>
                                <tr class="hoverable">
                                    <td><?php echo($member['id']); ?></td> 
                                    <td><?php echo($member['nif']); ?></td>
                                    <td><?php echo($member['name']); ?></td>
                                    <td><?php echo($member['user_name']); ?></td>
                                    <td><?php echo($member['phone']); ?></td>
                                    <td><?php echo($member['email']); ?></td>
                                    <td><?php echo($member['type']); ?></td>
                                    <td><?php echo($member['registeredOn']); ?></td>
                                    <?php $memberHasPenalty =  strtotime($member['penalty']) - strtotime(date('Y-m-d')) > 0?>
                                    <td <?php echo $memberHasPenalty ? "class=\"red lighten-3\"" : "class=\"green lighten-3\"" ?> ><?php echo($member['penalty']); ?></td>
                                    <td>
                                        <form action="index.php" method="GET">
                                            <input name="user" type="text" hidden value="<?php echo($member['user_name']); ?>">
                                            <button class="btn-floating waves-effect waves-teal btn-small" type="submit" name="content" value="Modificar">
                                                <i class="material-icons right">edit</i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                    <form action="index.php" method="GET">
                                            <input name="id" type="num" hidden value="<?php echo($member['id']); ?>">
                                            <button class="btn-floating waves-effect waves-red red" type="submit" name="content" value="Borrar Usuario">
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