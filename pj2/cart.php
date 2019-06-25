<!DOCTYPE html>
<html>
<head>
    <?php include("head.php");?>
    <script src="js/cart.js"></script>
</head>
<body>
<?php
include ("mune2.php");?>
<div class="container card">
    <h1>my cart</h1>
    <?php
        include ("connect.php");
        $userID=$_COOKIE['userID'];
        $sql="SELECT * FROM carts WHERE userID='$userID'";
        $result=$pdo->query($sql);
        $temp=$result->fetchAll();
        $amount=0;

         if (empty($temp[0])){
            echo "<h2 class='price'>There are null in your cart! please pick your love paint into cart!</h2>";
        }else {
             echo "<table class='table table-striped'>
                    <tr>
                        <th>img</th>
                        <th>Title</th>
                        <th>description</th>
                        <th>artist</th>
                        <th>Price</th>
                        <th></th>
                    </tr>";
             foreach ($temp as $key => $value) {
                 echo "<tr>";
                 //TODO
                 /*var_dump($key);*/
                 $artworkID = $value['artworkID'];
                 $sql2 = "SELECT * FROM artworks where artworkID='$artworkID'";
                 $result2 = $pdo->query($sql2);
                 $temp2 = $result2->fetchAll();
                 echo "<th><img src=" . "img/" . $temp2[0]['imageFileName'] . " class='img-thumbnail'></th>";
                 echo "<th><p>" . $temp2[0]['title'] . "</p></th>";
                 echo "<th><p>" . $temp2[0]['description'] . "</p></th>";
                 echo "<th><p>" . $temp2[0]['artist'] . "</p></th>";
                 echo "<th><p>" . $temp2[0]['price'] . "</p></th>";
                 echo "<th><button class='btn btn-danger' onclick='dele($artworkID)'>delete</button></th>";
                 echo "</tr>";
                 $amount += $temp2[0]['price'];
             }
             $ship;
             if ($amount > 2000) {
                 $ship = 0;
             } else if ($amount != 0) {
                 $ship = 100;
             } else {
                 $ship = 0;
             }

             $total = $amount + $ship;
             $balance = $_COOKIE['balance'];
             $enough = 0;
             $left;
             if ($total > $_COOKIE["balance"]) {
                 $enough = 0;
                 $left = $_COOKIE["balance"];
             } else {
                 $enough = 1;
                 $left = $_COOKIE['balance'] - $total;
             }
             echo "<tr><td colspan='4'>subtotal</td><td>$" . $amount . "</td><td rowspan='3'><button class='btn btn-primary' onclick='buy($userID,$enough,$left,$total)'>pay now</button> </td></tr>";
             echo "<tr><td colspan='4'>shipping</td><td>$" . $ship . "</td></tr>";
             echo "<tr><td colspan='4'>Grand total</td><td>$" . $total . "</td></tr></table>";
         }
        ?>
</div>
</div>
</body>
</html>