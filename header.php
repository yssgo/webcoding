<img src="images/lifecode.png" alt="생코">
<h1>
<?php
    $href="./index.php";
    if($cfgvar!=""){
        $href .= "?cfgvar=".$cfgvar;
    }
    echo '<a href="'.$href.'">'.$prefer["sitename"].'</a>'."\n";
?>
</h1>
