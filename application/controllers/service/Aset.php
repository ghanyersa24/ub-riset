<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aset extends CI_Controller
{
	protected $table = "aset";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$data = array(
			"perusahaan_id" => post('perusahaan_id', 'required'),
			"nama_aset" => post('nama_aset', 'required'),
			"tahun_perolehan" => post('tahun_perolehan', 'numeric'),
			"nilai_aset" => post('nilai_aset', 'rupiah'),
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
		// if (is_null($id)) {
		// 	$do = DB_MODEL::all($this->table);
		// } else {
		$do = DB_MODEL::where($this->table, array("perusahaan_id" => $id));
		foreach ($do->data as $value) {
			$value->nilai_aset = set_rupiah($value->nilai_aset);
		}
		// }

		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}

	public function update()
	{
		$data = array(
			"perusahaan_id" => post('perusahaan_id', 'required'),
			"nama_aset" => post('nama_aset', 'required'),
			"tahun_perolehan" => post('tahun_perolehan', 'numeric'),
			"nilai_aset" => post('nilai_aset', 'rupiah'),
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
