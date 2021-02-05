<?php
include('dbConnect.php');
            
$sql = "SELECT * FROM _31_books";
$result = mysqli_query($conn,$sql);
$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
if (!empty($books))
{ 
        ?>
        <div class="col s1 md1"></div>
        <div class="col s10 md10">
            <div class="card z-depth-0">
                <div class="card-content center">
                <table class="centered highlight">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>ISBN</th>
                        <th>Titulo</th>
                        <th>Imagen</th>
                        <th>Autor</th>
                        <th>Año publicacion</th>
                        <th>Insertado en</th>
                        <th>ID localizacion</th>
                        <th>Idioma</th>
                        <th>Cantidad</th>
                        <th>Ebook</th>
                        <th>Precio</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                    </thead>
                    <tbody>
        <?php 
        foreach($books as $book){ ?>
                <tr class="hoverable">
                    <td><?php echo($book['id']); ?></td> 
                    <td><?php echo($book['isbn']); ?></td>
                    <td><?php echo($book['title']); ?></td>
                    <td><img src="<?php echo $book['image']; ?>" alt="imagen de <?php echo($book['title']);?>" style="width:46px;height:60px;"></td>
                    <td><?php echo($book['author']); ?></td>
                    <td><?php echo($book['publication_year']); ?></td>
                    <td><?php echo($book['insertedOn']); ?></td>
                    <td><?php echo($book['location_id']); ?></td>
                    <td><?php 
                    switch ($book['language']){
                        case 'english':
                            echo 'Inglés';
                        break;
                        case 'spanish':
                            echo 'Español';
                        break;
                        case 'catalan':
                            echo 'Catalan';
                        break;
                    }
                    ?></td>
                    <td <?php echo $book['quantity'] > 0 ? "class=\"green lighten-3\"" : "class=\"red lighten-3\"" ?>><?php echo $book['quantity']; ?></td>
                    <td><?php echo $book['ebook']; ?></td>
                    <td><?php echo $book['price']; ?></td>
                <td>
                    <form action="index.php" method="GET">
                        <input name="id" type="num" hidden value="<?php echo($book['id']); ?>">
                        <button class="btn-floating waves-effect waves-teal" type="submit" name="content" value="Editar">
                            <i class="material-icons right">edit</i>
                        </button>
                    </form>
                </td>
                <td>
                <form action="index.php" method="GET">
                        <input name="id" type="num" hidden value="<?php echo($book['id']); ?>">
                        <button class="btn-floating waves-effect waves-red red" type="submit" name="content" value="Borrar">
                            <i class="material-icons right">delete</i>
                        </button>
                    </form>
                </td>
                </tr>
                <?php
        }?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <?php } 
    mysqli_close($conn);
?>