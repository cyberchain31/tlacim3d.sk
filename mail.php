<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        # FIX: Replace this email with recipient email.
        $mail_to = "lovaspatrik@tlacim3d.sk";
        
        # Sender Data
        $subject = trim($_POST["subject"]);
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);
        
        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($subject) OR empty($message)) {
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Vyplňte formulár a skúste to znova.";
            exit;
        }
        
         # Email headers
         $content = "Name: $name\n";
         $content .= "Email: $email\n\n";
 
         # Email content
         $headers = "From: $name <$email>";
         $headers = "Name: $name\n";
         $headers .= "Email: $email\n\n";
         $headers .= "Message:\n$message\n"; 

        # Send the email.
        $success = mail($mail_to,$content, $headers);
        if ($success) {
            # Set a 200 (okay) response code.
            http_response_code(200);
            echo "Ďakujem! Vaša správa bola odoslaná.";
        } else {
            # Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Niečo sa pokazilo, vašu správu sa nepodarilo odoslať.";
        }

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "Vyskytol sa problém s vaším odoslaním, skúste to znova.";
    }

?>
