<?php
	define("DOSSIER_RACINE", "/projet-session_Patrick-Nguyen");
    if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet-session_Patrick-Nguyen/");
	}

    include_once(DOSSIER_BASE_INCLUDE."modele/DAO/CarrouselDAO.class.php");

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
    <title>Accueil | ALLOY</title>
    <link rel="stylesheet" href="<?php echo DOSSIER_RACINE;?>/css/bootstrap.css">
    <script src="<?php echo DOSSIER_RACINE;?>/js/jquery-3.5.0.min.js"></script>
    <script src="<?php echo DOSSIER_RACINE;?>/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="<?php echo DOSSIER_RACINE;?>/css/style-projet.css" type="text/css">
    <script src="<?php echo DOSSIER_RACINE;?>/js/script_projet.js"></script>
    <style>
        body {
            background: linear-gradient(to top, gray, whitesmoke);
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
        }
        <?php
        if (ISSET($_COOKIE["couleur"])) {
            echo "body {background-color:".$_COOKIE["couleur"]."}";
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
                        <a class="nav-link liens liens-soulignes active" href="<?php echo DOSSIER_RACINE;?>/index.php">Accueil</a>
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
    <!-- Carrousel -->
    <!-- Slideshow container -->
    <div class="slideshow-container">
        <?php
        $image1 = CarrouselDAO::chercher("CA-01");
        $image2 = CarrouselDAO::chercher("CA-02");
        $image3 = CarrouselDAO::chercher("CA-03");
        ?>
        <!-- Images et titres images -->
        <div class="mySlides fading" style="display: block;">
            <img src="<?php echo DOSSIER_RACINE;?>/images/<?php echo $image1->getUrlPhoto();?>" style="width:100%">
            <div class="text">Des bagues pour vous démarquer</div>
        </div>

        <div class="mySlides fading">
            <img src="<?php echo DOSSIER_RACINE;?>/images/<?php echo $image2->getUrlPhoto();?>" style="width:100%">
            <div class="text">Trouvez votre individualité</div>
        </div>

        <div class="mySlides fading">
            <img src="<?php echo DOSSIER_RACINE;?>/images/<?php echo $image3->getUrlPhoto();?>" style="width:100%">
            <div class="text">More is more</div>
        </div>

        <!-- Boutons précédent & suivant -->
        <a class="prev" onclick="gererAnimation(2000,-1);">&#10094;</a>
        <a class="next" onclick="gererAnimation(2000,1);">&#10095;</a>
    </div>
    <br>

    <div class="accueil-section text-center p-5 my-5">
        <a class="bouton" href="<?php echo DOSSIER_RACINE;?>/vues/produits.php">Magasinez la collection</a>
    </div>
    
    <div class="accueil-section d-flex flex-wrap align-items-center p-5 my-5">
        <div class="accueil-produits-container">
            <h1 class="bg-light text-dark">Nouveaux arrivages</h1>
            <div class="accueil-produits d-flex" id="nouveautes" onmouseenter="changerFondNouveautes();" onmouseleave="retablirFond();">
                <div class="accueil-produits-boite">
                    <img src="<?php echo DOSSIER_RACINE;?>/images/hatton-labs-bague-eternity-argentee-a-perles.png" class="img-fluid" alt="Hatton Labs" width="200" title="Hatton Labs - Bague éternité argentée à perles">
                </div>
                <div class="accueil-produits-boite">
                    <img src="<?php echo DOSSIER_RACINE;?>/images/martine-ali-bague-dave-en-argent-sterling-a-chaine-a-maille-gourmette.png" class="img-fluid" alt="Bague Martine Ali" width="200" title="Martine Ali - Bague en argent sterling à chaîne">
                </div>
            </div> <!-- div accueil-produits -->
        </div> <!-- div accueil-produits-container -->
    </div>

    <div class="accueil-section d-flex flex-wrap align-items-center p-5 my-5">
        <div class="accueil-produits-container">
            <h1 class="bg-light text-dark">Soldes</h1>
            <div class="accueil-produits d-flex" id="soldes" onmouseenter="changerFondSoldes();" onmouseleave="retablirFond();">
                <div class="accueil-produits-boite">
                    <img src="<?php echo DOSSIER_RACINE;?>/images/tom-wood-bague-lizzie-en-argent-sterling-a-nacre-blanche.png" class="img-fluid" alt="Bague Tom Wood" width="200" title="Tom Wood - Bague en argent sterling à nacre blanche">
                </div>
                <div class="accueil-produits-boite">
                    <img src="<?php echo DOSSIER_RACINE;?>/images/wwwwillshott-bague-solitaire-a-chaines-en-argent-sterling-a-onyx-noir.png" class="img-fluid" alt="Bague WWW. Will Shott" width="200" title="WWW. Will Shott - Bague à chaînes en argent sterling à onyx noir">
                </div>
            </div> <!-- div accueil-produits -->
        </div> <!-- div accueil-produits-container -->
    </div>
</body>
</html>