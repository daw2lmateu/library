<div class="row">

            <?php
                if(isset($_GET['content'])){
                    $title = htmlspecialchars($_GET['title']);
                    $author = htmlspecialchars($_GET['author']);
                    $language = htmlspecialchars($_GET['language']);
                    $available = empty($_GET['available']);
                }
                else 
                {
                    $language = 'english';
                    $available = 1;
                }
                    include('dbConnect.php');

                    $sql = "SELECT * FROM _31_books
                            WHERE language = '$language'" ;
                    if(!empty($author)) $sql .= "AND author LIKE '%$author%'";
                    if(!empty($title)) $sql .= "AND title LIKE '%$title%'";
                    if(!$available) $sql .= "AND quantity > 0";


                    $result = mysqli_query($conn, $sql);
                    
                    $books = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    
                    mysqli_free_result($result);
                    
                    mysqli_close($conn);
                    if (empty($books))
                    { 
                        $_SESSION['message'] = "No se ha encontrado ningun libro con esas caracteristicas";
                        header("location: index.php");
                    }
                    foreach($books as $book){ ?>
                <div class="col s12 m6 l3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <img class="book" src="<?php echo $book['image']; ?>" alt="imagen de <?php echo($book['title']);?>" class="responsive-img small">
                             <h6>ID : <?php echo($book['id']); ?></h6>
                            <h6><?php echo($book['title']); ?></h6>
                            <h6> Isbn: <?php echo($book['isbn']); ?></h6>
                            <h6> Año de publicacion: <?php echo($book['publication_year']); ?></h6>
                            <h6> Idioma: <?php echo($book['language']); ?></h6>
                            <h6> Autor: <?php echo($book['author']); ?></h6>
                            <h6> Precio: <?php echo($book['price']); ?>€</h6>
                            <h6> En stock: <?php echo($book['quantity']); ?> Unidades</h6>
                            <form action="index.php" method="POST">
                                <input name="id" type="num" hidden value="<?php echo($book['id']); ?>" >
                            <?php if ($book['quantity'] > 0){ ?>
                                    <input name="price" type="num" hidden value="<?php echo($book['price']); ?>">
                                    <input name="quantity" type="num" hidden value="1">
                                    <?php 
                                    if ($userType == 'guest'){
                                    ?>
                                        <button class="btn waves-effect waves-light blue" type="submit" value="Login" name="content">Reservar
                                            <i class="material-icons right">local_library</i>
                                        </button>
                                        <button class="btn waves-effect waves-light green" type="submit" value="AñadirCarrito" name="content">Comprar
                                            <i class="material-icons right">add_shopping_cart</i>
                                        </button>
                                    <?php }
                                    else{
                                        ?>
                                        <button class="btn waves-effect waves-light blue" type="submit" value="PreReserva" name="content">Reservar
                                            <i class="material-icons right">local_library</i>
                                        </button>
                                        <button class="btn waves-effect waves-light blue" type="submit" value="PreReservaEbook" name="content">Ebook
                                            <i class="material-icons right">local_library</i>
                                        </button>
                                        <br><br>
                                        <button class="btn waves-effect waves-light green" type="submit" value="AñadirCarrito" name="content">Comprar
                                            <i class="material-icons right">add_shopping_cart</i>
                                        </button>
                                    <?php }
                                    } 
                            else{
                            ?>
                                <button class="btn waves-effect waves-light blue" type="submit" value="PreReservaEbook" name="content">Ebook
                                    <i class="material-icons right">local_library</i>
                                </button>
                                <br><br>
                                <button class="btn waves-effect waves-light" name="content" disabled>No disponible
                                    <i class="material-icons right">block</i>
                                </button>
                            <?php
                            } ?>
                            </form>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>