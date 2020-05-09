<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	protected $table = "zero";
	function __construct()
	{
		parent::__construct();
		if ($this->session->logged_in) {
			redirect('admin');
		}
	}
	public function index()
	{
		$data = array(
			'title' => 'Gapura Auth'
		);
		$this->load->view('content/auth-login', $data);
	}
}
