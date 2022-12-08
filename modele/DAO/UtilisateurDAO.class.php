<?php
	
	// ****** INLCUSIONS *******
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet-session_Patrick-Nguyen/");
	}
	// Importe l'interface DAO et la classe Utilisateur
	include(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	include(DOSSIER_BASE_INCLUDE."modele/utilisateur.class.php");

	// ****** CLASSE *******
	class UtilisateurDAO implements DAO {	
	
		public static function chercher($cles) { 
			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d'obtenir la connexion à la BD."); 
			}
			// valeur par défaut pour la variable à retourner si non-trouvée
			$unUtilisateur=null;
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete=$connexion->prepare("SELECT * FROM utilisateur WHERE nom=?");
			// Exécuter la requête
			$requete->execute(array($cles));
		
			if ($requete->rowCount()!=0) {
				$ligne=$requete->fetch();
				$unUtilisateur=new Utilisateur($ligne['nom'],$ligne['prenom'],$ligne['url_photo'],
										        $ligne['mot_passe']);										
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete->closeCursor();
			ConnexionBD::close();
			return $unUtilisateur;
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
			$requete=$connexion->prepare("SELECT * FROM utilisateur ".$filtre);
			// Exécuter la requête
			$requete->execute();
			// Analyser les enregistrements s'il y en a 
			foreach ($requete as $ligne) {
				$unProduit=new Utilisateur($ligne['nom'],$ligne['prenom'],$ligne['url_photo'],
                                            $ligne['mot_passe']);										
				array_push($tableau,$unProduit);
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
			return $tableau;
		} 

		static function inserer($unUtilisateur) { 
			// on essaie d’établir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d'obtenir la connexion à la BD."); 
			}
			// On prépare la commande insert
			$requete=$connexion->prepare("INSERT INTO utilisateur (nom,prenom,url_photo,mot_passe) VALUES (?,?,?,?)");
			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unUtilisateur->getNom(),$unUtilisateur->getPrenom(),$unUtilisateur->getUrlPhoto(),
							$unUtilisateur->getMotDePasse()];
			return $requete->execute($tableauInfos);
		}

		// Cette méthode modifie tous les champs (non-clé primaire) de l'objet reçu en paramètre dans la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function modifier($unUtilisateur) {
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d'obtenir la connexion à la BD."); 
			}
			// On prépare la commande insert
			$requete=$connexion->prepare("UPDATE utilisateur SET prenom=?,url_photo=?,mot_passe=? WHERE nom=?");
			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unUtilisateur->getPrenom(),$unUtilisateur->getUrlPhoto(),
							$unUtilisateur->getMotDePasse(),$unUtilisateur->getNom()];
			return $requete->execute($tableauInfos);
		}
		// Cette méthode supprime l'objet reçu en paramètre de la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function supprimer($unUtilisateur){
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d'obtenir la connexion à la BD."); 
			}
			// On prépare la commande insert
			$requete=$connexion->prepare("DELETE FROM utilisateur WHERE nom=?");
			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unUtilisateur->getNom()];
			return $requete->execute($tableauInfos);
		} 		
		
	}
	
?>