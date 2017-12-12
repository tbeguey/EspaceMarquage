<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tampon extends CI_Controller {

    public function index()
    {
        $data['title'] = "Choix des tampons";

        $this->load->view('templates/header', $data);
        $this->load->view('tampon/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

	public function personalize()
	{
		$data['title'] = "TAMPON XXXX"; 

        $this->load->view('templates/header', $data);
        $this->load->view('tampon/personalize.php', $data);
        $this->load->view('templates/footer', $data);
	}

	public function refresh_list_pad()
	{
		$pad_one = array (1, "TRODAT", "4913");
		$pad_two = array (2, "TRODAT", "4913");
		$pads = array($pad_one, $pad_two);

		$this->load->database();
		/*$query = $this->db->query('SELECT Id, Marque, Nom FROM TAMPON');
		foreach ($query->result() as $row)
		{
			$pad = array($row->Id, $row->Marque, $row->Nom);
			array_push($pads, $pad);
		}*/

		/*$form = $this->input->post("form");
		$type = $this->input->post("type");
		$dater = $this->input->post("dater");
		$search = $this->input->post("search");*/

		echo json_encode($pads);
	}
}
?>