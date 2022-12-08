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
	if (ISSET($_POST['nom_utilisateur']) && ISSET($_POST['mot_passe'])) {
		
		// On récupère l'utilisateur à partir du DAO
		$utilisateur = UtilisateurDAO::chercher($_POST['nom_utilisateur']);
	
		// Si l'utilisateur existe et que le mot de passe est bon
		if ($utilisateur != null) {
			if ($utilisateur->verifierMotPasse($_POST['mot_passe']) && $utilisateur->verifierUtilisateur($_POST['nom_utilisateur'])) {
				// Vérification de l'utilisateur root qui se connecte uniquement au panneau admin
				if ($utilisateur->getNom() == 'root') {
					// on créer la variable de session utilisateurConnecte
					$_SESSION['utilisateurConnecte'] = $_POST['nom_utilisateur'];
			
					// On redirige vers la page privee, puisqu'on est maintenant connecté
					header('Location: pagePrivee.php');
				}
			} else {
				$message = "Mot de passe ou utilisateur incorrect";
			}
		// Sinon, si la session est active, on redirige aussi vers la page privée
		} elseif (ISSET($_SESSION['utilisateurConnecte'])) {
			header('Location: pagePrivee.php');
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
		<title>Connexion privée | ALLOY</title>
		<link rel="stylesheet" href="<?php echo DOSSIER_RACINE;?>/css/bootstrap.css">
    	<script src="<?php echo DOSSIER_RACINE;?>/js/jquery-3.5.0.min.js"></script>
    	<script src="<?php echo DOSSIER_RACINE;?>/js/bootstrap.bundle.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo DOSSIER_RACINE;?>/css/style-projet.css">
		<script src="<?php echo DOSSIER_RACINE;?>/js/script_projet.js"></script>
	</head>
<body >
	<div class="container p-5 my-5 border bg-light w-50">
		<h1 class="bg-light text-dark">Connexion privée</h1>
		<br>
		<p class="text-center"> <?php echo $message; ?>	</p>
		<div class="d-flex justify-content-center">
			<form method="post">
				<div class="form-group">
					<label for="nom_utilisateur" class="form-label">Nom d'utilisateur</label>
					<input type="text" id="nom_utilisateur" name="nom_utilisateur" class="form-control">
				</div>
				<br>
				<div class="form-group">
					<label for="mot_passe" class="form-label">Mot de passe</label>
					<input type="password" id="mot_passe" name="mot_passe" class="form-control">
				</div>
				<br>
				<input type="submit" value="Se connecter" class="btn btn-secondary boutons" onmouseenter="changerFondBoutons();" onmouseleave="retablirFondBoutons();">
			</form>
		</div>
		<br>
		<h3 class="small"><a class="autresliens" href="<?php echo DOSSIER_RACINE;?>/index.php">Retour à la page d'accueil</a></h3>
	</div>
</body>
</html>