<?php
    function url_encode($string){
        return urlencode(rawurlencode(utf8_encode($string)));
    }
   
    function url_decode($string){
        return utf8_decode(urldecode($string));
    }
?>