<?php
$imageURL=@$_GET['image_path'];
$extension= pathinfo($imageURL, PATHINFO_EXTENSION);
if($extension=='png' || $extension=='PNG')
{
	header('Content-type: image/png');
}else
{
	header('Content-type: image/jpeg');
}
	if($imageURL)
	{
		if(@$_GET['pix']){
			$pix=@$_GET['pix'];	
		}else { $pix="140"; } 
	$image_path="../".$_GET['image_path'];
	$image_size=getimagesize($image_path);
	$image_width=$image_size[0];
	$image_height=$image_size[1];
	
	$new_size=($image_width + $image_height) /($image_width * ($image_height/$pix));
	$new_width=$image_width * $new_size;
	$new_height=$image_height * $new_size;
	
	$new_image=imagecreatetruecolor($new_width,$new_height);
		if($extension=='png' || $extension=='PNG')
		{
			$old_image=imagecreatefrompng($image_path);
		}else
		{
			$old_image=imagecreatefromjpeg($image_path);
		}
	
	imagecopyresized($new_image,$old_image,0,0,0,0, $new_width,$new_height,$image_width,$image_height);
		if($extension=='png' || $extension=='PNG')
		{
			imagepng($new_image);
		}else
		{
			imagejpeg($new_image);
		}
	
	}




?>