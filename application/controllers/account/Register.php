<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function email()
	{
		$data = array(
			"nama_lengkap" => post('nama_lengkap', 'required'),
			"fakultas" => post('fakultas', 'required|enum:FH&FEB&FIA&FP&FAPET&FT&FK&FPIK&FMIPA&FTP&FISIP&FIB&FKH&FILKOM&FKG&Vokasi'),
			"jurusan" => post('jurusan', 'required'),
			"prodi" => post('prodi', 'required'),
			"identifier" => post('identifier', 'required|max_char:15'),
			"status" => post('status', 'enum:mahasiswa&dosen&alumni'),
			"foto" => $this->session->userdata('foto'),
			"email" => $this->session->userdata('email'),
			"auth" => $this->session->userdata('auth'),
			"kontak" => post('kontak', 'required|numeric|min_char:11'),
		);
		$do = DB_MODEL::insert('users', $data);
		if (!$do->error) {
			success("data berhasil didaftarkan", $do->data);
		} else {
			error("data gagal didaftarkan");
		}
	}

	public function account()
	{
		post('password_confirmation', 'required|same:password');
		$data = [
			"nama_lengkap" => post('nama_lengkap', 'required'),
			"fakultas" => post('fakultas', 'required|enum:FH&FEB&FIA&FP&FAPET&FT&FK&FPIK&FMIPA&FTP&FISIP&FIB&FKH&FILKOM&FKG&Vokasi'),
			"jurusan" => post('jurusan', 'required'),
			"prodi" => post('prodi', 'required'),
			'username' => post('username', 'required|unique:alumni'),
			'password' => password_hash(post('password', 'required'), PASSWORD_DEFAULT, array('cost' => 10)),
			'status' => 'deactivate'
		];
		$do = DB_MASTER::insert('users', $data);
		if (!$do->error)
			success("data sedang diajukan untuk mendapatkan aktivasi", $do->data);
		else
			error("data gagal diajukan");
	}
}
