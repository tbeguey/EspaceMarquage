<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller {

    public function index()
    {
        $data['title'] = "Connexion";

        $this->load->view('templates/header', $data);
        $this->load->view('connexion/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

	public function connection()
	{
		 $this->load->helper('url');
         redirect('welcome/index', 'refresh');
	}

	public function inscription()
	{
		 $this->load->helper('url');
         redirect('welcome/index', 'refresh');
	}
}
?>