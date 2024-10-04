<?php

include "fonction.php";

include "vue/header.php";

if( isset($_GET['action']) ){
    $action = $_GET['action'];

    switch($action){
        case "ajouter": 

            if( isset($_POST['prix']) ){

                //produit des variables sur les "name" du formulaire
                extract($_POST);

                //upload img
                //test si fichier existe
                if(isset($_FILES['image']['name'])){
                    //pathinfo renvoie les infos du fichier uploader
                    $infoImage = pathinfo($_FILES['image']['name']);
                    $fileName = $_FILES['image']['name'];
                    //On crée une liste d'extensions autorisées
                    $extensions = ["jpeg", "jpg', png"];

  
                    if( in_array($infoImage['extension'], $extensions) ){

                        move_uploaded_file($_FILES['image']['tmp_name'], "utils/img/". $fileName);
                    }

                }

                $query = "INSERT INTO chambre VALUES(NULL, :prix, :lit, :cap, :img, :desc)";

                $stmt = $pdo->prepare($query);
                $stmt->execute([
                    "prix"  => $prix,
                    "lit"   => $nbLits,
                    "cap"   => $nbPers,
                    "img"   => $fileName,
                    "desc"  => $description
                ]);


                  header("location: .");
                exit;
            }

            include "vue/addChbre.php";
            break;

        case "detail":
            $chambre = getOne("chambre", "numChambre", $_GET['id']);

            include "vue/detail.php";
            break;
    
        }
}







include "vue/footer.php";
