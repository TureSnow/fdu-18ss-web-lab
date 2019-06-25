<?php

    include ("connect.php");
    if (isset($_GET['keywords'])){
        $keywords=$_GET['keywords'];
        $issearch;
        if($keywords=null){
            $issearch=0;
        }else{
            $issearch=1;
        }

        $subsql=" where title like '%$keywords%' OR description like '%$keywords%' or artist like '%$keywords%'";
        $sql="SELECT * FROM artworks".$subsql." order by view ";
        $temp=$pdo->query($sql);
        $result=$temp->fetchAll();

        if(empty($result[0])){
            echo "<p>There are no result found!</p>";
            return;
        }else{

            $sql1="SELECT * FROM artworks ".$subsql." order by view desc LIMIT 10";
            $sql2="SELECT COUNT(*) FROM artworks ".$subsql;

            $temp1=$pdo->query($sql1);
            $result1=$temp1->fetchAll();

            $temp2=$pdo->query($sql2);
            $result2=$temp2->fetchAll();
            $pageNum=ceil($result2[0]['COUNT(*)']/10);

            $index=1;
            $html=null;
            $html.="<ul class='pagination'>";
            while ($index<$pageNum){
                $html.="<li onclick='changepage($index,$issearch)'><a href='#'>$index</a></li>";
                $index++;
            }
            $html.="</ul>";
            $html.="<table class='table table-striped'><tr>
                <th>title</th>
                <th>thumbnail</th>
                <th>artist</th>
                <th>price</th>
                <th></th>
            </tr>";

            foreach ($result1 as $key=>$value){
                $title=$value['title'];
                $path=$value['imageFileName'];
                $artist=$value['artist'];
                $price=$value['price'];
                $artworkID=$value['artworkID'];
                $orderID=$value['orderID'];
                $html.="<tr>
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
            $html.="</table>";
            echo $html;
        }
    }
