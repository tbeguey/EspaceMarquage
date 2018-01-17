<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Model {

	public $id;
	public $titre;
	public $defaut;
	public $lignes;

	public function __construct($i, $t, $d, $l){
		$this->id = $i;
		$this->titre = $t;
		$this->defaut = $d;
		$this->lignes = $l;
	}

}

?>