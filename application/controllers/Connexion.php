<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller {

    public function index()
    {
		$this->load->helper('form');

        $data['title'] = "Connexion";

        $this->load->view('templates/header', $data);
        $this->load->view('connexion/index.php', $data);
        $this->load->view('templates/footer', $data);
    }

	public function waiting_activation()
	{
		$this->load->view('templates/header');
		$this->load->view('connexion/waiting_activation.php');
		$this->load->view('templates/footer');
	}

	public function failed()
	{
		$this->load->view('templates/header');
		$this->load->view('connexion/failed.php');
		$this->load->view('templates/footer');
	}

	public function login()
	{
		$this->load->helper('url');

		$email = $this->security->xss_clean($this->input->post("connection-mail"));
		$password = $this->security->xss_clean($this->input->post("connection-password"));
		$checkbox = $this->security->xss_clean($this->input->post("remember-checkbox"));
		$remember = FALSE;
		if($checkbox == "on")
			$remember = TRUE;

		if($this->ion_auth->login($email, $password, $remember)){
			redirect('welcome/index', 'refresh');
		}
		else{
			redirect('connexion/failed', 'refresh');
		}
	}

	public function logout()
	{
		$this->load->helper('url');
		$this->ion_auth->logout();
		redirect('welcome/index', 'refresh');
	}

	public function register()
	{
		$this->load->helper('url');

		$email = $this->security->xss_clean($this->input->post("inscription-mail"));
		$password = $this->security->xss_clean($this->input->post("inscription-password"));
		$additional_data = array(
			'company' => $this->security->xss_clean($this->input->post("inscription-name"))
		);
		$username = $email;

		if($this->ion_auth->register($username, $password, $email, $additional_data)){
			redirect('connexion/waiting_activation', 'refresh');
		}
		else{
			redirect('connexion/failed', 'refresh');
		}
	}
}
?>