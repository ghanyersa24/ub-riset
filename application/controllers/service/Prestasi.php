<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
{
	protected $table = "prestasi";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$data = array(
			"produk_id" => post('produk_id', 'required'),
			"nama_acara" => post('nama_acara', 'required'),
			"penyelenggara" => post('penyelenggara', 'required'),
			"tahun" => post('tahun', 'required'),
			"tingkat" => post('tingkat', 'required'),
			"pencapaian" => post('pencapaian', 'required'),
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
		}

		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}

	public function update()
	{
		$data = array(
			"produk_id" => post('produk_id', 'required'),
			"nama_acara" => post('nama_acara', 'required'),
			"penyelenggara" => post('penyelenggara', 'required'),
			"tahun" => post('tahun', 'required'),
			"tingkat" => post('tingkat', 'required'),
			"pencapaian" => post('pencapaian', 'required'),
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
