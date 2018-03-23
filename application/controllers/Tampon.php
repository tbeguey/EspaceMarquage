<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'data/Pad.php';
include APPPATH . 'data/Model.php';
include APPPATH . 'data/Line.php';
include APPPATH . 'data/Logo.php';


class Tampon extends CI_Controller {

    public function index()
    {
		if (!$this->ion_auth->logged_in())
		{
			$this->load->helper('url');
			redirect('connexion/index', 'refresh');
		}
        $data['title'] = "Choix des tampons";

        $this->load->view('templates/header', $data);
        $this->load->view('tampon/index.php', $data);
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
		$pad = null;

		$query = $this->db->query("SELECT * FROM TAMPON where id = " . $id);
		foreach ($query->result() as $row)
		{
			$pad = new Pad($row->id, $row->marque, $row->nom, $row->largeur, $row->hauteur, $row->forme, $row->type, $row->lignes_max, $row->dateur);
		}

		if($pad != null)
		{
			$width = $pad->largeur;
			$height = $pad->hauteur;	

			$data['id_pad'] = $pad->id;
			$data['title'] =  $pad->marque . " " . $pad->nom; 
			$data['width'] = $width * 3.78 + "px";
			$data['height'] = $height * 3.78 + "px";
			$data['max_lines'] = $pad->lignes_max;
			$data['width_mm'] = $width;
			$data['height_mm'] = $height;
			$data['dater'] = (int) $pad->dateur; //obliger de renvoyer un int, ca bug quand je passe false
			$data['circle'] = (int) ($pad->forme == "Cercle");

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
		$search = utf8_decode($this->security->xss_clean($this->input->get("search")));

		if($dater === "true")
			$converted_dater = true;
		if($dater === "false")
			$converted_dater = false;

		$query = $this->db->query("SELECT * FROM TAMPON");
		foreach ($query->result() as $row)
		{
			$pad = new Pad($row->id, $row->marque, $row->nom, $row->largeur, $row->hauteur, $row->forme, $row->type, $row->lignes_max, $row->dateur);
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
				if(!preg_match('/' . $search . '/', $p->nom))
					unset($pads[$key]);

			if($dater !== "none")
				if($converted_dater !== $p->dateur)
					unset($pads[$key]);
		}

		echo json_encode($pads);
	}

	public function get_logo_categories()
	{
		$dirs = array();
		foreach(glob(FCPATH . "assets\Site\CLIP ART SITE/*", GLOB_ONLYDIR) as $path){
			$dir = explode("CLIP ART SITE/" , $path)[1];
			array_push($dirs, $dir);
		}
		return($dirs);
	}

	public function json_categories()
	{
		echo json_encode($this->get_logo_categories());
	}

	public function get_list_logo_upload()
	{
		$id_client = $this->ion_auth->user()->row()->id;
		$logos = array();

		$storeFolder = 'uploads/';
		$targetPath = FCPATH . $storeFolder;

		foreach(glob($targetPath . $id_client . "/" . '*.{jpg,JPG,gif,GIF,png,PNG}',GLOB_BRACE) as $file){
			array_push($logos, base_url('/uploads/') . $id_client . "/" . basename($file));
		}
		
		echo json_encode($logos);
	}

	public function get_list_logo_library()
	{
		$search = utf8_decode($this->security->xss_clean($this->input->get("search")));
		$category = utf8_decode($this->input->get("category"));
	
		$logos = array();

		if($category === ""){
			$categories = $this->get_logo_categories();
			foreach($categories as $c){		
				foreach(glob(FCPATH . "assets\Site\CLIP ART SITE/" . $c . '/*.{jpg,JPG,gif,GIF,png,PNG}', GLOB_BRACE) as $path){
					$file = basename($path);
					$info = pathinfo($file);
					$name = basename($file,'.'.$info['extension']); // index

					$logo = new Logo($c, $name, $info['extension']);
					if($search !== ""){
						if(strpos($logo->nom, $search) !== false){
							array_push($logos, $logo);
						}
					}
					else
						array_push($logos, $logo);

				}
			}	
		}
		else{
			foreach(glob(FCPATH . "assets\Site\CLIP ART SITE/" . $category . '/*.{jpg,JPG,gif,GIF,png,PNG}', GLOB_BRACE) as $path){
				$file = basename($path);
				$info = pathinfo($file);
				$name = basename($file,'.'.$info['extension']); // index

				$logo = new Logo($category, $name, $info['extension']);
				if($search !== ""){
					if(strpos($logo->nom, $search) !== false){
						array_push($logos, $logo);
					}
				}
				else
					array_push($logos, $logo);			
			}
		}


		echo json_encode($logos);
	}

	public function save_upload_file()
	{
		//$id_client = $this->ion_auth->user()->row()->id;
		$id_client = 1;
		$targetPath = FCPATH . 'uploads/' . $id_client . "/";
		if(!file_exists($targetPath))
			mkdir($targetPath, 0777, true);

		$config['upload_path'] = $targetPath;
		$config['encrypt_name'] = TRUE;
		$config['allowed_types'] = 'gif|jpg|png';


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

	public function send_mail()
	{
		$header = $this->security->xss_clean($this->input->post("header"));
		$content = $this->security->xss_clean($this->input->post("content"));
		$data = $this->security->xss_clean($this->input->post("data"));

		$id_pad = $this->security->xss_clean($this->input->get("id_pad"));
		$id_client = $this->ion_auth->user()->row()->id;

		$targetPath = FCPATH . 'orders/';

		$today = getdate();

		$targetPath = $targetPath . $today['year'] . "/";
		if(!file_exists($targetPath))
			mkdir($targetPath, 0777, true);

		$targetPath = $targetPath . $today['mon'] . "/";
		if(!file_exists($targetPath))
			mkdir($targetPath, 0777, true);

		$targetPath = $targetPath . $today['mday'] . "/";
		if(!file_exists($targetPath))
			mkdir($targetPath, 0777, true);

		$pdfName = $id_client . "-" . $id_pad . "-" . $today['0'] . ".pdf";

		$imgdata = base64_decode($data);

		$this->load->helper('pdf_helper');

		tcpdf();
		$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$obj_pdf->SetCreator(PDF_CREATOR);
		$title = "PDF Report";
		$obj_pdf->SetTitle($title);
		$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, PDF_HEADER_STRING);
		$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		$obj_pdf->SetDefaultMonospacedFont('helvetica');
		$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		$obj_pdf->SetFont('helvetica', '', 9);
		$obj_pdf->setFontSubsetting(false);
		$obj_pdf->AddPage();

		$obj_pdf->setJPEGQuality(100);

		$obj_pdf->Image('@' . $imgdata, 50, 50, $width, $height);

		$obj_pdf->Output($targetPath . $pdfName, 'F');

		$this->load->library('email');

		$this->email->from('begueytheo@gmail.com', 'No Reply');
		$this->email->to('begueytheo@gmail.com');
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject($header);
		$this->email->message($content);
		$this->email->attach($targetPath . $pdfName);

		$this->email->send();

	}

	public function refresh_list_models()
	{
		$id_client = $this->ion_auth->user()->row()->id;
		$id_pad = $this->security->xss_clean($this->input->get("id_pad"));
		$models = array();

		$query = $this->db->query("SELECT * FROM (SELECT MODELE.id as mid, titre, favori, LIGNE.id as lid, texte, taille, police, espacement, alignement, gras, italique, souligne " .
								"FROM LIGNE_MODELE " .
								"JOIN LIGNE ON LIGNE.id = id_ligne " .
								"JOIN MODELE ON MODELE.id = id_modele " .
								"WHERE (id_client = " . $id_client . " OR id_client = 0) AND id_tampon = " . $id_pad . " " .
								"ORDER BY ordre) AS T " .
								"ORDER BY T.favori DESC"); 

		foreach ($query->result() as $row)
		{
			$model_id = $row->mid;
			$key_model = -1;
			foreach($models as $k => $m)
			{
				if($m->id == $model_id)
				{
					$key_model = $k;
					break;
				}
			}

			$line = new Line($row->lid, $row->texte, $row->taille, $row->police, $row->espacement, $row->alignement, $row->gras, $row->italique, $row->souligne);

			if($key_model != -1)
			{
				array_push($models[$key_model]->lignes, $line);
			}
			else
			{
				$lines = array();
				array_push($lines, $line);
				$model = new Model($model_id, $row->titre, $row->favori, $lines);
				array_push($models, $model);
			}

		}

		echo json_encode($models);
	}

	public function save_model()
	{
		$id_client = $this->ion_auth->user()->row()->id;
		$id_pad = $this->security->xss_clean($this->input->get("id_pad"));
		$title = $this->security->xss_clean($this->input->get("title")); // si je mets des accents ca passe pas
		$lines = json_decode($this->security->xss_clean($this->input->get("lines")));

		$data_model = array(
			'id_client' => $id_client,
			'id_tampon' => $id_pad,
			'titre' => $title,
			'favori' => false
		);
		$this->db->insert('MODELE', $data_model);
		$id_model = $this->db->insert_id();

		for($i = 0; $i < count($lines); $i+=8)
		{
			$data_line = array(
				'texte' => $lines[$i],
				'taille' => $lines[$i+1],
				'police' => $lines[$i+2],
				'espacement' => $lines[$i+3],
				'alignement' => $lines[$i+4],
				'gras' => $lines[$i+5],
				'italique' => $lines[$i+6],
				'souligne' => $lines[$i+7]
			);
			$this->db->insert('LIGNE', $data_line);
			$id_line = $this->db->insert_id();

			$order = $i/8;
			$data_line_model = array(
				'id_ligne' => $id_line,
				'id_modele' => $id_model,
				'ordre' => $order
			);
			$this->db->insert('LIGNE_MODELE', $data_line_model);
		}
	}

	public function delete_model()
	{
		$id_model = $this->security->xss_clean($this->input->get("model"));
		$id_lines = array();

		$query = $this->db->query("SELECT id_ligne FROM LIGNE_MODELE WHERE id_modele = " . $id_model);

		foreach($query->result() as $row)
		{
			array_push($id_lines, $row->id_ligne);
		}

		foreach($id_lines as $i)
		{
			$this->db->where('id', $i);
			$this->db->delete('LIGNE');
			$this->db->where('id_ligne', $i);
			$this->db->delete('LIGNE_MODELE');
		}
		
		$this->db->where('id', $id_model);
		$this->db->delete('MODELE');
	}

	public function star_model()
	{
		$id_model = $this->security->xss_clean($this->input->get("model"));
		
		$is_star = false;
		$query = $this->db->query("SELECT favori FROM MODELE WHERE id = " . $id_model);
		foreach($query->result() as $row)
		{
			$is_star = $row->favori;
		}

		$is_star ^= 1; // $is_star = !$is_star;

		$data = array(
			'favori' => $is_star
		);

		$this->db->where('id', $id_model);
		$this->db->update('MODELE', $data);
	}
}
?>