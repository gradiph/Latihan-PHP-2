<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nes_laundry extends CI_Model {

	public function login_pegawai($user, $pass)
	{
		$this->db->where('username', $user);
		$this->db->where('password', $pass);

		return $this->db->get('master_pegawai')->row();
	}

	public function input_master_pegawai_model($data)
	{
		$this->db->insert('master_pegawai', $data);
		return TRUE;
	}

	public function input_pesanan_pegawai_model($data, $jenis, $kg, $harga)
	{
		//insert tabel induk
		$this->db->insert('laundry_induk',$data);
		// return TRUE;

		//insert tabek anakan
		//ambil id terbesar dari tabel induk
		$this->db->order_by('id', 'desc');
		$this->db->limit('1');

		//data laundry induk yang baru di insert disimpan ke varibel $laundry_induk
		$laundry_induk = $this->db->get('laundry_induk')->row();

		//siapin data untuk insert ke tabel laundry anakan
		$data_anakan = array(
			//panggil id dari laundry induk dengan cari $laundry_induk->id
			'id_laundry_induk' => $laundry_induk->id,
			'jenis' => $jenis,
			'kg' => $kg,
			'harga' => $harga 

		);

		$this->db->insert('laundry_anakan', $data_anakan, $jenis, $kg, $harga);
	}

	public function masuk_data()
	{
		$this->db->select('jenis, kg, harga');
		$this->db->join('laundry_anakan', 'laundry_induk.id = laundry_anakan.id_laundry_induk');

		$tampil_data = $this->db->get('laundry_induk');
        return $tampil_data->result();

	}

	public function input_pesanan_pegawai_campuran_model($data, $jenis, $kg, $harga)
	{
		//insert tabel induk
		$this->db->insert('laundry_induk',$data);

		//insert tabel anakan
		//ambil id terbesar dari tabel induk
		$this->db->order_by('id', 'desc');
		$this->db->limit('1');

		//data laundry induk yang baru di insert disimpan ke varibel $laundry_induk
		$laundry_induk = $this->db->get('laundry_induk')->row();

		//cara 1
		//perulangan untuk simpan semua data anakan
		// for ($i=0; $i < count($jenis); $i++) { 
		// 	//siapin data untuk insert ke tabel laundry anakan
		// 	$data_anakan = array(
		// 		//panggil id dari laundry induk dengan cari $laundry_induk->id
		// 		'id_laundry_induk' => $laundry_induk->id,
		// 		'jenis' => $jenis[$i],
		// 		'kg' => $kg[$i],
		// 		'harga' => $harga[$i]
		// 	);

		//CARA 2, ILMU BARU
		//perulangan untuk simpan semua data anakan
		//array_shift = berguna untuk mengambil data pertama dari variabel array. Data disimpan dari data yang terakhir
		//array_pop = berguna untuk mengambil data terakhir dari variabel array. Data disimpan dari data yang terakhir
		while (!empty($jenis)) 
		{
		 	//siapin data untuk insert ke tabel laundry anakan
			$data_anakan = array(
				//panggil id dari laundry induk dengan cari $laundry_induk->id
				'id_laundry_induk' => $laundry_induk->id,
				'jenis' => array_shift($jenis),
				'kg' => array_shift($kg),
				'harga' => array_shift($harga)
			);

			if (! empty($data_anakan['jenis'])) 
			{
				$this->db->insert('laundry_anakan', $data_anakan);
			}
		}
	}

	//yang ini
	public function baru_tabel_rekap_penjualan()
	{
		$this->db->select("laundry_anakan.*, laundry_induk.nama, laundry_induk.alamat, laundry_induk.no_hp, laundry_induk.tgl_masuk, laundry_induk.tgl_keluar");
		$this->db->join('laundry_anakan', 'laundry_induk.id = laundry_anakan.id_laundry_induk');
		$this->db->where('tgl_masuk', $this->input->get('tanggal'));
		$this->db->where('status', 'selesai');
		
		$panggil_data = $this->db->get('laundry_induk');
		return $panggil_data->result();
	}

	public function modal_tabel($id_laundry_induk)
	{
		$this->db->select("laundry_induk.*, laundry_anakan.id_laundry_induk, laundry_anakan.jenis, laundry_anakan.kg, laundry_anakan.harga");
		$this->db->join('laundry_induk', 'laundry_induk.id = laundry_anakan.id_laundry_induk');
		$this->db->where('id_laundry_induk', $id_laundry_induk);

		$data = $this->db->get('laundry_anakan');
		return $data->result();
	}

	public function tampil_data_bulan()
	{
		$this->db->select("laundry_anakan.*, laundry_induk.nama, laundry_induk.alamat, laundry_induk.no_hp, laundry_induk.tgl_masuk, laundry_induk.tgl_keluar");
		$this->db->join('laundry_anakan', 'laundry_induk.id = laundry_anakan.id_laundry_induk');
		$this->db->like('tgl_masuk', $this->input->get('data_bulan'), 'after');
		$this->db->where('status', 'selesai');

		// SELECT laundry_anakan.*, laundry_induk.nama, laundry_induk.alamat, laundry_induk.no_hp, laundry_induk.tgl_masuk, laundry_induk.tgl_keluar FROM `laundry_induk` JOIN laundry_anakan ON (laundry_induk.id = laundry_anakan.id_laundry_induk) WHERE tgl_masuk LIKE '2019-04%'
		
		$tabel_bulan = $this->db->get('laundry_induk');
		return $tabel_bulan->result();
	}

	public function coba_m_pdf()
	{
		$this->db->select("laundry_anakan.*, laundry_induk.nama, laundry_induk.alamat, laundry_induk.no_hp, laundry_induk.tgl_masuk, laundry_induk.tgl_keluar");
		$this->db->join('laundry_anakan', 'laundry_induk.id = laundry_anakan.id_laundry_induk');
		$this->db->like('tgl_masuk', $this->input->get('data_bulan'), 'after');
		$this->db->where('status', 'selesai');

		// SELECT laundry_anakan.*, laundry_induk.nama, laundry_induk.alamat, laundry_induk.no_hp, laundry_induk.tgl_masuk, laundry_induk.tgl_keluar FROM `laundry_induk` JOIN laundry_anakan ON (laundry_induk.id = laundry_anakan.id_laundry_induk) WHERE tgl_masuk LIKE '2019-04%'
		
		$tabel_bulan = $this->db->get('laundry_induk');
		return $tabel_bulan->result();
	}

	//INPUT TAMBAH KE MASTER JENIS LAUNDRY
	public function input_tambah_master_jenis($data)
	{
		$this->db->insert('master_jenis_laundry',$data);
		return TRUE;
	}

	//INPUT EDIT KE MASTER JENIS LAUNDRY
	public function input_edit_master_jenis($data, $where)
	{
		// $this->db->where('jenis', $this->input->get('jenis_satu'));
		$this->db->where($where);
		$this->db->update('master_jenis_laundry', $data);
		return TRUE;
	}

	public function laporan_pdf()
	{
		$this->db->select("laundry_anakan.*, laundry_induk.nama, laundry_induk.alamat, laundry_induk.no_hp, laundry_induk.tgl_masuk, laundry_induk.tgl_keluar");
		$this->db->join('laundry_anakan', 'laundry_induk.id = laundry_anakan.id_laundry_induk');
		// $this->db->where('tgl_masuk', $this->input->get('tanggal'));
		$this->db->where('status', 'selesai');
		
		$panggil_data = $this->db->get('laundry_induk');
		return $panggil_data->result();
	}




}

