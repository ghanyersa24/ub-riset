<?php
defined('BASEPATH') or exit('No direct script access allowed');
class riset
{
	public static function slugs_produk($slug = null)
	{
		$CI = &get_instance();
		$produk = DB_MODEL::join('inventor', 'produk', 'produk.id =inventor.produk_id', 'inner', ['users_id' => $CI->session->userdata('id'), 'is_delete' => 0], "produk.*, inventor.users_id");
		if ($produk->error)
			redirect('admin');
		$arr = [];
		foreach ($produk->data as $value) {
			$arr[] = [
				'id' => (int) $value->id,
				'nama_produk' => $value->nama_produk,
				'slug' => str_pad($value->id, 4, '0', STR_PAD_LEFT) . '-' . str_replace(" ", "-", $value->nama_produk),
				'created_by' => $value->created_by,
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
				if ($id == $value['id'] && $title == $value['nama_produk']) {
					$created_by = $value['created_by'];
					$find = true;
				}
			}
			if (!isset($find))
				redirect('admin');
			return [
				'title' => $title,
				'created_by' => $created_by,
				'slug' => $slug,
				'id' => $id,
				'produk' => $arr
			];
		}
	}
	public static function slugs_perusahaan($slug = null)
	{
		$CI = &get_instance();
		$perusahaan = DB_MODEL::join('pengurus', 'perusahaan', null, null, ['users_id' => $CI->session->userdata('id'), 'is_delete' => 0], "perusahaan.*,pengurus.users_id");
		if ($perusahaan->error)
			redirect('admin');
		$arr = [];
		foreach ($perusahaan->data as $value) {
			$arr[] = [
				'id' => (int) $value->id,
				'perusahaan' => $value->nama,
				'slug' => str_pad($value->id, 4, '0', STR_PAD_LEFT) . '-' . str_replace(" ", "-", $value->nama),
				'created_by' => $value->created_by,
			];
		}
		if (is_null($slug)) {
			return [
				'' => $arr,
				'slug' => null
			];
		} else {
			$title = str_replace('-', " ", $slug);
			$id = (int) str_replace(' ', '', substr($title, 0, 5));
			$title = substr($title, 5);
			foreach ($arr as $value) {
				if ($id == $value['id'] && $title == $value['perusahaan']) {
					$find = true;
					$created_by = $value['created_by'];
				}
			}
			if (!isset($find))
				redirect('admin');
			return [
				'title' => $title,
				'slug' => $slug,
				'created_by' => $created_by,
				'id' => $id,
				'perusahaan' => $arr
			];
		}
	}
	public static function slug_public($slug)
	{
		$title = str_replace('-', " ", $slug);
		$id = (int) str_replace(' ', '', substr($title, 0, 5));
		$title = substr($title, 5);
		$produk = DB_MODEL::find('produk', ['id' => $id, 'nama_produk' => $title, 'is_delete' => 0]);
		if ($produk->error)
			return ['error' => true];
		else
			return [
				'error' => false,
				'data' => [
					'title' => $title,
					'slug' => $slug,
					'id' => $id,
					'produk' => $produk->data
				]
			];
	}
	public static function riwayat($nama_produk, $informasi, $pengajuan, $prestasi)
	{
		$data = [];
		foreach ($informasi as $value) {
			$data[] = [
				"type" => "informasi",
				"tahun" => (int) date('Y', strtotime($value->tanggal)),
				"riwayat" => "pada " . date('d F Y', strtotime($value->tanggal)) . " produk " . $nama_produk . ' ' . strip_tags($value->informasi),
			];
		}
		foreach ($pengajuan as $value) {
			if ($value->status == 'dinilai')
				$data[] = [
					"type" => "pengajuan",
					"tahun" => (int) date('Y', strtotime($value->updated_at)),
					"riwayat" => "pada " . date('d F Y', strtotime($value->updated_at)) . " produk " . $nama_produk . " telah diverifikasi dengan mendapat TKT " . $value->tkt . " dan KATSINOV " . $value->katsinov,
				];
		}
		foreach ($prestasi as $value) {
			$data[] = [
				"type" => "prestasi",
				"tahun" => (int) $value->tahun,
				"riwayat" => "pada tahun " . $value->tahun . " produk " . $nama_produk . " mengikuti " . $value->nama_acara . " yang diselenggarakan oleh " . $value->penyelenggara . " dengan mendapat pencapaian " . $value->pencapaian,
			];
		}
		return self::sorting($data);
	}
	public static function sorting($data)
	{
		for ($i = 0; $i < count($data); $i++) {
			for ($j = 0; $j < count($data); $j++) {
				if ($data[$i]['tahun'] > $data[$j]['tahun']) {
					$temp = $data[$i];
					$data[$i] = $data[$j];
					$data[$j] = $temp;
				}
			}
		}
		return $data;
	}
}
