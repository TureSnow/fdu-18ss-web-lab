<?php

    include ("connect.php");
    $userID=$_GET["userID"];
    $left=$_GET["left"];
    $sum=$_GET["sum"];


    //pay money
    $sql2="UPDATE users SET balance='$left' where userID='$userID'";
    $pdo->query($sql2);


    //create order
    $time=date("Y-m-d H:i:s");
    $sql3="INSERT INTO orders (ownerID,sum,timeCreated) values ('$userID','$sum','$time')";
    $pdo->query($sql3);
    $sql4="SELECT * FROM orders where timeCreated='$time'";
    $temp=$pdo->query($sql4);
    $result3=$temp->fetchAll();
    $orderID=$result3[0]["orderID"];


    //mark orderID in artworks table
    $sql="SELECT * FROM carts WHERE userID='$userID'";
    $result=$pdo->query($sql);
    $temp=$result->fetchAll();
    foreach ($temp as $key=>$value){
    $artworkID=$value['artworkID'];
    $sql2="UPDATE artworks SET orderID='$orderID' where artworkID='$artworkID'";
    $result2=$pdo->query($sql2);
    }


    //delete items from carts
    $sql="DELETE FROM carts WHERE userID='$userID'";
    $result=$pdo->query($sql);


    $pdo=null;
?>