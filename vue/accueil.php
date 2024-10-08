<h2 class="text-center">Chambres</h2>

<?php foreach($chambres as $chambre): ?>
    <div class="card my-1" style="width: 18rem;">
        <div class="card mb-4 <?= $chambre['reserved'] == 1 ? 'chambre-reservee' : '' ?>">
            <img class="card-img-top" src="utils/img/<?= $chambre['image'] ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $chambre['prix'] ?>€</h5>
                <p class="card-text"><?= $chambre['nbLits'] ?> lit</p>
                <p class="card-text"><?= $chambre['nbPers'] ?> personne(s)</p>
                <a href="chambre.php?action=detail&id=<?= $chambre['numChambre'] ?>" class="btn btn-primary">Détail</a>
                <a href="chambre.php?action=supprimer&id=<?= $chambre['numChambre'] ?>" 
                class="btn btn-danger" 
                onclick="return confirmSuppression(<?= $chambre['numChambre'] ?>);">
                Supprimer
                </a>
                <p class="card-text">
                        Statut: <?= $chambre['reserved'] == 1 ? 'Réservée' : 'Disponible' ?>
                        <?php if ($chambre['reserved'] == 1): ?>
                            <span class="badge badge-danger">Réservée</span>
                        <?php endif; ?>
                    </p>
                    
            </div>    
        </div>
    </div>
<?php endforeach; ?>

<script>
    function confirmSuppression(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cette chambre ?')) {
            window.location.href = 'chambre.php?action=supprimer&id=' + id;
        }
        return false; // Empêcher la redirection automatique du lien
    }
</script>



