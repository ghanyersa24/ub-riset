<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikator extends CI_Controller
{
	protected $table = "users";
	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in') || $this->session->is_admin == 'no') {
			redirect('login');
		}
	}

	public function get()
	{
		$do = DB_MODEL::where($this->table, "is_admin !='no'");
		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}

	public function update()
	{
		$do = DB_MODEL::update_straight('pengajuan', ['id' => post('id', 'required')], ['verifikator' => post('verifikator', 'required'), 'status' => 'diperiksa']);
		if (!$do->error)
			success("data berhasil diperbarui", $do->data);
		else
			error("data gagal diperbarui");
	}
}
