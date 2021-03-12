
<?php 

if (!isset($_SESSION['user_id']) && !isset($_SESSION['name'])) {
    header('Location:login.php');
    exit();
  
    }else{
        $redirect = true;
    } 

?>