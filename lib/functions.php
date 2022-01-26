<?php

/* 
vous ajouterez ici les fonctions qui vous sont utiles dans le site,
je vous ai créé la première qui est pour le moment incomplète et qui devra contenir
la logique pour choisir la page à charger
*/

function getContent() {
	if(!isset($_GET['page'])){
		include __DIR__.'/../pages/home.php';
	}
	elseif(isset($_GET['page']) && $_GET['page'] == "bio") {

        include __DIR__.'/../pages/bio.php';
    }
	elseif(isset($_GET['page']) && $_GET['page'] == "contact") {

        include __DIR__.'/../pages/contact.php';
    }
}

function getPart($name) {
	include __DIR__ . '/../parts/'. $name . '.php';
}

function getUserData() {
    $file = file_get_contents('../data/user.json')  ;
    $obj = json_decode($file);

    if (isset($_GET['page']) && $_GET['page'] == 'bio') {
        foreach ($obj as $item => $value) {
            if (is_array($value)){
                echo "<p class='user'> $item </p>";
                foreach ($value as $array) {
                    foreach ($array as $item2 => $value2) {
                        echo "<p>$item2 </p>";
                    }
                }
            }
            else {
                echo "<p>$item</p>";
            }
        }
    }
}