<?php
    session_start();
    require __DIR__ . '/../parts/header.php';
?>

<h1>Page admin</h1>

    <h2>Les messages récupérés</h2>

<?php

$file = fopen('../data/last_message.json', 'rb');

?>

<p>Le dernier message posté est : </p>

<?php

$message = file_get_contents(__DIR__.'/../data/last_message.json');

echo $message;

fclose($file);