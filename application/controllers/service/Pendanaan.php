<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendanaan extends CI_Controller
{
	protected $table = "roadmap";
	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in')) {
			redirect('login');
		}
	}

	public function get($id)
	{
		$do = DB_CUSTOM::pendanaan($id);

		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}
}
