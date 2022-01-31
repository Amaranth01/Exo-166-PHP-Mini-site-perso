<?php

function getRandomName(String $regularName) : string {
    $infos = pathinfo($regularName);
    try {
        $bytes = random_bytes(15);
    }
    catch (Exception $e) {
        $bytes = openssl_random_pseudo_bytes(15);
    }
    return bin2hex($bytes) . '.' . $infos['extension'];
}

if (isset($_FILES['identity']) && $_FILES['identity']['error'] === 0) {
    $allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png'];
    if (in_array($_FILES['identity']['type'], $allowedMimeTypes)) {

        $maxSize = 1 * 1024 * 1024;
        if((int)$_FILES['identity']['size'] <= $maxSize) {
            $tmp_name = $_FILES['identity']['tmp_name'];
            $name = getRandomName($_FILES['identity']['name']);

            if (!is_dir('uploads')) {
                mkdir('uploads', '0755');
            }
            move_uploaded_file($tmp_name, 'uploads/' . $name);
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