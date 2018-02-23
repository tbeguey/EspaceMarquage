<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Model {

	public $id;
	public $titre;
	public $favori;
	public $lignes;

	public function __construct($i, $t, $f, $l){
		$this->id = $i;
		$this->titre = $t;
		$this->favori = $f;
		$this->lignes = $l;
	}

}

?>