<?php 
ob_clean();
ob_flush();

include('dbConnect.php');

$id = $_POST['bookId'];

$sql = "SELECT ebook FROM _31_books
WHERE id = '$id'" ;

$result = mysqli_query($conn,$sql);
$pdf = mysqli_fetch_array($result, MYSQLI_ASSOC)['ebook'];
mysqli_free_result($result);

mysqli_close($conn);

$filename = "pdfas67_/" . $pdf . ".pdf"; 

header("Content-type: application/pdf");

header("Content-Length: " . filesize($filename)); 

// Send the file to the browser.

readfile($filename); 
?>  