<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MASTER_JENIS_LAUNDRY_COL extends CI_Controller {

	public function index()
	{
		// $this->db->select('laundry_induk.*, laundry_anakan.jenis, laundry_anakan.kg, laundry_anakan.harga');
		// $this->db->join('laundry_induk','laundry_induk.id = laundry_anakan.id_laundry_induk');
		$panggil_data = $this->db->get('master_jenis_laundry');

		$data = array();
		$data['master_jenis'] = $panggil_data;



		$this->load->view('master_jenis_laundry_v/master_jenis_laundry', $data);
	}

	//MENAMPILKAN HALAMAN MODAL TAMBAH DATA
	public function tampilan_tambah()
	{
		// $data['panggil_jenis'] = $this->input->get('id_laundry_induk');

		// $data['panggil_modal'] = $this->Nes_laundry->modal_tabel($data['id_laundry_induk']);

		$this->load->view('master_jenis_laundry_v/master_jenis_laundry_tambah');
	}

	public function simpan_tambah()
	{
		$jenis = $this->input->post('jenis_satu');
		$harga = $this->input->post('harga_satu');


		$data = array(
		'jenis' => $jenis,
		'harga' => $harga	
		);

		$this->Nes_laundry->input_tambah_master_jenis($data);
		redirect('MASTER_JENIS_LAUNDRY_COL/Master_jenis_laundry_col/index');

		// $this->load->view('master_jenis_laundry_v/master_jenis_laundry');
	}

	//MENAMPILKAN HALAMAN MODAL EDIT DATA
	public function tampilan_edit()
	{
		// $this->db->select('jenis, harga');
		// $panggil_edit = $this->db->select('id, jenis, harga');
		$panggil_edit = $this->db->where('jenis', 'Gradi okeh');
		$panggil_edit = $this->db->get('master_jenis_laundry');


		$data_edit = array();
		$data_edit['edit_modal'] = $panggil_edit;

		$this->load->view('master_jenis_laundry_v/master_jenis_laundry_edit', $data_edit);

		// $this->db->select('laundry_induk.*, laundry_anakan.jenis, laundry_anakan.kg, laundry_anakan.harga');
		// $this->db->join('laundry_induk','laundry_induk.id = laundry_anakan.id_laundry_induk');
		// $panggil_data = $this->db->get('laundry_anakan');

		// $data = array();
		// $data['pesanan_laundry'] = $panggil_data;

		// $this->load->view('kelola_pesanan_v/kelola_pesanan', $data);
	}

	//MENYIMPAN PERUBAHAN TAMPILAN MODAL
	public function save_tampilan_edit_modal()
	{
		$jenis_tiga = $this->input->post('jenis_satu');
		$harga_tiga = $this->input->post('harga_satu');
		$id = $this->input->post('id');


		$where = array(
			'id' => $id

		);


		$data = array(
		'jenis' => $jenis_tiga,
		'harga' => $harga_tiga	
		);

		$this->Nes_laundry->input_edit_master_jenis($data, $where);
		redirect('MASTER_JENIS_LAUNDRY_COL/Master_jenis_laundry_col/index');
	}

	public function hapus_data()
	{
		$terima_id['id'] = $this->input->post('id_edit');

		$this->db->delete('master_jenis_laundry', array('id' => $terima_id['id']));

		redirect('MASTER_JENIS_LAUNDRY_COL/Master_jenis_laundry_col/index');
	}

}

