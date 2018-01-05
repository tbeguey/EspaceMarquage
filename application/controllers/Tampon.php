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

		$form = utf8_decode($this->input->get("form"));
		$type = utf8_decode($this->input->get("type"));
		$dater = $this->input->get("dater");
		$search = utf8_decode($this->input->get("search"));

		if($dater=== "false" || $dater === 0 || $dater === "0")
			$dater = false;
		else if($dater === "true" || $dater === 1 || $dater === "1")
			$dater = true;

		$query = $this->db->query("SELECT * FROM TAMPON");
		foreach ($query->result() as $row)
		{
			$pad = new Pad($row->Id, $row->Marque, $row->Nom, $row->Prix, $row->Largeur, $row->Hauteur, $row->Forme, $row->Type, $row->Lignes_Max, $row->Dateur);
			array_push($pads, $pad);
		}

		foreach($pads as $key => $p){
			if($form !== "none")
				if($form !==$p->forme)
					unset($pads[$key]);				
			
			if($type !== "none")
				if($type !== $p->type)
					unset($pads[$key]);

			if($search !== "")
				if(!preg_match('/' . $search . '/',$p->nom))
					unset($pads[$key]);

			if($dater !== $p->dateur)
				unset($pads[$key]);
		}

		echo json_encode($pads);
	}

	public function refresh_list_logo()
	{
		$logos = array();

		$storeFolder = 'uploads/';
		$clientStoreFolder = ""; // A DEFINIR ET AJOUTER DANS LE PATH
		$targetPath = FCPATH . $storeFolder;

		foreach(glob($targetPath.'*.{jpg,JPG,gif,GIF,png,PNG}',GLOB_BRACE) as $file){
			array_push($logos, basename($file));
		}

		echo json_encode($logos);
	}

	public function save_upload_file()
	{
		$config['upload_path'] = './uploads/';
		$config['encrypt_name'] = TRUE;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 100;
		$config['max_width'] = 1024;
		$config['max_height'] = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file'))
		{
			$error = array('error' => $this->upload->display_errors());
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
		}
	}
}
?>