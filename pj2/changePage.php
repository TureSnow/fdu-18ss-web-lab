<?php
    $num=10;
    $page=$_GET['page'];
    $issearch=0;
    $jump=$num*$page;
    include ("connect.php");
    if (isset($_GET['keywords'])){
        $issearch=1;
        $keywords=$_GET['keywords'];
        $subsql=" where title like '%$keywords%' OR description like '%$keywords%' or artist like '%$keywords%'";
        $sql="SELECT * FROM artworks".$subsql." order by view LIMIT $jump,$num";
        $sql1="SELECT * FROM artworks ".$subsql." order by view desc LIMIT 10";
        $sql2="SELECT COUNT(*) FROM artworks ".$subsql;
    }else{
        $issearch=0;
        $sql="SELECT * FROM artworks order by view desc LIMIT $jump,$num";
        $sql1="SELECT * FROM artworks order by view desc LIMIT 10";
        $sql2="SELECT COUNT(*) FROM artworks ";
    }
    $temp1=$pdo->query($sql1);
    $result1=$temp1->fetchAll();

    $temp2=$pdo->query($sql2);
    $result2=$temp2->fetchAll();
    $pageNum=ceil($result2[0]['COUNT(*)']/10);

    $index=1;
    $html=null;
    if ($issearch) {
        $html .= "<ul class='pagination'>";
        while ($index < $pageNum) {
            $html .= "<li onclick='changepage($index,$issearch)'><a href='#'>$index</a></li>";
            $index++;
        }
        $html .= "</ul>";
    }



    $temp=$pdo->query($sql);
    $result=$temp->fetchAll();


       $html.="<table class='table table-striped'><tr>
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

        $orderID1=$value['orderID'];
        $orderID=intval($orderID1);


        $artworkID1=$value['artworkID'];
        $artworkID=intval($artworkID1);

        $html.="<tr>
                    <th>".$title."</th>
                    <th><img src='img/".$path."' class='img-order'> </th>
                    <th>".$artist."</th>
                    <th class='price'>$".$price."</th>
                    <th><div>
                    <button onclick='showmore($artworkID)'class='btn btn-primary'>learn more</button><br><br>
                    <button onclick='addcart($artworkID,$orderID)' class='btn btn-success'>add cart!</button>
                    </div> </th>
                </tr>";
        }
    $html.="</table>";
    echo $html;
    ?>