<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'data/User.php';

class Admin extends CI_Controller {

    public function index()
    {
		if($this->ion_auth->is_admin())
		{
			$this->load->helper('url');
			redirect('welcome/index', 'refresh');
		}
        $data['title'] = "Administration";
		$data['nb_users'] = $this->count_not_active_users();

        $this->load->view('templates/header', $data);
        $this->load->view('admin/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

	public function users()
	{
		if($this->ion_auth->is_admin())
		{
			$this->load->helper('url');
			redirect('welcome/index', 'refresh');
		}
	    $data['title'] = "Administration des utilisateurs";

        $this->load->view('templates/header', $data);
        $this->load->view('admin/users.php', $data);
        $this->load->view('templates/footer', $data);
	}

	public function count_not_active_users()
	{
		foreach ($this->db->query("SELECT COUNT(*) AS c FROM UTILISATEUR where active = 0")->result() as $row)
		{
			return $row->c;
		}
	}

	public function get_not_active_users()
	{
		$not_active_users = array();

		$query = $this->db->query("SELECT * FROM UTILISATEUR where active = 0");
		foreach ($query->result() as $row)
		{
			$user = new User($row->id, $row->company, $row->email);
			array_push($not_active_users, $user);
		}
		echo json_encode($not_active_users);
	}

	public function active_user()
	{
		$data = array(
        'active' => true
		);

		$this->db->where('id', $this->input->get("id"));
		$this->db->update('UTILISATEUR', $data);
		// envoyer un mail au client pour le prévenir qu'il est accepter
	}

	public function delete_user()
	{
		//delete aussi dans les autres tables
		$this->db->where('id', $this->input->get("id"));
		$this->db->delete('UTILISATEUR');
	}
}
?>