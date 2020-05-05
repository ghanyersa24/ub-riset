<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengurus extends CI_Controller
{
	protected $table = "pengurus";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}
	public function create()
	{
		$data = [
			"perusahaan_id" => post('perusahaan_id', 'required'),
			"users_id" => post('users_id', 'required'),
			"jabatan" => post('jabatan', 'required|max_char:30'),
		];
		$do = DB_MODEL::insert($this->table, $data);
		if (!$do->error)
			success("data berhasil ditambahkan", $do->data);
		else
			error("data gagal diperbarui");
	}

	public function get($id)
	{
		$data['pengurus'] = $pengurus = DB_MODEL::join($this->table, 'users',  null, 'inner',  ['perusahaan_id' => $id])->data;
		$data['user'] = DB_CUSTOM::userNo($pengurus)->data;
		success("data berhasil diterima", $data);
	}

	public function update()
	{
		$data = [
			"jabatan" => post('jabatan', 'required|max_char:30'),
		];
		$where = array(
			"perusahaan_id" => post('perusahaan_id', 'required'),
			"users_id" => post('users_id', 'required'),
		);
		$do = DB_MODEL::update($this->table, $where, $data);
		if (!$do->error)
			success("data berhasil ditambahkan", $do->data);
		else
			error("data gagal diperbarui");
	}

	public function delete()
	{
		$where = array(
			"users_id" => post('users_id', 'required'),
			'perusahaan_id' => post('perusahaan_id', 'required')
		);

		$do = DB_MODEL::delete($this->table, $where);
		if (!$do->error)
			success("data berhasil dihapus", $do->data);
		else
			error("data gagal dihapus");
	}
}
