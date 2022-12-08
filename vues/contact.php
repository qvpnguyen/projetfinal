<?php
    if (defined("DOSSIER_RACINE") == false) {
		define("DOSSIER_RACINE", "/projet-session_Patrick-Nguyen");
	}

    // on récupère la session, ou on en crée un nouvelle
	session_start();
	// Si l'utilisateur est connecté
	if (ISSET($_SESSION['utilisateurConnecte'])) {
		// On récupère le nom pour l'affichage
	    $nomUtilisateur = $_SESSION['utilisateurConnecte'];
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | ALLOY</title>
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
            <?php if (ISSET($_SESSION['utilisateurConnecte'])) {echo "<a style=text-transform:uppercase;font-size:1em;color:#ccc>Bienvenue ".$nomUtilisateur."</a>";} ?>
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
                        <a class="nav-link liens liens-soulignes active" href="<?php echo DOSSIER_RACINE;?>/vues/contact.php">Contact</a>
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
        <h1 class="bg-light text-dark">Contactez-nous</h1>
        <br>
        <div class="d-flex justify-content-center">
            <form action="https://www.w3schools.com/action_page.php" method="post">
                <div class="form-group">
                    <label for="nom-client" class="form-label">Nom *</label>
                    <br>
                    <input type="text" class="form-control" id="nom-client" name="nom-client" title="Inscrivez votre nom" required>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for="courriel-client" class="form-label">Courriel *</label>
                    <br>
                    <input type="email" class="form-control" id="courriel-client" name="courriel-client" title="Inscrivez votre courriel" placeholder="nom@domaine.com" required>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label for="motif-message" class="form-label">Choisissez le motif de votre message:</label>
                    <br>
                    <select name="motif-message" id="motif-message" class="form-select">
                        <option disabled selected value>-- Choisissez une option --</option>
                        <option value="Demandes générales">Demandes générales</option>
                        <option value="Ventes">Ventes</option>
                        <option value="Emplois">Emplois</option>
                    </select>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <label class="form-label">Message *</label>
                    <br>
                    <textarea name="message" class="form-control" cols="50" rows="5" title="Écrivez votre message" placeholder="Votre message" required></textarea>
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
                <br>
                <br>
            </form>
        </div>
    </div>
</body>
</html>