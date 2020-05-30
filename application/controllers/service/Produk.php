<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
	protected $table = "produk";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$data = array(
			"nama_produk" => post('nama_produk', 'required'),
			"bidang" => post('bidang', 'required|enum:Pangan&Energi&Transportasi&Rekayasa Keteknikan&Kesehatan&Pertahanan Keamanan&Material Maju&Kemaritiman&Sosial Budaya'),
			"kategori" => json_encode($this->input->post('kategori')),
			"jenis" => post('jenis', 'required|enum:digital&non digital'),
			"deskripsi_singkat" => post('deskripsi_singkat', 'required'),
		);

		$do = DB_MODEL::insert($this->table, $data);
		if (!$do->error) {
			$slug = str_pad($do->data['id'], 4, '0', STR_PAD_LEFT) . '-' . str_replace(" ", "-", $do->data['nama_produk']);
			$do->data['slug'] = $slug;
			DB_MODEL::update($this->table, ['id' => $do->data['id']], ['slug' => $slug]);
			DB_MODEL::insert('inventor', ['produk_id' => $do->data['id'], 'users_id' => $this->session->userdata('id')]);
			success("data berhasil ditambahkan", $do->data);
		} else {
			error("data gagal ditambahkan");
		}
	}
	public function tambahan()
	{
		$where = array(
			"id" => $produk = post('id', 'required'),
		);
		if (isset($_FILES['file_tambahan_new']))
			$data['file_tambahan'] = UPLOAD_FILE::update('rar', 'file_tambahan', "inovasi/$produk/tambahan", "file_tambahan-$produk");
		else
			error('silahkan pilih file tambahan inovasi terlebih dahulu');

		$do = DB_MODEL::update($this->table, $where, $data);
		if (!$do->error)
			success("file tambahan berhasil diupload", $do->data);
		else
			error("data gagal diubah");
	}
	public function kerjasama()
	{
		$where = array(
			"id" => post('id', 'required'),
		);
		$data = array(
			"kerjasama" => post('kerjasama', 'allow_html')
		);
		$do = DB_MODEL::update($this->table, $where, $data);
		if (!$do->error)
			success("data berhasil diubah", $do->data);
		else
			error("data gagal diubah");
	}

	public function get($id = null)
	{
		if (is_null($id)) {
			$do = DB_MODEL::join('inventor', 'produk', 'produk.id = inventor.produk_id', 'inner', ['users_id' => $this->session->userdata('id'), 'is_delete' => 0], 'produk.*,inventor.users_id');
		} else {
			$do = DB_MODEL::find($this->table, ['id' => $id]);
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
		if (isset($_FILES['logo_produk_new']))
			$data['logo_produk'] = UPLOAD_FILE::update('img', 'logo_produk', "inovasi/$produk/logo", "logo-$produk");
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
		$data = array(
			"nama_produk" => $nama = post('nama_produk', 'required'),
			"bidang" => post('bidang', 'required|enum:Pangan&Energi&Transportasi&Rekayasa Keteknikan&Kesehatan&Pertahanan Keamanan&Material Maju&Kemaritiman&Sosial Budaya'),
			"kategori" => json_encode($this->input->post('kategori')),
			"jenis" => post('jenis', 'required', 'enum:digital&non digital'),
			"produksi_barang_fisik" => post('produksi_barang_fisik', 'enum:ada&tidak'),
			"deskripsi_singkat" => post('deskripsi_singkat', 'required'),
			"deskripsi_lengkap" => post('deskripsi_lengkap', 'allow_html'),
			"latar_belakang" => post('latar_belakang', 'allow_html'),
			"keterbaruan_produk" => post('keterbaruan_produk', 'allow_html'),
			"masalah" => post('masalah', 'allow_html'),
			"solusi" => post('solusi', 'allow_html'),
			"spesifikasi_teknis" => post('spesifikasi_teknis', 'allow_html'),
			"kegunaan_manfaat" => post('kegunaan_manfaat', 'allow_html'),
			"keunggulan_keunikan" => post('keunggulan_keunikan', 'allow_html'),
			"kesiapan_teknologi" => post('kesiapan_teknologi', 'enum:masih riset&prototype&siap komersil'),
			// "kepemilikan_teknologi" => post('kepemilikan_teknologi', 'enum:sendiri&instansi'),
			// "pemilik_teknologi" => post('pemilik_teknologi'),
			"teknologi_yang_dikembangkan" => post('teknologi_yang_dikembangkan', 'allow_html'),
			"rencana_pengembangan" => post('rencana_pengembangan', 'allow_html'),
			"tautan_video" => post('tautan_video'),
			"website" => post('website'),
			"media_sosial" => post('media_sosial'),
		);

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
			"id" => post('id', 'required')
		);

		$do = DB_MODEL::update($this->table, $where, ['is_delete' => 1]);
		if (!$do->error)
			success("data berhasil dihapus", $do->data);
		else
			error("data gagal dihapus");
	}
}
