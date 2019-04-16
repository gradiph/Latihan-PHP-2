<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard1 extends CI_Controller {

	public function index()
	{
		$data['laundry'] = $this->db->get('laundry');

		$this->load->view('dashboard1', $data);
	}

	public function proses_jemur ()
	{
		$data = array(
			'status' => $this->input->post('status')
		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('laundry', $data);
	}
}
