<?php
header("Content-type: image/png");
$string = $_GET['text'];
$im     = imagecreatefrompng("button.png");
$orange = imagecolorallocate($im, 60, 87, 156);
$px     = (imagesx($im) - imagefontwidth(4) * strlen($string)) / 2;
$py     = (imagesy($im) - imagefontheight(4)) / 2;
imagestring($im, 4, $px, $py, $string, $orange);
imagepng($im);
imagedestroy($im);
?>

