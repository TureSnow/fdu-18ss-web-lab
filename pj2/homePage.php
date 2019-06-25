<?php
   if(isset($_COOKIE['name'])) {
       $name=$_COOKIE['name'];
   }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <?php include("head.php");?>
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/homePage.css">
</head>
<body>
<!--nail change with login-->
<?php
if(!isset($_COOKIE['login'])){
    include("mune.php");
}else if (!$_COOKIE['login']){
        include("mune.php");
        echo $_COOKIE['login'];
    }else{
        include("mune2.php");
    }
?>
<?php include ("homePage.topimg.php");?>
<?php
    include ("connect.php");
    $sql="SELECT * FROM artworks where orderID is NULL order by timeReleased desc LIMIT 3 offset 0";
    $result=$pdo->query($sql);
    $a=$result->fetchAll();
?>
<div class="container">
    <div class="card col-lg-4">
        <img src="img/<?php echo $a[0]['imageFileName'];?>" class="card-img">
        <h4 class="card-title"><?php echo $a[0]['title'];?></h4>
        <p class="card-name"><?php echo $a[0]['artist'];?></p>
        <p><?php echo $a[0]['description'];?></p>
        <div>
            <?php
            $artworkID0=$a[0]['artworkID'];
            $orderID0=$a[0]['orderID'];
            echo"<button class='btn btn-primary' onclick='addcart($artworkID0,$orderID0)'>add to cart!</button>";
            echo"<button class='btn btn-danger' onclick='showmore($artworkID0)'>learn more</button>";
            ?>
        </div>
    </div>
    <div class="card col-lg-4">
        <img src="img/<?php echo $a[1]['imageFileName'];?>" class="card-img">
        <h4 class="card-title"><?php echo $a[1]['title'];?></h4>
        <p class="card-name"><?php echo $a[1]['artist'];?></p>
        <p><?php echo $a[1]['description'];?></p>
        <div>
            <?php
            $artworkID1=$a[1]['artworkID'];
            $orderID1=$a[1]['orderID'];
            echo"<button class='btn btn-primary' onclick='addcart($artworkID1,$orderID1)'>add to cart!</button>";
            echo"<button class='btn btn-danger' onclick='showmore($artworkID1)'>learn more</button>"
            ?>
        </div>
    </div>
    <div class="card col-lg-4">
        <img src="img/<?php echo $a[2]['imageFileName'];?>" class="card-img">
        <h4 class="card-title"><?php echo $a[2]['title'];?></h4>
        <p class="card-name"><?php echo $a[2]['artist'];?></p>
        <p><?php echo $a[2]['description'];?></p>
        <div>
            <?php
                $artworkID2=$a[2]['artworkID'];
                $orderID2=$a[2]['orderID'];
                echo"<button class='btn btn-primary' onclick='addcart($artworkID2,$orderID2)'>add to cart!</button>";
                echo"<button class='btn btn-danger' onclick='showmore($artworkID2)'>learn more</button>"
            ?>
        </div>
    </div>
</div>
<?php include ("format/footer.php");?>
<script src="js/regcheck.js"></script>
<script src="js/logincheck.js"></script>
<script src="js/addcart.js"></script>
<script src="js/showmore.js"></script>
</body>
</html>