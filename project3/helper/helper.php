<?php 
function format_date($date){
    return date('F j - Y - g:i a',strtotime($date));
}
function shortentext($text,$char=450){
    $text =substr($text,0,$char);//12 345 648 57 '98 554 5554'   (0,10) from 25 char
    $text=substr($text,0,strrpos($text,' '));//12345648          (0,strrpos(t,' '))
    $text =$text.' ....  ';//12345648 + ...
    return $text;
}