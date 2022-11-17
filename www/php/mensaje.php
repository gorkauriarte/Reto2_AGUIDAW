<?php
  $name = htmlspecialchars($_POST['nombre']);
  $email = htmlspecialchars($_POST['email']);
  $phone = htmlspecialchars($_POST['movil']);
  $website = htmlspecialchars($_POST['asunto']);
  $message = htmlspecialchars($_POST['mensaje']);

  if(!empty($email) && !empty($message)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      $receiver = "ladrongue5@gmail.com"; //enter that email address where you want to receive all messages
      $subject = "From: $name <$email>";
      $body = "Name: $name\nEmail: $email\nPhone: $phone\nWebsite: $website\n\nMessage:\n$message\n\nRegards,\n$name";
      $sender = "From: $email";
      if(mail($receiver, $subject, $body, $sender)){
         echo "Your message has been sent";
      }else{
         echo "Enviando tu mensaje...";
      }
    }else{
      echo "Enter a valid email address!";
    }
  }else{
    echo "Email and message field is required!";
  }
?>
