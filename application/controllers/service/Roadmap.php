<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roadmap extends CI_Controller
{
	protected $table = "roadmap";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$data = array(
			"produk_id" => $produk = post('produk_id', 'required'),
			"nama" => post('nama', 'required'),
			"tahun_mulai" => post('tahun_mulai', 'numeric'),
			"tahun_selesai" => post('tahun_selesai', 'numeric'),
			"sumber_pendanaan" => post('sumber_pendanaan', 'required'),
			"skema" => post('skema', 'allow_html'),
			"nilai_pendanaan" => post('nilai_pendanaan', 'rupiah'),
			"aktivitas" => post('aktivitas', 'allow_html'),
			"tujuan" => post('tujuan', 'allow_html'),
			"hasil" => post('hasil', 'allow_html'),
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
				$value->nilai_pendanaan = set_rupiah($value->nilai_pendanaan);
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
			"nama" => post('nama', 'required'),
			"tahun_mulai" => post('tahun_mulai', 'numeric'),
			"tahun_selesai" => post('tahun_selesai', 'numeric'),
			"sumber_pendanaan" => post('sumber_pendanaan', 'required'),
			"skema" => post('skema', 'allow_html'),
			"nilai_pendanaan" => post('nilai_pendanaan', 'rupiah'),
			"aktivitas" => post('aktivitas', 'allow_html'),
			"tujuan" => post('tujuan', 'allow_html'),
			"hasil" => post('hasil', 'allow_html'),
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
