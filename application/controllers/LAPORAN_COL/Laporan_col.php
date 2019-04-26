<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LAPORAN_COL extends CI_Controller {

	public function index()
	{
		$this->load->view('laporan_v/laporan');
	}

	public function tabel_laporan_laundry()
	{

		$data=array('tanggal' => $this->input->get('tanggal'));
		
		
		$this->session->set_userdata('tanggal',$data['tanggal']);
		//ambil data jenis
		$data['panggil_data'] = $this->Nes_laundry->baru_tabel_rekap_penjualan();
		$this->load->view('laporan_v/laporan_user',$data);
	}

	public function laporan_detail_user()
	{
		$data['id_laundry_induk'] = $this->input->get('id_laundry_induk');

		$data['panggil_modal'] = $this->Nes_laundry->modal_tabel($data['id_laundry_induk']);

		$this->load->view('laporan_v/laporan_user_detail', $data);
	}
}

