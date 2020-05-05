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
				'users_id' => $value,
				'created_by' => $this->session->userdata('id')
			];
		}
		$do = DB_MODEL::insert_any($this->table, $data);
		if (!$do->error)
			success("data berhasil diperbarui", $do->data);
		else
			error("data gagal diperbarui");
	}

	public function get($id)
	{
		$data['inventor'] = $inventor = DB_MODEL::join($this->table, 'users',  null, 'inner',  ['produk_id' => $id])->data;
		$data['user'] = DB_CUSTOM::userNo($inventor)->data;
		success("data berhasil diterima", $data);
	}

	public function delete()
	{
		$where = array(
			"users_id" => post('users_id', 'required'),
			'produk_id' => post('produk_id', 'required')
		);

		$do = DB_MODEL::delete($this->table, $where);
		if (!$do->error)
			success("data berhasil dihapus", $do->data);
		else
			error("data gagal dihapus");
	}
}
