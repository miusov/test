<?php

function imageresize($outfile,$infile,$neww,$newh,$quality,$type) 
{
if ($type == 'image/jpeg') $im=imagecreatefromjpeg($infile);
if ($type == 'image/gif') $im=imagecreatefromgif($infile);
if ($type == 'image/png') $im=imagecreatefrompng($infile);
    
    $im1=imagecreatetruecolor($neww,$newh);
    imagecopyresampled($im1,$im,0,0,0,0,$neww,$newh,imagesx($im),imagesy($im));

    imagejpeg($im1,$outfile,$quality);
    imagedestroy($im);
    imagedestroy($im1);
}
