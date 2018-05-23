<?php
session_start();
require_once('php/counter.php');
require_once('php/dataCzas.php');
if(!isset($_SESSION['zalogowany'])){
  if(($_SESSION['uprawnienia'])=="administrator")
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Strona główna</title>
	<link rel="icon" href="fav.png">
	<link href="stylesheets/index.css" type="text/css" rel="stylesheet">
	<link href="stylesheets/panel.css" type="text/css" rel="stylesheet">
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
		<?php if(isset($_SESSION['zalogowany'])){ if($_SESSION['uprawnienia']) echo "<li><a href='panel.php'>Panel Administracyjny</a></li>";}?>
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
        <center><legend>Witaj w Panelu Administracyjnym </legend>
          <p>
          <?php
            
            $polaczenie = new mysqli('localhost','root','','projekt');
            
            if(!$polaczenie->connect_errno){
            
              $sql = "Select * from uzytkownicy";
              if($rezultat=$polaczenie->query($sql)){
                echo<<<TEKST
                  <table>
                  <tr>
                  <th>Id użytkownika</th>
                  <th>Login</th>
                  <th>Email</th>
                  <th>Data założenia</th>
                  <th>Uprawnienia</th>
                  <th>Edycja</th>
                  <th>Usuwanie</th>
                  </tr>
TEKST;
                while($wynik = $rezultat->fetch_assoc()){
                echo<<<TEKST
                  <tr>
                  <td>$wynik[id_uzytkownika]</td>
                  <td>$wynik[login]</td>
                  <td>$wynik[email]</td>
                  <td>$wynik[data_zalozenia]</td>
                  <td>$wynik[uprawnienia]</td>
                  <td><a href="panel.php?edytuj=$wynik[id_uzytkownika]">Edytuj</a></td>
                  <td><a href="php/usun.php?id=$wynik[id_uzytkownika]">Usuń</a></td>
                  </tr>
TEKST;
                  }
                echo "</table>";
                
              }else{
                echo "Błąd w zapytaniu!";
              }
            }
            ?>
          </p>
          </center>
        </fieldset> 
    </div>
        <div class="col-md-6 col-sm-6" style="text-align: center;">
          <?php
            if(isset($_GET['edytuj'])){
              $sql = "Select * from uzytkownicy where id_uzytkownika=$_GET[edytuj]";
              if($rezultat=$polaczenie->query($sql)){
                $wynik = $rezultat->fetch_assoc();
              echo<<<TEKST
              <div style="margin-left: 40%">
              <h2>Edycja użytkownika</h2>
                <form action="php/edytuj.php?id=$wynik[id_uzytkownika]" method="post">
                <div class="form-group">
                <label for="id">Id:</label> <input type="text" name="id_u" value="$wynik[id_uzytkownika]" disabled>
                </div>
                <div class="form-group">
                <label for="login">Login:</label> <input type="text" name="login" value="$wynik[login]">
                </div>
                <div class="form-group">
                <label for="email">Email:</label> <input type="text" name="email" value="$wynik[email]">
                </div>
                <div class="form-group">
                <label for="data_zal">Data założenia:</label> <input type="text" name="data_zal" value="$wynik[data_zalozenia]">
                </div>
                <div class="form-group">
                <label for="uprawnienia">Uprawnienia:</label> <input type="text" name="uprawnienia" value="$wynik[uprawnienia]"></div>
                <input type="submit" value="zatwierdz">
                </form>
                </div>
TEKST;
                
              }else{
                echo "Błąd w zapytaniu";
              }
              $polaczenie->close();
            }
          else if($polaczenie->connect_errno){
            echo "Błąd połączenia z bazą!"; 
            }
            
          ?>
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