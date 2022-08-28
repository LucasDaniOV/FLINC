<?php
session_start();

$image = imagecreatetruecolor(200,50);
$bgcolor = imagecolorallocate($image,255,255,255);
$color = imagecolorallocate($image,0,0,0);
imagefilledrectangle($image, 0, 0, 200, 50, $bgcolor);

$letters = "1234567890";
$uitvoer = "";

for ($i = 0; $i < 5; $i++){
	$letter = $letters[mt_rand(0,strlen($letters)-1)];
	$uitvoer .= $letter; 
}

$_SESSION['captcha'] = $uitvoer;

$font = "fonts/impact.ttf";
imagettftext($image, 50, 0, 10, 38, $color, $font, $uitvoer);
$kleurBlauw = imagecolorallocate($image,0,0,255);
$kleurGrijs = imagecolorallocate($image,100,100,100);

for ($i=0; $i <30; $i++){
  imageline($image, 0, mt_rand(0,50), 200, mt_rand(0,50), $kleurBlauw);	
}


for ($i=0; $i <2000; $i++){
  imagesetpixel($image, mt_rand(0,200), mt_rand(0,50), $kleurGrijs);	
}

header('Content-type: image/png');
imagepng($image);