<?php
// Aqui tenemos a la version original de github del Santy, con cambios para pixel mas pequeño y con colores
// Colour my world, de Chicago, jejeje

define("MAX_X",14 * 40);
define("MAX_Y",10 * 40);
define("PIXEL_SIZE",8);        // Con tamaño menor de 7 ya no colorea bien, la parte de abajo queda de un solo color
define("POSSIBLE",8); // 2 is 1/2, 3 is 1/3...
 
//alloc
$myImg = imagecreate(MAX_X, MAX_Y);
$background = imagecolorallocate( $myImg, rand(0,255)%255, rand(0,128)%128, rand(0,255)%255);
$rectangleColour = imagecolorallocate( $myImg, 255, 128, 255);
 
$color = $rectangleColour;
for($j = 0; $j < (MAX_Y / PIXEL_SIZE); $j++){
  for($i = 0; $i < (MAX_X / PIXEL_SIZE) / 2; $i++){
    // Draw a white rectangle
    if(rand(0,1000000)%POSSIBLE == 0){
      $x = $i * PIXEL_SIZE;
      $y = $j * PIXEL_SIZE;
      $mirrorX = MAX_X - ($i * PIXEL_SIZE);
      $rectangleColour = imagecolorallocate( $myImg, rand(0,255)%255, rand(0,128)%128, rand(0,255)%255);
      $color = $rectangleColour;
      imagefilledrectangle($myImg, $x, $y, $x + PIXEL_SIZE, $y + PIXEL_SIZE, $color);
      imagefilledrectangle($myImg, $mirrorX - PIXEL_SIZE, $y, $mirrorX, $y + PIXEL_SIZE, $rectangleColour);
    }
  }
}
 
 
header( "Content-type: image/png" );
imagepng( $myImg );
 
//release
imagecolordeallocate($rectangleColour);
imagecolordeallocate($background);
imagedestroy($myImg);
