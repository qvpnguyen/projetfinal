<?php
    if (defined("DOSSIER_RACINE") == false) {
		define("DOSSIER_RACINE", "/projet-session_Patrick-Nguyen");
	}
    if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet-session_Patrick-Nguyen/");
	}

    //include(DOSSIER_BASE_INCLUDE."modele/DAO/ProduitDAO.class.php");

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
    <title>Produits | ALLOY</title>
    <link rel="stylesheet" href="<?php echo DOSSIER_RACINE;?>/css/bootstrap.css">
    <script src="<?php echo DOSSIER_RACINE;?>/js/jquery-3.5.0.min.js"></script>
    <script src="<?php echo DOSSIER_RACINE;?>/js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/c4acb4725d.js" crossorigin="anonymous"></script>
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
                        <a class="nav-link liens liens-soulignes active" href="<?php echo DOSSIER_RACINE;?>/vues/produits.php">Produits</a>
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
    <h1 class="bg-light text-dark">Produits</h1>
    <br>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="bg-light" style="--bs-bg-opacity: .6; width: 50%; margin: 0 auto;">
                <h1 class="display-5">En vedette</h1>
                <p class="lead text-center">Découvrez la nouvelle bague tant convoitée de Hatton Labs</p>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <?php if (ISSET($_SESSION['utilisateurConnecte'])) {echo "<th>Ajouter au panier</th>";} ?>
                    <th>Identifiant</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Marque</th>
                    <th>Prix</th>
                    <th>Catégorie</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if (ISSET($_SESSION['utilisateurConnecte'])) {?>
                        <form action="panier.php" method="post">
                            <td class="align-middle">
                                <input type="checkbox" name="panier[]" value="BG-01">
                            </td>
                    <?php } ?>
                    
                    <td class="align-middle">BG-01</td>
                    <td class="align-middle"><img src="<?php echo DOSSIER_RACINE;?>/images/camiel-fortgens-bague-argentee-a-perle.jpg" alt="Bague Camiel Fortgens" width="200" title="Camiel Fortgens - Bague argentée à perle"></td>
                    <td class="align-middle">Bague argentée à perle</td>
                    <td class="align-middle">Camiel Fortgens</td>
                    <td class="align-middle">
                        <a style="color: red;">367$</a><br>
                        <a style="text-decoration: line-through;">510$</a>
                    </td>
                    <td class="align-middle" rowspan="8">Bague</td>
                </tr>
                <tr>
                    <?php
                    if (ISSET($_SESSION['utilisateurConnecte'])) {?>
                        <td class="align-middle">
                            <input type="checkbox" name="panier[]" value="BG-02">
                        </td>
                    <?php } ?>
                    <td class="align-middle">BG-02</td>    
                    <td class="align-middle"><img src="<?php echo DOSSIER_RACINE;?>/images/chin-teo-bague-transmission-round-argentee.jpg" alt="Bague Chin Teo" width="200" title="Chin Teo - Bague argentée"></td>
                    <td class="align-middle">Bague argentée</td>
                    <td class="align-middle">Chin Teo</td>
                    <td class="align-middle">
                        <a style="color: red;">110$</a><br>
                        <a style="text-decoration: line-through;">150$</a>                        
                    </td>
                </tr>
                <tr>
                    <?php
                    if (ISSET($_SESSION['utilisateurConnecte'])) {?>
                        <td class="align-middle">
                            <input type="checkbox" name="panier[]" value="BG-03">
                        </td>
                    <?php } ?>
                    <td class="align-middle">BG-03</td>
                    <td class="align-middle"><img src="<?php echo DOSSIER_RACINE;?>/images/gucci-bague-argentee-garden-snake.jpg" alt="Bague Gucci" width="200" title="Gucci - Bague argentée en serpent"></td>
                    <td class="align-middle">Bague argentée en serpent</td>
                    <td class="align-middle">Gucci</td>
                    <td class="align-middle">470$</td>
                </tr>
                <tr>
                    <?php
                    if (ISSET($_SESSION['utilisateurConnecte'])) {?>
                        <td class="align-middle">
                            <input type="checkbox" name="panier[]" value="BG-04">
                        </td>
                    <?php } ?>
                    <td class="align-middle">BG-04</td>
                    <td class="align-middle"><img src="<?php echo DOSSIER_RACINE;?>/images/hatton-labs-bague-en-argent-sterling-a-ferrure-graphique.jpg" alt="Bague Hatton Labs" width="200" title="Hatton Labs - Bague en argent sterling à ferrure graphique"></td>
                    <td class="align-middle">Bague en argent sterling à ferrure graphique</td>
                    <td class="align-middle" rowspan="2">Hatton Labs</td>
                    <td class="align-middle">295$</td>
                </tr>
                <tr>
                    <?php
                    if (ISSET($_SESSION['utilisateurConnecte'])) {?>
                        <td class="align-middle">
                            <input type="checkbox" name="panier[]" value="BG-05">
                        </td>
                    <?php } ?>
                    <td class="align-middle">BG-05</td>
                    <td class="align-middle"><img src="<?php echo DOSSIER_RACINE;?>/images/hatton-labs-bague-eternity-argentee-a-perles.jpg" alt="Bague Hatton Labs" width="200" title="Hatton Labs - Bague éternité argentée à perles"></td>
                    <td class="align-middle">Bague éternité argentée à perles</td>
                    <td class="align-middle">445$</td>
                </tr>
                <tr>
                    <?php
                    if (ISSET($_SESSION['utilisateurConnecte'])) {?>
                        <td class="align-middle">
                            <input type="checkbox" name="panier[]" value="BG-06">
                        </td>
                    <?php } ?>
                    <td class="align-middle">BG-06</td>
                    <td class="align-middle"><img src="<?php echo DOSSIER_RACINE;?>/images/martine-ali-bague-dave-en-argent-sterling-a-chaine-a-maille-gourmette.jpg" alt="Bague Martine Ali" width="200" title="Martine Ali - Bague en argent sterling à chaîne"></td>
                    <td class="align-middle">Bague en argent sterling à chaîne</td>
                    <td class="align-middle">Martine Ali</td>
                    <td class="align-middle">155$</td>
                </tr>
                <tr>
                    <?php
                    if (ISSET($_SESSION['utilisateurConnecte'])) {?>
                        <td class="align-middle">
                            <input type="checkbox" name="panier[]" value="BG-07">
                        </td>
                    <?php } ?>
                    <td class="align-middle">BG-07</td>
                    <td class="align-middle"><img src="<?php echo DOSSIER_RACINE;?>/images/tom-wood-bague-lizzie-en-argent-sterling-a-nacre-blanche.jpg" alt="Bague Tom Wood" width="200" title="Tom Wood - Bague en argent sterling à nacre blanche"></td>
                    <td class="align-middle">Bague en argent sterling à nacre blanche</td>
                    <td class="align-middle">Tom Wood</td>
                    <td class="align-middle">
                        <a style="color: red;">361$</a><br>
                        <a style="text-decoration: line-through;">495$</a>
                    </td>
                </tr>
                <tr>
                    <?php
                    if (ISSET($_SESSION['utilisateurConnecte'])) {?>
                        <td class="align-middle">
                            <input type="checkbox" name="panier[]" value="BG-08">
                        </td>
                    <?php } ?>
                    <td class="align-middle">BG-08</td>
                    <td class="align-middle"><img src="<?php echo DOSSIER_RACINE;?>/images/wwwwillshott-bague-solitaire-a-chaines-en-argent-sterling-a-onyx-noir.jpg" alt="Bague WWW. Will Shott" width="200" title="WWW. Will Shott - Bague à chaînes en argent sterling à onyx noir"></td>
                    <td class="align-middle">Bague à chaînes en argent sterling à onyx noir</td>
                    <td class="align-middle">WWW. Will Shott</td>
                    <td class="align-middle">
                        <a style="color: red;">198$</a><br>
                        <a style="text-decoration: line-through;">335$</a>
                    </td>
                </tr>
                <?php
                if (ISSET($_SESSION['utilisateurConnecte'])) { ?>
                    <tr>
                        <td colspan="7" class="align-middle"><input class="btn btn-secondary boutons" type="submit" name="ajout_panier" value="Ajouter au panier" onmouseenter="changerFondBoutons();" onmouseleave="retablirFondBoutons();"></td>
                        </form>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>