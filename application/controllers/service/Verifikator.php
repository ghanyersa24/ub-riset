<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikator extends CI_Controller
{
	protected $table = "users";
	public function __construct()
	{
		parent::__construct();
		// additional library
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
		$do = DB_MODEL::update('pengajuan', ['id' => post('id', 'required')], ['verifikator' => post('verifikator', 'required'), 'status' => 'diperiksa']);
		if (!$do->error)
			success("data berhasil diperbarui", $do->data);
		else
			error("data gagal diperbarui");
	}
}
