<?php
@session_start();
$md5_hash = md5(rand(0, 999));

$security_code = substr($md5_hash, 15, 5);

$_SESSION["security_code"] = $security_code;
$width = 125;
$height = 34;

//Create the image resource 
$image = ImageCreate($width, $height);

//We are making three colors, white, black and gray
$white = ImageColorAllocate($image, 255, 255, 255);
$black = ImageColorAllocate($image, 0, 0, 0);
$grey = ImageColorAllocate($image, 165, 165,165);

//Make the background black 
ImageFill($image, 0, 0, $white);

//Add randomly generated string in white to the image
ImageString($image,29, 30, 10, $security_code, $black);

//Throw in some lines to make it a little bit harder for any bots to break 


imageline($image, $width / 1, 0, $width /10, $height, $grey);
imageline($image, $width / 2, 0, $width / 6, $height, $grey);
imageline($image, $width / 3, 0, $width / 2, $height, $grey);
imageline($image, $width / 4, 0, $width / 1, $height, $grey);
//Tell the browser what kind of file is come in 
header("Content-Type: image/jpeg");

//Output the newly created image in jpeg format 
ImageJpeg($image);

//Free up resources
ImageDestroy($image);
?>