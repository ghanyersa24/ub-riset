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

	public static function search($where, $like,  $limit, $page, $column = 'created_at', $order = 'desc')
	{
		$CI = &get_instance();
		$query = $CI->db->select("(select count(`produk_id`) from `seen` where `produk_id`= `produk`.`id` ) as seen,id,slug,nama_produk,katsinov,tkt,bidang,kategori,deskripsi_singkat,deskripsi_lengkap, logo_produk")->where($where)->like($like)->order_by($column, $order)->get('produk', $limit, $page);
		if ($query)
			return true($query->result());
		else
			return false();
	}

	public static function userNo($inventor)
	{
		$arr = [];
		foreach ($inventor as $value) {
			$arr[] = $value->users_id;
		}
		$CI = &get_instance();
		$id = $CI->session->userdata('id');
		if (count($arr) > 0)
			$query = $CI->db->from('users')
				->where(["id !=" => $id])
				->where_not_in("id", $arr)->get();
		else
			$query = $CI->db->from('users')
				->where(["id !=" => $id])->get();
		if ($query)
			return true($query->result());
		else
			return false();
	}
	public static function pendanaan($perusahaan_id)
	{
		$CI = &get_instance();
		$query = $CI->db
			->select('nama_produk, nama, sumber_pendanaan, nilai_pendanaan')
			->from('produk_perusahaan')
			->join('produk', 'produk_perusahaan.produk_id = produk.id')
			->join('roadmap', 'produk.id = roadmap.produk_id')
			->where(['perusahaan_id' => $perusahaan_id])->get();
		if ($query)
			return true($query->result());
		else
			return false();
	}
	// public static function detailPengajuan($id = null)
	// {
	// 	$CI = &get_instance();
	// 	$query = $CI->db->select('pengajuan.*,cluster.cluster')
	// 		->from('produk')
	// 		->join('pengajuan', 'pengajuan.produk_id=produk.id', 'right')
	// 		->join('cluster', 'pengajuan.cluster_id=cluster.id','left');
	// 	if (is_null($id)) {
	// 		$do = $query->get();
	// 	} else {
	// 		$do = $query->where(['verifikator' => $CI->session->userdata('id')])->get();
	// 	}
	// 	if ($query)
	// 		return true($do->result());
	// 	else
	// 		return false();
	// }
	public static function product($where, $order)
	{
		$CI = &get_instance();
		$query = $CI->db
			->from('produk')
			->where($where)->get();
		if ($query)
			return true($query->result());
		else
			return false();
	}
}
