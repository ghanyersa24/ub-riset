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
			$do = DB_MODEL::find($this->table, array("id" => $id));
		}

		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}

	public function upload()
	{
		$data = [
			"logo_produk" => UPLOAD_FILE::img('logo_produk', 'logo'),
		];
		$where = array(
			"id" => post('id', 'required'),
		);
		$product = DB_MODEL::find('produk', $where)->data;
		$do = DB_MODEL::update($this->table, $where, $data);
		if ($product->logo_produk != null)
			unlink(getcwd() . '\uploads\logo' . str_replace(base_url('/uploads/logo/'), '/', $product->logo_produk));
		if (!$do->error)
			success("logo berhasil diupload", $do->data);
		else
			error("data gagal diubah");
	}

	public function update()
	{
		$data = array(
			"nama_produk" => post('nama_produk', 'required'),
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
			"kepemilikan_teknologi" => post('kepemilikan_teknologi', 'enum:sendiri&instansi'),
			"pemilik_teknologi" => post('pemilik_teknologi'),
			"teknologi_yang_dikembangkan" => post('teknologi_yang_dikembangkan', 'allow_html'),
			"rencana_pengembangan" => post('rencana_pengembangan', 'allow_html'),
			"tautan_video" => post('tautan_video'),
			"website" => post('website'),
			"media_sosial" => post('media_sosial'),
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
			"id" => post('id','required')
		);

		$do = DB_MODEL::delete($this->table, $where);
		if (!$do->error)
			success("data berhasil dihapus", $do->data);
		else
			error("data gagal dihapus");
	}
}
