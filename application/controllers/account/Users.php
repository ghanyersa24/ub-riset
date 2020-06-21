<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
	protected $table = "users";
	function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('logged_in')) {
			redirect('login');
		}
	}
	public function get($id = null)
	{
		if (is_null($id)) {
			$do = DB_MODEL::where($this->table, ['is_admin !=' => 'verifikator', 'is_admin !=' => 'admin']);
		} else {
			$do = DB_MODEL::find($this->table, array("id" => $id));
		}

		if (!$do->error) {
			success("data berhasil ditemukan", $do->data);
		} else {
			error("data gagal ditemukan");
		}
	}

	public function alumni($func)
	{
		if ($func == 'get') {
			$this->get_alumni();
		} elseif ($func == 'delete') {
			$this->del_alumni();
		} elseif ($func == 'update') {
			$this->verify();
		}
	}
	private function get_alumni()
	{
		$do = DB_MASTER::all('alumni');
		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}
	private function del_alumni()
	{
		$where = ['id' => post('id', 'required'), 'status' => 'deactivate'];
		$do = DB_MODEL::delete('alumni', $where);
		if (!$do->error)
			success("data berhasil dihapus", $do->data);
		else
			error("hanya diizinkan untuk status deactivate");
	}
	private function verify()
	{
		$where = ['id' => $id = post('id', 'required')];
		// $where = ['id' => 3];
		$alumni = DB_MASTER::find('alumni', $where);
		if (!$alumni->error)
			$data = [
				'nama' => $alumni->data->nama_lengkap,
				'identifier' => $alumni->data->nim,
				'fakultas' => $alumni->data->fakultas,
				'jurusan' => $alumni->data->jurusan,
				'prodi' => $alumni->data->prodi,
				'status' => 'alumni',
				'is_admin' => 'no',
				'email' => unique('email', $alumni->data->email, 'users'),
				'kontak' => $alumni->data->kontak,
				'pendidikan_terakhir' => 'S1',
				'auth' => $alumni->data->password
			];
		else
			error('data alumni tidak ditemukan.');

		$do = DB_MODEL::update_straight('alumni', $where, ['status' => 'activate']);
		if (!$do->error)
			$this->add_user($data);
		else
			error('Akun alumni sudah diverifikasi dan aktif.');
	}
	private function add_user($data)
	{
		$do = DB_MODEL::insert($this->table, $data);
		if (!$do->error)
			success("data alumni berhasil ditambahkan", $do->data);
		else
			error("data alumni gagal ditambahkan sebagai users Brain Apps");
	}
}
