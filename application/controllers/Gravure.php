<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gravure extends CI_Controller {

    public function index()
    {
        $data['title'] = "Choix de gravure";

        $this->load->view('templates/header', $data);
        $this->load->view('gravure/index.php', $data);
        $this->load->view('templates/footer', $data);
    }
}
?>