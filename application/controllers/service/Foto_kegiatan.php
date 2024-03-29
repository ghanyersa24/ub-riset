<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Foto_kegiatan extends CI_Controller
{
	protected $table = "foto_kegiatan";
	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in')) {
			redirect('login');
		}
	}
	public function create()
	{
		$data = array(
			"produk_id" => $produk = post('produk_id', 'required'),
			"title" => $title = post('title', 'required'),
			"foto" => UPLOAD_FILE::img('foto', "inovasi/$produk/foto", "$title-foto-$produk"),
			"keterangan" => post('keterangan', 'allow_html')
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
			"produk_id" => $produk = post('produk_id', 'required'),
			"title" => $title = post('title', 'required'),
			"keterangan" => post('keterangan', 'allow_html')
		);
		if (isset($_FILES['foto_new']))
			$data['foto'] = UPLOAD_FILE::update('img', 'foto', "inovasi/$produk/foto", "$title-foto-$produk");
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

		UPLOAD_FILE::delete('foto');
		$do = DB_MODEL::delete($this->table, $where);
		if (!$do->error)
			success("data berhasil dihapus", $do->data);
		else
			error("data gagal dihapus");
	}
}
