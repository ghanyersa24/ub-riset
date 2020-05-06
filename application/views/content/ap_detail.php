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
      										<button id="btn-ajukan" class="btn btn-icon icon-left btn-primary d-block mr-md-0 ml-md-auto">
      											<i class="fa fa-save"></i>
      											Ajukan validasi produk</button>
      									</div>
      								</div>
      								<div class="alert alert-light alert-has-icon">
      									<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
      									<div class="alert-body">
      										<div class="alert-title">Petunjuk pengisian</div>
      										Pengisian tidak harus dilakukan hingga tahap terakhir, kamu bisa mengajukan validasi produkmu setelah pengisian dari tahap berapapun agar produk dapat ditampilkan pada website utama Brawijaya Riset dan Inovasi.
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
      												<a href="<?= base_url() . 'admin/bisnis/' . $slug ?>">
      													<div class="timeline-icon"><i class="fa fa-chart-bar"></i></div>
      												</a>
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
      <script>
      	$(document).ready(function() {

      		$('#btn-ajukan').click(function(e) {
      			e.preventDefault();
      			swal({
      					title: "Apakah kamu yakin?",
      					icon: "info",
      					text: 'mengajukan produk untuk divalidasi!',
      					content: {
      						element: "input",
      						attributes: {
      							placeholder: "ketikan id UB kamu!",
      							type: "number",
      							className: "text-center form-control",
      						},
      					},
      					buttons: true,
      				})
      				.then(pass => {
      					if (!pass) throw null;
      					$.ajax({
      						type: "POST",
      						url: api + 'service/pengajuan/create',
      						data: {
      							slug: '<?= $slug ?>',
      							auth: pass
      						},
      						success: function(response) {
      							response_alert(response)
      						}
      					});
      				})
      			// swal({
      			// 		title: "Apakah kamu yakin?",
      			// 		text: "akan mengajukan validasi dalam produk ini!",
      			// 		icon: "info",
      			// 		buttons: true,
      			// 	})
      			// 	.then((willSave) => {
      			// 		if (willSave) {
      			// 			$.ajax({
      			// 				type: "POST",
      			// 				url: api + 'service/inventor/create',
      			// 				data: {
      			// 					slug: <?= $slug ?>,
      			// 				},
      			// 				success: function(response) {
      			// 					response_alert(response)
      			// 					if (!response.error)
      			// 						getList()
      			// 				}
      			// 			})
      			// 		}
      			// 	})

      		});
      	});
      </script>
