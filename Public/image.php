<?php 	 


function image($string, $data = [])
{
	header ("Content-type: image/png");
	$explod = explode("x",$string);
    $largeur = (isset($data['l'])) ? $data['l'] : $explod[0];
    $hauteur = (isset($data['h'])) ? $data['h'] : $explod[1];
    $img = imagecreate($largeur, $hauteur);
    $blanc = imagecolorallocate($img, 200, 200, 200);
    $noir = (isset($data['c'])) ? imagecolorallocate($img, $data['c']['r'],$data['c']['g'],$data['c']['b'])  : imagecolorallocate($img, 0, 0, 0);
    $milieuHauteur = ($hauteur / 2);
    $milieuLargeur = (($largeur - (strlen($string)  * 10)) / 2);
    imagestring($img, 6, $milieuLargeur , $milieuHauteur, $string, $noir);
    imagepng($img);
    imagedestroy($img);
}
$get = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : "1200x650";
$get = str_replace("image.php/","",trim($get,"/"));
image($get);
?>