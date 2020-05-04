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
			<div class="modal-body">
				<form id="form-add">
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
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-default" data-dismiss="modal">Batal</button>
				<button class="btn btn-primary" id="btn-save">Tambah</button>
			</div>
		</div>
	</div>
</div>
<script>
	$('#add-product').click(function(e) {
		$('#add').modal('show')
	});

	$('#btn-save').click(function(e) {
		$.ajax({
			type: "POST",
			url: api + 'service/produk/create',
			data: $('#form-add').serialize(),
			success: function(response) {
				if (!response.error) {
					swal('Success !', response.message, 'success')
					$('#add').modal('hide')

					setTimeout(function() {
						window.location.replace(`<?= base_url() ?>admin/detail/${pad(response.data.id)+'-'+response.data.nama_produk.replace(/ /gi,"-")}`)
					}, 2000)
				} else
					swal('Gagal !', response.message, 'error')
			}
		});

	});
</script>
