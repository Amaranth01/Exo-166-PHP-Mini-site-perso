<?php

function getRandomName(String $finalName) : string {
    $infos = pathinfo($finalName);
    try {
        $bytes = random_bytes(10);
    }
    catch (Exception $e) {
        $bytes = openssl_random_pseudo_bytes(10);
    }
    return bin2hex($bytes) . '.' . $infos['extention'];
}

if (isset($_FILES['identity']) && $_FILES['identity']['error'] === 0) {
    $allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png'];
    if (in_array($_FILES['identity']['type'], $allowedMimeTypes)) {

        $maxSize = 1 * 1024 * 1024;
        if((int)$_FILES['identity']['size'] <= $maxSize) {
            $tmp_name = $_FILES['identity']['tmp_name'];
            $name = getRandomName(['identity']['name']);

            if (!is_dir('uploads')) {
                mkdir('uploads', '0755');
            }
            move_uploaded_file($tmp_name, $name);
        }
        else {
            echo "Le fichier est trop lourd";
        }
    }
    else {
        echo "Ce n'est pas le bon type de fichier";
    }
}
else {
    echo "Une erreur s'est produite durant le chargement";
}