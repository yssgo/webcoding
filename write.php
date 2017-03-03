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

  <link rel="stylesheet" type="text/css" href="<?=$prefer["default-css"]?>">
  <title><?=$prefer['sitename']?>:쓰기</title>
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
                <article>

                        <?php
                        if($cfgvar!==""){
                            $action_page="process.php?cfgvar=".$cfgvar;
                        }else{
                            $action_page="process.php";
                        }
                        ?>

                        <form class="form-horizontal" action="<?=$action_page?>" method="post">
                            <div class="form-group">
                                <label for="title" class="col-md-2 control-label">제목:</label>
                                <input type="text" class="form-cotrol col-md-10" name="title" id="title" required="required" placeholder="제목을 입력하세요.">
                            </div>
                            <div class="form-group">
                                <label for="author" class="col-md-2 control-label">작성자:</label>
                                <input type="text" class="form-cotrol col-md-10" name="author" id="author" required="required" placeholder="작성자를 입력하세요.">
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-2 control-label">비밀번호:</label>
                                <input type="password" class="form-cotrol col-md-10" name="password" id="password" required="required" placeholder="비밀번호를 입력하세요">
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-md-2 control-label">본문:</label>
                                <textarea class="form-cotrol col-md-10" name="description" id="description" required="required" rows="10" placeholder="본문을 입력하세요"></textarea>
                                <?php $oktags2=implode($prefer["allowed_tags"]); ?>
                                <p>(<?=htmlspecialchars($oktags2)?> 태그를 사용할 수 있습니다.)</p>
                            </div>
                            <div class="form-group">

                                <div class="form-group">                                
    <input type="hidden" role="uploadcare-uploader"
    data-image-shrink="1024x1024 80%"
    data-crop="" />
                                <input type="submit" class="form-cotrol" name="smit_btn">
                                <input type="image" src="images/DMBTV.png" />
                            </div>
                        </form>
                </article>
                <hr />
                <div id="control">
                    <?php include('stylebuttons.php')?>
                </div>
            </div>
        </div>
    </div>

    <?php
        require("lib/uploadcare_code.php");
        require("lib/jquery_bootstrap.php");
    ?>

</body>
</html>
