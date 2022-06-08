<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('login_model');
	}

	public function index()
	{
		$this->model_satpam->getsatpam();
		$this->load->view('templateHome',$isi);
	}

	public function users()
	{
		$this->model_satpam->getsatpam();
		$isi['konten'] = 'manajemen/users';
		$isi['judul'] = 'Manajemen Users';
		$this->load->view('templateHome',$isi);
	}
	
	public function menu()
	{
		$this->model_satpam->getsatpam();
		$isi['konten'] = 'manajemen/menu';
		$isi['judul'] = 'Manajemen Menu';
		$this->load->view('templateHome',$isi);
	}

	public function otoritas()
	{
		$this->model_satpam->getsatpam();
		$isi['konten'] = 'manajemen/otoritas';
		$isi['judul'] = 'Manajemen Otoritas';
		$this->load->view('templateHome',$isi);
	}
}
