<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class INPUT_PESANAN_CAMPURAN_COL extends CI_Controller {

	public function index()
	{
		$this->load->view('input_pesanan_v/input_pesanan_campuran');
	}

	public function input_pesanan_pegawai_campuran()
	{
		//terima data
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_hp = $this->input->post('no_hp');
		$tgl_masuk = $this->input->post('tgl_masuk');
		$tgl_keluar = $this->input->post('tgl_keluar');
		//terima data array
		$jenis = $this->input->post('jenis');
		$kg = $this->input->post('kg');
		$harga = $this->input->post('harga');
		// $status = $this->input->post('status');

		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'no_hp' => $no_hp,
			// 'jenis' => $jenis,
			// 'kg' => $kg,
			// 'harga' => $harga,
			'tgl_masuk' => $tgl_masuk,
			'tgl_keluar' => $tgl_keluar,
			'status' => 'Belum dikerjakan'	
		);

		// $data['id_laundry_induk'] = $this->Nes_laundry->masuk_data();
		
		$this->Nes_laundry->input_pesanan_pegawai_campuran_model($data, $jenis, $kg, $harga);
		redirect('HOME_COL/Home_col');

	}
}

