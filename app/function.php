<?php


function SoGood(string $text){
    if($text=='Sapa'){
        return true;
    }

    return false;
}


function PowNum(int $num){
    if($num!=0){
        return $num*$num;
    }

    return false;
}
