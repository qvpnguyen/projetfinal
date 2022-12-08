<?php

class Utilisateur {
	// Attributs
	private $nom;
	private $prenom;
	private $urlPhoto;
	private $motDePasse;

	// Constructeur
	public function __construct($nom, $prenom, $url, $mdp){
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->urlPhoto=$url;
		$this->motDePasse=$mdp;
	}
	
	// Accesseurs et mutateurs
	public function getNom() {return $this->nom;}
	public function getPrenom() {return $this->prenom;}
	public function getUrlPhoto() {return $this->urlPhoto;}
	public function getMotDePasse() {return $this->motDePasse;}
	public function setNom($valeur) {$this->nom=$valeur;}
    public function setPrenom($valeur) {$this->prenom=$valeur;}
	public function setUrlPhoto($url) {$this->urlPhoto=$url;}
	public function setPrix($valeur) {$this->prix=$valeur;}

	// Autres méthodes
    public function verifierMotPasse($mdp) {return $this->motDePasse == $mdp;}

    public function verifierUtilisateur($user) {return $this->nom == $user;}
	
	// Affichage
	public function __toString(){
		$message=$this->nom;
		return $message;
	}
}
?>