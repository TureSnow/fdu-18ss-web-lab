<?php
    include ("connect.php");
    $ID=$_GET["q"];
    $sql="DELETE FROM carts where artworkID='$ID'";
    $pdo->query($sql);
    $pdo=null;
    ?>