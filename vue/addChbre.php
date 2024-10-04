<!DOCTYPE html>
<html lang="fr">

<body>

    <h2 class="text-center">Ajouter Chambres</h2>

    <form method="post" action="" enctype="multipart/form-data" id="form">
        
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="text" class="form-control" name="prix" id="prix">
            <span id="errPrix" class="text-danger"></span>
        </div>

        <div class="form-group">
            <label for="nbLits">Nombre de lits</label>
            <input type="text" class="form-control" name="nbLits" id="nbLits" value="2" readonly>
            <span id="errLits" class="text-danger"></span>
        </div>

        <div class="form-group">
            <label for="nbPers">Capacité</label>
            <input type="text" class="form-control" name="nbPers" id="nbPers">
            <span id="errPersonnes" class="text-danger"></span>
        </div>

        <div class="form-group">
            <label for="image">Photo</label>
            <input type="file" accept="image/*" class="form-control" name="image">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
  
        <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
    </form>

    <script>
        // Référence aux éléments du formulaire
        let form = document.getElementById('form');
        let prix = document.getElementById('prix');
        let personnes = document.getElementById('nbPers');
        let lits = document.getElementById('nbLits');
  
        // Référence aux éléments d'erreur
        let errPrix = document.getElementById('errPrix');
        let errPersonnes = document.getElementById('errPersonnes');
        let errLits = document.getElementById('errLits');

        // Fonction de validation
        form.addEventListener('submit', function (e) {
            let isValid = true;

            // Réinitialiser les messages d'erreur
            errPrix.textContent = '';
            errPersonnes.textContent = '';
            errLits.textContent = '';

            // Validation du prix (entre 50 et 250)
            if (prix.value < 50 || prix.value > 250) {
                errPrix.textContent = 'Le prix doit être compris entre 50 et 250.';
                isValid = false;
            }

            // Validation du nombre de personnes (entre 1 et 4)
            if (personnes.value < 1 || personnes.value > 4) {
                errPersonnes.textContent = 'Le nombre de personnes doit être compris entre 1 et 4.';
                isValid = false;
            }

            // Validation du nombre de lits (doit être 2)
            if (lits.value != 2) {
                errLits.textContent = 'Le nombre de lits doit être fixé à 2.';
                isValid = false;
            }

            // Si le formulaire n'est pas valide, empêcher la soumission
            if (!isValid) {
                e.preventDefault();
            }
        });

    </script>

</body>
</html>
