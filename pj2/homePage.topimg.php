<?php
    include ("connect.php");
    $sql="SELECT * FROM artworks where orderID is NULL ORDER BY view  DESC LIMIT 3 OFFSET 0 ";
    $result=$pdo->query($sql);
    $array=$result->fetchAll();
    ?>
    <div id="myCarousel" class="carousel slide container" align="center">
    <!-- 轮播（Carousel）指标 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- 轮播（Carousel）项目 -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="img/<?php echo $array[0]["imageFileName"]?>" alt="First slide">
            <div class="carousel-caption card" style="background-color: transparent">
                <h2><?php echo $array[0]["title"] ?></h2>
                <p><?php echo $array[0]["description"]?></p>
                <div>
                    <?php
                    $artworkID0=$array[0]['artworkID'];
                    $orderID0=$array[0]['orderID'];
                    echo"<button class='btn btn-primary' onclick='addcart($artworkID0,$orderID0)'>add to cart!</button>";
                    echo"<button class='btn btn-danger' onclick='showmore($artworkID0)'>learn more</button>";
                    ?>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="img/<?php echo $array[1]["imageFileName"]?>"  alt="Second slide">
            <div class="carousel-caption card" style="background-color: transparent" >
                <h2><?php echo $array[1]["title"] ?></h2>
                <p><?php echo $array[1]["description"]?></p>
                <div>
                    <?php
                    $artworkID1=$array[1]['artworkID'];
                    $orderID1=$array[1]['orderID'];
                    echo"<button class='btn btn-primary' onclick='addcart($artworkID1,$orderID1)'>add to cart!</button>";
                    echo"<button class='btn btn-danger' onclick='showmore($artworkID1)'>learn more</button>";
                    ?>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="img/<?php echo $array[2]['imageFileName']?>" alt="Third slide">
            <div class="carousel-caption card" style="background-color: transparent">
                <h2><?php echo $array[2]["title"] ?></h2>
                <p><?php echo $array[2]["description"]?></p>
                <div>
                    <?php
                    $artworkID2=$array[2]['artworkID'];
                    $orderID2=$array[2]['orderID'];
                    echo"<button class='btn btn-primary' onclick='addcart($artworkID2,$orderID2)'>add to cart!</button>";
                    echo"<button class='btn btn-danger' onclick='showmore($artworkID2)'>learn more</button>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>