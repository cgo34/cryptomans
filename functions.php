<?php
// Converti une string en binaire
function str2bin($str)
{
    $bin = '';
    $length = strlen($str);
    for ($i = 0; $i < $length; $i++)
    {
        // On converti le code ASCII du char en binaire
        $convert = decbin(ord($str[$i]));

        // On complète avec les 0 pour faire 1 octet
        $convert = strrev(str_pad(strrev($convert), 8, '0'));
        $bin .= $convert;
    }
    return ($bin);
}

// Converti du binaire en string
function bin2str($bin)
{
    $str = '';
    $split = str_split($bin, 8);
    $count = count($split);
    for ($i = 0; $i < $count; $i++)
    {
        $str .= chr(bindec($split[$i]));
    }
    return ($str);
}

// Converti du binaire en string
function binWithSpace($bin)
{
    $str = preg_replace('#(\d{8})#', '$1 ', $bin);
    return ($str);
}
?>