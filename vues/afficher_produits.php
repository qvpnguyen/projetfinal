<?php
    if (defined("DOSSIER_RACINE") == false) {
        define("DOSSIER_RACINE", "/projet-session_Patrick-Nguyen");
    }
    if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet-session_Patrick-Nguyen/");
	}

    include(DOSSIER_BASE_INCLUDE."modele/DAO/ProduitDAO.class.php");

	// on récupère la session, ou on en crée un nouvelle
	session_start();
	// Si l'ulisateurConnecte n'existe pas, alors on redirige vers la page de connexion
	if (!ISSET($_SESSION['utilisateurConnecte'])) {
		header('Location: connexionPrivee.php');
	}
    // On récupère le nom pour l'affichage
	$nomUtilisateur = $_SESSION['utilisateurConnecte'];
	
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ADMIN Affichage des produits | ALLOY</title>
        <link rel="stylesheet" href="<?php echo DOSSIER_RACINE;?>/css/bootstrap.css">
        <script src="<?php echo DOSSIER_RACINE;?>/js/jquery-3.5.0.min.js"></script>
        <script src="<?php echo DOSSIER_RACINE;?>/js/bootstrap.bundle.js"></script>
        <script src="https://kit.fontawesome.com/c4acb4725d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo DOSSIER_RACINE;?>/css/style-projet.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <nav class="navbar sidebar-nav bg-dark sticky-top">
                        <div class="container-fluid text-light">
                            <ul class="navbar-nav">
                                <li class="nav-item pe-3"><i class="pe-1 my-4 fa-solid fa-user"></i>Bienvenue <?php echo $nomUtilisateur;?></li>
                                <li class="nav-item"><a class="nav-link text-light" href="<?php echo DOSSIER_RACINE;?>/vues/pagePrivee.php"><i class="fa-solid fa-house me-1"></i>Accueil admin</a></li>
                                <li class="nav-item"><a class="nav-link text-light" href="<?php echo DOSSIER_RACINE;?>/vues/chercher_produit.php"><i class="fa-solid fa-magnifying-glass me-1"></i>Rechercher un produit</a></li>
                                <li class="nav-item"><a class="nav-link text-light" href="<?php echo DOSSIER_RACINE;?>/vues/chercher_produits.php"><i class="fa-solid fa-magnifying-glass me-1"></i>Rechercher des produits</a></li>
                                <li class="nav-item"><a class="nav-link text-light" href="<?php echo DOSSIER_RACINE;?>/vues/ajouter_produit.php"><i class="fa-solid fa-plus me-1"></i>Ajouter un produit</a></li>
                                <li class="nav-item"><a class="nav-link text-primary active" aria-current="page" href="<?php echo DOSSIER_RACINE;?>/vues/afficher_produits.php"><i class="fa-solid fa-eye me-1"></i>Afficher des produits</a></li>
                                <li class="nav-item"><a class="nav-link text-light" href="<?php echo DOSSIER_RACINE;?>/vues/supprimer_produit.php"><i class="fa-solid fa-trash me-1"></i>Supprimer un produit</a></li>
                                <li class="nav-item"><a class="nav-link text-light" href="<?php echo DOSSIER_RACINE;?>/vues/deconnexion.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Déconnexion</a></li>                                    
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="col">
                    <h1>Affichage des produits</h1>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Identifiant</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Marque</th>
                                    <th>Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $resultats = ProduitDAO::chercherTous();
                                    foreach ($resultats as $cle => $valeur) {
                                        echo "<tr>";
                                        echo "<td>".$valeur->getIdentifiant()."</td>";
                                        echo "<td>"."<img src=".DOSSIER_RACINE."/images/".$valeur->getUrlPhoto()." width=200>"."</td>";
                                        echo "<td>".$valeur->getDescription()."</td>";
                                        echo "<td>".$valeur->getMarque()."</td>";
                                        echo "<td>".$valeur->getPrix()."</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </body>
</html>