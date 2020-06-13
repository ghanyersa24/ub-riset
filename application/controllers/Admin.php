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
		$user = DB_MODEL::find('users', ['id' => $this->session->userdata('id')]);
		if ($user->error) {
			$this->session->sess_destroy();
			redirect('login');
		}
		$this->session->set_userdata((array) $user->data);
		$this->load->helper('riset');
	}

	public function index()
	{
		$data = riset::slugs_produk();
		$data['title'] = 'Dashboard';
		$data['content'] = 'ap_dasboard';
		$this->load->view('template', $data);
	}

	public function profile()
	{
		$data = riset::slugs_produk();
		$data['title'] = 'My Profile';
		$data['content'] = 'ap_profile';
		$this->load->view('template', $data);
	}

	public function myproduct()
	{
		$data = riset::slugs_produk();
		$data['title'] = 'My List Product';
		$data['content'] = 'ap_myproduct';
		$this->load->view('template', $data);
	}

	public function detail($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Roadmap Produk ' . $data['title'];
		$data['content'] = 'ap_detail';
		$this->load->view('template', $data);
	}


	public function produk($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Data Dasar ' . $data['title'];
		$data['content'] = 'ap_competency';
		$this->load->view('template', $data);
	}

	public function roadmap($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Roadmap ' . $data['title'];
		$data['content'] = 'ap_roadmap';
		$this->load->view('template', $data);
	}

	public function testing($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Pengujian ' . $data['title'];
		$data['content'] = 'ap_testing';
		$this->load->view('template', $data);
	}

	public function ki($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Kekayaan Intelektual ' . $data['title'];
		$data['content'] = 'ap_kekayaan_intelektual';
		$this->load->view('template', $data);
	}

	public function sertifikasi($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Sertifikasi / Perijinan ' . $data['title'];
		$data['content'] = 'ap_sertifikasi';
		$this->load->view('template', $data);
	}

	public function izin($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Perizinan ' . $data['title'];
		$data['content'] = 'ap_izin_produk';
		$this->load->view('template', $data);
	}
	public function inventor($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Inventor ' . $data['title'];
		$data['content'] = 'ap_inventor';
		$this->load->view('template', $data);
	}

	public function perusahaan($slug = null)
	{
		if ($slug == null) {
			// $data = riset::slugs_produk($slug);
			$data['title'] = 'Daftar Perusahaan';
			$data['content'] = 'ap_perusahaan';
			$this->load->view('template', $data);
		} else {
			$data = riset::slugs_perusahaan($slug);
			$data['title'] = 'Profil Perusahaan ' . $data['title'];
			$data['content'] = 'ap_perusahaan_detail';
			$this->load->view('template', $data);
		}
	}

	public function perusahaan_select($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Pilih Perusahaan ' . $data['title'];
		$data['content'] = 'ap_perusahaan_pilih';
		$this->load->view('template', $data);
	}

	public function foto($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Foto Produk ' . $data['title'];
		$data['content'] = 'ap_foto';
		$this->load->view('template', $data);
	}

	public function mitra($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Mitra dan Kerjasama ' . $data['title'];
		$data['content'] = 'ap_mitra';
		$this->load->view('template', $data);
	}

	public function kegiatan($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Foto Kegiatan ' . $data['title'];
		$data['content'] = 'ap_kegiatan';
		$this->load->view('template', $data);
	}
	public function bisnis($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Data Bisnis ' . $data['title'];
		$data['content'] = 'ap_bisnis';
		$this->load->view('template', $data);
	}
	public function verifikasi($slug = null)
	{
		if ($this->session->is_admin == 'no')
			redirect('admin');
		if ($slug == null) {
			$data['title'] = 'Halaman Verifikasi KATSINOV dan TKT';
			$data['content'] = 'ap_verifikasi';
			$this->load->view('template', $data);
		} else {
			$temp = riset::slug_public($slug);
			$data = $temp['data'];
			$data['title'] = 'Halaman Verifikasi KATSINOV dan TKT ' . $data['title'];
			$data['content'] = 'ap_verifikasi_detail';
			$this->load->view('template', $data);
		}
	}
	public function plotting()
	{
		if ($this->session->is_admin != 'admin')
			redirect('admin');
		$data = riset::slugs_produk();
		$data['title'] = 'Halaman Plotting Verifikator';
		$data['content'] = 'ap_plotting';
		$this->load->view('template', $data);
	}
	public function manage()
	{
		if ($this->session->is_admin != 'admin')
			redirect('admin');
		$data = riset::slugs_produk();
		$data['title'] = 'Halaman Management User';
		$data['content'] = 'ap_users';
		$this->load->view('template', $data);
	}

	public function cluster()
	{
		if ($this->session->is_admin != 'admin')
			redirect('admin');
		$data['title'] = 'Halaman Cluster';
		$data['content'] = 'ap_cluster';
		$this->load->view('template', $data);
	}

	public function tambahan($slug)
	{
		$data = riset::slugs_produk($slug);
		$data['title'] = 'Data Tambahan ' . $data['title'];;
		$data['content'] = 'ap_tambahan';
		$this->load->view('template', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
