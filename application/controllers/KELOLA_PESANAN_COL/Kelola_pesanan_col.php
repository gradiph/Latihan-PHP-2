<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KELOLA_PESANAN_COL extends CI_Controller {

	public function index()
	{
		// SELECT laundry_induk.*, laundry_anakan.jenis, laundry_anakan.kg, laundry_anakan.harga 
		// FROM `laundry_anakan`
		// JOIN laundry_induk ON (laundry_induk.id = laundry_anakan.id_laundry_induk)

		$this->db->select('laundry_induk.*, laundry_anakan.jenis, laundry_anakan.kg, laundry_anakan.harga');
		$this->db->join('laundry_induk','laundry_induk.id = laundry_anakan.id_laundry_induk');
		$panggil_data = $this->db->get('laundry_anakan');

		$data = array();
		$data['pesanan_laundry'] = $panggil_data;

		$this->load->view('kelola_pesanan_v/kelola_pesanan', $data);
	}

	//javascript
	public function proses_jemur()
	{
		$data = array(
			'status' => $this->input->post('status')
		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('laundry_induk', $data);
	}
}

