<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Model {

	public $id;
	public $titre;
	public $lignes;

	public function __construct($i, $t, $l){
		$this->id = $i;
		$this->titre = $t;
		$this->lignes = $l;
	}

}

?>