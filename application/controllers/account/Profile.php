<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends CI_Controller
{
	public function customer()
	{
		$where = array(
			'id' => AUTHORIZATION::User()->id,
		);
		$do = DB_MODEL::find('customer', $where);
		if (!$do->error)
			success("data profil diterima", $do->data);
		else
			error("data profil tidak ditemukan");
	}
	public function dark_mode()
	{
		if ($this->session->dark_mode) {
			$this->session->set_userdata(['dark_mode' => false]);
			success("anda berada dalam mode terang", $this->session->dark_mode);
		} else {
			$this->session->set_userdata(['dark_mode' => true]);
			success("anda berada dalam mode gelap", $this->session->dark_mode);
		}
	}
}
