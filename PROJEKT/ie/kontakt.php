<?php
session_start();
require_once('php/counter.php');
require_once('php/dataCzas.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kontakt</title>
	<link rel="icon" href="fav.png">
	<link href="stylesheets/kontakt.css" type="text/css" rel="stylesheet">
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
		</ul>
        <ul class="nav navbar-nav navbar-right">    
		<li><?php if(!isset($_SESSION['zalogowany'])) echo "<li><a href='zaloguj.php'>Zaloguj się</a></li>"; ?>
        <?php if(isset($_SESSION['zalogowany'])) echo "<li><a href='php/logout.php'>Witaj {$_SESSION['login']}! (Wyloguj się)</a></li>"; ?></li>
		</ul>
		</div>
	</nav>
<div class="container">
	<form class="form-horizontal" action="php/mail.php" method="post" id="contactForm">
	<fieldset id="cfHeader">
        <legend>Formularz kontaktowy</legend>
    </fieldset>
    <div class="form-group">
    <label class="col-md-4 col-sm-4 control-label"></label>  
    <div class="col-md-7 col-sm-7 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
    <input name="email" id="email" for="email" placeholder="Twój adres e-mail" class="form-control"  type="email">
    </div>
    </div>
    </div>
	
	<div class="form-group">
	<label class="col-md-4 col-sm-4 control-label"></label>  
	<div class="col-md-7 col-sm-7 inputGroupContainer">
	<div class="input-group">
	<span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i></span>
	<input  name="title" id="title" for="title" placeholder="Tytuł wiadomości" class="form-control"  type="text">
	</div>
	</div>
	</div>
	
	<div class="form-group">
    <label class="col-md-4 col-sm-4 control-label"></label>
    <div class="col-md-7 col-sm-7 inputGroupContainer">
    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
    <textarea name="message" id="message" class="form-control" for="message" placeholder="Treść twojej wiadomości"></textarea>
    </div>
    </div>
    </div>

	<div class="form-group">
	<label class="col-md-4 col-sm-4 control-label"></label>
	<div class="col-md-7 col-sm-7">
	<button type="submit" class="btn btn-primary" >Wyślij <span class="glyphicon glyphicon-send"></span></button>
	</div>
	</div>
    </form>
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