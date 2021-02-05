<?php
    include('sessionData.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title> Biblioteca </title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <!-- DropDown -->
    <link rel = "stylesheet"
         href = "https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel = "stylesheet"
         href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type = "text/javascript"
         src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
      </script> 
</head>

<body class="green lighten-5">

    <nav class="green lighten-1 z-depth-0">
        <?php
            switch ($userType)
            {
                case 'admin': 
                    include('menus/admin.php');
                    break;
                case 'user':
                    include('menus/user.php');
                    break;
                case 'guest':
                    include('menus/guest.php');
                    break;
            } 
        ?>
    </nav>
    <br>

