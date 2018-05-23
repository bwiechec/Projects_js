<?php
    
    session_start();

    $polaczenie = @new mysqli('127.0.0.1','root','','projekt');
    if(!$polaczenie->connect_error){
        
            $email = $_POST['email'];
            $login = $_POST['login'];
            $password1 = $_POST['pass1'];
            $password2 = $_POST['pass2'];
            $regulations = $_POST['regulations'];
        
        if(!empty($_POST['email']) && !empty($_POST['login']) && !empty($_POST['pass1']) && !empty($_POST['pass2']) && ($regulations == 'checked') && isset($_POST['g-recaptcha-response'])) {
            

            $login = $polaczenie->real_escape_string(htmlentities($login));
            $email = $polaczenie->real_escape_string(htmlentities($email));
            $password1 = $polaczenie->real_escape_string(htmlentities($password1));
            $password2 = $polaczenie->real_escape_string(htmlentities($password2));
            
            if($password1 === $password2) {
                $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login`, `haslo`, `email`, `data_zalozenia`, `uprawnienia`) VALUES (NULL, '$login', '$hashed_password', '$email', CURDATE(), DEFAULT);";
            } 
            if($rezultat = $polaczenie->query($sql)){
            $polaczenie->close();
                $_SESSION['komunikat'] = "<span style='color: green; font-size: 20px;'>Pomyślnie utworzono konto!</span>";
            header('location: ../index.php');
        }else {
            $_SESSION['komunikat'] = "<span style='color: red; font-size: 20px;'>Błędne dane. Nie zarejestrowano konta.</span>";
                header('location: ../register.php');
        }
        } else {
            header('location: ../index.php');
        }
        $polaczenie->close(); 
    } else {
        echo "Błędna połączenie z bazą";
    }
?>