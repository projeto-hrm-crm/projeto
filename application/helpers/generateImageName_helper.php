<?php 

function generateImageName($file_name)
{
    $now = date('Y-m-d')."_".date('H-i-s');;
    $file_name = $now."_".$file_name; 
    return $file_name;
}