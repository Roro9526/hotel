<?php

include "fonction.php";
include 'vue/header.php';

if (isset($_SESSION['user'])) {



    if (isset($_GET['action']) && $_GET['action'] == 'afficher') {
        $chambres = getReservedChambres();
    } 
    else {

    $chambres = getAll("chambre");
    }



    include "vue/accueil.php";

}






include 'vue/footer.php';
