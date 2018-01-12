<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Line {

	public $id;
	public $texte;
	public $taille;
	public $police;
	public $espacement;
	public $alignement;
	public $gras;
	public $italique;
	public $souligne;

	public function __construct($i, $txt, $t, $p, $e, $a, $g, $it, $s){
		$this->id = $i;
		$this->texte = $txt;
		$this->taille = $t;
		$this->police = $p;
		$this->espacement = $e;
		$this->alignement = $a;
		$this->gras = $g;
		$this->italique = $it;
		$this->souligne = $s;
	}

}

?>