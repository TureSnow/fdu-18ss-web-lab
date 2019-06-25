<?php
    if(isset($_COOKIE["login"])){
        if ($_COOKIE["login"]){
            $artworkID=$_GET["artworkID"];
            include ("connect.php");
            $userID=$_COOKIE["userID"];
            $sql="INSERT INTO carts (userID,artworkID) values ($userID,$artworkID)";
            $pdo->query($sql);
            $pdo=null;
            echo "add cart ok!";
        }else{
            echo "please login before add cart!";
        }
    }else{
    echo "please login before add cart!";
    }
    ?>