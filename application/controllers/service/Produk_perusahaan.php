<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_perusahaan extends CI_Controller
{
	protected $table = "produk_perusahaan";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$data = array(
			"produk_id" => post('produk_id', 'required'),
			"perusahaan_id" => post('perusahaan_id', 'required'),
		);

		$do = DB_MODEL::insert($this->table, $data);
		if (!$do->error) {
			success("data berhasil ditambahkan", $do->data);
		} else {
			error("data gagal ditambahkan");
		}
	}

	public function listPerusahaan()
	{
		$do = DB_MODEL::where('perusahaan', ['is_delete' => 0]);
		success("data perusahaan berhasil diterima", $do->data);
	}
	public function get($id = null)
	{
		$do = DB_MODEL::join('produk_perusahaan', 'perusahaan', null, null, ['produk_id' => $id, 'is_delete' => 0]);

		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}

	public function update()
	{
		$data = array(
			"produk_id" => post('produk_id', 'required'),
			"perusahaan_id" => post('perusahaan_id', 'required'),
		);

		$where = array(
			"produk_id" => post('produk_id', 'required'),
			"perusahaan_id" => post('perusahaan_id_old', 'required'),
		);

		$do = DB_MODEL::update($this->table, $where, $data);
		if (!$do->error)
			success("data berhasil diubah", $do->data);
		else
			error("data gagal diubah");
	}

	public function delete()
	{
		$where = array(
			"produk_id" => post('produk_id', 'required'),
			"perusahaan_id" => post('perusahaan_id', 'required'),
		);

		$do = DB_MODEL::delete($this->table, $where);
		if (!$do->error)
			success("data berhasil dihapus", $do->data);
		else
			error("data gagal dihapus");
	}
}
