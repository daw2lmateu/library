<?php
include('../dbConnect.php');

$input = $_REQUEST["input"];
$table = $_REQUEST["table"];
$column = $_REQUEST["column"];



$sql = "SELECT DISTINCT " . "$column" . " FROM " . $table . " WHERE " . $column . " LIKE '%$input%'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);

$books = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    
mysqli_free_result($result);

echo json_encode($books);
?>