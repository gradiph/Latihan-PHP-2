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
		// $this->db->from('laundry_induk');
		$this->db->join('laundry_anakan', 'laundry_induk.id = laundry_anakan.id_laundry_induk');

		$tampil_data = $this->db->get('laundry_induk');
        return $tampil_data->result();

	}

	public function input_pesanan_pegawai_campuran_model($data, $jenis, $kg, $harga)
	{
		//insert tabel induk
		$this->db->insert('laundry_induk',$data);
		// return TRUE;

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

	// public function pesanan_user($where)
	// {

	// 	 $this->db->select('nama, alamat, no_hp, tgl_masuk');
		
	// 	// $this->db->where('date(tanggal) >=', $tanggal_satuan);
	// 	$this->db->where($where);
		
	// 	$this->db->order_by('id');
	// 	$data=$this->db->get('laundry_induk');
	// 	return $data->result();

	// }

	public function baru_tabel_rekap_penjualan()
	{
		$this->db->select("laundry_anakan.*, laundry_induk.nama, laundry_induk.alamat, laundry_induk.no_hp, laundry_induk.tgl_masuk, laundry_induk.tgl_keluar");
		$this->db->join('laundry_anakan', 'laundry_induk.id = laundry_anakan.id_laundry_induk');
		$this->db->where('tgl_masuk', $this->input->get('tanggal'));
		
		// $this->db->order_by("jenis, kg, harga");
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

	// SELECT laundry_anakan.*, laundry_induk.nama, laundry_induk.alamat, laundry_induk.no_hp, laundry_induk.tgl_masuk, laundry_induk.tgl_keluar FROM `laundry_induk` JOIN laundry_anakan ON (laundry_induk.id = laundry_anakan.id_laundry_induk)
}

