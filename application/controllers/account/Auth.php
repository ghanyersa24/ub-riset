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
			$auth['logged_in'] = true;
			$this->session->set_userdata($auth);
			success("Welcome to system", $auth);
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
