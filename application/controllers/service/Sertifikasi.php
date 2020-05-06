<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikasi extends CI_Controller
{
	protected $table = "sertifikasi";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$data = array(
			"produk_id" => $produk = post('produk_id', 'required'),
			"nama" => $nama = post('nama', 'required'),
			"deskripsi" => post('deskripsi', 'allow_html'),
			"status " => post('status'),
			"tahun_perolehan" => post('tahun_perolehan'),
			"no_sertifikat" => post('no_sertifikat'),
			"tanggal_mulai" => post('tanggal_mulai'),
			"tanggal_selesai" => post('tanggal_selesai'),
			"lembaga_penerbit" => post('lembaga_penerbit'),
		);
		if (isset($_FILES['file']))
			$data["file_sertifikasi"] = UPLOAD_FILE::pdf('file_sertifikasi', "inovasi/$produk/sertifikasi", "sertifikasi-$nama-$produk");

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
			"nama" => $nama = post('nama', 'required'),
			"deskripsi" => post('deskripsi', 'allow_html'),
			"status " => post('status'),
			"tahun_perolehan" => post('tahun_perolehan'),
			"no_sertifikat" => post('no_sertifikat'),
			"tanggal_mulai" => post('tanggal_mulai'),
			"tanggal_selesai" => post('tanggal_selesai'),
			"lembaga_penerbit" => post('lembaga_penerbit'),
		);

		if (isset($_FILES['file_sertifikasi']))
			$data['file_sertifikasi'] = UPLOAD_FILE::update('pdf', 'file_sertifikasi', "inovasi/$produk/sertifikasi", "sertifikasi-$nama-$produk");

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
