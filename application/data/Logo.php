<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Logo {

	public $categorie;
	public $nom;
	public $extension;

	public function __construct($c, $n, $e){
		$this->categorie = $c;
		$this->nom = $n;
		$this->extension = $e;
	}

}

?>