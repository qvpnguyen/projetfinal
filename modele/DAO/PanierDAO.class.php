<?php
	
	// ****** INLCUSIONS *******
	// si la constante n'existe pas, on la crée
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet-session_Patrick-Nguyen/");
	}
	// Importe l'interface DAO et la classe Produit
	include_once(DOSSIER_BASE_INCLUDE."modele/DAO/DAO.interface.php");
	include(DOSSIER_BASE_INCLUDE."modele/panier.class.php");

	// ****** CLASSE *******
	class PanierDAO implements DAO {	
	
		// Cette méthode doit retourner l'objet dont la clé primaire a été reçu en paramètre
		// Notes : 1) On retourne null si non-trouvé, 
		//         2) Si la clé primaire est composée, alors le paramètre est un tableau assiociatif
		// ici la seule $clés est un int représentant l'identifiant du produit
		public static function chercher($cles) { 
			// obtenir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d'obtenir la connexion à la BD."); 
			}
			// valeur par défaut pour la variable à retourner si non-trouvée
			$unProduit=null;
			// Préparer une requête de type PDOStatement avec des paramètres SQL	
			$requete=$connexion->prepare("SELECT * FROM panier WHERE identifiant=?");
			// Exécuter la requête
			$requete->execute(array($cles));
			// Analyser l’enregistrement, s’il existe, et créer l’instance du Produit
			// note on pourait aussi lancer une exception si on a plus d’un résultat …
			if ($requete->rowCount()!=0) {
				$ligne=$requete->fetch();
				$unProduit=new Panier($ligne['identifiant'],$ligne['url_photo'],$ligne['description'],
										$ligne['marque'],$ligne['prix'],$ligne['quantite']);										
			} else {
                $requete=$connexion->prepare("SELECT * FROM panier WHERE description=?");
                $requete->execute(array($cles));
                if ($requete->rowCount()!=0) {
                    $ligne=$requete->fetch();
                    $unProduit=new Panier($ligne['identifiant'],$ligne['url_photo'],$ligne['description'],
										$ligne['marque'],$ligne['prix'],$ligne['quantite']);
                }
            }
			// fermer le curseur de la requête et la connexion à la BD
			$requete->closeCursor();
			ConnexionBD::close();
			return $unProduit;
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
			$requete=$connexion->prepare("SELECT * FROM panier ".$filtre);
			// Exécuter la requête
			$requete->execute(array($filtre));
			// Analyser les enregistrements s'il y en a 
			foreach ($requete as $ligne) {
				$unProduit=new Panier($ligne['identifiant'],$ligne['url_photo'],$ligne['description'],$ligne['marque'],$ligne['prix'],$ligne['quantite']);										
				array_push($tableau,$unProduit);
			}
			// fermer le curseur de la requête et la connexion à la BD
			$requete-> closeCursor();
			ConnexionBD::close();	
			return $tableau;
		} 

		static function inserer($unProduit){ 
			// on essaie d’établir la connexion
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d'obtenir la connexion à la BD."); 
			}
			// On prépare la commande insert
			$requete=$connexion->prepare("INSERT INTO panier (identifiant,url_photo,description,marque,prix,quantite) VALUES (?,?,?,?,?,?)");
			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unProduit->getIdentifiant(),$unProduit->getUrlPhoto(),$unProduit->getDescription(),$unProduit->getMarque(),$unProduit->getPrix(),$unProduit->getQuantite()];
			return $requete->execute($tableauInfos);
		}

		// Cette méthode modifie tous les champs (non-clé primaire) de l'objet reçu en paramètre dans la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function modifier($unProduit) {
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d'obtenir la connexion à la BD."); 
			}
			// On prépare la commande insert
			$requete=$connexion->prepare("UPDATE panier SET url_photo=?,description=?,marque=?,prix=?,quantite=? WHERE identifiant=?");
			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unProduit->getUrlPhoto(),$unProduit->getDescription(),
							$unProduit->getMarque(),$unProduit->getPrix(),$unProduit->getQuantite(),$unProduit->getIdentifiant()];
			return $requete->execute($tableauInfos);
		}
		// Cette méthode supprime l'objet reçu en paramètre de la table
		// Retourne true/false selon que l'opération a été un succès ou pas.
		static public function supprimer($unProduit){
			try {
				$connexion=ConnexionBD::getInstance();
			} catch (Exception $e) {
				throw new Exception("Impossible d'obtenir la connexion à la BD."); 
			}
			// On prépare la commande insert
			$requete=$connexion->prepare("DELETE FROM panier WHERE identifiant=?");
			// On l’exécute, et on retourne l’état de réussite (true/false)
			$tableauInfos=[$unProduit->getIdentifiant()];
			return $requete->execute($tableauInfos);
		} 
			
	}
	
?>