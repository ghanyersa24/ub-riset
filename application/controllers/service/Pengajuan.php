<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
	protected $table = "pengajuan";
	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in')) {
			redirect('login');
		}
	}
	public function create()
	{
		$this->load->helper('riset');
		if ($this->session->userdata('identifier') != post('auth', 'required'))
			error('konfirmasi kamu salah, silahkan masukkan kembali.');

		$slug = riset::slug_public(post('slug', 'required'));
		if ($slug['error'])
			error("maaf data inovasi bermasalah");

		else {
			$last = DB_MODEL::find('pengajuan', ['produk_id' => $slug['data']['id']]);
			if (!$last->error) {
				if ($last->data->status != 'dinilai')
					error("data sudah diajukan, tunggu konfirmasi dari admin.");
			}
			$data = array(
				"produk_id" => $slug['data']['id'],
				"cluster_id" => post('cluster_id', 'required'),
				"nama_produk" => $slug['data']['title'],
				"slug" => $slug['data']['slug'],
				"inventor" => $this->session->userdata('nama'),
				"bidang" => $slug['data']['produk']->bidang,
				"kategori" => $slug['data']['produk']->kategori,
				"status" => 'diajukan'
			);
		}
		$do = DB_MODEL::insert($this->table, $data);
		if (!$do->error) {
			success("data berhasil ditambahkan, konfirmasi selanjutnya akan diberitahu admin.", $do->data);
		} else {
			error("data gagal ditambahkan");
		}
	}

	public function get($id = null)
	{
		if (is_null($id))
			$do = DB_MODEL::join($this->table, 'cluster', "pengajuan.cluster_id=cluster.id", 'right');
		else
			$do = DB_MODEL::join($this->table, 'cluster', "pengajuan.cluster_id=cluster.id", "right", ['verifikator' => $this->session->userdata('id')]);


		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}

	public function update()
	{
		if (!$this->session->has_userdata('logged_in') || $this->session->is_admin == 'no') {
			redirect('login');
		}
		$where = array(
			"id" => post('id', 'required'),
		);
		$produk = post('produk_id', 'required');
		$data = [
			"katsinov" => $katsinov = post('katsinov', 'required|enum:1&2&3&4&5&6&belum memenuhi'),
			"tkt" => $tkt = post('tkt', 'required|enum:1&2&3&4&5&6&7&8&9&belum memenuhi'),
			"catatan" => post('catatan', 'allow_html'),
			"status" => 'dinilai',
		];
		
		if ($katsinov !== 'belum memenuhi')
			$data["file_katsinov"] = UPLOAD_FILE::excel('file_katsinov', "inovasi/$produk/evaluasi", 'evaluasi_katsinov');
		
			if ($tkt !== 'belum memenuhi')
			$data["file_tkt"] = UPLOAD_FILE::excel('file_tkt', "inovasi/$produk/evaluasi", 'evaluasi_tkt');

		$do = DB_MODEL::update($this->table, $where, $data);
		if (!$do->error) {
			DB_MODEL::update_straight('produk', ['id' => $produk], ['katsinov' => $katsinov, 'tkt' => $tkt]);
			success("data berhasil diubah", $do->data);
		} else
			error("data gagal diubah");
	}

	// public function delete()
	// {
	// 	$where = array(
	// 		"id" => post('id', 'required')
	// 	);

	// 	$do = DB_MODEL::delete($this->table, $where);
	// 	if (!$do->error)
	// 		success("data berhasil dihapus", $do->data);
	// 	else
	// 		error("data gagal dihapus");
	// }
}
