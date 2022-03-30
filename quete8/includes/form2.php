<?php
include 'includes/head.php'; 
?>

<form action="index.php" method="post" enctype="multipart/form-data">
    <div class="container-fluid row">
        <div class="ml-3 border p-4 col-sm-6">
            <!-- FORMULAIRE NUMERO 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 1 -->
            <!-- PRENOM -->
            <div class="form-group">
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

        <!-- FORMULAIRE NUMERO 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 2 -->
        <div class= "ml-3 border p-4 col-sm-4">
            <!-- CONNAISSANCES CONNAISSANCES CONNAISSANCES CONNAISSANCES -->
            <label>Connaissances</label>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" name="html" value="html">
                <label class="custom-control-label" for="customCheck1">html</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck2" name="css" value="CSS">
                <label class="custom-control-label" for="customCheck2">CSS</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck3" name="bs" value="Bootstrap">
                <label class="custom-control-label" for="customCheck3">Bootstrap</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck4" name="php" value="PHP">
                <label class="custom-control-label" for="customCheck4">PHP</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck5" name="mysql" value="MySQL">
                <label class="custom-control-label" for="customCheck5">MySQL</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck6" name="js" value="JavaScript">
                <label class="custom-control-label" for="customCheck6">JavaScript</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck7" name="symph" value="Symphony">
                <label class="custom-control-label" for="customCheck7">Symphony</label>
            </div>

            <div class="row mt-4 ml-1">
                <label class="form-label mr-2 mt-1">Couleur préférée</label>
                <input type="color" class="form-control form-control-color col-sm-2 p-1" name="color">
            </div>

            <div class="row mt-4 ml-1">
                <label class="form-label mr-2 mt-1">Date de naissance</label>
                <input type="date" class="" name="date">
            </div>
        </div>

        <!-- FORMULAIRE NUMERO 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 3 -->
        <div class= "ml-3 border p-4 col-sm-10 mt-3 mb-3">
            <!-- PRENOM -->
            <!-- <div class="form-group col-sm-5">
                <label>Joindre une image (jpg ou png)</label>
                <input type="file" class="" accept=".jpg,.png" name="file">
            </div> -->
            <div class="form-group col-sm-5">
                Joindre une image (jpg ou png)
                <input type="file" name="fileToUpload" id="file">
            </div>
        </div>
    
    <br>
    <button type="submit" href="index.php" class="btn btn-primary ml-3" name="submit">Enregistre les données</button>
</form>