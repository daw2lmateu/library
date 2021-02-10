<?php 
    include('header.php'); 

    include('weather.php'); 
    
    if(!empty($_SESSION['message'])){
        include('message.php');
    }
    
    if (isset($_GET['content'])){
        switch($_GET['content']):
            case "Carrito":
                include('forms/buy/shoppingCart.php');
                break;
            case "Login":
                include('forms/login.php');
                break;
            case "Logout":
                include('forms/logout.php');
                break;
            case "Registrarse":
                include('forms/user/register.php');
                break;
            case "Miembros":
                include('forms/user/search.php');
                break;
            case "BorrarUsuario":
                include('forms/user/delete.php');
                break;
            case "Modificar":
                include('forms/user/modify.php');
                break; 
            case "Borrar Usuario":
                include('forms/user/delete.php');
                break;
            case "Insertar":
                include('forms/book/insert.php');
                break;
            case "Buscar":
                include('forms/book/search.php');
                break;
            case "Borrar":
                include('forms/book/delete.php');
                break;
            case "Editar":
                include('forms/book/update.php');
                break;
            case "buscar":
                include('forms/book/searchResult.php');
                break;
            case "Reservas":
                include('forms/reservation/search.php');
                break;
            case "Reservar":
                include('forms/reservation/reserve.php');
                break;
            case "BorrarReserva":
                include('forms/reservation/adminDelete.php');
                break;
            case "InsertarReserva":
                include('forms/reservation/adminInsert.php');
                break;
            case "Editar Reserva":
                include('forms/reservation/update.php');
                break;
            case "index":
                include('indexContent.php');
                include('forms/book/searchResult.php'); 
                break;  
            case "manualTecnico":
                include('manuals/tecnico.php');
                break;
            case "manualInstalacion":
                include('manuals/instalacion.php');
                break;
            case "manualUsuario":
                include('manuals/usuario.php');
                break;
        endswitch;
    } 
    else if(isset($_POST['content'])){
        switch($_POST['content']):
            case "Realizar Compra":
                include('forms/buy/buyResult.php');
                break;
            case "PreReserva":
                include('forms/reservation/reserve.php');
                break;
            case "AñadirCarrito":
                if ($userType != 'guest')
                    include('forms/buy/SQLAddToCart.php');
                else{
                    if($cookiesEnabled) {
                        include('forms/buy/cookiesAddToCart.php');
                        include('forms/buy/sessionAddToCart.php');
                    } 
                    else{
                        $_SESSION['message'] = "Registrate o activa las cookies para usar el añadir libros al carrito";
                        include('forms/login.php');
                    }
                }
                break;
            case "BorrarCarrito":
                if ($userType != 'guest')
                    include('forms/buy/SQLDeleteFromCart.php');
                else{
                    if($cookiesEnabled) {
                        include('forms/buy/cookiesDeleteFromCart.php');
                        include('forms/buy/sessionDeleteFromCart.php');
                    } 
                }
            break;
                break;
            case "Login":
                include('forms/login.php');
                break;
            case "Insert":
                include('forms/book/insertResult.php');
                break;
            case "Borrar":
                include('forms/book/deleteResult.php');
                break;
            case "Update":
                include('forms/book/updateResult.php');
                break;
            case "Actualiza Reserva":
                include('forms/reservation/updateResult.php');
                break;
            case "Borrar Reserva":
                include('forms/reservation/deleteResult.php');
                break;
            case "Reservar":
                include('forms/reservation/reserveResult.php');
                break;
            case "Borrar Usuario":
                include('forms/user/deleteResult.php');
                break;
            case "Registrarse":
                include('forms/user/registerResult.php');
                break;
            case "Login":
                include('forms/login.php');
                break;
            case "Modificar":
                include('forms/user/modifyResult.php');
                break;
            case "Returned":
                include('forms/reservation/end');
                include('forms/reservation/search.php');
                break;
            default:
                include('indexContent.php');
                include('forms/book/searchResult.php'); 
                break;
        endswitch;
    }
    else {
        include('indexContent.php');
        include('forms/book/searchResult.php'); 
    }

    include('footer.php'); 
?>
