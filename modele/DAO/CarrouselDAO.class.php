<?php
	
	// ****** INLCUSIONS *******
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet-session_Patrick-Nguyen/");
	}
	// Importe l'interface DAO et la classe Carrousel
	include(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	include(DOSSIER_BASE_INCLUDE."modele/carrousel.class.php");

	// ****** CLASSE *******
	class CarrouselDAO implements DAO {	
	
		// Cette méthode doit retourner l'objet dont la clé primaire a été reçu en paramètre
		// Notes : 1) On retourne null si non-trouvé, 
		//         2) Si la clé primaire est composée, alors le paramètre est un tableau assiociatif
		// ici la seule $clés est un int représentant l'identifiant du carrousel
		public static function chercher($cles) { 
			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d'obtenir la connexion à la BD."); 
			}
			// valeur par défaut pour la variable à retourner si non-trouvée
			$imgCarrousel=null;
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete=$connexion->prepare("SELECT * FROM carrousel WHERE code=?");
			// Exécuter la requête
			$requete->execute(array($cles));
			// Analyser l’enregistrement, s’il existe, et créer l’instance du Carrousel
			// note on pourait aussi lancer une exception si on a plus d’un résultat …
			if ($requete->rowCount()!=0) {
				$ligne=$requete->fetch();
				$imgCarrousel=new Carrousel($ligne['code'],$ligne['url_photo'],$ligne['alt'],
										$ligne['description'],$ligne['sous_desc']);										
			} 
			// fermer le curseur de la requête et la connexion à la BD
			$requete->closeCursor();
			ConnexionBD::close();
			return $imgCarrousel;
		} 
		
		// Cette méthode doit retourner une liste de tous les objets reliés à la table de la BD
		static public function chercherTous() { 
			return self::chercherAvecFiltre("");
		} 
		
		// Comme la méthode chercherTous, mais en applicant le filtre (clause WHERE ...) reçue en param.
		static public function chercherAvecFiltre($filtre){ 
			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d'obtenir la connexion à la BD."); 
			}
			// initialisation du tableau vide
			$tableau=[];	
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete=$connexion->prepare("SELECT * FROM carrousel ".$filtre);
			// Exécuter la requête
			$requete->execute(array($filtre));
			// Analyser les enregistrements s'il y en a 
			foreach ($requete as $ligne) {
				$imgCarrousel=new Carrousel($ligne['code'],$ligne['url_photo'],$ligne['alt'],$ligne['description'],$ligne['sous_desc']);										
				array_push($tableau,$imgCarrousel);
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
			return $tableau;
		} 

		static function inserer($imgCarrousel){ 
			// on essaie d’établir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d'obtenir la connexion à la BD."); 
			}
			// On prépare la commande insert
			$requete=$connexion->prepare("INSERT INTO carrousel (identifiant,url_photo,alt,description,sous_desc) VALUES (?,?,?,?,?)");
			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$imgCarrousel->getCode(),$imgCarrousel->getUrlPhoto(),$imgCarrousel->getAlternatif(),$imgCarrousel->getDescription(),$imgCarrousel->getSousDescription()];
			return $requete->execute($tableauInfos);
		}

		// Cette méthode modifie tous les champs (non-clé primaire) de l'objet reçu en paramètre dans la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function modifier($imgCarrousel) {
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d'obtenir la connexion à la BD."); 
			}
			// On prépare la commande insert
			$requete=$connexion->prepare("UPDATE carrousel SET url_photo=?,alt=?,description=?,sous_desc=? WHERE code=?");
			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$imgCarrousel->getUrlPhoto(),$imgCarrousel->getAlternatif(),
							$imgCarrousel->getDescription(),$imgCarrousel->getSousDescription(),$imgCarrousel->getCode()];
			return $requete->execute($tableauInfos);
		}
		// Cette méthode supprime l'objet reçu en paramètre de la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function supprimer($imgCarrousel){
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d'obtenir la connexion à la BD."); 
			}
			// On prépare la commande insert
			$requete=$connexion->prepare("DELETE FROM carrousel WHERE code=?");
			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$imgCarrousel->getCode()];
			return $requete->execute($tableauInfos);
		} 
			
	}
	
?>