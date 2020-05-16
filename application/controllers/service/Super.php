<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Super extends CI_Controller
{
	protected $table = "produk";
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('riset');
	}

	public function get($slug)
	{
		$slugs = riset::slug_public($slug);
		if ($slugs->error)
			redirect('admin');
		$where = ['produk_id' => $slugs->data['id']];
		$data = [
			'produk' => $slugs->data['produk'],
			'pengajuan' => DB_MODEL::find('pengajuan', $where),
			'roadmap' => DB_MODEL::where('roadmap', $where)->data,
			'pengujian' => DB_MODEL::where('pengujian', $where)->data,
			'ki' => DB_MODEL::where('kekayaan_intelektual', $where)->data,
			'mitra' => DB_MODEL::where('mitra', $where)->data,
			'foto_produk' => DB_MODEL::where('foto_produk', $where)->data,
			'riwayat' => $this->riwayat($slugs->data['produk']->nama_produk, $where),
			'foto_kegiatan' => DB_MODEL::where('foto_kegiatan', $where)->data,
			'inventor' => DB_MODEL::join('inventor', 'users', null, 'inner', $where)->data,
			'perusahaan' => DB_MODEL::join('produk_perusahaan', 'perusahaan', null, 'right', $where)->data,
			'data_bisnis' => DB_MODEL::join('data_dasar', 'produk', null, 'right', $where, "data_dasar.*")->data,
		];
		$data['produk']->kategori = json_decode($data['produk']->kategori);
		success("data berhasil ditemukan", $data);
	}
	private function riwayat($nama_produk, $where)
	{
		$informasi = DB_MODEL::where('informasi', $where)->data;
		$pengajuan = DB_MODEL::where('pengajuan', $where)->data;
		$prestasi = DB_MODEL::where('prestasi', $where)->data;
		$data = riset::riwayat($nama_produk, $informasi, $pengajuan, $prestasi);
		return $data;
	}
}
