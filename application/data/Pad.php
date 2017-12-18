<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Pad {

	public $id;
	public $marque;
	public $nom;
	public $prix;
	public $largeur;
	public $hauteur;
	public $forme;
	public $type;
	public $lignes_max;
	public $dateur;

	function __construct($i, $m, $n, $p, $l,$h, $f, $t, $lm, $d){
		$this->id = $i;
		$this->marque = $m;
		$this->nom = $n;
		$this->prix = $p;
		$this->largeur = $l;
		$this->hauteur = $h;
		$this->forme = $f;
		$this->type = $t;
		$this->lignes_max = $lm;
		$this->dateur = $d;
	}
}

?>