
<?php
// checks if the user is already in the database (header to index if true)
// needs username in $userName
$sql = "SELECT * FROM _31_members WHERE user_name = '$userName'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    mysqli_free_result($result);
    
    if($row >= 1 )
    {
        mysqli_close($conn);
        $_SESSION['message'] = "Ese usuario ya existe, porfavor intente otro nombre.";
        header("location: index.php");
    }
?>