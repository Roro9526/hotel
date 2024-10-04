<h2 class="text-center">Détail de la Chambre</h2>

<p>
    <img class="card-img-top w-25" src="utils/img/<?= $chambre['image'] ?>" alt="Card image cap">
</p>

Prix <?= $chambre['prix'] ?>€ par nuit.

<p>
    <div><?= $chambre['nbLits'] ?> Lit(s)</div>
    <?= $chambre['description'] ?>
</p>

<div>
    <form action="reservation.php" method="post" id="reservationForm">

        <input type="hidden" name="numChambre" value="<?= $_GET['id'] ?>">

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" name="prenom" id="prenom" required>
        </div>
        
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" id="nom" required>
        </div>
        
        <div class="form-group">
            <label for="tel">Téléphone</label>
            <input type="text" class="form-control" name="tel" id="tel" required>
        </div>

        <div class="form-group">
            <label for="dateArrivee">Date Arrivée</label>
            <input type="date" class="form-control" name="dateArrivee" id="dateArrivee" required>
        </div>
        
        <div class="form-group">
            <label for="dateDepart">Date départ</label>
            <input type="date" class="form-control" name="dateDepart" id="dateDepart" required>
        </div>

        <span id="dateError" class="text-danger"></span>

        <input type="submit" class="btn btn-outline-success mt-2" value="Réserver">

    </form>
</div>

<script>
    document.getElementById('reservationForm').addEventListener('submit', function (e) {
        // Récupérer les dates de départ et d'arrivée
        let dateArrivee = new Date(document.getElementById('dateArrivee').value);
        let dateDepart = new Date(document.getElementById('dateDepart').value);

        let dateError = document.getElementById('dateError');
        dateError.textContent = ''; // Réinitialiser le message d'erreur

        // Vérifier que la date de départ est bien postérieure à la date d'arrivée
        if (dateDepart <= dateArrivee) {
            e.preventDefault(); // Empêcher l'envoi du formulaire
            dateError.textContent = 'La date de départ doit être postérieure à la date d\'arrivée.';
        }
    });
</script>
