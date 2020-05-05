<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventor extends CI_Controller
{
	protected $table = "inventor";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$inventor = $this->input->post('inventor');
		$produk_id = post('produk_id', 'required');
		foreach ($inventor as $value) {
			$data[] = [
				'produk_id' => $produk_id,
				'user_id' => $value,
				'created_by' => $this->session->userdata('id')
			];
		}
		$do = DB_MODEL::delete($this->table, ['produk_id' => $produk_id]);
		if (count($inventor) > 0)
			$do = DB_MODEL::insert_any($this->table, $data);

		if (!$do->error)
			success("data berhasil diperbarui", $do->data);
		else
			error("data gagal diperbarui");
	}

	public function get($id = null)
	{
		if (is_null($id)) {
			$do = DB_MODEL::where('users', ['id !' => $this->session->userdata('id')]);
		} else {
			$do = DB_MODEL::where($this->table, ['produk_id' => $id]);
		}

		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}
}
