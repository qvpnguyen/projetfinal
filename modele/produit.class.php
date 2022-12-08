<?php

class Produit {
	// Attributs
	private $identifiant;
	private $urlPhoto;
	private $description;
	private $marque;
	private $prix;

	// Constructeur
	public function __construct($identifiant,$url,$desc,$marque,$prix){
		$this->identifiant=$identifiant;
		$this->urlPhoto=$url;
		$this->description=$desc;
		$this->marque=$marque;
		$this->prix=$prix;
	}
	
	// Accesseurs et mutateurs
	public function getIdentifiant() {return $this->identifiant;}
	public function getDescription() {return $this->description;}
	public function getMarque() {return $this->marque;}
	public function getUrlPhoto() {return $this->urlPhoto;}
	public function getPrix() {return $this->prix;}
	public function setIdentifiant($id) {$this->identifiant=$id;}
	public function setDescription($valeur) {$this->description=$valeur;}
    public function setMarque($valeur) {$this->marque=$valeur;}
	public function setUrlPhoto($valeur) {$this->photo=$valeur;}
	public function setPrix($valeur) {$this->prix=$valeur;}

	// Autres méthodes

	
	// Affichage
	public function __toString(){
		$message="[#".$this->identifiant."] ".$this->description." - ".$this->marque;
		$message.=" @".round($this->prix,2)."$";
		return $message;
	}
}
?>