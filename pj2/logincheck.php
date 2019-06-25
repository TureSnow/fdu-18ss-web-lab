<?php
if(isset($_GET["name"]) && isset($_GET["pass"]) ) {
    $user1 = $_GET["name"];
    $psw1 = $_GET["pass"];

    include("connect.php");
    $sql = "select * from users where name='$user1' and password = '$psw1'";
    $result =$pdo->query($sql);
    $num=$result->fetchAll();

    if(empty($num[0])){
        echo "account is null or password is error!";
        $pdo=null;
        return;
    }
    else{
        setcookie('name',$_GET['name'],time()+86400);
        $_COOKIE['name']=$_GET['name'];
        setcookie('userID',$num[0]['userID'],time()+86400);
        setcookie('balance',$num[0]['balance'],time()+86400);
        setcookie('login',1,time()+86400);
        echo "welcome!";
        $pdo=null;
        return;
    }
}
else {
    echo "internet error";
}

?>