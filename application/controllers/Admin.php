<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in')) {
			redirect('login');
		}
	}

	public function index()
	{
		$title = 'Dashboard';
		$data = array(
			'content' => $this->load->view('content/ap_dasboard', array('title' => $title), true),
			'title' => $title
		);
		$this->load->view('template', $data);
	}

	public function profile()
	{
		$title = 'My Profile';
		$data = array(
			'content' => $this->load->view('content/ap_profile', array('title' => $title), true),
			'title' => $title
		);
		$this->load->view('template', $data);
	}

	public function detail($id)
	{
		$title = "Product Inovasi $id";
		$data = array(
			'content' => $this->load->view('content/ap_detail', array('title' => $title), true),
			'title' => $title
		);
		$this->load->view('template', $data);
	}
	
	public function competency($nama)
	{
		$nama = str_replace('%20', ' ', $nama);
		$title = "Data dasar $nama";
		$data = array(
			'content' => $this->load->view('content/ap_competency', array('title' => $title), true),
			'title' => $title
		);
		$this->load->view('template', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
