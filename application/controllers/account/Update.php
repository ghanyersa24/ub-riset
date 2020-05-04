<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Update extends CI_Controller
{
	public function index()
	{
		$where = array(
			"id" =>  $this->session->userdata('id'),
		);
		$data = array(
			"email" => post('email', 'required'),
			"kontak" => post('kontak', 'required|min_char:12|numeric'),
			"tanggal_lahir" => post('tanggal_lahir', 'date_valid'),
		);
		$do = DB_MODEL::update('users', $where, $data);
		if (!$do->error) {
			success("data berhasil diubah", $do->data);
		} else {
			error("data gagal diubah");
		}
	}
}
