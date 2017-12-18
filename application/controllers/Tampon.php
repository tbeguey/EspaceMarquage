<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'data/Pad.php';

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
		$pads = array();

		//$dbh = new PDO('mysql:host=mysql55-162.perso;dbname=espacemawps;charset=utf8', 'espacemawps', 'vlBl1nFV');

		/*$bdd = new PDO('mysql:host=localhost;dbname=espace_database;charset=utf8', 'root', '');
		$bdd = new PDO('mysql:host=espacemawps.mysql.db;dbname=espacemawps;charset=utf8', 'espacemawps', 'vlBl1nFV');

		$reponse = $bdd->query('SELECT * FROM Tampon');
		while($row = $reponse->fetch()){
			$pad = array($row['Id'],$row['Marque'], $donnees[2]);
			array_push($pads, $pad);
		}

		$reponse->closeCursor(); // Termine le traitement de la requête*/

		$query = $this->db->query("SELECT * FROM TAMPON");
		foreach ($query->result() as $row)
		{
			$pad = new Pad($row->Id, $row->Marque, $row->Nom, $row->Prix, $row->Largeur, $row->Hauteur, $row->Forme, $row->Type, $row->Lignes_Max, $row->Dateur);
			array_push($pads, $pad);
		}

		$form = $this->input->get("form");
		$type = $this->input->get("type");
		$dater = $this->input->get("dater");
		$search = $this->input->get("search");

		echo json_encode($pads);
	}

	public function save_upload_file()
	{
	
	}
}
?>