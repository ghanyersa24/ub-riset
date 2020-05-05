<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
	public function index()
	{
		$username = post('username', 'required');
		$password = post('password', 'required');
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
			$profile = DB_MODEL::find('users', ['id' => $username]);
			if ($profile->error)
				$profile = DB_MODEL::insert('users', $data);
			$session_auth = (array) $profile->data;
			$session_auth['logged_in'] = true;
			success("Welcome to system", $session_auth);
			$this->session->set_userdata($session_auth);
		} else
			error("username & password tidak cocok dengan akun UB");
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
