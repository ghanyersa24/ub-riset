<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get extends CI_Controller
{
	protected $table = "produk";
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('riset');
	}

	public function product()
	{
		$limit = 10;
		$page = 0;
		$where = ['is_delete ' => 0];
		$like = [];

		if (!empty(get('produk')))
			$like['nama_produk'] = get('produk');
		if (!empty(get('kategori')))
			$like['kategori'] = get('kategori');
		if (!empty(get('latar_belakang')))
			$like['latar_belakang'] = get('latar_belakang');
		if (!empty(get('jenis')))
			$like['jenis'] = get('jenis');
		if (!empty(get('page')))
			$page = (int)get('page') - 1;
		if (!empty(get('limit')))
			$limit = (int) get('limit');
		$offset = $limit * $page;

		$produk = DB_CUSTOM::search($where, $like, $limit, $offset)->data;
		$all = DB_MODEL::like($this->table, $where, $like)->data;
		foreach ($produk as $value) {
			$value->kategori = json_decode($value->kategori);
		}
		if (count($produk) == 0)
			error("data tidak ditemukan");
		for ($i = 0; $i < count($all) / $limit; $i++) {
			$arr[] = $i + 1;
		}
		$data = [
			'row' => count($all),
			'page' => $arr,
			'produk' => $produk,
		];
		success("data produk berhasil ditemukan", $data);
	}

	public function detailproduk($slug)
	{
		$slugs = riset::slug_public($slug);
		if ($slugs['error'])
			error('data tidak ditemukan');
		$where = ['produk_id' => $slugs['data']['id']];
		$dataDasar = DB_MODEL::join('data_dasar', 'produk', null, 'right', $where, "data_dasar.*")->data;
		$pengajuan = DB_MODEL::join('pengajuan', 'users', 'pengajuan.verifikator=users.id', 'right', $where, 'pengajuan.*,users.nama nama_verifikator')->data;
		foreach ($pengajuan as $value) {
			$value->kategori = json_decode($value->kategori);
		}
		$roadmap = DB_MODEL::where('roadmap', $where)->data;
		foreach ($roadmap as $value) {
			$value->nilai_pendanaan = set_rupiah($value->nilai_pendanaan);
		}

		$pemasaran = DB_MODEL::where('pemasaran', $where)->data;
		foreach ($pemasaran as $value) {
			$value->nilai_pemasaran = set_rupiah($value->nilai_pemasaran);
		}

		$omset = DB_MODEL::where('omset_profit', $where)->data;
		foreach ($omset as $value) {
			$value->nilai = set_rupiah($value->nilai);
		}

		$data = [
			'produk' => $slugs['data']['produk'],
			'seen' => count(DB_MODEL::where('seen', $where)->data),
			'pengajuan' => count($pengajuan) > 0 ? $pengajuan[(count($pengajuan) - 1)] : null,
			'roadmap' => $roadmap,
			'pengujian' => DB_MODEL::where('pengujian', $where)->data,
			'ki' => DB_MODEL::where('kekayaan_intelektual', $where)->data,
			'mitra' => DB_MODEL::where('mitra', $where)->data,
			'foto_produk' => DB_MODEL::where('foto_produk', $where)->data,
			'riwayat' => $this->riwayat($slugs['data']['produk']->nama_produk, $where),
			'foto_kegiatan' => DB_MODEL::where('foto_kegiatan', $where)->data,
			'inventor' => DB_MODEL::join('inventor', 'users', null, 'inner', $where)->data,
			'perusahaan' => DB_MODEL::join('produk_perusahaan', 'perusahaan', null, 'right', $where)->data,
			'data_bisnis' => [
				'data_dasar' => count($dataDasar) > 0 ? $dataDasar[(count($dataDasar) - 1)] : null,
				'pemasaran' => $pemasaran,
				'produksi' => DB_MODEL::where('produksi', $where)->data,
				'penjualan' => DB_MODEL::where('penjualan', $where)->data,
				'omset' => $omset,
			],
		];
		$data['produk']->kategori = json_decode($data['produk']->kategori);
		DB_MASTER::insert('seen', $where);
		success("data berhasil ditemukan", $data);
	}
	private function riwayat($nama_produk, $where)
	{
		$informasi = DB_MODEL::where('informasi', $where)->data;
		$pengajuan = DB_MODEL::join('pengajuan', 'cluster', null, null, $where)->data;
		$prestasi = DB_MODEL::where('prestasi', $where)->data;
		$data = riset::riwayat($nama_produk, $informasi, $pengajuan, $prestasi);
		return $data;
	}
}
