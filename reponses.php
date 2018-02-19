<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Réponses formulaires</title>
  </head>
  <body>
  
    <?php


    if(isset($_POST['submit'])){
      $to = 'bernardjacques789@gmail.com';
      $subject = $_POST["sujet"];
      $message = "Nom: ".$_POST["nom"]."\r\n";
      $message .= "Prénom: ".$_POST["prenom"]."\r\n";
      $message .= "Pays: ".$_POST["pays"]."\r\n";
      $message .= 'E-mail: '.$_POST['email']."\r\n";
      $message .= "Genre: ".$_POST["genre"]."\r\n";
      $message .= "Message: \r\n\r\n\r\n" .$_POST["message"]."\r\n\r\n--\r\n\r\n";
      $headers = 'From: client@example.com' . "\r\n" .
      'Reply-To: client@example.com' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();

      mail($to, $subject, $message, $headers);
    }
    ?>

</html>
