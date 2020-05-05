<?php
defined('BASEPATH') or exit('No direct script access allowed');
class riset
{
	public static function slugs($slug = null)
	{
		$CI = &get_instance();
		$produk = DB_MODEL::where('produk', ['created_by' => $CI->session->userdata('id')]);
		if ($produk->error)
			redirect('admin');
		$arr = [];
		foreach ($produk->data as $value) {
			$arr[] = [
				'id' => (int) $value->id,
				'nama_produk' => $value->nama_produk,
				'slug' => str_pad($value->id, 4, '0', STR_PAD_LEFT) . '-' . str_replace(" ", "-", $value->nama_produk),
			];
		}

		if (is_null($slug)) {
			return [
				'produk' => $arr,
				'slug' => null
			];
		} else {
			$title = str_replace('-', " ", $slug);
			$id = (int) str_replace(' ', '', substr($title, 0, 5));
			$title = substr($title, 5);
			foreach ($arr as $value) {
				if ($id == $value['id'])
					$find = true;
			}
			if (!isset($find))
				redirect('admin');
			return [
				'title' => $title,
				'slug' => $slug,
				'id' => $id,
				'produk' => $arr
			];
		}
	}
}
