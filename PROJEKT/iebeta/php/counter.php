<?php
if(!isset($_COOKIE['licznik'])){
        $licznik = 1;
    } else {
        $licznik = intval($_COOKIE['licznik']);
        $licznik++;
    }

    setcookie('licznik',$licznik,time()+60*60*24);
?>