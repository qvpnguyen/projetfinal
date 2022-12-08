<?php
    if (defined("DOSSIER_RACINE") == false) {
		define("DOSSIER_RACINE", "/projet-session_Patrick-Nguyen");
	}
    if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet-session_Patrick-Nguyen/");
	}

    include(DOSSIER_BASE_INCLUDE."modele/DAO/UtilisateurDAO.class.php");

    $message = "";
    // On vérifie que tous les champs soient remplis excepté le champ Image URL, car facultatif
    if (ISSET($_POST['nom']) && ISSET($_POST['prenom']) && ISSET($_POST['mot_passe'])) {
        $unUtilisateur = new Utilisateur($_POST['nom'],$_POST['prenom'],$_POST['url_photo'],$_POST['mot_passe']);
        $resultat = UtilisateurDAO::inserer($unUtilisateur);
        if ($resultat != null) {
            $message = "<p class=text-center>Utilisateur ".$unUtilisateur." inscrit</p>";
        } else {
            $message = "<p class=text-center>Informations insuffisantes. Veuillez réessayer.</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | ALLOY</title>
    <link rel="stylesheet" href="<?php echo DOSSIER_RACINE;?>/css/bootstrap.css">
    <script src="<?php echo DOSSIER_RACINE;?>/js/jquery-3.5.0.min.js"></script>
    <script src="<?php echo DOSSIER_RACINE;?>/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="<?php echo DOSSIER_RACINE;?>/css/style-projet.css" type="text/css">
    <script src="<?php echo DOSSIER_RACINE;?>/js/script_projet.js"></script>
    <style>
        <?php
        if (ISSET($_SESSION['utilisateurConnecte'])) {
            if (ISSET($_COOKIE["couleur"])) {
                echo "body {background-color:".$_COOKIE["couleur"]."}";
            }
        }
        ?>
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo DOSSIER_RACINE;?>/index.php"><img src="<?php echo DOSSIER_RACINE;?>/images/logo.png" alt="ALLOY" width="150"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link liens liens-soulignes" href="<?php echo DOSSIER_RACINE;?>/index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link liens liens-soulignes" href="<?php echo DOSSIER_RACINE;?>/vues/produits.php">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link liens liens-soulignes" href="<?php echo DOSSIER_RACINE;?>/vues/presentation.php">Pr&eacute;sentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link liens liens-soulignes" href="<?php echo DOSSIER_RACINE;?>/vues/local.php">Local</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link liens liens-soulignes" href="<?php echo DOSSIER_RACINE;?>/vues/contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link liens liens-soulignes" href="<?php echo DOSSIER_RACINE;?>/vues/compte.php">Compte</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <div class="container p-5 my-5 border bg-light w-50">
        <h1 class="bg-light text-dark">Inscription</h1>
        <br>
        <?php echo $message; ?>
        <div class="d-flex justify-content-center">
            <form method="post">
                <div class="form-group">
                    <label for="nom-client" class="form-label">Nom d'utilisateur *</label>
                    <br>
                    <input type="text" class="form-control" id="nom-client" name="nom" title="Inscrivez votre nom d'utilisateur" required>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for="prenom-client" class="form-label">Prénom *</label>
                    <br>
                    <input type="text" class="form-control" id="prenom-client" name="prenom" title="Inscrivez votre prénom" required>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for="url_photo" class="form-label">Image URL</label>
                    <br>
                    <input type="text" class="form-control" id="url_photo" name="url_photo">
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for="password-client" class="form-label">Mot de passe *</label>
                    <br>
                    <input type="password" class="form-control" id="password-client" name="mot_passe" title="Inscrivez votre mot de passe" minlength="8" required>
                </div>
                <br>
                <br>
                <label>Voulez-vous vous abonner à notre infolettre?</label>
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="infolettres-oui" name="abonnement-infolettres" value="Oui">
                    <label class="form-check-label" for="infolettres-oui">Oui</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="infolettres-non" name="abonnement-infolettres" value="Non">
                    <label class="form-check-label" for="infolettres-non">Non</label>
                </div>
                <br>
                <br>
                <label>Si oui, veuillez cocher vos options de communications</label>
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="infolettres-promotions" name="infolettres-options" value="Promotions">
                    <label class="form-check-label" for="infolettres-promotions">Promotions</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="infolettres-arrivages" name="infolettres-options" value="Nouveaux arrivages">
                    <label class="form-check-label" for="infolettres-arrivages">Nouveaux arrivages</label>
                </div>
                <br>
                <br>
                <label>À quelle fréquence voulez-vous recevoir vos infolettres?</label>
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="infolettres-hebdo" name="infolettres-frequence" value="Hebdomadaire">
                    <label class="form-check-label" for="infolettres-hebdo">Hebdomadaire</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="infolettres-mois" name="infolettres-frequence" value="Mensuelle">
                    <label class="form-check-label" for="infolettres-mois">Mensuelle</label>
                </div>
                <br>
                <br>
                <p class="bg-transparent">* champs requis</p>
                <input class="btn btn-secondary boutons" type="submit" value="Envoyer" onmouseenter="changerFondBoutons();" onmouseleave="retablirFondBoutons();">
            </form>
        </div>
    </div>
</body>
</html>