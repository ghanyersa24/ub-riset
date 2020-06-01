<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// load
	}
	public function index()
	{
		$username = post('username', 'required');
		$password = post('password', 'required');
		$found = false;
		if ($username == 'admin super' && $password == 'adminbrainmantab') {
			$data = [
				'identifier' => "admin super",
				'nama' => "Super Admin",
				'status' => 'mahasiswa',
				'fakultas' => 'BIW Corporation',
				'jurusan' => '',
				'prodi' => '',
				'is_admin' => 'admin',
				'foto' => "https://i.pinimg.com/originals/28/93/ca/2893ca2a6c253b745b5ce9a7ce70c9ba.png",
			];
			$found = true;
		} elseif ($username == 'verifikator' && $password == 'bagianverifikasi') {
			$data = [
				'identifier' => "verifikator",
				'nama' => "Tim Verifikator",
				'status' => 'mahasiswa',
				'fakultas' => 'BIW Corporation',
				'jurusan' => '',
				'prodi' => '',
				'is_admin' => 'verifikator',
				'foto' => "https://media.tabloidbintang.com/files/thumb/1111af44ae808bc127ab84342b15af5a.jpg/745",
			];
			$found = true;
		} else {
			$username = str_replace(" ", "", $username);
			$password = str_replace(" ", "", $password);
			$auth = json_decode(file_get_contents("https://em.ub.ac.id/redirect/login/loginApps/?nim=$username&password=$password"), true);
			if ($auth['status']) {
				$angkatan = substr($auth['nim'], 0, 2);
				$data = [
					'identifier' => $auth['nim'],
					'nama' => $auth['nama'],
					'status' => 'mahasiswa',
					'fakultas' => $auth['fak'],
					'jurusan' => $auth['jurusan'],
					'prodi' => $auth['prodi'],
					'foto' => "https://siakad.ub.ac.id/dirfoto/foto/foto_20$angkatan/" . $auth['nim'] . ".jpg",
				];
				$found = true;
			}
		}
		if ($found)
			$this->checking($username, $data);
		error("username & password tidak cocok dengan akun UB");
	}
	private function checking($username, $data)
	{
		$profile = DB_MODEL::find('users', ['identifier' => $username]);
		$this->session->set_userdata('identifier', $data['identifier']);
		if ($profile->error)
			$profile = DB_MASTER::insert('users', $data);
		$session_auth = (array) $profile->data;
		$session_auth['logged_in'] = true;
		$session_auth['dark_mode'] = false;
		$this->session->set_userdata($session_auth);
		success("Welcome to system", $session_auth);
	}

	public function spesial()
	{
		$data = [
			'email' => $email = post('email', 'required|email'),
			'foto' => post('foto', 'required'),
			'nama_lengkap' => post('nama_lengkap', 'required'),
			'auth' => $auth = post('auth', 'required')
		];
		$profile = DB_MASTER::find('users', "email='$email' AND auth='$auth'");
		if ($profile->error) {
			$data['do'] = 'register';
			$this->session->set_userdata($data);
			error("kamu akan diteruskan pada halaman registrasi.",  AUTHORIZATION::generateToken(['auth' => $auth]));
		} else {
			$session_auth = (array) $profile->data;
			$session_auth['logged_in'] = true;
			$session_auth['dark_mode'] = false;
			$this->session->set_userdata($session_auth);
			success("Welcome to system", $session_auth);
		}
	}
}
