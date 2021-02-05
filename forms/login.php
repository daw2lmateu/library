<?php
   //session_start();
   include('dbConnect.php');
   //if($_SERVER["REQUEST_METHOD"] == "POST") {
   if(isset($_POST['username'])) {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT id, type FROM _31_members WHERE user_name = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      
      mysqli_free_result($result);
      
      if (empty($row))
      {                        
         $_SESSION['message'] = "Usuario o contraseña incorrectos";
         mysqli_close($conn);
         header("location: index.php");
      }
      else
      {
         $_SESSION['userName'] = $myusername;
         $_SESSION['type'] = $row['type'];
         $_SESSION['userId'] = $row['id'];
         // $_SESSION['email'] = $row['email'];
         // $_SESSION['penalty'] = $row['penalty'];


         // Transfer shopping cart
         if($cookiesEnabled && isset($_COOKIE[$cookies]))
         {
            $userId = $_SESSION['userId'] ?? -1;
            $cookies = "_31_library_cookies_31_31";

            $sql = "DELETE FROM `_31_shoppingCart` WHERE member_id = '$userId'";
            $result = mysqli_query($conn, $sql);

            $items = json_decode($_COOKIE[$cookies], true);

            $sqlInsert = "INSERT INTO `_31_shoppingCart` (`id`, `member_id`, `book_id`, `quantity`) VALUES";
            foreach($items as $key => $item){
               $sqlInsert .= " (NULL, '$userId', '$key', '$item'),";
            }

            $sqlInsert =  rtrim($sqlInsert, ",");
            $sqlInsert .= ";";
            $result = mysqli_query($conn, $sqlInsert);
         }

         mysqli_close($conn);
         header("location: index.php");
      }
   }
?>

<section class="container green-text">
    <h4 class="center">Log In</h4>
    <form class="white" action="index.php" method="POST">
      <label>Nombre de usuario :</label><input type = "text" name = "username" class = "box"/><br /><br />
      <label>Contraseña :</label><input type = "password" name = "password" class = "box" /><br/><br />
      <div class="center">
         <input type ="submit" name="content" value ="Login" class="btn brand z-depth-0"/><br />
      </div>
      <p class="center"><a href=index.php?content=Registrarse class="z-depth-0">No tienes cuenta? Registrate!</a></li></p>
   </form>
</section>