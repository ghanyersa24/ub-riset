<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Review extends CI_Controller
{
	protected $table = "ulasan";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$review = DB_MODEL::like('ulasan', [
			"produk_id" => post('produk_id'),
			"users_id" => AUTHORIZATION::User()->id,
		], ['created_at' => date('Y-m-d h')]);

		if ($review->error)
			error("error saat seleksi data review");
		if (count($review->data) > 1)
			error("kamu tidak bisa menambahkan review lagi dalam waktu dekat ini");
		$data = array(
			"users_id" => AUTHORIZATION::User()->id,
			"produk_id" => post('produk_id'),
			"ulasan" => post('ulasan'),
			"created_by" => AUTHORIZATION::User()->id,
		);

		$do = DB_MODEL::insert($this->table, $data);
		if (!$do->error) {
			success("data " . $this->table . " berhasil ditambahkan", $do->data);
		} else {
			error("data " . $this->table . " gagal ditambahkan");
		}
	}


	public function update()
	{
		$data = array(
			"ulasan" => post('ulasan', 'required'),
		);

		$where = array(
			"id" => post('id', 'required'),
			"created_by" => AUTHORIZATION::User()->id,
		);

		$do = DB_MODEL::update_straight($this->table, $where, $data);
		if (!$do->error)
			success("data " . $this->table . " berhasil diubah", $do->data);
		else
			error("data " . $this->table . " gagal diubah");
	}

	public function delete()
	{
		$where = array(
			"id" => post('id', 'required'),
			"created_by" => AUTHORIZATION::User()->id,
		);

		$do = DB_MODEL::delete($this->table, $where);
		if (!$do->error)
			success("data " . $this->table . " berhasil dihapus", $do->data);
		else
			error("data " . $this->table . " gagal dihapus");
	}
}
