<?php

    
session_start();
require_once 'libs/phpMailer/PHPMailerAutoload.php';

$errors = [];


if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
    
    $fields = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'message' => $_POST['message']
    ];
    
    foreach ($fields as $field => $data) {
        if (empty($data)){
            $errors[] = 'The ' . $field . ' field is required.';   
        }
    }
    
    if (empty($errors)){
        
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
                
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'lafreniereportfolio@gmail.com';
        $mail->Password = 'DummyAccountSucker%15';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        
        $mail->Subject = 'Message from Personal Portfolio Page!';
        $mail->Body = 'From: ' . $fields['name'] . '(' . $fields['email'] . '): ' . $fields['message'];
        $mail->FromName = 'Friend';
        
        $mail->AddAddress('lafreniereportfolio@gmail.com', 'Dan LaFreniere');
        
        if($mail->send()){
            header('Location: index.php#jumpto-Contact');
            die();
        } else {
            $errors[] = 'Sorry, could not send the email. You can try emailing me directly at lafreniere.dj@gmail.com';   
        }
        
    }
    
    
} else {
    
    $errors[] = 'Something went wrong';
}

header('Location: index.php#jumpto-Contact');

$_SESSION['errors'] = $errors;
$_SESSION['fields'] = $fields;

?>
 

