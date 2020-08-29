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
		$column = 'created_at';
		$order = 'desc';
		$where = ['is_delete ' => 0, 'tkt !=' => 'belum memenuhi', 'katsinov !=' => 'belum memenuhi', 'tkt !=' => '', 'katsinov !=' => ''];
		$like = [];

		if (!empty(get('produk')))
			$like['nama_produk'] = get('produk');
		if (!empty(get('kategori')))
			$like['kategori'] = get('kategori');
		if (!empty(get('latar_belakang')))
			$like['latar_belakang'] = get('latar_belakang');
		if (!empty(get('bidang')))
			$like['bidang'] = get('bidang');
		if (!empty(get('page')))
			$page = (int)get('page') - 1;
		if (!empty(get('limit')))
			$limit = (int) get('limit');
		if (!empty(get('column')))
			$column = get('column');
		if (!empty(get('order')))
			$order = get('order');
		$offset = $limit * $page;

		$produk = DB_CUSTOM::search($where, $like, $limit, $offset, $column, $order)->data;
		$all = DB_MODEL::like($this->table, $where, $like)->data;
		foreach ($produk as $value) {
			$value->kategori = json_decode($value->kategori);
		}
		if (count($produk) == 0) {
			header('Content-Type: application/json');
			echo json_encode(
				[
					"error" => true,
					"message" => 'data tidak ditemukan',
					"pagination" => [
						'count' => 0,
						'total' => count(DB_MODEL::where($this->table, $where)->data),
						'current_page' => $page + 1,
						'page' => 0,
						'per_page' => $limit,
					],
					"data" => $produk
				]
			);
			exit;
		}
		for ($i = 0; $i < count($all) / $limit; $i++) {
			$arr[] = $i + 1;
		}
		header('Content-Type: application/json');
		echo json_encode(
			[
				"error" => false,
				"message" => 'data produk berhasil ditemukan',
				"pagination" => [
					'count' => count($produk),
					'per_page' => $limit,
					'total' => count(DB_MODEL::where($this->table, $where)->data),
					'current_page' => $page + 1,
					'page' => $arr
				],
				"data" => $produk
			]
		);
		exit;
	}

	public function detailproduk($slug)
	{
		$slugs = riset::slug_public($slug);
		if ($slugs['error'])
			error('data tidak ditemukan');
		$where = ['produk_id' => $slugs['data']['id']];
		$pengajuan = DB_MODEL::join('pengajuan', 'users', 'pengajuan.verifikator=users.id', 'right', $where, 'pengajuan.*,users.nama nama_verifikator')->data;
		foreach ($pengajuan as $value) {
			$value->kategori = json_decode($value->kategori);
		}
		$review = DB_MODEL::join('ulasan', 'users', null, null, [], "ulasan.id, users.id user_id, nama, status, foto, ulasan, rating, ulasan.created_at,ulasan.updated_at")->data;
		$data = [
			'produk' => $slugs['data']['produk'],
			'seen' => count(DB_MODEL::where('seen', $where)->data),
			'pengajuan' => count($pengajuan) > 0 ? $pengajuan[(count($pengajuan) - 1)] : null,
			'ki' => DB_MODEL::where('kekayaan_intelektual', $where)->data,
			'mitra' => DB_MODEL::where('mitra', $where)->data,
			'foto_produk' => DB_MODEL::where('foto_produk', $where)->data,
			'riwayat' => $this->riwayat($slugs['data']['produk']->nama_produk, $where),
			'foto_kegiatan' => DB_MODEL::where('foto_kegiatan', $where)->data,
			'inventor' => DB_MODEL::join('inventor', 'users', null, 'inner', $where, "users.id, nama, status, foto, fakultas, kontak,email")->data,
			'perusahaan' => DB_MODEL::join('produk_perusahaan', 'perusahaan', null, 'right', $where)->data,
			'review' => $review,
			'rating' => $this->rating($review),
			'reviewed' => 0
		];
		$data['produk']->kategori = json_decode($data['produk']->kategori);
		$headers = $this->input->request_headers();
		if (array_key_exists('brain-token', $headers) && !empty($headers['brain-token'])) {
			foreach ($review as $row) {
				if ($row->user_id == AUTHORIZATION::User()->id) {
					$data['reviewed'] = 1;
					$data['myReview'] = $row;
				}
			}
		}
		DB_MASTER::insert('seen', $where);
		success("data berhasil ditemukan", $data);
	}

	private function rating($data)
	{
		$sum_data = 0;
		foreach ($data as $row) {
			$sum_data += (int)$row->rating;
		}
		return $sum_data / count($data);
	}
	private function riwayat($nama_produk, $where)
	{
		$informasi = DB_MODEL::where('informasi', $where)->data;
		$prestasi = DB_MODEL::where('prestasi', $where)->data;
		$data = riset::riwayat($nama_produk, $informasi, [], $prestasi);
		return $data;
	}
}
