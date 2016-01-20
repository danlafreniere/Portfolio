<?php

function has_header_injection($str) {
    return preg_match( "/[\r\n]/", $str);
}

if (isset $_POST['contact_submit'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $msg = $_POST['message'];
    
    if (has_header_injection($name) || has_header_injection($email)){
        die();   
    }
    
    if( !$name || !$email || !$msg ) {
        echo '<h4 class="error">All fields are required.</h4>';
        exit;
    }
    
    
    $to = "lafreniere.dj@gmail.com";
    $subject = "$name sent an email from the portfolio website";
    $message = "Name: $name\r\n";
    $message .= "Email: $email\r\n";
    $message .= "Message: \r\n$msg";
    
    $message = wordwrap($message, 80);
    
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    $headers .= "From: $name <$email> \r\n";
    $headers .= "X-Priority: 1\r\n";
    $headers .= "X-MSMail-Priority: High\r\n\r\n";
    
    mail($to, $subject, $message, $headers); 
}


?>