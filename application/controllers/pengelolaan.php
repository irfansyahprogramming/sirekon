<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengelolaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->model_satpam->getsatpam();
	}

	public function index()
	{
		$this->model_satpam->getsatpam();
		$this->load->view('templateHome',$isi);
	}

	public function uploadFileGlobal()
	{
		$this->model_satpam->getsatpam();
		$isi['konten'] = 'pengelolaan/uploadFileGlobal';
		$isi['judul'] = 'Pengelolaan Upload File Global';
		$this->load->view('templateHome',$isi);
	}
	
	public function uploadFileDetil()
	{
		$this->model_satpam->getsatpam();
		$isi['konten'] = 'pengelolaan/uploadFileDetil';
		$isi['judul'] = 'Pengelolaan Upload File Detil';
		$this->load->view('templateHome',$isi);
	}

	public function rekonData()
	{
		$this->model_satpam->getsatpam();
		$isi['konten'] = 'pengelolaan/rekonData';
		$isi['judul'] = 'Pengelolaan Rekon Data Pembayaran';
		$this->load->view('templateHome',$isi);
	}

	public function UploadFileTIK()
	{
		$this->model_satpam->getsatpam();
		$isi['konten'] = 'pengelolaan/uploadFileTIK';
		$isi['judul'] = 'Penarikan Data Host2Host UPT.TIK';
		$this->load->view('templateHome',$isi);
	}
	
	public function rekon_keuangan()
	{
		$this->model_satpam->getsatpam();
		$isi['konten'] = 'pengelolaan/rekonKeuangan';
		$isi['judul'] = 'Rekon Data Global dan Detil Bank';
		$this->load->view('templateHome',$isi);
	}

	public function rekon_tik_bank()
	{
		$this->model_satpam->getsatpam();
		$isi['konten'] = 'pengelolaan/rekonBNI';
		$isi['judul'] = 'Rekon Data UPT TIK dan Bank';
		$this->load->view('templateHome',$isi);
	}
	
	public function rekon_tik_bank_rangeDate()
	{
		$this->model_satpam->getsatpam();
		$isi['konten'] = 'pengelolaan/rekonBNIRangeDate';
		$isi['judul'] = 'Rekon Data UPT TIK dan Bank';
		$this->load->view('templateHome',$isi);
	}
	
	public function rekon_jml_tik_bank()
	{
		$this->model_satpam->getsatpam();
		$isi['konten'] = 'pengelolaan/rekonJmlTIKBank';
		$isi['judul'] = 'Rekon Jumlah Data UPT TIK dan Bank';
		$this->load->view('templateHome',$isi);
	}
}
