<?php
include('../dbConnect.php');
include('../sessionData.php');

$bookId = $_REQUEST["q"];
$quantity = $_REQUEST["quantity"];

//echo($bookId + "ASUIHASUISHUIHUAISHUIS");

$sql = "UPDATE `_31_shoppingCart` SET quantity = $quantity WHERE book_id = '$bookId' AND member_id = $userId";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>

