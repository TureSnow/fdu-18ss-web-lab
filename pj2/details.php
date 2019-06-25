<?php

    $artworkID;

    if (isset($_GET["artworkID"])){
        $artworkID=$_GET["artworkID"];
    }else{
        $artworkID=8;
    }
    include ("connect.php");
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details</title>
    <?php include ("head.php");?>
    <link rel="stylesheet" href="css/card.css">
    <script src="js/addcart.js"></script>
</head>
<body>
<?php
    include ("mune2.php");
    $sql="SELECT * FROM artworks WHERE artworkID=$artworkID ";
    $temp=$pdo->query($sql);
    $result=$temp->fetchAll();
    $title=$result[0]['title'];
    $artist=$result[0]['artist'];
    $price=$result[0]['price'];
    $description=$result[0]['description'];
    $path=$result[0]['imageFileName'];
    $date=$result[0]['yearOfWork'];
    $genre=$result[0]['genre'];
    $width=$result[0]['width'];
    $height=$result[0]['height'];
    $orderID=$result[0]['orderID'];
    $view=$result[0]['view']+1;
    $hot=$view-1;

    $addview="UPDATE artworks SET view='$view'";
    $pdo->query($addview);

;?>
<div class="container card">
    <div class="container">
        <?php echo "<h2>$title</h2>
        <p>By <em>$artist</em></p>"
        ;?>
    </div>
    <div class="container">
        <div class="col-lg-6">
            <?php echo "<img src='img/$path' class='img-thumbnail img-responsive' alt='$title'/>";
            ?>
        </div>
        <div class="col-lg-6 card">
            <?php echo "<p>$description</p>";
            ?>
            <span>
                <label>price:</label>
                <?php echo "<p class='price'>$ $price</p>";
                ?>

            </span>

            <table class="table table-striped">
                <thead>details of products</thead>
                <tr>
                    <th>Date:</th>
                    <?php echo "<th>$date</th>";
                    ?>
                </tr>
                <tr>
                    <th>Medium:</th>
                    <td>Oil on canvas</td>
                </tr>
                <tr>
                    <th>Dimensions:</th>
                    <?php echo "<td>$width cm x $height cm</td>";
                    ?>
                </tr>
                <tr>
                    <th>hot</th>
                    <?php echo "<td>$hot</td>";
                    ?>
                </tr>
                <tr>
                    <th>Genres:</th>
                    <?php echo "<td>$genre</td>";
                    $pdo=null;
                    ?>
                </tr>
            </table>
            <?php echo "<button onclick='addcart($artworkID,$orderID)' class='btn btn-primary'>add to cart!</button>";?>
        </div>
    </div>
</div>

</body>
</html>

