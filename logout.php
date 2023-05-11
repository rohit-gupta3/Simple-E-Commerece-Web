<?php
    session_start();
    $_SESSION["id"]='';
    $_SESSION["email"]='';
    header("Location:index.php");
?>