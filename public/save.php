<?php

require __DIR__ . '/../lib/functions.php';

$jsonMessage = file_put_contents("../data/last_message.json", $_POST);
json_encode($jsonMessage);

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['message'])) {
    $username = trim(strip_tags($_POST['username']));
    $email = trim(strip_tags($_POST['email']));
    $message = trim(strip_tags($_POST['message']));

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Tout roule";
    }
}
else {
    echo "Ya une petite erreur";
}

$from = 'De: vanou01@gmail.com';
$name = getSecuredStringPostData($_POST['username']);
$mail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$message = getSecuredStringPostData($_POST['message']);
$message1 = $message;
$sujet = "Salut !";

$to = $mail;

$headers = array(
    "From" => "vanou01@gmail.com'",
    "X-Mailer" => "PHP/".phpversion()
);

if (isset($_POST["email"], $_POST["message"])){
    mail($to, $message1, $sujet, $headers);
    echo "OK";
}

header('Location: /index.php');