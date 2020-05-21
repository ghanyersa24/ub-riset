<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
	protected $table = "pengajuan";
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['riset']);
	}
	public function create()
	{
		if ($this->session->userdata('id') != post('auth', 'required'))
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
		if (is_null($id)) {
			$do = DB_MODEL::join($this->table, 'produk', "pengajuan.produk_id=produk.id", 'right');
		} else {
			$do = DB_MODEL::join($this->table, 'produk', "pengajuan.produk_id=produk.id", "right", ['verifikator' => $this->session->userdata('id')]);
		}

		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}

	public function update()
	{
		$where = array(
			"id" => post('id', 'required'),
		);
		$produk = post('produk_id', 'required');
		$data = array(
			"katsinov" => $katsinov = post('katsinov', 'required|numeric|min_value:0|max_value:6'),
			"tkt" => $tkt = post('tkt', 'required|numeric|min_value:0|max_value:9'),
			"file_tkt" => UPLOAD_FILE::excel('file_tkt', "inovasi/$produk/evaluasi", 'evaluasi_tkt'),
			"file_katsinov" => UPLOAD_FILE::excel('file_katsinov', "inovasi/$produk/evaluasi", 'evaluasi_katsinov'),
			"status" => 'dinilai',
		);

		$do = DB_MODEL::update($this->table, $where, $data);
		if (!$do->error) {
			DB_MODEL::update('produk', ['id' => $produk], ['katsinov' => $katsinov, 'tkt' => $tkt]);
			success("data berhasil diubah", $do->data);
		} else
			error("data gagal diubah");
	}

	public function delete()
	{
		$where = array(
			"id" => post('id', 'required')
		);

		$do = DB_MODEL::delete($this->table, $where);
		if (!$do->error)
			success("data berhasil dihapus", $do->data);
		else
			error("data gagal dihapus");
	}
}
