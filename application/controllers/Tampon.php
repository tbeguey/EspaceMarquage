<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampon extends CI_Controller {

    public function index()
    {
        /*if (!file_exists(APPPATH.'views/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404($page);
        }*/

        $data['title'] = "Choix des tampons"; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('tampon/index.php', $data);
        $this->load->view('templates/footer', $data);
    }
}
