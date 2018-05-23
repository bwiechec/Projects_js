<?php
session_start();
if(isset($_SESSION['zalogowany'])){
    header("Location: zadania.php");
}
require_once('php/counter.php');
require_once('php/dataCzas.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Rejestracja</title>
	<link rel="icon" href="fav.png">
	<link href="stylesheets/rejestracja.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
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
		<li><?php if(!isset($_SESSION['zalogowany'])) echo "<li><a href='zaloguj.php'>Zaloguj się</a></li>"; ?></li>
		</ul>
		</div>
	</nav>
	<div class="container">
    <div class="col-md-6 col-sm-6">
        <br>
        <br>
    <fieldset>
        <legend>Panel rejestracji</legend>
    <div class="panel-body">
        <form role="form" action="./php/regVal.php" method="POST">
            <div id="komunikat"></div>
            <div class="form-group">
            <label for="emailInput">Adres e-mail</label>
            <input type="email" class="form-control" id="emailInput" name="email">
            </div>
            
            <div class="form-group">
            <label for="loginInput">Login</label>         
            <input type="text" class="form-control" id="loginInput" name="login">
            </div>
            
            <div class="form-group">
            <label for="passInput">Hasło</label>         
            <input type="password" class="form-control" id="passInput" name="pass1">
            </div>
            
            <div class="form-group">
            <label for="passInput2">Potwierdź hasło</label>         
            <input type="password" class="form-control" id="passInput2" name="pass2">
            </div>
            
            <label><input type="checkbox" value="checked" name="regulations">&nbsp;Akceptuję&nbsp;<a href="regulamin/regulamin.pdf">regulamin</a></label><br><br>
            
            <div class="g-recaptcha" data-sitekey="6LctwDsUAAAAADAO8ULRK20Tllh02XGFOyoEHuDy"></div>
            <br>
            <button type="submit" id="registration" class="btn btn-primary">Zarejestruj się</button>

        </form>
        
    </div>
    </fieldset>
    </div>
        <div class="col-md-6 col-sm-6">
            <center>
                <br><br><br><br>
            <h2>
              Zarejestruj się bezpłatnie...<br>
              <small class="text-muted">i zyskaj dostęp do dziesiątek zadań z informatyki, wraz z rozwiązaniami.</small>
            </h2>
            </center>
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