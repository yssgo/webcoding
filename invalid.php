<?php
    require("config/config.php");
    require("config/prefer.php");
    require("lib/db.php");
    if( empty($_GET['cfgvar']) == false ) {
        $cfgvar=$_GET['cfgvar'];
        $conn=db_init(${$cfgvar});
    }else{
        $cfgvar="";
        $conn=db_init($config);
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  <title><?=$prefer['sitename']?>:오류</title>
  <link rel="stylesheet" type="text/css" href="<?=$prefer["default-css"]?>">
</head>
<body id="target">


    <div class="container">
        <header class="jumbotron text-center">
            <?php
                require("header.php")
            ?>
        </header>
        <div class="row">
            <nav class="col-md-3">
                <?php
                    require("navigation.php")
                ?>
            </nav>
            <div class="col-md-9">

                <article class="">
<?php
if( empty($_GET['msg']) == true ){
  echo "<div><h2 style=\"color:red\">비밀번호가 틀립니다.</h2></div>\n";
}
else{
echo "<div><h2 style=\"color:red\">".$_GET['msg']."</h2></div>\n";
}
?>
 </article>

                <hr />
                <div id="control">
                    <?php include('stylebuttons.php')?>
                </div>

            </div>
        </div>
    </div><!--container-->
    <?php
        require("lib/jquery_bootstrap.php");
    ?>
</body>
</html>
