<?php

class Carrousel {
	// Attributs
	private $code;
	private $urlPhoto;
	private $alternatif;
	private $description;
	private $sousDescription;

	// Constructeur
	public function __construct($code,$url,$alt,$desc,$sousdesc){
		$this->code=$code;
		$this->urlPhoto=$url;
		$this->alternatif=$alt;
		$this->description=$desc;
		$this->sousDescription=$sousdesc;
	}
	
	// Accesseurs et mutateurs
	public function getCode() {return $this->code;}
    public function getUrlPhoto() {return $this->urlPhoto;}
    public function getAlternatif() {return $this->alternatif;}
	public function getDescription() {return $this->description;}
    public function getSousDescription() {return $this->sousDescription;}
    public function setCode($valeur) {$this->code=$valeur;}
    public function setUrlPhoto($valeur) {$this->photo=$valeur;}
    public function setAlternatif($valeur) {$this->alternatif=$valeur;}
	public function setDescription($valeur) {$this->description=$valeur;}
    public function setSousDescription($valeur) {$this->sousDescription=$valeur;}
	// Autres méthodes

	
	// Affichage
	public function __toString(){
		$message="[#".$this->code."] ".$this->description." - ".$this->sousDescription;
		return $message;
	}
}
?>