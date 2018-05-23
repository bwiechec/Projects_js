<?php
session_start();

if(!isset($_SESSION['zalogowany'])){
    $_SESSION['komunikat'] = "<span style='color: red; font-size: 20px;'>Musisz się zalogować, aby zobaczyć zadania</span>";
    header("Location: zaloguj.php");
}
require_once('php/counter.php');
require_once('php/dataCzas.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Spis zadań</title>
	<link rel="icon" href="fav.png">
	<link href="stylesheets/zadania.css" type="text/css" rel="stylesheet">
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
    <br>
    <br>
    <br>
        
         <?php
        $polaczenie = @new mysqli('localhost','root','','projekt');
        if(!$polaczenie->connect_error){
            //echo "Połączenie z bazą poprawne";
            $polaczenie->set_charset('utf8');
            
            $sql = "SELECT id_pytania FROM pytania where id_pytania<=24";
            
            if($rezultat = $polaczenie->query($sql)){
                
                
                echo "<div class='col-md-2 col-sm-2'>";
                while($wiersz = $rezultat->fetch_assoc()){
                    
                        
                echo <<< TASKSID
                <ul class="nav nav-pills nav-stacked">
                <li style="text-align: center"><a href="zadania.php?id=$wiersz[id_pytania]" >$wiersz[id_pytania]</a></li>
                </ul>
TASKSID;
                        
                   
                    
                    }
                        echo "</div>";   
            }
        
             
        if(isset($_GET['id'])){
            
                       $sql = "SELECT * FROM pytania p INNER JOIN odpowiedzi o ON p.id_pytania=o.id_pytania where p.id_pytania = {$_GET['id']}"; 
                        if($rezultat = $polaczenie->query($sql)){
                            echo "<div class='col-md-8 col-sm-8'>";
                            $wiersz = $rezultat->fetch_assoc();
                            echo <<< TASKS
                   
                   <div style="text-align:center">$wiersz[tresc]</div>
                   <div style="text-align: justify">
                   $wiersz[zdjecie]
                   $wiersz[dane]<br>
                   $wiersz[wynik]<br><br>
                   <button onclick="show()">Pokaż kod C++</button><br><br>
                   <div id="cpp" style="visibility: hidden">
                        $wiersz[odpowiedz]
                   </div>
                   </div>
TASKS;
                            echo "</div>";
                        }else{
                            echo "Błąd w wyjmowaniu pytań";
                        }
            
                    }else{
            echo "<div class='col-md-8 col-sm-8'>";
            echo "<h1 style='text-align: center;'>Wybierz pytanie</h1>";
            echo "</div>";
        }
            
            $sql = "SELECT id_pytania FROM pytania where id_pytania > 24";
            
            if($rezultat = $polaczenie->query($sql)){
                
                
                echo "<div class='col-md-2 col-sm-2' style='float:right'>";
                while($wiersz = $rezultat->fetch_assoc()){
                    
                        
                echo <<< TASKSID
                <ul class="nav nav-pills nav-stacked">
                <li style="text-align: center"><a href="zadania.php?id=$wiersz[id_pytania]" >$wiersz[id_pytania]</a></li>
                </ul>
TASKSID;
                        
                   
                    
                    }
                        echo "</div>";
            $polaczenie->close();
        } else {
            echo "Błędy w połączeniu z bazą";
        }     
        
                
            }
        ?>
        
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
    <script>
    function show(){
        if(document.getElementById('cpp').style.visibility == "visible")
            document.getElementById('cpp').style.visibility = "hidden";
        else if(document.getElementById('cpp').style.visibility == "hidden")
            document.getElementById('cpp').style.visibility = "visible";
    }
    </script>
</body>
</html>