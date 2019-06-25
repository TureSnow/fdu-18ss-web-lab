<?php
/**
 * Created by PhpStorm.
 * User: DDDN
 * Date: 2019/6/2
 * Time: 16:03
 */
if(isset($_POST["Submit"]) && $_POST["Submit"] == "register")
{
    include("connect.php");
    mb_http_input("utf-8");
    mb_http_output("utf-8");
    $user1 = $_POST["username"];
    $psw1 = $_POST["password"];
    $psw_confirm = $_POST["confirm"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $address=$_POST['address'];
    if($psw1 == $psw_confirm) {

        $sql = "select Name from users where Name = '$user1'"; //SQL语句
        $result = $pdo->query($sql);    //执行SQL语句
        $num = $result->fetch(PDO::FETCH_BOTH); //统计执行结果影响的行数
        if(!empty($num[0])){
            echo "<script>alert('用户名已存在'); history.go(-1);</script>";
        } else    //不存在当前注册用户名称
        {
            $sql_insert = "INSERT INTO `users`( `name`, `password`, `email`, `tel`,`address`) VALUES ('$user1','$psw1','$email','$phone','$address')";
            $res_insert = $pdo->query($sql_insert);
            if($res_insert)
            {
                echo "<script>alert('注册成功！');</script>";
                setcookie('name',$user1,time()+86400);
                setcookie('login',0);
                header('location: homePage.php');
            }
            else
            {
                echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";
            }
        }
    }
    else
        {
            echo "<script>alert('密码不一致！'); history.go(-1);</script>";
        }
    }
else
{
    echo "<script>alert('提交未成功！'); history.go(-1);</script>";
}
    $pdo=null;

?>

