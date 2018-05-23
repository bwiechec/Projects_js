<?php
  if(!isset($_GET['id'])){
    header("Location: index.php");
  }
  $polaczenie = new mysqli('localhost','root','','projekt');
  if(!$polaczenie->connect_errno){
    $sql = "DELETE FROM `uzytkownicy` WHERE id_uzytkownika = $_GET[id]";
    if($rezultat = $polaczenie->query($sql)){
      header("Location: ../panel.php");
    }
    $polaczenie->close();
  }else{
    echo "Błąd połączenia";
  }

?>