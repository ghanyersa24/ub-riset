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
			'izin' => DB_MODEL::where('izin_produk', $where)->data,
			'foto_produk' => DB_MODEL::where('foto_produk', $where)->data,
			'foto_kegiatan' => DB_MODEL::where('foto_kegiatan', $where)->data,
			'inventor' => DB_MODEL::join('inventor', 'users', null, 'inner', $where)->data,
		];
		success("data berhasil ditemukan", $data);
	}
}
