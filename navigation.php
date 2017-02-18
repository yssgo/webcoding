<?php
    $sql="SELECT * from `topic`";
    $result=mysqli_query($conn,$sql);
?>
<ol class="nav nav-pills nav-stacked">
    <?php
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $title=htmlspecialchars($row['title']);
            $href="./index.php".'?id='.$id;
            if($cfgvar!=""){
                $href .= "&cfgvar=".$cfgvar;
            }
            echo '<li><a href="'.$href.'">'.$title.'</a></li>'."\n";
        }
    ?>
</ol>
