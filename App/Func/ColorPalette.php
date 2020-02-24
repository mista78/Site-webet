<?php 

/**
 * @param  [type]
 * @param  integer
 * @param  integer
 * @return [type]
 */
function palette($img, $width = 3, $height = 3) {
    $img = ImageCreateFromPng($img);
    $img_w = imagesx($img);
    $img_h = imagesy($img);


    $block_w = round($img_w / $width);
    $block_h = round($img_h / $height);

    for($y = 0; $y < $height; $y++) {
        for($x = 0; $x < $width; $x++) {
            $block_start_x = ($x * $block_w);
            $block_start_y = ($y * $block_h);
            $block = imagecreatetruecolor(1, 1);

            imagecopyresampled($block, $img, 0, 0, $block_start_x, $block_start_y, 1, 1, $block_w, $block_h);
            imagetruecolortopalette($block, true, 1);
            $colour_index = imagecolorat($block, 0, 0);
            $rgb = imagecolorsforindex($block, $colour_index);
            $colour_array[$x][$y]['r'] = $rgb['red'];
            $colour_array[$x][$y]['g'] = $rgb['green'];
            $colour_array[$x][$y]['b'] = $rgb['blue'];
            imagedestroy($block);
        }
    }

    imagedestroy($img);
    return $colour_array;
}
