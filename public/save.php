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

$from = 'De : vanou01@gmail.com';
$name = getSecuredStringPostData($_POST['username']);
$mail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$message = getSecuredStringPostData($_POST['message']);
$message1 = $message;

$to = $mail;

$headers = array(
    "Reply-To" => $from,
    "X-Mailer" => "PHP/".phpversion()
);

if (isset($_POST["email"], $_POST["message"])){
    mail($to, $message1, (string)$headers, "-f ".$from);
}

header('Location: /index.php');