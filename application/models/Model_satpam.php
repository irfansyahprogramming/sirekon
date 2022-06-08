<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_satpam extends CI_Model {

	public function getsatpam ()
	{
		$username = $this->session->userdata('username');
		if (empty($username))
		{
			$this->session->sess_destroy();
			redirect('login');
		}
	}
	
}
