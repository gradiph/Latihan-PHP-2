<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class PDF_COL extends CI_Controller {
    public function __construct()
        {   
            parent::__construct();
            $this->load->library('Pdf');
        }
    public function index()
        {      
            $this->load->view('pdf_v/contoh');
        }

       public function laporan_pdf()
       {

       		//COBA INES
          // $data = array('data_bulan' => $this->input->get('data_bulan'));

			// $this->session->set_userdata('data_bulan', $data['data_bulan']);
       		
       	$this->db->select("laundry_anakan.*, laundry_induk.nama, laundry_induk.alamat, laundry_induk.no_hp, laundry_induk.tgl_masuk, laundry_induk.tgl_keluar");
  			$this->db->join('laundry_anakan', 'laundry_induk.id = laundry_anakan.id_laundry_induk');
  			$this->db->where('month(tgl_masuk)', $this->input->get('data_bulan'));
  			$this->db->where('status', 'selesai');
        // $this->db->where()
        $panggil_pdf = $this->db->get('laundry_induk');
       	// return $panggil_pdf->result();
			
  			$data = array();
  			$data['panggil_pdf'] = $panggil_pdf;
  			// $this->load->view('laporan_v/laporan_bulanan_detail', $data);


       		

        // $data = array();
        // $data['panggil_pdf'] = $pdf;

        	$this->load->view('pdf_v/laporan_pdf', $data, $panggil_pdf);
        }

       public function laporan_pdf_satu()
       {

       		$panggil_data = $this->db->get('laundry_induk');

       		$data = array();
       		$data['panggil_lap'] = $panggil_data;

       		$this->load->view('pdf_v/laporan_pdf', $data);

       }
}

