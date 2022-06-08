<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('login_model');
	}

	public function index()
	{
		$this->model_satpam->getsatpam();
		$isi['konten'] = 'contentHome';
		$this->load->view('templateHome',$isi);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	
}
