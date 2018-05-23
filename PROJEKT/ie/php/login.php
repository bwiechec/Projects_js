<?php
session_start();

    if(isset($_POST['emailInput'])&&isset($_POST['passInput'])){

        $email = $_POST['emailInput'];
        $pass = $_POST['passInput'];
        
        
        
        $hashed_password = password_hash($pass, PASSWORD_BCRYPT);
        
        $polaczenie = new mysqli('localhost','root','','projekt');
        if(!$polaczenie->connect_errno){
        $email = $polaczenie->real_escape_string(htmlentities($email));
        $sql = "Select * from uzytkownicy where email = '$email'";
            
            if($rezultat=$polaczenie->query($sql)){
                $ilosc=$rezultat->num_rows;
                if($ilosc===1){
                    $wynik = $rezultat->fetch_assoc();
                    if(password_verify($pass,$wynik['haslo'])){
                        $_SESSION['zalogowany'] = true;
                        $_SESSION['login'] = $wynik['login'];
                        $_SESSION['email'] = $wynik['email'];
                        $_SESSION['data_zal'] = $wynik['data_zal'];
                        $_SESSION['uprawnienia'] = $wynik['uprawnienia'];
                        $_SESSION['komunikat'] = "<span style='color: green; font-size: 20px;'>Pomyślnie zalogowano na konto {$_SESSION['email']}!</span>";
                        header("Location: ../index.php");
                    }else{
                        $_SESSION['komunikat'] = "<span style='color: red; font-size: 20px;'>Błędne dane</span>";
                        header("Location: ../zaloguj.php");
                    }
                }else{
                    
                    
                $_SESSION['komunikat'] = "<span style='color: red; font-size: 20px;'>Błędne dane</span>";
                header("Location: ../zaloguj.php");
                
                }
            }else{
                echo "Błąd w zapytaniu";
            }
           $polaczenie->close(); 
        }else{
            echo "Błąd w połączeniu z bazą danych";
        }
    }else if($_SESSION['zalogowany']){
        header('Location: ../zadania.php');
    }else{
        header('Location: ../index.php');
    }
?>