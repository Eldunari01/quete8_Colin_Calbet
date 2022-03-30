<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'includes/head.php';
    ?>
</head>

<body>
    
    <!-- HEADER -->
    <header>
        <?php
            include 'includes/header.php';
        ?>   
    </header>

    <section>
        <div class="container-fluid">
            <div class="row">
                <!-- GAUCHE -->
                <div class="col-sm-3">
                    <a class="btn btn-outline-dark col-sm-12" href="index.php?menu">Home</a>
                    <?php
                    // MENU
                    if(isset($_GET['menu'])){
                        if(!empty($_SESSION['table'])){
                            include 'includes/ul.php'; 
                        }
                    }
                    else if(!empty($_SESSION['table'])){
                        include 'includes/ul.php'; 
                    }

                    // SUPPRESSION DES DONNEES
                    if (isset($_GET['delete'])){
                        $files = glob('uploads/*');
                        foreach($files as $files){
                            unlink($files);
                        }

                        session_destroy();
                        
                        echo 
                        '<div class="alert alert-warning text-center mt-4" role="alert">
                            Les données ont bien été supprimées.
                        </div>';
                    }
                    ?>
                </div>
                <!-- DROITE -->
                <div class="col-sm-9">
                    <?php
                    // FORMULAIRES
                    if (isset($_GET['form'])){
                        include('includes/form.php');
                    }

                    else if (isset($_GET['form2'])){
                        include('includes/form2.php');
                    }

                    // MENU MENU MENU MENU MENU MENU MENU MENU MENU MENU MENU 
                    else if (isset($_GET['debug'])){
                        echo '<pre>';
                        print_r($_SESSION['table']);
                        echo '</pre>';
                    }

                    else if (isset($_GET['concat'])){

                        $prenom = $_SESSION['table']['prenom'];
                        $nom = $_SESSION['table']['nom'];
                        $age = $_SESSION['table']['age'];
                        $taille = $_SESSION['table']['taille'];
                        $statut = $_SESSION['table']['statut'];

                        echo "Je m'appel $prenom $nom j'ai $age je mesure $taille"."m et je suis $statut chez AFCI. <br>";

                        echo "Je m'appel $prenom " .strtoupper($nom). " j'ai $age je mesure $taille"."m et je suis $statut chez AFCI. <br>";
                        
                        echo "Je m'appel $prenom " .strtoupper($nom). " j'ai $age je mesure ".str_replace('.', ',', $taille)."m et je suis $statut chez AFCI. <br>";
                    }

                    else if (isset($_GET['boucle'])){

                        $prenom = $_SESSION['table']['prenom'];
                        $nom = $_SESSION['table']['nom'];
                        $age = $_SESSION['table']['age'];
                        $taille = $_SESSION['table']['taille'];
                        $statut = $_SESSION['table']['statut'];

                        for($i=1; $i<=10; $i++){
                            echo $i." - Je m'appel $prenom $nom j'ai $age je mesure $taille"."m et je suis $statut chez AFCI. <br>";
                        }
                    }

                    else if (isset($_GET['fonction'])){
                        function readTable(){
                            if(isset($_SESSION['table'])){
                                foreach($_SESSION['table'] as $key => $value) {
                                    echo "Cette ligne correspond à la clef $key et contient $value".". <br>";
                                }
                            }
                        }

                        readTable();
                    }

                    else{
                        echo '<a class="btn btn-primary mb-4" href="index.php?form" role="button">Ajouter des données</a>';
                        echo '<a class="btn btn-secondary ml-4 mb-4" href="index.php?form2" role="button">Ajouter plus de données</a>';
                    }

                    if(isset($_POST['submit'])){
                        // ALERTES ALERTES ALERTES ALERTES ALERTES ALERTES ALERTES
                        if(empty($_POST['prenom'])){
                            echo
                            '<div class="alert alert-danger text-center" role="alert">
                                Veuillez renseigner votre prénom.
                            </div>';
                        }
                        if(empty($_POST['nom'])){
                            echo
                            '<div class="alert alert-danger text-center" role="alert">
                                Veuillez renseigner votre nom.
                            </div>';
                        }
                        if(empty($_POST['age'])){
                            echo
                            '<div class="alert alert-danger text-center" role="alert">
                                Veuillez renseigner votre age.
                            </div>';
                        }
                        if(empty($_POST['taille'])){
                            echo
                            '<div class="alert alert-danger text-center" role="alert">
                                Veuillez renseigner votre taille.
                            </div>';
                        }
                        if(empty($_POST['statut'])){
                            echo
                            '<div class="alert alert-danger text-center" role="alert">
                                Veuillez renseigner votre statut.
                            </div>';
                        }

                        // SAUVEGARDE DES DONNEES
                        // UPLOAD UPLOAD UPLOAD UPLOAD UPLOAD UPLOAD UPLOAD UPLOAD UPLOAD UPLOAD UPLOAD UPLOAD
                        if(isset($_POST["submit"])) {
                            $target_file = 'uploads/' . basename($_FILES["fileToUpload"]["name"]);
                            $uploadOk = 1;
                            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                            if ($_FILES["fileToUpload"]["size"] > 700000) {
                                echo '<div class="alert alert-danger text-center" role="alert">
                                Le fichier est trop volumineux.</div>';
                                $uploadOk = 0;
                            }

                            if($imageFileType != "jpg" && $imageFileType != "png") {
                                echo '<div class="alert alert-danger text-center" role="alert">
                                Les seuls fichiers acceptés sont les jpg et png</div>';
                                $uploadOk = 0;
                            }
                            
                            if ($uploadOk == 0) {
                                echo '<div class="alert alert-danger text-center" role="alert">
                                Veuillez selectionner un fichier adapté.</div>';
                            }
                            else {
                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                                } else {
                                    echo '<div class="alert alert-danger text-center" role="alert">
                                    Il y a eu une erreur lors de l\'upload</div>';
                                }
                            }

                            if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['age']) && !empty($_POST['taille'])){
                                echo
                                '<div class="alert alert-success text-center" role="alert">
                                    Les données supplémentaires ont bien été sauvegardées !
                                </div>';

                                // TABLEAU TABLEAU TABLEAU TABLEAU TABLEAU TABLEAU TABLEAU
                                $_SESSION['table'] = [];

                                //AJOUT DES DONNEES
                                $_SESSION['table'] += ['prenom' => htmlspecialchars($_POST['prenom'])];
                                $_SESSION['table'] += ['nom' => htmlspecialchars($_POST['nom'])];
                                $_SESSION['table'] += ['age' => htmlspecialchars($_POST['age'])];
                                $_SESSION['table'] += ['taille' => htmlspecialchars($_POST['taille'])];
                                if(!empty($_POST['html'])){$_SESSION['table'] += ['html' => htmlspecialchars($_POST['html'])];}
                                if(!empty($_POST['css'])){$_SESSION['table'] += ['css' => htmlspecialchars($_POST['css'])];}
                                if(!empty($_POST['bs'])){$_SESSION['table'] += ['bootstrap' => htmlspecialchars($_POST['bs'])];}
                                if(!empty($_POST['php'])){$_SESSION['table'] += ['php' => htmlspecialchars($_POST['php'])];}
                                if(!empty($_POST['mysql'])){$_SESSION['table'] += ['mysql' => htmlspecialchars($_POST['mysql'])];}
                                if(!empty($_POST['js'])){$_SESSION['table'] += ['js' => htmlspecialchars($_POST['js'])];}
                                if(!empty($_POST['symph'])){$_SESSION['table'] += ['symph' => htmlspecialchars($_POST['symph'])];}
                                if(!empty($_POST['statut'])){$_SESSION['table'] += ['statut' => htmlspecialchars($_POST['statut'])];}
                                if(!empty($_POST['color'])){$_SESSION['table'] += ['color' => htmlspecialchars($_POST['color'])];}
                                if(!empty($_POST['date'])){$_SESSION['table'] += ['date' => htmlspecialchars($_POST['date'])];}
                                if(!empty($_FILES['fileToUpload'])){$_SESSION['table'] += ['fileToUpload' => 
                                    [
                                        'name' => basename($_FILES["fileToUpload"]["name"]),
                                        'type' => $imageFileType,
                                        'path' => $_FILES['fileToUpload']['tmp_name'],
                                        'size' => $_FILES["fileToUpload"]["size"],
                                    ]];}

                                echo '<pre>';
                                print_r($_SESSION['table']);
                                echo '</pre>';
                                }   
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>


    <!-- FOOTER -->
    <br>
    <footer>
        <?php
            include 'includes/footer.php';
        ?>
    </footer>    


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>