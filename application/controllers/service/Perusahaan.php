<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{
	protected $table = "perusahaan";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$data = array(
			"nama" => post('nama', 'required|unique:perusahaan'),
			"nama_pendiri" => post('nama_pendiri', 'required'),
			"tahun_berdiri" => post('tahun_berdiri', 'required|numeric'),
			"bentuk_usaha" => post('bentuk_usaha', 'enum:PT&CV&Belum memiliki badan usaha'),
			"status_kantor" => post('status_kantor', 'enum:Milik sendiri&Sewa&Berbagi dengan perusahaan lain'),
		);
		$do = DB_MODEL::insert($this->table, $data);
		if (!$do->error) {
			$slug = str_pad($do->data['id'], 4, '0', STR_PAD_LEFT) . '-' . str_replace(" ", "-", $do->data['nama']);
			$do->data['slug'] = $slug;
			DB_MODEL::update($this->table, ['id' => $do->data['id']], ['slug' => $slug]);
			DB_MODEL::insert('pengurus', ['perusahaan_id' => $do->data['id'], 'users_id' => $this->session->userdata('id')]);
			success("data berhasil ditambahkan", $do->data);
		} else {
			error("data gagal ditambahkan");
		}
	}

	public function get($id = null)
	{
		if (is_null($id)) {
			$do = DB_MODEL::where($this->table, ['created_by' => $this->session->userdata('id')]);
		} else {
			$do = DB_MODEL::find($this->table, array("id" => $id));
		}

		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}

	public function update()
	{
		$data = array(
			"nama" => $nama = post('nama', 'required'),
			"nama_pendiri" => post('nama_pendiri', 'required'),
			"tahun_berdiri" => post('tahun_berdiri', 'required|numeric'),
			"bentuk_usaha" => post('bentuk_usaha', 'enum:PT&CV&Belum memiliki badan usaha'),
			"status_kantor" => post('status_kantor', 'enum:Milik sendiri&Sewa&Berbagi dengan perusahaan lain'),
			"alamat_kantor" => post('alamat_kantor'),
			"kota_kabupaten" => post('kota_kabupaten'),
			"luas_ruang_produksi" => post('luas_ruang_produksi', 'numeric|max_value:2021'),
			"alamat_produksi" => post('alamat_produksi'),
			"pegawai_tetap" => post('pegawai_tetap', 'numeric'),
			"pegawai_tidak_tetap" => post('pegawai_tidak_tetap', 'numeric'),
			"email" => post('email', 'email'),
			"telepon" => post('telepon', 'numeric|max_char:13'),
			"website" => post('website'),
			"sosmed" => post('sosmed'),
		);

		if (isset($_FILES['akta']))
			$data['akta'] = UPLOAD_FILE::update('pdf', 'akta', "perusahaan/$nama", "akta-$nama");

		if (isset($_FILES['struktur_organisasi']))
			$data['struktur_organisasi'] = UPLOAD_FILE::update('pdf', 'struktur_organisasi', "perusahaan/$nama", "struktur_organisasi-$nama");

		if (isset($_FILES['logo']))
			$data['logo'] = UPLOAD_FILE::update('img', 'logo', "perusahaan/$nama", "logo-$nama");

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
			"id" => post('id', 'required'),
			'created_by' => $this->session->userdata('id')
		);

		$do = DB_MODEL::delete($this->table, $where);
		if (!$do->error)
			success("data berhasil dihapus", $do->data);
		else
			error("data gagal dihapus");
	}
}
