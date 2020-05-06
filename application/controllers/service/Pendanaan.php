<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendanaan extends CI_Controller
{
	protected $table = "roadmap";
	public function __construct()
	{
		parent::__construct();
		// additional library
	}

	public function get($id)
	{
		$do = DB_CUSTOM::pendanaan($id);

		if (!$do->error)
			success("data berhasil ditemukan", $do->data);
		else
			error("data gagal ditemukan");
	}
}
