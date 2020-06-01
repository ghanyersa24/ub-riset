<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function index()
	{
		$data = array(
			"nama_lengkap" => post('nama_lengkap', 'required'),
			"fakultas" => post('fakultas', 'required|enum:FH&FEB&FIA&FP&FAPET&FT&FK&FPIK&FMIPA&FTP&FISIP&FIB&FKH&FILKOM&FKG&Vokasi'),
			"jurusan" => post('jurusan', 'required'),
			"prodi" => post('prodi', 'required'),
			"identifier" => post('identifier', 'required|max_char:15|unique:users'),
			"status" => post('status', 'enum:mahasiswa&dosen&alumni'),
			"foto" => $this->session->userdata('foto'),
			"email" => unique('email', $this->session->userdata('email'), 'users'),
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
}
