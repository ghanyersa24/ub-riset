<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cluster extends CI_Controller
{
	protected $table = "cluster";
	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in')) {
			redirect('login');
		}
	}
	public function create()
	{
		if ($this->session->is_admin == 'no')
			redirect('login');
		$data = array(
			"cluster" => post('cluster', 'required|max_char:30'),
		);

		$do = DB_MODEL::insert($this->table, $data);
		if (!$do->error) {
			success("data " . $this->table . " berhasil ditambahkan", $do->data);
		} else {
			error("data " . $this->table . " gagal ditambahkan");
		}
	}

	public function get($id = null)
	{
		if (is_null($id)) {
			$do = DB_MODEL::where($this->table, ['is_delete' => 0]);
		} else {
			$do = DB_MODEL::find($this->table, array("id" => $id));
		}

		if (!$do->error)
			success("data " . $this->table . " berhasil ditemukan", $do->data);
		else
			error("data " . $this->table . " gagal ditemukan");
	}

	public function update()
	{
		if ($this->session->is_admin == 'no')
			redirect('login');

		$data = array(
			"cluster" => post('cluster', 'required|max_char:30'),
		);

		$where = array(
			"id" => post('id', 'required'),
		);

		$do = DB_MODEL::update($this->table, $where, $data);
		if (!$do->error)
			success("data " . $this->table . " berhasil diubah", $do->data);
		else
			error("data " . $this->table . " gagal diubah");
	}

	public function delete()
	{
		if ($this->session->is_admin == 'no')
			redirect('login');

		$where = array(
			"id" => post('id', 'required'),
		);

		$do = DB_MODEL::update($this->table, $where, ['is_delete' => 1]);
		if (!$do->error)
			success("data " . $this->table . " berhasil dihapus", $do->data);
		else
			error("data " . $this->table . " gagal dihapus");
	}
}
