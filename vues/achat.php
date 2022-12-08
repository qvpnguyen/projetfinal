<?php
    if (defined("DOSSIER_RACINE") == false) {
		define("DOSSIER_RACINE", "/projet-session_Patrick-Nguyen");
	}
    if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet-session_Patrick-Nguyen/");
	}

    include_once(DOSSIER_BASE_INCLUDE."modele/DAO/ProduitDAO.class.php");
    include_once(DOSSIER_BASE_INCLUDE."modele/DAO/PanierDAO.class.php");

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
    <title>Confirmation de la commande | ALLOY</title>
    <link rel="stylesheet" href="<?php echo DOSSIER_RACINE;?>/css/bootstrap.css">
    <script src="<?php echo DOSSIER_RACINE;?>/js/jquery-3.5.0.min.js"></script>
    <script src="<?php echo DOSSIER_RACINE;?>/js/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/c4acb4725d.js" crossorigin="anonymous"></script>
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
    <?php
    if (ISSET($_SESSION['utilisateurConnecte'])) {
        // Vérifier qu'un panier d'achats est existant. Si oui, on affiche les produits ajoutés dans le panier
        $panierExistant = PanierDAO::chercherTous();
        if ($panierExistant) {
            echo '<h1 class="bg-light text-dark">Merci pour votre achat</h1>';
            $total = 0.00; ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Identifiant</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Marque</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($panierExistant as $cle => $valeur) { ?>
                        <tr>
                            <td><?php echo $valeur->getIdentifiant(); ?></td>
                            <td><img src="<?php echo DOSSIER_RACINE."/images/".$valeur->getUrlPhoto();?>" width="200"></td>
                            <td><?php echo $valeur->getDescription(); ?></td>
                            <td><?php echo $valeur->getMarque(); ?></td>
                            <td><?php echo $valeur->getPrix(); ?></td>
                            <td><?php echo $valeur->getQuantite(); ?></td>
                            <?php $total += $valeur->getPrix(); ?>
                        </tr>
            <?php } ?>
                        <tr>
                            <td colspan="4">Total</td>
                            <td colspan="2"><?php echo number_format((float)$total, 2, '.', ''); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php } 
    }
    foreach ($panierExistant as $unProduit) {
        PanierDAO::supprimer($unProduit);
    }
    ?>
    <div class="text-center">
        <ul class="list-group">
            <li class="list-group-item bg-transparent border-0"><a class="autresliens" href="<?php echo DOSSIER_RACINE;?>/vues/produits.php">Retourner à la page des produits</a></li>
            <li class="list-group-item bg-transparent border-0"><a class="autresliens" href="<?php echo DOSSIER_RACINE;?>/index.php">Retourner à la page d'accueil</a></li>
    </div>
</body>
</html>