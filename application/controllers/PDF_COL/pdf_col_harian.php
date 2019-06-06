<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class PDF_COL_HARIAN extends CI_Controller {
    public function __construct()
        {   
            parent::__construct();
            $this->load->library('Pdf');
        }
    public function index()
        {      
            $this->load->view('pdf_v/contoh');
        }

       public function laporan_pdf_harian()
       {
       		
       	$this->db->select("laundry_anakan.*, laundry_induk.nama, laundry_induk.alamat, laundry_induk.no_hp, laundry_induk.tgl_masuk, laundry_induk.tgl_keluar");
  			$this->db->join('laundry_anakan', 'laundry_induk.id = laundry_anakan.id_laundry_induk');
  			$this->db->where('tgl_masuk', $this->input->get('tanggal'));
  			$this->db->where('status', 'selesai');
       
        $panggil_pdf = $this->db->get('laundry_induk');
       	
  			$data = array();
  			$data['panggil_pdf_harian'] = $panggil_pdf;
  			;

        $this->load->view('pdf_v/laporan_pdf_harian', $data, $panggil_pdf);
        }
}

