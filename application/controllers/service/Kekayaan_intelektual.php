<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kekayaan_intelektual extends CI_Controller
{
	protected $table = "kekayaan_intelektual";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$data = array(
			"produk_id" => $produk = post('produk_id', 'required'),
			"jenis" => $jenis = post('jenis', 'required'),
			"deskripsi" => post('deskripsi', 'allow_html'),
			"status_perolehan" => post('status_perolehan'),
			"no_pemohon" => post('no_pemohon'),
			"no_sertifikat" => post('no_sertifikat'),
			"pemegang" => post('pemegang'),
			"tanggal_mulai" => post('tanggal_mulai'),
			"tanggal_selesai" => post('tanggal_selesai'),
		);
		if (isset($_FILES['file_formulir']))
			$data['file_formulir'] = UPLOAD_FILE::pdf('file_formulir', "inovasi/$produk/ki", "formulir-$jenis-$produk");
		if (isset($_FILES['file']))
			$data['file'] = UPLOAD_FILE::pdf('file', "inovasi/$produk/ki", "file-$jenis-$produk");


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
			"jenis" => $jenis = post('jenis', 'required'),
			"deskripsi" => post('deskripsi', 'allow_html'),
			"status_perolehan" => post('status_perolehan'),
			"no_pemohon" => post('no_pemohon'),
			"no_sertifikat" => post('no_sertifikat'),
			"pemegang" => post('pemegang'),
			"tanggal_mulai" => post('tanggal_mulai'),
			"tanggal_selesai" => post('tanggal_selesai'),
		);
		if (isset($_FILES['file_formulir_new']))
			$data['file_formulir'] = UPLOAD_FILE::update('pdf', 'file_formulir', "inovasi/$produk/ki", "formulir-$jenis-$produk");
		if (isset($_FILES['file_new']))
			$data['file'] = UPLOAD_FILE::update('pdf', 'file', "inovasi/$produk/ki", "file-$jenis-$produk");

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
		UPLOAD_FILE::delete('file_formulir');
		UPLOAD_FILE::delete('file');
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
