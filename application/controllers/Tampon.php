<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'data/Pad.php';
include APPPATH . 'data/Model.php';
include APPPATH . 'data/Line.php';

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
		$this->load->view('templates/header');

		$id = $this->uri->segment(3);
		$pad = null;

		$query = $this->db->query("SELECT * FROM TAMPON where Id = " . $id);
		foreach ($query->result() as $row)
		{
			$pad = new Pad($row->Id, $row->Marque, $row->Nom, $row->Prix, $row->Largeur, $row->Hauteur, $row->Forme, $row->Type, $row->Lignes_Max, $row->Dateur);
		}

		if($pad != null)
		{
			$width = $pad->largeur;
			$height = $pad->hauteur;	

			$data['title'] = "TAMPON " . $pad->marque . " " . $pad->nom; 
			$data['width'] = intval($width * 3.78) + "px";
			$data['height'] = intval($height * 3.78) + "px";
			$data['max_lines'] = $pad->lignes_max;
			$data['width_mm'] = $width;
			$data['height_mm'] = $height;
			$data['dater'] = (int) $pad->dateur; //obliger de renvoyer un int, ca bug quand je passe false

			$this->load->view('tampon/personalize.php', $data);
		}
		else
		{
			show_404("", TRUE);
		}

        $this->load->view('templates/footer');
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

	public function upload_pdf()
	{

	}

	public function send_mail()
	{
		$header = $this->input->get("header");
		$content = $this->input->get("content");

		$this->load->library('email');

		$this->email->from('begueytheo@gmail.com', 'No Reply');
		$this->email->to('begueytheo@gmail.com');
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject($header);
		$this->email->message($content);

		$this->email->send();

	}

	public function refresh_list_models()
	{
		$id_client = 1; // to change
		$id_pad = 1; // to change
		$models = array();

		$query = $this->db->query("SELECT MODELE.Id as MID, Titre, LIGNE.Id as LID, Texte, Taille, Police, Espacement, Alignement, Gras, Italique, Souligne " .
								"FROM LIGNE_MODELE " .
								"JOIN LIGNE ON LIGNE.Id = Id_Ligne " .
								"JOIN MODELE ON MODELE.Id = Id_Modele " .
								"WHERE (Id_Client = " . $id_client . " OR Id_Client = 0) AND Id_Tampon = " . $id_pad . " " . // where id client = client actuel, pareil pour le tampon
								"ORDER BY Ordre"); 

		foreach ($query->result() as $row)
		{
			$model_id = $row->MID;
			$key_model = -1;
			foreach($models as $k => $m)
			{
				if($m->id == $model_id)
				{
					$key_model = $k;
					break;
				}
			}

			$line = new Line($row->LID, $row->Texte, $row->Taille, $row->Police, $row->Espacement, $row->Alignement, $row->Gras, $row->Italique, $row->Souligne);

			if($key_model != -1)
			{
				array_push($models[$key_model]->lignes, $line);
			}
			else
			{
				$lines = array();
				array_push($lines, $line);
				$model = new Model($model_id, $row->Titre, $lines);
				array_push($models, $model);
			}

		}

		echo json_encode($models);
	}

	public function save_model()
	{
		$id_client = 1; // to change
		$id_pad = 1; // to change
		$title = $this->input->get("title"); // si je mets des accents ca passe pas
		$lines = json_decode($this->input->get("lines"));

		$data_model = array(
			'Id_Client' => $id_client,
			'Id_Tampon' => $id_pad,
			'Titre' => $title,
			'Nb_Usage' => 0
		);
		$this->db->insert('MODELE', $data_model);
		$id_model = $this->db->insert_id();

		for($i = 0; $i < count($lines); $i+=8)
		{
			$data_line = array(
				'Texte' => $lines[$i],
				'Taille' => $lines[$i+1],
				'Police' => $lines[$i+2],
				'Espacement' => $lines[$i+3],
				'Alignement' => $lines[$i+4],
				'Gras' => $lines[$i+5],
				'Italique' => $lines[$i+6],
				'Souligne' => $lines[$i+7]
			);
			$this->db->insert('LIGNE', $data_line);
			$id_line = $this->db->insert_id();

			$order = $i/8;
			$data_line_model = array(
				'Id_Ligne' => $id_line,
				'Id_Modele' => $id_model,
				'Ordre' => $order
			);
			$this->db->insert('LIGNE_MODELE', $data_line_model);
		}
	}

	public function delete_model()
	{
		$id_model = $this->input->get("model");
		$id_lines = array();

		$query = $this->db->query("SELECT Id_Ligne FROM LIGNE_MODELE WHERE Id_Modele = " . $id_model);

		foreach($query->result() as $row)
		{
			array_push($id_lines, $row->Id_Ligne);
		}

		foreach($id_lines as $i)
		{
			$this->db->where('Id', $i);
			$this->db->delete('LIGNE');
			$this->db->where('Id_Ligne', $i);
			$this->db->delete('LIGNE_MODELE');
		}
		
		$this->db->where('Id', $id_model);
		$this->db->delete('MODELE');
	}
}
?>