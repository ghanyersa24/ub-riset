<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mitra extends CI_Controller
{
	protected $table = "mitra";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$data = array(
			"produk_id" => $produk = post('produk_id', 'required'),
			"nama_mitra" => $nama = post('nama_mitra', 'required'),
			"tujuan" => post('tujuan', 'required'),
		);
		if (isset($_FILES['mou']))
			$data['mou'] = UPLOAD_FILE::pdf('mou', "inovasi/$produk/mitra", "$nama");

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
			"produk_id" => $produk = post('produk_id', 'required'),
			"nama_mitra" => $nama = post('nama_mitra', 'required'),
			"tujuan" => post('tujuan', 'required'),
		);
		if (isset($_FILES['mou_new']))
			$data['mou'] = UPLOAD_FILE::update('pdf', 'mou', "inovasi/$produk/mitra", "$nama");

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
		UPLOAD_FILE::delete('mou');
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
