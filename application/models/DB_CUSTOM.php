<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DB_CUSTOM extends CI_Model
{
	public static function all($table)
	{
		$CI = &get_instance();
		$query = $CI->db->order_by("created_at", 'DESC')->get($table);
		if ($query)
			return true($query->result());
		else
			return false();
	}
	public static function userNoInventor($inventor)
	{
		$arr = [];
		foreach ($inventor as $value) {
			$arr[] = $value->users_id;
		}
		$CI = &get_instance();
		$id = $CI->session->userdata('id');
		if (count($arr) > 0)
			$query = $CI->db->from('users')
				->where("id != $id")
				->where_not_in("id", $arr)->get();
		else
			$query = $CI->db->from('users')
				->where("id != $id")
				->where_not_in("id", $arr)->get();
		if ($query)
			return true($query->result());
		else
			return false();
	}
}
