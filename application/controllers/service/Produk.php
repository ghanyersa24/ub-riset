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
			"kategori" => post('kategori', 'required'),
			"jenis" => post('jenis', 'required|enum:digital&non digital'),
			// "produksi_barang_fisik" => post('produksi_barang_fisik'),
			// "logo_produk" => post('logo_produk1'),
			// "website" => post('website'),
			// "media_sosial" => post('media_sosial'),
			"deskripsi_singkat" => post('deskripsi_singkat', 'required'),
			// "deskripsi_lengkap" => post('deskripsi_lengkap'),
			// "latar_belakang" => post('latar_belakang'),
			// "keterbaruan_produk" => post('keterbaruan_produk'),
			// "masalah" => post('masalah'),
			// "solusi" => post('solusi'),
			// "spesifikasi_teknis" => post('spesifikasi_teknis'),
			// "kegunaan_manfaat" => post('kegunaan_manfaat'),
			// "keunggulan" => post('keunggulan'),
			// "keunikan" => post('keunikan'),
			// "kesiapan_teknologi" => post('kesiapan_teknologi'),
			// "kepemilikan_teknologi" => post('kepemilikan_teknologi', 'enum:individu:institusi'),
			// "pemilik_teknologi" => post('pemilik_teknologi'),
			// "teknologi_yang_dikembangkan" => post('teknologi_yang_dikembangkan'),
			// "rencana_pengembangan" => post('rencana_pengembangan'),
			// "tautan_video" => post('tautan_video'),
			// "created_by" => AUTHORIZATION::User()->id,
			// "updated_by" => AUTHORIZATION::User()->id,
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

	public function update()
	{
		$data = array(
			"nama_produk" => post('nama_produk', 'required'),
			"bidang" => post('bidang', 'required'),
			"kategori" => post('kategori', 'required'),
			"jenis" => post('jenis', 'required'),
			"produksi_barang_fisik" => post('produksi_barang_fisik'),
			"logo_produk" => post('logo_produk'),
			"website" => post('website'),
			"media_sosial" => post('media_sosial'),
			"deskripsi_singkat" => post('deskripsi_singkat'),
			"deskripsi_lengkap" => post('deskripsi_lengkap'),
			"latar_belakang" => post('latar_belakang'),
			"keterbaruan_produk" => post('keterbaruan_produk'),
			"masalah" => post('masalah'),
			"solusi" => post('solusi'),
			"spesifikasi_teknis" => post('spesifikasi_teknis'),
			"kegunaan_manfaat" => post('kegunaan_manfaat'),
			"keunggulan" => post('keunggulan'),
			"keunikan" => post('keunikan'),
			"kesiapan_teknologi" => post('kesiapan_teknologi'),
			"kepemilikan_teknologi" => post('kepemilikan_teknologi'),
			"pemilik_teknologi" => post('pemilik_teknologi'),
			"teknologi_yang_dikembangkan" => post('teknologi_yang_dikembangkan'),
			"rencana_pengembangan" => post('rencana_pengembangan'),
			"tautan_video" => post('tautan_video'),
			"updated_by" => AUTHORIZATION::User()->id,
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
			"id" => post('id')
		);

		$do = DB_MODEL::delete($this->table, $where);
		if (!$do->error)
			success("data berhasil dihapus", $do->data);
		else
			error("data gagal dihapus");
	}
}
