<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datadasar extends CI_Controller
{
	protected $table = "data_dasar";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$data = array(
			"produk_id" => $produk = post('produk_id', 'required'),
			"status_usaha" => post('status_usaha', 'required|enum:Masih Berjalan&Sudah Berhenti'),
			"target_pasar" => post('target_pasar', 'allow_html'),
			"kompetitor" => post('kompetitor', 'allow_html'),
			"jangkauan" => post('jangkauan', 'allow_html'),
			"kanal_pemasaran" => post('kanal_pemasaran', 'allow_html'),
			"dampak_sosial" => post('dampak_sosial', 'allow_html'),
			"skema_harga" => post('skema_harga', 'allow_html'),
			"harga_produksi" => post('harga_produksi', 'allow_html'),
		);

		if (isset($_FILES['bmc_new']))
			$data['bmc'] = UPLOAD_FILE::update('pdf', 'bmc', "inovasi/$produk/data dasar", "bmc-$produk");

		if (isset($_FILES['keuangan_new']))
			$data['keuangan'] = UPLOAD_FILE::update('pdf', 'keuangan', "inovasi/$produk/data dasar", "keuangan-$produk");

		if (post('id') != 0) {
			$where = array(
				"id" => post('id', 'required'),
			);
			$do = DB_MODEL::update($this->table, $where, $data);
		} else {
			$do = DB_MODEL::insert($this->table, $data);
		}

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
			$do = DB_MODEL::find($this->table, array("produk_id	" => $id));
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
			"status_usaha" => post('status_usaha', 'required|enum:Masih Berjalan&Sudah Berhenti'),
			"target_pasar" => post('target_pasar', 'allow_html'),
			"kompetitor" => post('kompetitor', 'allow_html'),
			"jangkauan" => post('jangkauan', 'allow_html'),
			"kanal_pemasaran" => post('kanal_pemasaran', 'allow_html'),
			"dampak_sosial" => post('dampak_sosial', 'allow_html'),
			"skema_harga" => post('skema_harga', 'allow_html'),
			"harga_produksi" => post('harga_produksi', 'required|numeric'),
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
