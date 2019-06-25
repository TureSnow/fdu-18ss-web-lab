<?php
    $userID=$_COOKIE['userID'];
    include ("connect.php");
    $sql="select * from users where userID=$userID";
    $temp=$pdo->query($sql);
    $result=$temp->fetchAll();
    $balance=$result[0]['balance'];
    $email=$result[0]['email'];
    $phone=$result[0]['tel'];
    $name=$result[0]['name'];
    $address=$result[0]['address'];
    ?>
<!DOCTYPE html>
<html>
    <?php include ("head.php");?>
    <title>Information</title>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
<?php include ("mune2.php");?>




<div class="container">
    <ul id="myTab" class="nav nav-tabs">
        <li>
            <a href="#basic" data-toggle="tab">
                your basic information
            </a>
        </li>
        <li><a href="#order" data-toggle="tab">
                your order history
            </a></li>
        <li><a href="#release" data-toggle="tab">
                your released history
            </a></li>
        <li><a href="#sold" data-toggle="tab">
                your sold
            </a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="basic">

            <!--information basic-->
            <div class="card">
                <h1>There are all information of you</h1>
                <table class="table table-striped">
                    <tr>
                        <?php echo "<th>username</th><th>$name</th>"?>
                    </tr>
                    <tr>
                        <?php echo "<th>email</th><th>$email</th>"?>
                    </tr>
                    <tr>
                        <?php echo "<th>phone</th><th>$phone</th>"?>
                    </tr>
                    <tr>
                        <?php echo "<th>address</th><th>$address</th>"?>
                    </tr>
                    <tr>
                        <?php echo "<th>balance</th><th>$balance</th>"?>
                    </tr>
                    <tr>
                        <?php echo "<th><button class='btn btn-primary' onclick='alter()'>alter</button></th>
                                <th><button class='btn btn-danger' onclick='money'>top-up</button></th>"?>
                    </tr>
                </table>
            </div>
        </div>
        <div class="tab-pane fade" id="order">
            <div class="card">

                <?php
                /*select by userID->orderID*/
                $sql1="select * from orders where ownerID='$userID'";
                $temp1=$pdo->query($sql1);
                $result1=$temp1->fetchAll();
                if (empty($result1[0])){
                    echo "<h2 class='price'>You have not buy any thing!</h2>";
                }else{
                    foreach ($result1 as $key=>$value){
                        echo "<h1>There are your order</h1>
                        <table class='table table-striped'>";
                        $order=$value['orderID'];
                        echo "<thead><h3>orderID:$order</h3></thead>";

                        /*select by orderID->img*/
                        $sql11="SELECT * FROM artworks where orderID=$order";
                        $temp11=$pdo->query($sql11);
                        $result11=$temp11->fetchAll();
                        echo "<tr>
                            <th>title</th>
                            <th>img</th>
                            <th>price</th>
                        </tr>";
                        foreach ($result11 as $key1=>$value1){
                            $title=$value1['title'];
                            $path=$value1['imageFileName'];
                            $price=$value1['price'];
                            echo "<tr>
                            <th>$title</th>
                            <th><img src='img/$path' class='img-order img-thumbnail' id=''></th>
                            <th>$price</th>
                        </tr>";
                        }
                        echo"</table>";
                    }
                }
                ?>
            </div>
        </div>
        <div class="tab-pane fade" id="release">
            <div class="container card">
                <?php
                $sql2="SELECT * FROM artworks WHERE ownerID=$userID";
                $temp2=$pdo->query($sql2);
                $result2=$temp2->fetchAll();
                if (empty($result2[0])){
                    echo "<h2 class='price'>You have not release any thing!</h2>";
                }else{
                    echo "
                    <h1>There are your released paints!</h1>
                    <table class='table table-striped'>
                    <tr>
                        <th>title</th>
                        <th>img</th>
                        <th>releaseTime</th>
                    </tr>
                ";
                    foreach ($result2 as $key2=>$value2){
                        $title2=$value2['title'];
                        $path2=$value2['imageFileName'];
                        $time=$value2['timeReleased'];
                        echo"
                    <tr>
                        <th>$title2</th>
                        <th><img src='img/$path2' class='img-thumbnail img-order'> </th>
                        <th>$time</th>
                    </tr>
                    
                    ";
                    }
                    echo"<tr><th colspan='2'></th><th><button class='btn btn-success'onclick=''>release now</button></th></tr>";
                    echo "</table>";
                }
                ?>



            </div>
        </div>
        <div class="tab-pane fade" id="sold">
            <div class="container">
              <?php
              $sql3="SELECT * FROM artworks where ownerID=$userID AND orderID is not NULL";
              $temp3=$pdo->query($sql3);
              $result3=$temp3->fetchAll();
              if (empty($result3[0])){
                  echo "<div><h1>You have not sell any paint</h1> </div>";
              }else{
                  echo "<h1>your paint sold</h1><table><tr>
                    <th>title</th>
                    <th>img</th>
                    <th>price</th>
                    </tr>";
                  foreach ($result3 as $key3=>$value3){
                      $title3=$value3['title'];
                      $path3=$value3['imageFileName'];
                      $price3=$value3['price'];
                      echo "<tr>
                                <th>$title3</th>
                                <th><img class='img-thumbnail img-order' src='img/$path3'> </th>
                                <th>$price3</th>
                            </tr>";
                  }
                  echo"</table>";
              }
              ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
