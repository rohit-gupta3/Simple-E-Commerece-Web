<?php
    session_start();
    $_SESSION["removed"]='removed';
    
    header("Location:cart.php?id=''");
?>