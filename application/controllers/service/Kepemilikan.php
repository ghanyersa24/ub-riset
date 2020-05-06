<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kepemilikan extends CI_Controller
{
	protected $table = "kepemilikan";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$data = array(
			"perusahaan_id" => post('perusahaan_id', 'required'),
			"nama" => post('nama', 'required'),
			"tipe" => post('tipe', 'enum:Perseorangan&Kelompok&Perusahaan'),
			"kewarganegaraan" => post('kewarganegaraan', 'enum:Dalam Negeri&Luar Negeri'),
			"asal_negara" => post('asal_negara'),
			"presentase" => post('presentase', 'numeric'),
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
		$do = DB_MODEL::where($this->table, ["perusahaan_id" => $id]);
		// }

		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}

	public function update()
	{
		$data = array(
			"nama" => post('nama', 'required'),
			"tipe" => post('tipe', 'enum:Perseorangan&Kelompok&Perusahaan'),
			"kewarganegaraan" => post('kewarganegaraan', 'enum:Dalam Negeri&Luar Negeri'),
			"asal_negara" => post('asal_negara'),
			"presentase" => post('presentase', 'numeric'),
		);

		$where = array(
			"id" => post('id', 'required'),
			"perusahaan_id" => post('perusahaan_id', 'required'),
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
