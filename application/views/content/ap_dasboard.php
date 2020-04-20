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
						<p class="card-text">Sudah mempunyai <strong class="px-1">ide</strong> atau <strong class="px-1">produk</strong>  inovasimu? <a href="#" class="ml-2 text-decoration-none" id="add-product"> klik disini</a></p>
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
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Daftarkan !!!</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="view-name">Nama Produk</label>
					<input type="text" class="form-control" id="view-name" name="name" value="Produk Inovasi I">
				</div>
				<div class="form-group">
					<label for="view-name">Deskripsi Produk</label>
					<textarea name="spesifikasi" id="spesifikasi" class="form-control"></textarea>
				</div>
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
		swal('Success !', 'data produk berhasil ditambahkan', 'success');
		$('#add').modal('hide');
		setTimeout(function() {
			window.location.replace('http://localhost/ub-riset/admin/detail/I')
		}, 2000)
	});
</script>
