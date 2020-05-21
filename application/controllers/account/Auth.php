<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
	public function index()
	{
		$username = post('username', 'required');
		$password = post('password', 'required');
		$found = false;
		if ($username == 'admin super' && $password == 'adminbrainmantab') {
			$data = [
				'id' => "admin super",
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
				'id' => "verifikator",
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
					'id' => $auth['nim'],
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
		$profile = DB_MODEL::find('users', ['id' => $username]);
		$this->session->set_userdata('id', $data['id']);
		if ($profile->error)
			$profile = DB_MODEL::insert('users', $data);
		$session_auth = (array) $profile->data;
		$session_auth['logged_in'] = true;
		$session_auth['dark_mode'] = false;
		$this->session->set_userdata($session_auth);
		success("Welcome to system", $session_auth);
	}

	// public function index()
	// {
	// 	$username = post('username', 'required');
	// 	$do = DB_MODEL::login('customer', $username);
	// 	if (is_null($do->data)) {
	// 		error("username and password isn't match");
	// 	} else {
	// 		if (password_verify(post("password"), $do->data->password)) {
	// 			$do->data->token = AUTHORIZATION::generateToken($do->data);
	// 			success("Welcome to system", $do->data);
	// 		} else
	// 			error("username and password isn't match");
	// 	}
	// }
}
