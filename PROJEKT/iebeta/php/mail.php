    <?php
  
    $admin_email = "informatyka-zadania@o2.pl";
    //hasło: Polsk@2017
    $email = $_POST['email'];
    $title = $_POST['title'];
    $message = $_POST['message'];
        
    if(!empty($_POST['email']) && !empty($_POST['title']) && !empty($_POST['message'])) {
  
    mail($admin_email, "$title", $message, "From:" . $email);
    header('location: ../kontakt.php');

  } else  {
    header('location: ../kontakt.php');
    echo "Twoja wiadomość nie została wysłana";
  }
?>