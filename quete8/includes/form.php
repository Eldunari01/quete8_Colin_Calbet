<?php
include 'includes/head.php'; 
?>

<form action="index.php" method="post">
    <h2>Formulaire d'ajout des données</h2>
    <div class= "ml-3">
        <!-- PRENOM -->
        <div class="form-group mt-4">
            <label>Prénom</label>
            <input type="text" class="form-control mt-2" name = "prenom">
        </div>
        <!-- NOM -->
        <div class="form-group mt-4">
            <label>Nom</label>
            <input type="text" class="form-control mt-2"  name="nom">
        </div>
        <!-- AGE -->
        <div class="form-group mt-4">
            <label>Age (de 10 à 60 ans)</label>
            <input type="text" class="form-control mt-2" min="10" max="60"  name="age">
        </div>
        <!-- TAILLE -->
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                <span class="input-group-text">Taille (entre 1m et 2m)</span>
                </div>
                <input type="number" step="0.01" class="form-control" min="1" max="2"  name="taille">
                <div class="input-group-prepend">
                <span class="input-group-text">m</span>
                </div>
            </div>
        </div>
        <!-- STATUT -->
        <div class="custom-control custom-radio mt-4">
            <input type="radio" id="customRadio1" name="statut" class="custom-control-input" value="apprenant">
            <label class="custom-control-label" for="customRadio1">Apprenant</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="customRadio2" name="statut" class="custom-control-input" value="formateur">
            <label class="custom-control-label" for="customRadio2">Formateur</label>
        </div>
    </div>
    
    <br>
    <button type="submit" href="index.php" class="btn btn-primary float-right" name = "submit">Enregistre les données</button>
</form>