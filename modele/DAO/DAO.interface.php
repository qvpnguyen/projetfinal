<?php

	// Création d'une constante de base de dossier
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet-session_Patrick-Nguyen/");
	}
	
	include_once(DOSSIER_BASE_INCLUDE.'modele/DAO/connexionBD.class.php');

	interface DAO {	
		
		static public function chercher($cles); 
		
		static public function chercherTous(); 
		
		static public function chercherAvecFiltre($filtre); 
		
		static public function inserer($unObjet); 
		
		static public function modifier($unObjet); 
		
		static public function supprimer($unObjet); 
	}
?>