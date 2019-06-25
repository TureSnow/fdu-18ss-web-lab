<?php
    include ("connect.php");

?>
<!DOCTYPE html>
<html>
<head>
    <?php include ("head.php");?>
    <script src="js/search.js"></script>
    <script src="js/page.js"></script>
</head>
<body>
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
<div class="container">
    <div class="col-lg-6 col-md-6">
        <h1>please input some thing to search...</h1>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="input-group pull-right">
            <input type="text" class="form-control" id="search" placeholder="please input keywords..." name="search">
            <button class="btn btn-warning" onclick="search();"><span class="glyphicon glyphicon-search"></span>search</button>
        </div>
    </div>
    <div id="stage" class="container card">

    </div>
</div>
</body>
</html>

