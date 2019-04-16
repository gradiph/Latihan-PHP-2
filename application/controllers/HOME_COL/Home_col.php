<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HOME_COL extends CI_Controller {

	public function index()
	{
		$this->load->view('home_v/home');
	}
}

