<?php
include('../sessionData.php');

$bookId = $_REQUEST["q"];
$quantity = $_REQUEST["quantity"];

$jsonArray = json_decode($_COOKIE[$cookies], true);

$jsonArray[$bookId] = $quantity;

$json = json_encode($jsonArray, true);
        
    // cookies duran 30 dias
    setcookie($cookies, $json, time() + 86400 * 30, "/");

?>

