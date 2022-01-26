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
    foreach ($obj as $item){
        if(is_array($item)) {
            foreach ($item as $item2) {
                echo "<div class='style'></div>";
                foreach ($item2 as $index3 => $item4) {
                    echo "<p>".$item4."</p>";
                }
            }
        }
        else {
            echo "<p class='user'>".$item."</p>";
        }
    }
}