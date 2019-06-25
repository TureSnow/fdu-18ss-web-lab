<?php
/**
 * Created by PhpStorm.
 * User: DDDN
 * Date: 2019/6/3
 * Time: 15:29
 */

$connString="mysql:host=localhost;dbname=artstore";
$user="root";
$password="TF22661.me";
$pdo=new PDO($connString,$user,$password);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>