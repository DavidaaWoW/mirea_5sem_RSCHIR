<?php
header("Content-type: image/png");
$im=imagecreate(2000,2000) or die("error");

$blue=imagecolorallocate($im, 0, 0, 255);
$green=imagecolorallocate($im, 0, 255, 0);
$red=imagecolorallocate($im, 255, 0, 0);
$yellow=imagecolorallocate($im, 255, 255, 0);
$white = imagecolorallocate($im, 255, 255, 255);


imagefill($im, 0, 0, $white);

try{
    $num = $_GET["num"];
}
catch(Exception $e){$num = 1;}

switch($num){
    case 1:
        imagefilledellipse($im, 100, 100, 200, 200, $blue);
        break;
    case 2:
        imagefilledrectangle($im, 0, 0, 300, 300, $green);
        break;
    case 3:
        imagefilledellipse($im, 100, 100, 100, 100, $red);
        break;
    case 4:
        imagefilledrectangle($im, 0, 0, 400, 400, $yellow);
        break;
    default:
        imagefilledrectangle($im, 100, 100, 200, 200, $blue);
        break;
}

imagepng($im);
?>