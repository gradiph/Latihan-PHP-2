<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LAPORAN_BULANAN_COL extends CI_Controller {

	public function index()
	{
		$this->load->view('laporan_v/laporan_bulanan');
	}

	public function tabel_bulanan()
	{
		$data = array('data_bulan' => $this->input->get('data_bulan'));

		$this->session->set_userdata('data_bulan', $data['data_bulan']);

		$data['tabel_bulan'] = $this->Nes_laundry->tampil_data_bulan();
		$this->load->view('laporan_v/laporan_bulanan_detail', $data);
	}		

}

