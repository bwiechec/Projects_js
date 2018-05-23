<?php
  if(!isset($_GET['id'])){
    echo $_GET['id'];
    //header("Location: ../index.php");
  }
  $polaczenie = new mysqli('localhost','root','','projekt');
  if(!$polaczenie->connect_errno){
    $sql = "UPDATE `uzytkownicy` SET `login`='$_POST[login]',`email`='$_POST[email]',`data_zalozenia`='$_POST[data_zal]',`uprawnienia`='$_POST[uprawnienia]' WHERE id_uzytkownika = $_GET[id]";
    echo "$_POST[login] $_POST[email] $_POST[data_zal] $_POST[uprawnienia] $_GET[id]";
    if($rezultat=$polaczenie->query($sql)){
      header("Location: ../panel.php");
    }else{
      echo "cos nie tak";
    }
    $polaczenie->close();
  }else{
    echo "Błąd połączenia";
  }

?>