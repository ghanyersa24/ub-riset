<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemasaran extends CI_Controller
{
	protected $table = "pemasaran";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$data = array(
			"produk_id" => $produk = post('produk_id', 'required'),
			"jangkauan" => post('jangkauan', 'required|enum:Regional&Nasional&Ekspor'),
			"volume_pemasaran" => post('volume_pemasaran', 'required'),
			"nilai_pemasaran" => post('nilai_pemasaran', 'rupiah'),
		);

		$do = DB_MODEL::insert($this->table, $data);
		if (!$do->error) {
			success("data berhasil ditambahkan", $do->data);
		} else {
			error("data gagal ditambahkan");
		}
	}

	public function get($id = null)
	{
		if (is_null($id)) {
			$do = DB_MODEL::all($this->table);
		} else {
			$do = DB_MODEL::where($this->table, array("produk_id" => $id));
			foreach ($do->data as $value) {
				$value->nilai_pemasaran = set_rupiah($value->nilai_pemasaran);
			}
		}

		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}

	public function update()
	{
		$data = array(
			"produk_id" => $produk = post('produk_id', 'required'),
			"jangkauan" => post('jangkauan', 'required|enum:Regional&Nasional&Ekspor'),
			"volume_pemasaran" => post('volume_pemasaran', 'required'),
			"nilai_pemasaran" => post('nilai_pemasaran', 'rupiah'),
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

	public function delete()
	{
		$where = array(
			"id" => post('id', 'required')
		);

		$do = DB_MODEL::delete($this->table, $where);
		if (!$do->error)
			success("data berhasil dihapus", $do->data);
		else
			error("data gagal dihapus");
	}
}
