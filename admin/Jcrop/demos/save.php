<?php

/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008-2009 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */
 //var_dump($_POST);exit;
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{	
	$targ_w =$_POST['width'];
	$targ_h =$_POST['height'];
	$jpeg_quality = 100;
var_dump($_POST['img']);exit;
	$src = $_POST['img'];
	$a = explode("/", $src);
	$name = end($a);
	//var_dump($name);exit;
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);
	header('Content-type: image/jpeg');
	imagejpeg($dst_r,null,$jpeg_quality);
	//imagejpeg($dst_r,"uploads/".$name,$jpeg_quality);
	//imagedestroy($dst_r);
	exit;
}


?>
