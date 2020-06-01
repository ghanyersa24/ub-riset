<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<p class="card-text">Sudah mempunyai <strong class="px-1">ide</strong> atau <strong class="px-1">produk</strong> inovasimu? <a href="#" class="ml-2 text-decoration-none ripple" id="add-product"> klik disini</a></p>
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h4>Perkembangan Produk Inovasi UB</h4>
					</div>
					<div class="card-body">
						<canvas id="myChart" height="158"></canvas>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card card-hero">
					<div class="card-header">
						<div class="card-icon">
							<i class="far fa-question-circle"></i>
						</div>
						<h4>14</h4>
						<div class="card-description">Breaking News</div>
					</div>
					<div class="card-body p-0">
						<div class="tickets-list">
							<a href="#" class="ticket-item">
								<div class="ticket-title">
									<h4>Lengkapi data produk inovasi anda</h4>
								</div>
								<div class="ticket-info">
									<div>UB Riset Administrator</div>
									<div class="bullet"></div>
									<div class="text-primary">1 menit lalu</div>
								</div>
							</a>
							<a href="#" class="ticket-item">
								<div class="ticket-title">
									<h4>Workshop pelatihan PPBT</h4>
								</div>
								<div class="ticket-info">
									<div>UB Riset Administrator</div>
									<div class="bullet"></div>
									<div>6 jam lalu</div>
								</div>
							</a>
							<a href="#" class="ticket-item">
								<div class="ticket-title">
									<h4>Update terbaru produk dikti</h4>
								</div>
								<div class="ticket-info">
									<div>UB Riset Administrator</div>
									<div class="bullet"></div>
									<div>6 jam lalu</div>
								</div>
							</a>
							<a href="features-tickets.html" class="ticket-item ticket-more">
								Lihat Semua <i class="fas fa-chevron-right"></i>
							</a>
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
								<select class="custom-select select2" name="bidang" style="width: 100%;">
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
	$('#add-product').click(function(e) {
		$('#add').modal('show')
	});
	$(document).ready(function() {
		const kategori = [
			'Alat dan Mesin Pertanian', 'Alat Kesehatan', 'Alat Pendukung Industri Material Maju', 'Alumunium Silikat', 'Artificial Intellengence (AI)', 'Augmented/Virtual Reality', 'B2B', 'Bahan Bakar', 'Benih/Bibit dan Varietas Unggul', 'Blockchain', 'Bungkil Sawit', 'Cloud Infrastructure', 'Content Management System', 'Crowdfunding', 'Desain', 'E-commerce', 'Fintech', 'Games/Permainan', 'Getah Karet dan Getah Pinus', 'Green Energy', 'Hardware', 'Internet of Things (IoT)', 'Karbon', 'Kebencanaan', 'Kelautan', 'Kerak Gaharu', 'Keramik', 'Keramik Struktural', 'Kesehatan Masyarakat', 'Kolagen', 'Komponen Transportasi', 'Komposit', 'Komunikasi', 'Konstruksi', 'Kosmetika dan Produk Kecantikan', 'Lampu DC', 'Limbah Ikan dan Sayur', 'Limbah Kotoran Hewan', ' Buah dan Sayur', 'Limbah Plastik', 'Limbah Potongan Kayu', 'Logam Tanah Jarang', 'Logistik', 'Management Tools', 'Marketplace', 'Material Bio-Katalis', 'Material Pendukung Industri', 'Material untuk Bahan Bangunan', 'Media Publishing', 'Membran', 'Mesin Pengolahan Pangan', 'Mesin Pres dan Pemotongan Karet', 'Modifikasi Kendaraan', 'Obat', 'Obat Kuasi', 'Obat Tradisional', 'Organik', 'Pakan Ternak', 'Pangan Fungsional', 'Pangan Olahan', 'Pangan Segar', 'Pemanfaatan Listrik', 'Pembangkit Listrik', 'Pendidikan', 'Penghasil Listrik', 'Penghemat BBM', 'Penghemat Listrik', 'Perbekalan Kesehatan Rumah Tangga', 'Perikanan', 'Peternakan', 'Pewarna', 'Polimer', 'POS (Point of Sales)', 'Pupuk dan Pestisida', 'Robotik', 'Rumput Laut', 'Silase Sorgum', 'Sosial Media', 'Suplemen Kesehatan', 'Teknologi Budidaya', 'Teknologi Pedukung Daya Gerak', 'Teknologi Pendukung Daya Gempur', 'Teknologi Pendukung Pertahanan', 'Tekstil', 'Transportasi Industri', 'Travel', 'Turisme', 'Unmanned Aerial Vehicle (UAV)'
		]
		let listKategori = ''
		kategori.forEach(element => {
			listKategori += `<option value="${element}">${element}</option>`
		})
		$('#view-kategori').append(listKategori)
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
							$('#add').modal('hide')
							setTimeout(function() {
								window.location.replace(`<?= base_url() ?>admin/detail/${response.data.slug}`)
							}, 2000)
						}
						response_alert(response)
					}
				})
			}
		})
	});
</script>
