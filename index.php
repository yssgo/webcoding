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
  <?php
    if( empty($_GET['id']) == false ) {
        $sql1 = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
        $result1=mysqli_query($conn,$sql1);
        $row1=mysqli_fetch_assoc($result1);
        $title1=htmlspecialchars($row1['title']);
        $name1=htmlspecialchars($row1['name']);
        $oktags1=implode($prefer["allowed_tags"]);
        $description1=strip_tags($row1['description'],$oktags1);

        echo "<title>".$prefer['sitename'].":".htmlspecialchars($row1['title'])."</title>";
      }
    else{

        echo "<title>".$prefer["sitename"]."</title>";
      }
  ?>

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
                    if( empty($_GET['id']) == false ) {
                        echo '<h2>'.$title1.'</h2>'."\n";
                        echo '<p>'.$name1.'</p>'."\n";
                        echo $description1;
                    }
                    else{
                        echo "<h2>어서 오십시오. 웹코딩입니다.</h2>";
                    }
                    ?>
                </article>

                <hr />
                <div id="control">
                    <?php include('stylebuttons.php')?>
                    <?php
                    {
                        $href="./write.php";
                        if($cfgvar!=""){
                            $href .= "?cfgvar=".$cfgvar;
                        }
                        echo '<a href="'.$href.'" class="btn btn-success btn-lg">'.'쓰기'.'</a>'."\n";
                    }
                    if( empty($_GET['id']) == false ) {
                        $href="./delete.php?id=".$_GET['id'];
                        if($cfgvar!=""){
                            $href .= "&cfgvar=".$cfgvar;
                        }
                        echo '<a href="'.$href.'" class="btn btn-danger btn-lg">'.'삭제'.'</a>'."\n";
                    }
                    ?>
<?php
if(!empty($_GET['id'])){
    echo ' | ';
    echo '<a href="edit.php?id=';
    $edit_id=$row1['id'];
    echo $edit_id;
    if($cfgvar!=""){
        echo '&cfgvar='.$cfgvar;
    }
    echo '" class="btn btn-success btn-lg">편집</a>';
}
?>
</div>
                </div>

            </div>
        </div>
    </div><!--container-->
    <?php
        require("lib/jquery_bootstrap.php");
    ?>
</body>
</html>
