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

	public function competency($slug)
	{
		$slug = str_replace('%20', ' ', $slug);
		$title = "Data dasar $slug";
		$data = array(
			'content' => $this->load->view('content/ap_competency', array('title' => $title, 'slug' => $slug), true),
			'title' => $title,
			'slug' => $slug
		);
		$this->load->view('template', $data);
	}

	public function roadmap($slug)
	{
		$slug = str_replace('%20', ' ', $slug);
		$title = "Roadmap Riset dan Pengembangan Produk $slug";
		$data = array(
			'content' => $this->load->view('content/ap_roadmap', array('title' => $title, 'slug' => $slug), true),
			'title' => $title,

		);
		$this->load->view('template', $data);
	}

	public function testing($slug)
	{
		$slug = str_replace('%20', ' ', $slug);
		$title = "Pengujian Produk $slug";
		$data = array(
			'content' => $this->load->view('content/ap_testing', array('title' => $title, 'slug' => $slug), true),
			'title' => $title,

		);
		$this->load->view('template', $data);
	}

	public function ki($slug)
	{
		$slug = str_replace('%20', ' ', $slug);
		$title = "Kekayaan Intelektual Produk $slug";
		$data = array(
			'content' => $this->load->view('content/ap_kekayaan_intelektual', array('title' => $title, 'slug' => $slug), true),
			'title' => $title,
		);
		$this->load->view('template', $data);
	}

	public function sertifikasi($slug)
	{
		$slug = str_replace('%20', ' ', $slug);
		$title = "Sertifikasi Produk $slug";
		$data = array(
			'content' => $this->load->view('content/ap_sertifikasi', array('title' => $title, 'slug' => $slug), true),
			'title' => $title,

		);
		$this->load->view('template', $data);
	}

	public function izin($slug)
	{
		$slug = str_replace('%20', ' ', $slug);
		$title = "Izin Produk $slug";
		$data = array(
			'content' => $this->load->view('content/ap_izin_produk', array('title' => $title, 'slug' => $slug), true),
			'title' => $title,

		);
		$this->load->view('template', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
