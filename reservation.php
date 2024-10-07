<?php

include "fonction.php";



include 'vue/header.php';

if( isset($_POST['prenom']) ){
    extract($_POST);


    $queryCheck = "SELECT reserved FROM chambre WHERE numChambre = :numChambre";
    $stmtCheck = $pdo->prepare($queryCheck);
    $stmtCheck->execute(['numChambre' => $numChambre]);
    
    // Récupérer le statut de réservation
    $chambre = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    
    //insertion client;
    if ($chambre['reserved'] == 1) {
        echo "<p class='text-danger'>Cette chambre est déjà réservée.</p>";
    } else {
        $queryClient = "INSERT INTO client (prenom, nom, tel) VALUES (:prenom, :nom, :tel)";
        
    
        $stmtClient = $pdo->prepare($queryClient);
        $stmtClient->execute([
            'prenom' => $prenom, 
            'nom' => $nom,
            'tel' => $tel
        ]);


        $numClient = $pdo->lastInsertId();
        $query = "INSERT INTO Reservation VALUES(NULL, :numClient, :numChambre, :dateArrivee, :dateDepart)";

        $stmt = $pdo->prepare($query);
        $stmt->execute([
            "numClient"  => $numClient,
            "numChambre"   => $numChambre,
            "dateArrivee"   => $dateArrivee,
            "dateDepart"   => $dateDepart,
        ]);

        $query = "UPDATE  chambre SET reserved = 1 WHERE numChambre = :numChambre";

        $stmt = $pdo->prepare($query);
        $stmt->execute([
            "numChambre"   => $numChambre,
        ]);



        echo "Réservation OK";
    }
}



include 'vue/footer.php';