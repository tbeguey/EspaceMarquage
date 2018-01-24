<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encre extends CI_Controller {

    public function index()
    {
        $data['title'] = "Choix de recharges d'encres";

        $this->load->view('templates/header', $data);
        $this->load->view('encre/index.php', $data);
        $this->load->view('templates/footer', $data);
    }
}
?>