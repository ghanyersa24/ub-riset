<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Review extends CI_Controller
{
	protected $table = "ulasan";
	public function create()
	{
		$check = DB_MODEL::find($this->table, [
			"users_id" => AUTHORIZATION::User()->id,
			"produk_id" => post('produk_id')
		]);
		if (!$check->error)
			error("kamu sudah pernah melakukan review pada produk ini");

		$data = array(
			"users_id" => AUTHORIZATION::User()->id,
			"produk_id" => post('produk_id'),
			"rating" => post('rating', 'required|enum:1&2&3&4&5'),
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
			"rating" => post('rating', 'required|enum:1&2&3&4&5'),
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
