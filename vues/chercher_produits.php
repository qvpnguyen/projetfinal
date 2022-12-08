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
        <title>ADMIN Recherche de produits | ALLOY</title>
        <link rel="stylesheet" href="<?php echo DOSSIER_RACINE;?>/css/bootstrap.css">
        <script src="<?php echo DOSSIER_RACINE;?>/js/jquery-3.5.0.min.js"></script>
        <script src="<?php echo DOSSIER_RACINE;?>/js/bootstrap.bundle.js"></script>
        <script src="https://kit.fontawesome.com/c4acb4725d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo DOSSIER_RACINE;?>/css/style-projet.css">
        <script src="<?php echo DOSSIER_RACINE;?>/js/script_projet.js"></script>
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
                                <li class="nav-item"><a class="nav-link text-primary active" aria-current="page" href="<?php echo DOSSIER_RACINE;?>/vues/chercher_produits.php"><i class="fa-solid fa-magnifying-glass me-1"></i>Rechercher des produits</a></li>
                                <li class="nav-item"><a class="nav-link text-light" href="<?php echo DOSSIER_RACINE;?>/vues/ajouter_produit.php"><i class="fa-solid fa-plus me-1"></i>Ajouter un produit</a></li>
                                <li class="nav-item"><a class="nav-link text-light" href="<?php echo DOSSIER_RACINE;?>/vues/afficher_produits.php"><i class="fa-solid fa-eye me-1"></i>Afficher des produits</a></li>
                                <li class="nav-item"><a class="nav-link text-light" href="<?php echo DOSSIER_RACINE;?>/vues/supprimer_produit.php"><i class="fa-solid fa-trash me-1"></i>Supprimer un produit</a></li>
                                <li class="nav-item"><a class="nav-link text-light" href="<?php echo DOSSIER_RACINE;?>/vues/deconnexion.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Déconnexion</a></li>                                    
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="col">
                    <div class="container border bg-light w-50">
                        <h1 class="mt-3 mb-5">Recherche de produits</h1>
                        <form method="post">
                            <div class="form-group d-block text-center">
                                <label for="recherche-identifiant" class="form-label d-inline">Identifiant</label>
                                <input type="text" id="recherche-identifiant" name="recherche-identifiant" class="form-control d-inline w-25">
                                <br>
                                <label for="recherche-description" class="form-label d-inline mt-3">Description</label>
                                <input type="text" id="recherche-description" name="recherche-description" class="form-control d-inline w-25 mt-3">
                                <br>
                                <input type="submit" value="Recherche" class="btn btn-secondary boutons my-3" onmouseenter="changerFondBoutons();" onmouseleave="retablirFondBoutons();">
                            </div>
                        </form>
                        <?php
                        if (ISSET($_POST['recherche-identifiant']) || ISSET($_POST['recherche-description'])) {
                            $resultat = ProduitDAO::chercherAvecFiltre("WHERE identifiant LIKE '".$_POST['recherche-identifiant']."'");
                            if ($resultat == null) {
                                $resultat = ProduitDAO::chercherAvecFiltre("WHERE description LIKE '".$_POST['recherche-description']."'");
                                if ($resultat == null) {
                                    echo "<p class=text-center>Aucun résultat trouvé</p>";
                                }
                            }
                        }
                        ?>
                    </div>
                    <?php
                    if (ISSET($_POST['recherche-identifiant']) || ISSET($_POST['recherche-description'])) {
                        $resultat = ProduitDAO::chercherAvecFiltre("WHERE identifiant LIKE '".$_POST['recherche-identifiant']."'");
                        if ($resultat == null) {
                            $resultat = ProduitDAO::chercherAvecFiltre("WHERE description LIKE '".$_POST['recherche-description']."'");
                            if ($resultat != null) {
                                echo "<div class=table-responsive style=margin-top:3em;>";
                                echo "<table class=table>";
                                echo "<thead>";
                                echo "<tr>";
                                echo "<th>Identifiant</th>";
                                echo "<th>Image</th>";
                                echo "<th>Description</th>";
                                echo "<th>Marque</th>";
                                echo "<th>Prix</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                foreach ($resultat as $ligne) {
                                    echo "<tr>";
                                    echo "<td>".$ligne->getIdentifiant()."</td>";
                                    echo "<td>"."<img src=".DOSSIER_RACINE."/images/".$ligne->getUrlPhoto()." width=200"."</td>";
                                    echo "<td>".$ligne->getDescription()."</td>";
                                    echo "<td>".$ligne->getMarque()."</td>";
                                    echo "<td>".$ligne->getPrix()."</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            }
                        } else {
                            echo "<div class=table-responsive style=margin-top:3em;>";
                            echo "<table class=table>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Identifiant</th>";
                            echo "<th>Image</th>";
                            echo "<th>Description</th>";
                            echo "<th>Marque</th>";
                            echo "<th>Prix</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            foreach ($resultat as $ligne) {
                                echo "<tr>";
                                echo "<td>".$ligne->getIdentifiant()."</td>";
                                echo "<td>"."<img src=".DOSSIER_RACINE."/images/".$ligne->getUrlPhoto()." width=200"."</td>";
                                echo "<td>".$ligne->getDescription()."</td>";
                                echo "<td>".$ligne->getMarque()."</td>";
                                echo "<td>".$ligne->getPrix()."</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>