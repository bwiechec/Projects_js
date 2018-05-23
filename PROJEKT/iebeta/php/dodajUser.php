<?php
    session_start();
  if(!isset($_POST['tresc'])){
    header("Location: index.php");
  }
  $polaczenie = new mysqli('localhost','root','','projekt');
  if(!$polaczenie->connect_errno){
      $polaczenie->set_charset("utf8");
    $zdjecie = $_POST['zdjecie'];
    if(empty($_POST['zdjecie'])){
      $zdjecie = "Brak zdjęcia";
    }
    $sql = "INSERT INTO `pytania`(`id_pytania`, `tresc`, `zdjecie`, `dane`, `wynik`) VALUES (DEFAULT,'$_POST[tresc]','$zdjecie','Dane: $_POST[dane]','Wynik: $_POST[wynik]')";
    if($rezultat = $polaczenie->query($sql)){
      $sql = "SELECT count(*) from pytania";
      if($rezultat = $polaczenie->query($sql)){
          $ilosc = $rezultat->fetch_array();
        echo $ilosc[0];
      $sql = "INSERT INTO `odpowiedzi`(`id_odpowiedzi`, `id_uzytkownika`, `id_pytania`, `odpowiedz`, `data_dodania`) VALUES (DEFAULT,$_SESSION[id],$ilosc[0],'$_POST[odpowiedz]',CURDATE())";
      if($rezultat = $polaczenie->query($sql)){
        header("Location: ../panel.php");
      }
      }
    }
    $polaczenie->close();
  }else{
    echo "Błąd połączenia";
  }

?>