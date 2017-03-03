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
    <meta name="generator" content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link href="/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">

    <title><?=$prefer['sitename']?>
    :편집</title>
    <link rel="stylesheet" type="text/css" href="&lt;?=$prefer[">
</head>

<body>
    "&gt;

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
                      if(empty($_GET['id'])){
                          if($cfgvar==""){
                              header("Location:index.php");
                          }else{
                              header("Location:index.php&cfgvar=".$cfgvar);
                          }

                      }else{
                        $id=mysqli_real_escape_string($conn,$_GET['id']);
                        $sql="SELECT topic.id, topic.title, topic.description, user.name, topic.created FROM topic LEFT JOIN user ON topic.author=user.id WHERE topic.id=".$id;
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_fetch_assoc($result);
                      }
                    ?>
                    <?php
                    if($cfgvar==""){
                        $action_page='update.php';
                    }else{
                        $action_page='update.php?cfgvar='.$cfgvar;
                    }
                    ?>

                    <form class="" action="%3C?=$action_page?%3E" method="post">
                        <div class="form-group">
                            <?php $row_title=htmlspecialchars($row['title']);?>
                            <label for="title">제목</label> <input class=
                            "form-control" type="text" id="title" name="title" value="&lt;?=$row_title?&gt;" required="required"
                            placeholder="제목을 입력하세요">
                        </div>

                        <div class="form-group">
                            <?php $row_name=htmlspecialchars($row['name']);?>
                            <label for="author">작성자</label> <input class=
                            "form-control" type="text" id="author" name="author" readonly="readonly" value="&lt;?=$row_name?&gt;"
                            required="required" placeholder="작성자 이름을 입력하세요">
                        </div>

                        <div class="form-group">
                            <label for="password">비밀번호</label> <input class="form-control" type="password" id="password"
                            name="password" required="required" placeholder="비밀번호를 입력하세요">
                        </div>

                        <div class="form-group">
                            <?php
                                //$oktags=implode($prefer["allowed_tags"]);
                                //$row_description=strip_tags($row['description'],$oktags);
                                  $row_description=$row['description'];
                                ?><label for="description">본문</label> 
                            <textarea class="form-control" id="description" name="description" rows="8" required="required"
                            placeholder="본문을 입력하세요">
<?=$row_description?>
</textarea> <?php $oktags2=implode(' ',$prefer["allowed_tags"]); ?>

                            <p>(*<?=htmlspecialchars($oktags2)?>
                            * 태그를 사용할 수 있습니다.)</p>
                        </div>

                        <div class="form-group">
                            <input type="hidden" role="uploadcare-uploader" data-image-shrink="1024x1024 80%" data-crop="">
                            <input type="text" value="&lt;?=$id?&gt;" style="display:none" name="topic_id" id="topic_id">
                            <input class="btn btn-default" type="submit" value="전송">
                        </div>
                    </form>
                </article>
                <hr>

                <div id="control">
                    <?php include('stylebuttons.php')?>
                </div>
            </div>
        </div>
    </div><!--container-->
    <?php
        require("lib/uploadcare_code.php");
        require("lib/jquery_bootstrap.php");
    ?>
</body>
</html>
