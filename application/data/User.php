<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class User {

	public $id;
	public $company;
	public $email;

	public function __construct($i, $c, $e){
		$this->id = $i;
		$this->company = $c;
		$this->email = $e;
	}

}

?>