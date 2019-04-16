<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MASTER_PEGAWAI_COL extends CI_Controller {

	public function index()
	{
		$this->load->view('master_pegawai_v/master_pegawai');
	}

	public function input_master_pegawai()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$data = array(

			'username' => $username,
			'password' => $password
		);

		$this->Nes_laundry->input_master_pegawai_model($data);

		redirect('HOME_COL/Home_col');
	}
}

