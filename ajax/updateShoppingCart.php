<?php
include('../dbConnect.php');

$bookId = $_REQUEST["q"];
$quantity = $_REQUEST["quantity"];
$userId = $_REQUEST["userId"];

//echo($bookId + "ASUIHASUISHUIHUAISHUIS");

$sql = "UPDATE `_31_shoppingCart` SET quantity = $quantity WHERE book_id = '$bookId' AND member_id = $userId";
echo $sql;
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>