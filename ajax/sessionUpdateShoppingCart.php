<?php
include('../sessionData.php');

$bookId = $_REQUEST["q"];
$quantity = $_REQUEST["quantity"];

$jsonArray = json_decode($_SESSION["shoppingCart"], true);

$jsonArray[$bookId] = $quantity;

$json = json_encode($jsonArray, true);
        
    // cookies duran 30 dias
    $_SESSION["shoppingCart"] = $json;
?>

