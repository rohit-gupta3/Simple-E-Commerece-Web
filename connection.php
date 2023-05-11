<?php
    $server="localhost:8111";
    $uname="root";
    $password='';
    $db ="co1706_cwk2";

    $conn = mysqli_connect($server,$uname,$password,$db);
    if(!$conn)
    {
        die("Sorry".mysqli_connect_error());
    }
?>