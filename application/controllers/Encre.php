<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'data/Ink.php';
include APPPATH . 'data/Pad.php';

class Encre extends CI_Controller {

    public function index()
    {
        $data['title'] = "Choix de recharges d'encres";

        $this->load->view('templates/header', $data);
        $this->load->view('encre/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

	public function personalize()
	{
		$this->load->view('templates/header');

		$id = $this->uri->segment(3);
		$ink = null;

		$query = $this->db->query("SELECT * FROM ENCRE where Id_Tampon = " . $id);
		foreach ($query->result() as $row)
		{
			$pad = null;
			$new_query = $this->db->query("SELECT * FROM TAMPON where Id = " . $row->Id_Tampon);
			foreach ($new_query->result() as $new_row)
			{
				$pad = new Pad($new_row->Id, $new_row->Marque, $new_row->Nom, $new_row->Largeur, $new_row->Hauteur, $new_row->Forme, $new_row->Type, $new_row->Lignes_Max, $new_row->Dateur);
			}
			$ink = new Ink($row->Id, $pad, $row->Noir, $row->Rouge, $row->Bleu, $row->Vert, $row->Violet);
		}

		if($ink != null)
		{
			$data['title'] = $ink->tampon->marque . " " . $ink->tampon->nom;
			$data['black'] = $ink->noir;
			$data['red'] = $ink->rouge;
			$data['blue'] = $ink->bleu;
			$data['green'] = $ink->vert;
			$data['purple'] = $ink->violet;

			$this->load->view('encre/personalize.php', $data);
		}
		else
		{
			show_404("", TRUE);
		}

        $this->load->view('templates/footer');
	}
}
?>