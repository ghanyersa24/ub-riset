<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header d-block justify-content-start align-items-center">
			<h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
		</div>
		<button class="btn btn-info " data-toggle="tooltip" data-placement="left" title="Tambahkan ide atau produk inovasimu, disini !" onclick="$('#add').modal('show')" style="position: fixed; bottom: 36px;   right: 20px; padding: 18.5px;z-index: 10;">
			<i class="fa fa-plus"></i>
		</button>


		<div class="section-body">
			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-body row" id="kompetensi">

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Daftarkan !!!</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<form class="form-add" id="form-add">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-4">
							<div class="form-group">
								<label for="view-nama_produk">Nama Produk</label>
								<input type="text" class="form-control" id="view-nama_produk" name="nama_produk" placeholder="contoh : Brain Apps">
							</div>
							<div class="form-group">
								<label for="view-jenis">Jenis Produk</label>
								<div class="row container">
									<div class="col custom-control custom-radio">
										<input type="radio" id="view-jenis1" name="jenis" class="custom-control-input" value="digital" checked>
										<label class="custom-control-label" for="view-jenis1">Digital</label>
									</div>
									<div class="col custom-control custom-radio">
										<input type="radio" id="view-jenis2" name="jenis" class="custom-control-input" value="non digital">
										<label class="custom-control-label" for="view-jenis2">Non Digital</label>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-8">
							<div class="form-group">
								<label for="add-deskripsi">Deskripsi Singkat Produk</label>
								<textarea name="deskripsi_singkat" id="add-deskripsi_singkat" class="form-control" placeholder="contoh : Sistem manajemen brawijaya dalam bidang riset dan inovasi"></textarea>
							</div>
							<div class="form-group">
								<label for="add-bidang">Bidang</label>
								<select class="custom-select" name="bidang">
									<option selected disabled>Pilih salah satu</option>
									<option value="Pangan">Pangan</option>
									<option value="Energi">Energi</option>
									<option value="Transportasi">Transportasi</option>
									<option value="Rekayasa Keteknikan">Rekayasa Keteknikan</option>
									<option value="Kesehatan">Kesehatan</option>
									<option value="Pertahanan Keamanan">Pertahanan Keamanan</option>
									<option value="Material Maju">Material Maju</option>
									<option value="Kemaritiman">Kemaritiman</option>
									<option value="Sosial Budaya">Sosial Budaya</option>
								</select>
							</div>

							<div class="form-group">
								<label for="view-kategori">Kategori</label>
								<select id="view-kategori" class="select2" multiple="multiple" data-placeholder="Kategori" style="width: 100%;" name="kategori[]">
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Batal</button>
					<button class="btn btn-primary" id="btn-save" type="submit">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	let res = []

	function get() {
		$.ajax({
			type: "GET",
			url: api + 'service/produk/get',
			success: function(response) {
				res = response.data
				let card = ""
				if (res.length == 0)
					card = `<div class="col-12 text-center"> <p class="h5">silahkan tambahkan produk inovasi anda !!!</p></div>`
				else
					res.forEach(element => {
						card += `<div class="card col-sm-3 ">
								<div class="card-body shadow rounded">
									<div style="height:200px">
										<img src="${element.logo_produk==null?'https://i.imgur.com/QE3UIgf.png':element.logo_produk}" alt="" class="w-100 h-100 click" style="object-fit:cover; object-position: center" onclick="view('${element.slug}')">
									</div>
									<hr>
									<div class="d-flex justify-content-between">
									<span class="h5 card-title click" onclick="view('${element.slug}')">${element.nama_produk.substring(0, 12)}</span>
									<span><button type="button" class="btn btn-default" onclick="del(${element.id})"><i class="fas fa-trash"></i></button></span>
									</div>
								</div>
							</div>`
					})
				$('#kompetensi').html(card)
			}
		})
	}

	function del(id, link) {
		swal({
				title: "Apakah Kamu yakin?",
				text: "keluar dari inventor produk!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						type: "POST",
						url: api + 'service/inventor/delete',
						data: {
							produk_id: id,
							users_id: '<?= $this->session->userdata('id') ?>'
						},
						dataType: "json",
						success: function(response) {
							response_alert(response)
							if (!response.error)
								get()
						}
					})
				}
			});
	}

	function view(link) {
		window.location.replace(api + 'admin/detail/' + link)
	}
	$(document).ready(function() {
		const kategoriData = [
			'Alat dan Mesin Pertanian', 'Alat Kesehatan', 'Alat Pendukung Industri Material Maju', 'Alumunium Silikat', 'Artificial Intellengence (AI)', 'Augmented/Virtual Reality', 'B2B', 'Bahan Bakar', 'Benih/Bibit dan Varietas Unggul', 'Blockchain', 'Bungkil Sawit', 'Cloud Infrastructure', 'Content Management System', 'Crowdfunding', 'Desain', 'E-commerce', 'Fintech', 'Games/Permainan', 'Getah Karet dan Getah Pinus', 'Green Energy', 'Hardware', 'Internet of Things (IoT)', 'Karbon', 'Kebencanaan', 'Kelautan', 'Kerak Gaharu', 'Keramik', 'Keramik Struktural', 'Kesehatan Masyarakat', 'Kolagen', 'Komponen Transportasi', 'Komposit', 'Komunikasi', 'Konstruksi', 'Kosmetika dan Produk Kecantikan', 'Lampu DC', 'Limbah Ikan dan Sayur', 'Limbah Kotoran Hewan', ' Buah dan Sayur', 'Limbah Plastik', 'Limbah Potongan Kayu', 'Logam Tanah Jarang', 'Logistik', 'Management Tools', 'Marketplace', 'Material Bio-Katalis', 'Material Pendukung Industri', 'Material untuk Bahan Bangunan', 'Media Publishing', 'Membran', 'Mesin Pengolahan Pangan', 'Mesin Pres dan Pemotongan Karet', 'Modifikasi Kendaraan', 'Obat', 'Obat Kuasi', 'Obat Tradisional', 'Organik', 'Pakan Ternak', 'Pangan Fungsional', 'Pangan Olahan', 'Pangan Segar', 'Pemanfaatan Listrik', 'Pembangkit Listrik', 'Pendidikan', 'Penghasil Listrik', 'Penghemat BBM', 'Penghemat Listrik', 'Perbekalan Kesehatan Rumah Tangga', 'Perikanan', 'Peternakan', 'Pewarna', 'Polimer', 'POS (Point of Sales)', 'Pupuk dan Pestisida', 'Robotik', 'Rumput Laut', 'Silase Sorgum', 'Sosial Media', 'Suplemen Kesehatan', 'Teknologi Budidaya', 'Teknologi Pedukung Daya Gerak', 'Teknologi Pendukung Daya Gempur', 'Teknologi Pendukung Pertahanan', 'Tekstil', 'Transportasi Industri', 'Travel', 'Turisme', 'Unmanned Aerial Vehicle (UAV)'
		]
		let listKategori = ''
		kategoriData.forEach(element => {
			listKategori += `<option value="${element}">${element}</option>`
		})
		$('#view-kategori').append(listKategori)
		get()
		triggerEditor('#form-add')
		$('#form-add').validate({
			rules: {
				nama_produk: {
					required: true
				},
				bidang: {
					required: true
				},
				jenis: {
					required: true
				},
			},
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: api + "service/produk/create",
					data: $('#form-add').serialize(),
					success: function(response) {
						if (!response.error) {
							$('#form-add').trigger('reset')
							get()
							$('#add').modal('hide')
							setEditor('add-deskripsi_singkat', "")
						}
						response_alert(response)
					}
				})
			}
		})

	});
</script>
