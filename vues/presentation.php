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
    <title>Pr&eacute;sentation | ALLOY</title>
    <link rel="stylesheet" href="<?php echo DOSSIER_RACINE;?>/css/bootstrap.css">
    <script src="<?php echo DOSSIER_RACINE;?>/js/jquery-3.5.0.min.js"></script>
    <script src="<?php echo DOSSIER_RACINE;?>/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="<?php echo DOSSIER_RACINE;?>/css/style-projet.css" type="text/css">
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
                        <a class="nav-link liens liens-soulignes active" href="<?php echo DOSSIER_RACINE;?>/vues/presentation.php">Pr&eacute;sentation</a>
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
    <h1 class="bg-light text-dark">Présentation</h1>
    <br>
    <h2 class="bg-transparent text-dark">"Les bijoux font partie des choses qui sont l'essence de qui vous êtes."</h2>
    <p class="bg-transparent">- Katherine Ormerod</p>
    <h2 class="bg-transparent">Description de l'entreprise</h2>
    <p class="bg-transparent">
        Depuis 2011, ALLOY est un détaillant se spécialisant dans la vente de bagues haut-de-gamme pour hommes. <i>Alloy</i>, un mot anglais qui signifie <strong>alliage</strong> en français, est un métal qui est fabriqué en combinant deux ou plusieurs éléments métalliques, principalement pour lui donner une plus grande résistance. Ainsi, nous croyons au pouvoir d'expression de soi que nos bagues peuvent apporter aux clients lorsqu'ils les portent. C'est notre raison d'être.
    </p>
    <hr>
    <h2 class="bg-transparent text-dark">Historique de l'entreprise</h2>
    <div class="w-50">
        <ul class="list-group">
            <li class="list-group-item"><strong>2011: </strong>Fondation de l'entreprise ALLOY à Montréal</li>
            <li class="list-group-item"><strong>2012: </strong>Ouverture de la première boutique au 4275 rue Saint-Denis, à Montréal</li>
            <li class="list-group-item"><strong>2014: </strong>Lancement de la boutique en ligne</li>
            <li class="list-group-item"><strong>2015: </strong>L'entreprise fait la une du journal <i>Montreal Gazette</i> parmi les PME émergentes du Québec</li>
            <li class="list-group-item"><strong>2018: </strong></li>
        </ul>
            <ol type="I" class="list-group list-group-numbered">
                <li class="list-group-item">Achat d'un local commercial au centre-ville de Montréal</li>
                <li class="list-group-item">Projet d'agrandissement de la future boutique</li>
            </ol>
        <ul class="list-group">
            <li class="list-group-item"><strong>2021: </strong>Déménagement de la boutique au 1251 rue Sainte-Catherine Ouest, à Montréal</li>
        </ul>
    </div>
    <hr>
    <h2 class="bg-transparent text-dark">Les membres de l'équipe</h2>
    <img src="<?php echo DOSSIER_RACINE;?>/images/IMG_20181115_141726_909.jpg" alt="Patrick Nguyen" title="Patrick Nguyen" height="200">
    <h3>Patrick Nguyen</h3>
    <p class="bg-transparent">Développeur Web</p>
</body>
</html>