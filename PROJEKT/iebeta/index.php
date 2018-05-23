<?php
session_start();
require_once('php/counter.php');
require_once('php/dataCzas.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Strona główna</title>
	<link rel="icon" href="fav.png">
	<link href="stylesheets/index.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" id="navbar">
		<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand"><span id="IEheader">Informatyka Europejczyka</span></a>
		</div>
		<ul class="nav navbar-nav">
		<li><a href="index.php">Strona główna</a></li>
		<li><a href="kontakt.php">Kontakt</a></li>
		<li><a href="zadania.php">Zadania</a></li>
		<?php if(isset($_SESSION['zalogowany'])){if(($_SESSION['uprawnienia'])=="administrator") echo "<li><a href='panel.php'>Panel Administracyjny</a></li>";}?>
        </ul>
        <ul class="nav navbar-nav navbar-right">    
		<li><?php if(!isset($_SESSION['zalogowany'])) echo "<li><a href='zaloguj.php'>Zaloguj się</a></li>"; ?>
        <?php if(isset($_SESSION['zalogowany'])) echo "<li><a href='php/logout.php'>Witaj {$_SESSION['login']}! (Wyloguj się)</a></li>"; ?></li>
		</ul>
		</div>
	</nav>
    
	<div class="container" style="margin-top: 70px;">

        
            
    <div class="col-md-6 col-sm-6">
        <p> 
        <fieldset>
        <center><legend>Witaj na naszej stronie</legend>
            <p>Znajdziesz tutaj zadania z kasiążki Informatyka Europejczyka. Wraz z ich treścią i rozwiązaniami, jednak aby mieć do nich dostęp musisz być zalogowany. Skorzystaj z formularza u góry strony w zakładce zaloguj. Lub jeżeli nie masz jeszcze konta w naszym serwisie możesz je założyć, korzystając z tego samego panelu w zakładce zaloguj.</p></center>
        </fieldset> 
        <?php if(isset($_SESSION['komunikat'])){
            echo $_SESSION['komunikat'];
            unset($_SESSION['komunikat']);
        } ?>
        <fieldset>
        <br><br><br>
        <center><legend>Przydatne linki</legend>
            <p>
            <button><a href="http://pasja-informatyki.pl/" style="font-size: 25px;">Pasja Informatyki</a></button><br><br>
            <button><a href="http://www.cplusplus.com/" style="font-size: 25px;">Strona CPLUSPLUS</a></button><br><br>
            <button><a href="http://miroslawzelent.pl/ksiazki-warte-uwagi/" style="font-size: 25px;">Książki, które mogą pomóc</a></button><br><br>
            </p>
            </center>
        </fieldset>
    </div>
        
    </div>
    
    
    
	<nav class="navbar navbar-inverse navbar-fixed-bottom">
		<div class="container-fluid">
            <p class="navbar-text pull-right">Copyright © 2017 - Barosz Wiecheć & Cezary Nowacki</p>
            <p class="navbar-text pull-left">
            <?php    
                if($licznik == 1) {
            echo "Odwiedziłeś nas raz przez ostatnie 24 godziny.";
        } else {
            echo "Odwiedziłeś nas $licznik razy, przez ostatnie 24 godziny. ";
        }
            echo "Jest: ".date("d-m-Y H:i");       
        ?>
            </p>
		</div>
	</nav>
</body>
</html>