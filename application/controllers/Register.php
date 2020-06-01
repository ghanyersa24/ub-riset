<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->has_userdata('logged_in'))
			redirect('admin');
		elseif (!$this->session->has_userdata('auth'))
			redirect('login');
	}
	public function account($data)
	{
		if (AUTHORIZATION::myjwt($data)->auth !== $this->session->userdata('auth'))
			error('ada yang error saat login');
		$data = array(
			'title' => 'Register Account'
		);
		$this->load->view('account/register', $data);
	}
}
