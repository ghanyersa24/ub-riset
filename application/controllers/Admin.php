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
		$this->load->helper('riset');
	}

	public function index()
	{
		$data = riset::slugs();
		$data['title'] = 'Dashboard';
		$data['content'] = 'ap_dasboard';
		$this->load->view('template', $data);
	}

	public function profile()
	{
		$data = riset::slugs();
		$data['title'] = 'My Profile';
		$data['content'] = 'ap_profile';
		$this->load->view('template', $data);
	}

	public function detail($slug)
	{
		$data = riset::slugs($slug);
		$data['title'] = 'Roadmap Produk ' . $data['title'];
		$data['content'] = 'ap_detail';
		$this->load->view('template', $data);
	}

	public function produk($slug)
	{
		$data = riset::slugs($slug);
		$data['title'] = 'Data Dasar ' . $data['title'];
		$data['content'] = 'ap_competency';
		$this->load->view('template', $data);
	}

	public function roadmap($slug)
	{
		$data = riset::slugs($slug);
		$data['title'] = 'Roadmap ' . $data['title'];
		$data['content'] = 'ap_roadmap';
		$this->load->view('template', $data);
	}

	public function testing($slug)
	{
		$data = riset::slugs($slug);
		$data['title'] = 'Pengujian ' . $data['title'];
		$data['content'] = 'ap_testing';
		$this->load->view('template', $data);
	}

	public function ki($slug)
	{
		$data = riset::slugs($slug);
		$data['title'] = 'Kekayaan Intelektual ' . $data['title'];
		$data['content'] = 'ap_kekayaan_intelektual';
		$this->load->view('template', $data);
	}

	public function sertifikasi($slug)
	{
		$data = riset::slugs($slug);
		$data['title'] = 'Sertifikasi ' . $data['title'];
		$data['content'] = 'ap_sertifikasi';
		$this->load->view('template', $data);
	}

	public function izin($slug)
	{
		$data = riset::slugs($slug);
		$data['title'] = 'Perizinan ' . $data['title'];
		$data['content'] = 'ap_izin_produk';
		$this->load->view('template', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
