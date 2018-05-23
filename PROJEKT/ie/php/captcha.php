<?php
session_start();
?>
<?php
    function verify () {
        $key = '6LctwDsUAAAAADsKiph5P5QwRLRUXB8uBHPvxvUz';
        $test = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$key.'&response='.$_POST['g-recaptcha-response']));
        return $test->success; 
    }
?>