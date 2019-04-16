<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_COL extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
        
	public function login()
	{
        $user = $this->input->post('username', true);
        $pass = $this->input->post('password', true);

        $cek = $this->Nes_laundry->login_pegawai($user, $pass);
        $hasil = count($cek);
        if ($hasil > 0) {
        	$select = $this->db->get_where('master_pegawai', array('username' => $user, 'password => $pass'))->row();

        	$data = array('logged_in' => true, 
                                'loger' => $select->username, 
                                'id'=>$select->id);
        	$this->session->set_userdata($data);
        	redirect('HOME_COL/Home_col');
        }else{
        	$this->session->set_flashdata('username dan password salah');
        	redirect('Login_col/index');
        }
	}
        
        public function logout()
	{
        redirect('Login_col/index');
	}
}

