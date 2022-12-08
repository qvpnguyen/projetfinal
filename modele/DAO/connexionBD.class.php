<?php
	// Création d'une constante de base de dossier
	if (defined("DOSSIER_BASE_INCLUDE") == false) {
		define("DOSSIER_BASE_INCLUDE", $_SERVER['DOCUMENT_ROOT']."projet-session_Patrick-Nguyen/");
	}
	// Le fichier configDB.interface.php contient le mot de passe, le nom d’utilisateur
	// avec les constantes BD_HOTE, BD_NOM, BD_UTILISATEUR et BD_MOT_PASSE
	include_once(DOSSIER_BASE_INCLUDE.'modele/DAO/config/configBD.interface.php');
	
	class ConnexionBD  {	
		
		private static $instance=null;
		
		private function __construct() {}
		
		public static function getInstance() {
			if (self::$instance==null) {
				$configuration="mysql:host=".ConfigBD::BD_HOTE.";dbname=".ConfigBD::BD_NOM;
				$utilisateur=ConfigBD::BD_UTILISATEUR;
				$motPasse=ConfigBD::BD_MOT_PASSE;
				self::$instance=new PDO($configuration,$utilisateur,$motPasse);	
				self::$instance->exec("SET character_set_results = 'utf8'");	
				self::$instance->exec("SET character_set_client = 'utf8'");	
				self::$instance->exec("SET character_set_connection = 'utf8'");	
			}
			return self::$instance;
		}
	  
		public static function close() {
			self::$instance=null;
		}
	}
?>