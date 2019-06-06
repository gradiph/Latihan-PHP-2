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

	// public function nes_cob()
	// {
			
	// 		$this->db->select("laundry_anakan.*, laundry_induk.nama, laundry_induk.alamat, laundry_induk.no_hp, laundry_induk.tgl_masuk, laundry_induk.tgl_keluar");
 //  			$this->db->join('laundry_anakan', 'laundry_induk.id = laundry_anakan.id_laundry_induk');
 //  			$this->db->like('tgl_masuk', $this->input->get('tanggal'));
 //  			$this->db->where('status', 'selesai');
	//         // $this->db->where()
	//         $panggil_pdf = $this->db->get('laundry_induk');
	//        	// return $panggil_pdf->result();
			


 //  			$data = array();
 //  			$data['panggil_pdf'] = $panggil_pdf;
 //  			// $this->load->view('laporan_v/laporan_bulanan_detail', $data);


       		

 //        // $data = array();
 //        // $data['panggil_pdf'] = $pdf;

 //        	$this->load->view('pdf_v/laporan_pdf', $data);
	// }		

}

