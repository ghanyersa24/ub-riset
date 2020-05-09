<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
	protected $table = "users";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}

	public function get()
	{
		$do = DB_MODEL::where($this->table, "is_admin='admin' or is_admin='verifikator'");
		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}

	public function update()
	{
		$data = array(
			"is_admin" => post('is_admin', 'required|enum:no&verifikator&admin')
		);

		$where = array(
			"id" => post('id', 'required'),
		);

		$do = DB_MODEL::update($this->table, $where, $data);
		if (!$do->error)
			success("data berhasil diubah", $do->data);
		else
			error("data gagal diubah");
	}
}


/* End of file Service/admin.php */
/* Location: ./application/controllers/Service/admin.php */
