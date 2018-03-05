<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'data/Ink.php';
include APPPATH . 'data/Pad.php';

class Encre extends CI_Controller {

    public function index()
    {
		if (!$this->ion_auth->logged_in())
		{
			$this->load->helper('url');
			redirect('connexion/index', 'refresh');
		}
        $data['title'] = "Choix de recharges d'encres";

        $this->load->view('templates/header', $data);
        $this->load->view('encre/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

	public function personalize()
	{
		if (!$this->ion_auth->logged_in())
		{
			$this->load->helper('url');
			redirect('connexion/index', 'refresh');
		}
		$this->load->view('templates/header');

		$id = $this->uri->segment(2);
		$ink = null;

		$query = $this->db->query("SELECT * FROM ENCRE where id_tampon = " . $id);
		foreach ($query->result() as $row)
		{
			$pad = null;
			$new_query = $this->db->query("SELECT * FROM TAMPON where id = " . $row->id_tampon);
			foreach ($new_query->result() as $new_row)
			{
				$pad = new Pad($new_row->id, $new_row->marque, $new_row->nom, $new_row->largeur, $new_row->hauteur, $new_row->forme, $new_row->type, $new_row->lignes_max, $new_row->dateur);
			}
			$ink = new Ink($row->id, $pad, $row->noir, $row->rouge, $row->bleu, $row->vert, $row->violet);
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

	public function refresh_list_ink()
	{
		$inks = array();

		//$search = utf8_decode($this->security->xss_clean($this->input->get("search")));


		$query = $this->db->query("SELECT * FROM ENCRE");
		foreach ($query->result() as $row)
		{
			$pad = null;
			$new_query = $this->db->query("SELECT * FROM TAMPON where id = " . $row->id_tampon);
			foreach ($new_query->result() as $new_row)
			{
				$pad = new Pad($new_row->id, $new_row->marque, $new_row->nom, $new_row->largeur, $new_row->hauteur, $new_row->forme, $new_row->type, $new_row->lignes_max, $new_row->dateur);
			}
			$ink = new Ink($row->id, $pad, $row->noir, $row->rouge, $row->bleu, $row->vert, $row->violet);
			array_push($inks, $ink);
		}

		/*foreach($inks as $key => $i){
			if($search !== "")
				if(!preg_match('/' . $search . '/', $i->tampon->nom))
					unset($inks[$key]);
		}*/

		echo json_encode($inks);
	}
}
?>