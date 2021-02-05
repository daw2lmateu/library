<?php
include('dbConnect.php');
            
    if ($userType != 'guest')
    {
        $sql = "SELECT * FROM _31_shoppingCart WHERE member_id = '$userId'";
        $result = mysqli_query($conn,$sql);
        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        $cartType = "SQL";
    }
    else{
        if(isset($_COOKIE[$cookies])){
            $items = json_decode($_COOKIE[$cookies], true);
            $cartType = "\"cookies\"";
        }
    }

    // foreach($items as $key => $item){
    //     echo "  key: " . $key . "  value : " . $item;
    // }

    if (!empty($items))
    { 
        ?>
        <section class="container">
        <div class="col s1 md1"></div>
        <div class="col s12 md12">
            <div class="card z-depth-0">
                <div class="card-content center">
                <table class="highlight responsive-table">
                    <thead>
                    <tr>
                        <th>Libro</th>
                        <th>Precio Unidad</th>
                        <th class="center">Cantidad</th>
                        <th class="center">Precio Total</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
        <?php
        $orderTotal = 0;
        foreach($items as $key => $item){
            $bookId = $item['book_id'] ?? $key; // for Cookies and Session
            $quantity = $item['quantity'] ?? $item;

            $sql = "SELECT * FROM _31_books
                            WHERE id = '$bookId'" ;
            $result = mysqli_query($conn,$sql);
            $book = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            $price = $book[0]['price'];
            $maxQuantity = $book[0]['quantity'];
            $total = $price * $quantity;
            $orderTotal += $total;
            ?>
            <tr class="hoverable">
                <td><?php echo($book[0]['title']); ?></td>
                <td><b id="<?php echo($bookId);?>price"><?php echo($price); ?></b>€</td>
                <td><input id="<?php echo($bookId);?>quantity" type="number" name="quantity" min="1" max="<?php echo($maxQuantity);?>" onclick='updateQuantity(<?php echo($bookId);?>,<?php echo($cartType);?>);' value="<?php echo($quantity);?>"></td> 
                <td class="center"><b id="<?php echo($bookId);?>total"><?php echo($total); ?></b>€</td>
                <td class="right">                
                    <form action="index.php" method="POST">
                        <input name="id" type="num" hidden value="<?php echo($bookId); ?>">
                        <button class="btn-floating waves-effect waves-red red" type="submit" name="content" value="BorrarCarrito">
                            <i class="material-icons right">delete</i>
                        </button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr class="hoverable">
            <td></td> 
            <td></td>
            <td></td>
            <td class="center">Total: <b id ="orderTotal"><?php echo($orderTotal);?></b>€</td>
            <td class="right">
                <form action="index.php" method="POST">
                    <?php
                        if ($userType == 'guest'){
                        ?>
                            <button class="btn-floating waves-effect waves-teal" type="submit" name="content" value="Login">
                                <i class="material-icons right">shop</i>
                            </button>
                        <?php }
                        else{
                            ?>
                            <button class="btn-floating waves-effect waves-teal" type="submit" name="content" value="Realizar Compra">
                                <i class="material-icons right">shop</i>
                            </button>
                            <?php   
                        } ?>
                </form>
            </td>
        </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
        </section>
    <?php } 
    mysqli_close($conn);
?>
<script src="js/updateShoppingCart.js"></script>