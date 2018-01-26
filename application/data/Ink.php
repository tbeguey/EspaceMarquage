<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Ink {

	public $id;
	public $tampon;
	public $noir;
	public $rouge;
	public $bleu;
	public $vert;
	public $violet;

	public function __construct($i, $t, $n, $r, $b, $v, $vi){
		$this->id = $i;
		$this->tampon = $t;
		$this->noir = $n;
		$this->rouge = $r;
		$this->bleu = $b;
		$this->vert = $v;
		$this->violet = $vi;
	}

}

?>