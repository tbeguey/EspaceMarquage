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
		$id = $this->uri->segment(3);

		$width = 56;
		$height = 20;		

		$data['title'] = "TAMPON " . $id; 
		$data['width'] = intval($width * 3.78) + "px";
		$data['height'] = intval($height * 3.78) + "px";
		$data['max_lines'] = 5;
		$data['width_mm'] = $width;
		$data['height_mm'] = $height;
		$data['dater'] = 0; //obliger de renvoyer un int, ca bug quand je passe false


        $this->load->view('templates/header', $data);
        $this->load->view('tampon/personalize.php', $data);
        $this->load->view('templates/footer', $data);
	}

	public function refresh_list_pad()
	{
		$pad_one = array (1, "TRODAT", "4913");
		$pad_two = array (2, "TRODAT", "4913");
		$pads = array($pad_one, $pad_two);		

		/*$this->load->database();
		$query = $this->db->query('SELECT Id, Marque, Nom FROM TAMPON');
		foreach ($query->result() as $row)
		{
			$pad = array($row->Id, $row->Marque, $row->Nom);
			array_push($pads, $pad);
		}*/

		$dbh = new PDO('mysql:host=espacemawps.mysql.db:3306;dbname=espacemawps', 'espacemawps', 'vlBl1nFV');

		$form = $this->input->get("form");
		$type = $this->input->get("type");
		$dater = $this->input->get("dater");
		$search = $this->input->get("search");

		echo json_encode($pads);
	}
}
?>