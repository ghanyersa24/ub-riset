<?php
defined('BASEPATH') or exit('No direct script access allowed');
class auth
{
	public static function siam($nim, $password)
	{
		$auth = json_decode(file_get_contents("https://em.ub.ac.id/redirect/login/loginApps/?nim=$nim&password=$password"), true);
		if ($auth['status'])
			return true($auth);
		else
			return false();
	}
}
