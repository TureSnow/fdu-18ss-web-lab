<?php
    include ("connect.php");
    ?>
<!DOCTYPE html>
<html>
<head>
    <?php include ("head.php");
    $sql="SELECT * FROM artworks LIMIT 10";
    $sql2="SELECT COUNT(*) FROM artworks";

    $temp=$pdo->query($sql);
    $result=$temp->fetchAll();

    $temp1=$pdo->query($sql2);
    $result1=$temp1->fetchAll();
    $pageNum=ceil($result1[0]['COUNT(*)']/10);
    ?>
    <title>view</title>
    <script src="js/page.js"></script>
</head>
<body>
<?php
    if (isset($_COOKIE['login'])){
        if ($_COOKIE['login']){
            include ("mune2.php");
        }else{
            include ("mune.php");
        }
    }else{
        include ("mune.php");
    }
?>

<div class="container card">
    <h1>view</h1>
    <ul class="pagination">
        <?php
        $index=1;
        while ($index<$pageNum){
            echo "<li onclick='changepage($index)'><a href='#'>$index</a></li>";
            $index++;
        }
        ?>
    </ul>
    <div id="stage">
        <?php

        echo "<table class='table table-striped'><tr>
                <th>title</th>
                <th>thumbnail</th>
                <th>artist</th>
                <th>price</th>
                <th></th>
            </tr>";
        foreach ($result as $key=>$value){
            $title=$value['title'];
            $path=$value['imageFileName'];
            $artist=$value['artist'];
            $price=$value['price'];
            $artworkID=$value['artworkID'];
            $orderID=$value['orderID'];
            echo "<tr>
                    <th>$title</th>
                    <th><img src='img/$path' class='img-order img-thumbnail'> </th>
                    <th>$artist</th>
                    <th class='price'>$price</th>
                    <th>
                    <div>
                    <button onclick='showmore($artworkID)'class='btn btn-primary'>learn more</button><br><br>
                    <button onclick='addcart($artworkID,$orderID)' class='btn btn-success'>add cart!</button>
                    </div> 
                     </th>
                </tr>";
        }
        echo "</table>";
        ?>
    </div>
    <ul class="pagination">
        <?php
        $index=1;
            while ($index<$pageNum){
                echo "<li onclick='changepage($index)'><a href='#'>$index</a></li>";
                $index++;
            }
        ?>
    </ul>
</div>
<?php include ("format/footer.php");?>
</body>
</html>
