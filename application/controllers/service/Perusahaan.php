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
			DB_MODEL::insert('pengurus', ['perusahaan_id' => $do->data['id'], 'jabatan' => "CEO", 'users_id' => $this->session->userdata('id')]);
			success("data berhasil ditambahkan", $do->data);
		} else {
			error("data gagal ditambahkan");
		}
	}

	public function get($id = null)
	{
		if (is_null($id)) {
			$do = DB_MODEL::join('pengurus', 'perusahaan', null, 'inner', ['users_id' => $this->session->userdata('id'), 'is_delete' => 0], "perusahaan.*");
		} else {
			$do = DB_MODEL::find($this->table, array("id" => $id, 'is_delete' => 0));
		}

		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}

	public function upload()
	{

		$where = array(
			"id" => $produk = post('id', 'required'),
		);
		$nama = post('nama', 'required');
		if (isset($_FILES['logo_new']))
			$data['logo'] = UPLOAD_FILE::update('img', 'logo', "perusahaan/$nama", "logo-$nama");
		else
			error('silahkan pilih logo produk terlebih dahulu');

		$do = DB_MODEL::update($this->table, $where, $data);
		if (!$do->error)
			success("logo berhasil diupload", $do->data);
		else
			error("data gagal diubah");
	}

	public function update()
	{
		$email = str_replace('%40', '@', post('email'));
		$website = str_replace('%2F', '/', str_replace('%3A', ':', post('website')));
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
			"email" => $email,
			"telepon" => post('telepon', 'numeric|max_char:13'),
			"website" => $website,
			"sosmed" => post('sosmed'),
		);

		if (isset($_FILES['akta_new']))
			$data['akta'] = UPLOAD_FILE::update('pdf', 'akta', "perusahaan/$nama", "akta-$nama");

		if (isset($_FILES['izin_new']))
			$data['izin'] = UPLOAD_FILE::update('pdf', 'izin', "perusahaan/$nama", "izin-$nama");

		$where = array(
			"id" => $id = post('id', 'required'),
		);

		$do = DB_MODEL::update($this->table, $where, $data);
		if (!$do->error) {
			$slug = str_pad($id, 4, '0', STR_PAD_LEFT) . '-' . str_replace(" ", "-", $nama);
			$do->data['slug'] = $slug;
			DB_MODEL::update($this->table, ['id' => $id], ['slug' => $slug]);
			success("data berhasil diubah", $do->data);
		} else
			error("data gagal diubah");
	}

	public function delete()
	{
		$where = array(
			"id" => post('id', 'required'),
		);

		$do = DB_MODEL::update($this->table, $where, ['is_delete' => 1]);
		if (!$do->error)
			success("data berhasil dihapus", $do->data);
		else
			error("data gagal dihapus");
	}
}
