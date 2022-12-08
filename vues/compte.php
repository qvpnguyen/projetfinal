<?php
    if (defined("DOSSIER_RACINE") == false) {
		define("DOSSIER_RACINE", "/projet-session_Patrick-Nguyen");
	}
    if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet-session_Patrick-Nguyen/");
	}

    include(DOSSIER_BASE_INCLUDE."modele/DAO/UtilisateurDAO.class.php");
	
	// on récupère la session ou on en crée une nouvelle
	session_start();

	$numero_session = session_id();
	$message = "";
	// Si un formulaire post a été soumis
	if (ISSET($_POST['nom']) && ISSET($_POST['mot_passe'])) {
		
		// On récupère l'utilisateur à partir du DAO
		$utilisateur = UtilisateurDAO::chercher($_POST['nom']);
	
		// Si l'utilisateur existe et que le mot de passe est bon
		if ($utilisateur != null) {
			if ($utilisateur->verifierMotPasse($_POST['mot_passe']) && $utilisateur->verifierUtilisateur($_POST['nom'])) {
                // on créer la variable de session utilisateurConnecte
                $_SESSION['utilisateurConnecte'] = $_POST['nom'];

                // On récupère le nom pour l'affichage
	            $nomUtilisateur = $_SESSION['utilisateurConnecte'];
        
                // On redirige vers la page client, puisqu'on est maintenant connecté
                header('Location: compte.php');
				
			} else {
				$message = "Mot de passe ou utilisateur incorrect";
			}
		// Sinon, si la session est active, on redirige aussi vers la page client
		} elseif (ISSET($_SESSION['utilisateurConnecte'])) {
			header('Location: compte.php');
		} else {
			// Pour tous les cas non-redirigés, on reste sur la page de connexion
			$message = "Mot de passe ou utilisateur incorrect";
		}
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte | ALLOY</title>
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
            <?php if (ISSET($_SESSION['utilisateurConnecte'])) {echo "<a style=text-transform:uppercase;font-size:1em;color:#ccc>Bienvenue ".$_SESSION['utilisateurConnecte']."</a>";} ?>
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
                        <a class="nav-link liens liens-soulignes active" href="<?php echo DOSSIER_RACINE;?>/vues/compte.php">Compte</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>

    <?php
        if (ISSET($_SESSION['utilisateurConnecte'])) {
            echo "<div class='container p-5 my-5 border bg-light w-50'>";
            echo nl2br("<h1 class='bg-light text-dark'>".$_SESSION['utilisateurConnecte'].", vous êtes connecté.e</h1>\n");
            echo "<div class='d-flex justify-content-center'>";
            echo "<ul class=list-group>";
            echo "<li class=list-group-item><a class=autresliens href=".DOSSIER_RACINE."/vues/produits.php>Aller à la page des produits</a></li>";
            echo "<li class=list-group-item><a class=autresliens href=".DOSSIER_RACINE."/vues/pageClient.php>Aller à mes préférences</a></li>";
            echo "<li class=list-group-item><a class=autresliens href=".DOSSIER_RACINE."/vues/deconnexion.php><i class='fa-solid fa-arrow-right-from-bracket me-1'></i>Déconnexion</a></li>";
            echo "</ul>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<div class='container p-5 my-5 border bg-light w-50'>";
            echo nl2br("<h1 class='bg-light text-dark'>Connexion</h1>\n");
            echo "<p class=text-center>".$message."</p>";
            echo "<div class='d-flex justify-content-center'>";
            echo "<form method=post>";
            echo "<div class=form-group>";
            echo nl2br("<label for=nom-client class=form-label>Nom d'utilisateur</label>\n");
            echo "<input type=text class=form-control id=nom-client name=nom title='Inscrivez votre nom d'utilisateur' required>";
            echo nl2br("</div>\n\n");
            echo "<div class=form-group>";
            echo nl2br("<label for=password-client class=form-label>Mot de passe</label>\n");
            echo "<input type=password class=form-control id=password-client name=mot_passe title='Inscrivez votre mot de passe' required>";
            echo nl2br("</div>\n\n");
            echo "<p>Vous n'avez pas de compte client? <a class=autresliens href=".DOSSIER_RACINE."/vues/inscription.php target=_blank>Créez un compte</a></p>";
            echo nl2br("<a class=autresliens href=".DOSSIER_RACINE."/vues/connexionPrivee.php>Connexion privée</a> \n");
            echo "<input class='btn btn-secondary boutons' type=submit value='Se connecter' onmouseenter='changerFondBoutons();' onmouseleave='retablirFondBoutons();'>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
    ?>
</body>
</html>