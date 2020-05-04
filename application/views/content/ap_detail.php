      <!-- Main Content -->

      <link rel="stylesheet" href="<?= base_url('assets/css/timeline.css') ?>">
      <div class="main-content">
      	<section class="section">
      		<div class="section-header">
      			<h1><?= $title ?></h1>
      		</div>

      		<div class="section-body">
      			<h2 class="section-title">Brawijaya Riset dan Inovasi</h2>
      			<p class="section-lead">Halaman untuk mengelola <?= $title ?>.</p>
      			<div class="row">
      				<div class="col-12">
      					<div class="card">
      						<div class="card-body row" id="kompetensi">
      							<div class="container">
      								<div class="row align-items-center mb-3">
      									<div class="col-md-6">
      										<h4>Roadmap Pengisian Produk</h4>
      									</div>
      									<div class="col-md-6">
      										<button class="btn btn-icon icon-left btn-primary d-block mr-md-0 ml-md-auto">
      											<i class="fa fa-save"></i>
      											Ajukan validasi produk</button>
      									</div>
      								</div>
      								<div class="alert alert-light alert-has-icon">
      									<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
      									<div class="alert-body">
      										<div class="alert-title">Petunjuk pengisian</div>
      										Pengisian tidak harus dilakukan hingga tahap terakhir, kamu bisa mengajukan validasi produkmu setelah pengisian dari tahap berapapun agar produk dapat ditampilkan pada website utama BRAIN
      									</div>
      								</div>

      								<div class="row">
      									<div class="col-md-12">
      										<div class="main-timeline7">
      											<div class="timeline">
      												<a href="<?= base_url() . 'admin/produk/' . $slug ?>">
      													<div class="timeline-icon"><i class="fa fa-box"></i></div>
      												</a>
      												<span class="year">Tahap 1 <i class="fa fa-check"></i> </span>
      												<div class="timeline-content">
      													<h5 class="title">Data dasar produk</h5>
      													<p class="description">
      														Lengkapi data dasar produk kamu
      													</p>
      												</div>
      											</div>
      											<div class="timeline">
      												<a href="<?= base_url() . 'admin/roadmap/' . $slug ?>">
      													<div class="timeline-icon"><i class="fa fa-bolt"></i></div>
      												</a>
      												<span class="year">Tahap 2 <i class="fa fa-check"></i></span>
      												<div class="timeline-content">
      													<h5 class="title">Roadmap Riset dan Pengembangan Produk</h5>
      													<p class="description">
      														Bagaimana pengembangan produk kamu kedepannya?
      													</p>
      												</div>
      											</div>
      											<div class="timeline">
      												<a href="<?= base_url() . 'admin/testing/' . $slug ?>">
      													<div class="timeline-icon"><i class="fa fa-vial"></i></div>
      												</a>
      												<span class="year">Tahap 3</span>
      												<div class="timeline-content">
      													<h5 class="title">Pengujian Produk</h5>
      													<p class="description">
      														Apakah produkmu sudah pernah diujikan?
      													</p>
      												</div>
      											</div>
      											<div class="timeline">
      												<a href="<?= base_url() . 'admin/ki/' . $slug ?>">
      													<div class="timeline-icon"><i class="fa fa-lightbulb"></i></div>
      												</a>
      												<span class="year">Tahap 4</span>
      												<div class="timeline-content">
      													<h5 class="title">Kekayaan Intelektual</h5>
      													<p class="description">
      														Apa saja kekayaan intelektual produk kamu?
      													</p>
      												</div>
      											</div>

      											<div class="timeline">
      												<a href="<?= base_url() . 'admin/sertifikasi/' . $slug ?>">
      													<div class="timeline-icon"><i class="fa fa-certificate"></i></div>
      												</a>
      												<span class="year">Tahap 5</span>
      												<div class="timeline-content">
      													<h5 class="title">Sertifikasi</h5>
      													<p class="description">
      														Hayoo sertifikasinya jangan lupa
      													</p>
      												</div>
      											</div>

      											<div class="timeline">
      												<a href="<?= base_url() . 'admin/izin/' . $slug ?>">
      													<div class="timeline-icon"><i class="fa fa-check-circle"></i></div>
      												</a>
      												<span class="year">Tahap 6</span>
      												<div class="timeline-content">
      													<h5 class="title">Izin</h5>
      													<p class="description">
      														Udah punya izin belum?
      													</p>
      												</div>

      											</div>


      											<div class="timeline">
      												<a href="<?= base_url() . 'admin/foto/' . $slug ?>">
      													<div class="timeline-icon"><i class="fa fa-camera"></i></div>
      												</a>
      												<span class="year">Tahap 7</span>
      												<div class="timeline-content">
      													<h5 class="title">Foto Produk</h5>
      													<p class="description">
      														Tunjukkan kekecean produkmu
      													</p>
      												</div>
      											</div>
      											<div class="timeline">
      												<a href="<?= base_url() . 'admin/kegiatan/' . $slug ?>">
      													<div class="timeline-icon"><i class="fa fa-camera"></i></div>
      												</a>
      												<span class="year">Tahap 8</span>
      												<div class="timeline-content">
      													<h5 class="title">Foto Kegiatan</h5>
      													<p class="description">
      														Udah pernah ngapain aja sih produkmu
      													</p>
      												</div>
      											</div>

      											<div class="timeline">
      												<a href="<?= base_url() . 'admin/inventor/' . $slug ?>">
      													<div class="timeline-icon"><i class="fa fa-users"></i></div>
      												</a>
      												<span class="year">Tahap 9</span>
      												<div class="timeline-content">
      													<h5 class="title">Inventor</h5>
      													<p class="description">
      														Siapa saja inventor produk kamu?
      													</p>
      												</div>
      											</div>

      											<div class="timeline">
      												<a href="<?= base_url() . 'admin/perusahaan/' . $slug ?>">
      													<div class="timeline-icon"><i class="fa fa-briefcase"></i></div>
      												</a>
      												<span class="year">Tahap 10</span>
      												<div class="timeline-content">
      													<h5 class="title">Data Perusahaan</h5>
      													<p class="description">
      														Bagaimana kondisi internal perusahaanmu?
      													</p>
      												</div>
      											</div>
      											<div class="timeline">
      												<div class="timeline-icon"><i class="fa fa-chart-bar"></i></div>
      												<span class="year">Tahap 11</span>
      												<div class="timeline-content">
      													<h5 class="title">Data Bisnis</h5>
      													<p class="description">
      														Bagaimana kondisi bisnismu?
      													</p>
      												</div>
      											</div>



      										</div>
      									</div>
      								</div>
      							</div>
      						</div>
      					</div>

      				</div>
      			</div>

      		</div>
      	</section>
      </div>

      <div class="modal fade" id="view">
      	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
      		<div class="modal-content">
      			<div class="modal-header">
      				<h5 class="modal-title" id="exampleModalLabel">Detail <?= $title ?></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      			</div>
      			<!-- <form id="form-password" name="form-password" method="post"> -->
      			<input type="text" class="form-control" id="view-id" name="view-id" hidden readonly>
      			<div class="modal-body row" id="form-data">
      				<div class="col-sm-4 border-right">
      				</div>
      				<div class="col-sm-8">
      					<div class="form-group">
      						<label for="old_password">Password lama</label>
      						<input type="password" class="form-control" id="old_password" name="old_password">
      					</div>
      					<div class="form-group">
      						<label for="new_password">Password baru</label>
      						<input type="password" class="form-control" id="new_password" name="new_password">
      					</div>
      					<div class="form-group">
      						<label for="password_confirmation">Konfirmasi password baru</label>
      						<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
      					</div>
      				</div>
      			</div>
      			<div class="modal-footer">
      				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
      				<button type="submit" class="btn btn-info" id="btn-change">Simpan</button>
      			</div>
      			<!-- </form> -->
      		</div>

      	</div>
      </div>
      <script>
      	$('#btn-change_password').click(function(e) {
      		$('#view').modal('show');
      	});
      	$('#btn-save').click(function(e) {
      		swal('Success !', 'data berhasil diperbarui', 'success');
      	});
      	$('#btn-change').click(function(e) {
      		swal('Success !', 'password berhasil diperbarui', 'success');
      		$('#view').modal('hide');
      	});
      </script>