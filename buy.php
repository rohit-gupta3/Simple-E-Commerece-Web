<?php
    session_start();
    $_SESSION["bought"]='placed';
    
    header("Location:cart.php?id=''");
?>