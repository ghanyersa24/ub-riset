<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
	}
	public function email()
	{
		$update = post('is_update', 'enum:true&false');
		$identifier = post('identifier', 'required|max_char:15');
		if ($update == 'true') {
			if (post('status') == 'mahasiswa') {
				$auth = Auth::siam($identifier, post('password', 'required'));
				if ($auth->error)
					error("Username dan Password SIAM salah.");
			} else
				error("autentikasi lanjutan khusus mahasiswa.");
			$data = array(
				"status" => post('status', 'enum:mahasiswa&dosen&alumni'),
				"email" => $this->session->userdata('email'),
				"auth" => $this->session->userdata('auth'),
				"foto" => $this->session->userdata('foto'),
				"kontak" => post('kontak', 'required|numeric|min_char:11'),
			);
			$do = DB_MASTER::update_straight('users', ['identifier' => $identifier, 'nama' => $this->session->userdata('nama')], $data);
			if ($do->error)
				error("Data gagal memperbarui akun lama.");
			else {
				$find = DB_MASTER::find('users', ['email' => $this->session->userdata('email'), 'auth' => $this->session->userdata('auth')]);
				if ($find->error)
					error("ada yang tidak beres dengan akun kamu");
				success("Data berhasil memperbarui akun lama.", []);
			}
		} else {
			$find = DB_MASTER::find('users', ['identifier' => $identifier, 'nama' => $this->session->userdata('nama')]);
			if (!$find->error)
				error("terdapat akun serupa.", $find->data);
			$data = array(
				"nama" => $this->session->userdata('nama'),
				"fakultas" => post('fakultas', 'required|enum:FH&FEB&FIA&FP&FAPET&FT&FK&FPIK&FMIPA&FTP&FISIP&FIB&FKH&FILKOM&FKG&Vokasi'),
				"jurusan" => post('jurusan', 'required'),
				"prodi" => post('prodi', 'required'),
				"identifier" => $identifier,
				"status" => post('status', 'enum:mahasiswa&dosen&alumni'),
				"foto" => $this->session->userdata('foto'),
				"email" => $this->session->userdata('email'),
				"auth" => $this->session->userdata('auth'),
				"kontak" => post('kontak', 'required|numeric|min_char:11'),
			);
			$do = DB_MASTER::insert('users', $data);
			if (!$do->error) {
				success("Registrasi berhasil dilakukan", []);
			} else
				error("Registrasi akun gagal dilakukan.");
		}
	}

	// public function account()
	// {
	// 	post('password_confirmation', 'required|same:password');
	// 	$data = [
	// 		"nama" => post('nama', 'required'),
	// 		"fakultas" => post('fakultas', 'required|enum:FH&FEB&FIA&FP&FAPET&FT&FK&FPIK&FMIPA&FTP&FISIP&FIB&FKH&FILKOM&FKG&Vokasi'),
	// 		"jurusan" => post('jurusan', 'required'),
	// 		"prodi" => post('prodi', 'required'),
	// 		'username' => post('username', 'required|unique:alumni'),
	// 		'password' => password_hash(post('password', 'required'), PASSWORD_DEFAULT, array('cost' => 10)),
	// 		'status' => 'deactivate'
	// 	];
	// 	$do = DB_MASTER::insert('users', $data);
	// 	if (!$do->error)
	// 		success("data sedang diajukan untuk mendapatkan aktivasi", $do->data);
	// 	else
	// 		error("data gagal diajukan");
	// }
}
