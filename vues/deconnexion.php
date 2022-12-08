<?php
    if (defined("DOSSIER_RACINE") == false) {
        define("DOSSIER_RACINE", "/projet-session_Patrick-Nguyen");
    }
	// On démarre la session, ou on la récupère
	session_start();
    // nom par défaut
	$nomUtilisateur = "";

	// Si l'utilisateur n'était pas connecté, on le redirige versla page de connexion
	if (!ISSET($_SESSION['utilisateurConnecte'])) {
		header('Location: compte.php');
	} else {
        // Sinon, on récupère le nom d'utilisateur et on supprime le variable de 
        // session qui indique que l'utilisateur est connecté
        $nomUtilisateur = $_SESSION['utilisateurConnecte'];
        unset($_SESSION['utilisateurConnecte']);
    }

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Déconnexion | ALLOY</title>
        <link rel="stylesheet" href="<?php echo DOSSIER_RACINE;?>/css/bootstrap.css">
        <script src="<?php echo DOSSIER_RACINE;?>/js/jquery-3.5.0.min.js"></script>
        <script src="<?php echo DOSSIER_RACINE;?>/js/bootstrap.bundle.js"></script>
        <script src="https://kit.fontawesome.com/c4acb4725d.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo DOSSIER_RACINE;?>/css/style-projet.css">
        <style>
        <?php
        if (ISSET($_COOKIE["couleur"])) {
            unset($_COOKIE["couleur"]);
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
        echo "<div class='container p-5 my-5 border bg-light w-50'>";
        echo nl2br("<h1 class='bg-light text-dark'>".$nomUtilisateur.", vous êtes maintenant déconnecté.e</h1>\n");
        echo "<div class='d-flex justify-content-center'>";
        echo "<ul class=list-group>";
        echo "<li class=list-group-item><a class=autresliens href=".DOSSIER_RACINE."/vues/compte.php>Se connecter en tant que client</a></li>";
        echo "<li class=list-group-item><a class=autresliens href=".DOSSIER_RACINE."/vues/connexionPrivee.php>Se connecter en tant qu'administrateur</a></li>";
        echo "<li class=list-group-item><a class=autresliens href=".DOSSIER_RACINE."/index.php><i class='fa-solid fa-house me-1'></i>Retour à la page d'accueil</a></li>";
        echo "</ul>";
        echo "</div>";
        echo "</div>";
        ?>
    </body>
</html>