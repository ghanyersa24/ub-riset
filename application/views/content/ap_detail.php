      <!-- Main Content -->

      <div class="main-content">
      	<section class="section">
      		<div class="section-header">
      			<h1><?= $title ?></h1>
      		</div>

      		<div class="section-body">
      			<h2 class="section-title">Deskripsi Halaman</h2>
      			<p class="section-lead">Halaman untuk mengelola <?= $title ?>.</p>
      			<div class="row">
      				<div class="col-12">
      					<div class="card">
      						<div class="card-body row" id="kompetensi">
      							<div class="card col-sm-3 ">
      								<div class="card-body shadow rounded">
      									<a href="<?= base_url() ?>admin/competency/Product Inovation I" class="text-decoration-none text-dark">
      										<h5 class="card-title">Data Dasar Produk</h5>
      										<hr>
      										<p class="card-text">Merupakan data profil dari produk yang diusulkan untuk pengembangan produk inovasi.</p>
      									</a>
      								</div>
      							</div>
      							<div class="card col-sm-3 ">
      								<div class="card-body shadow rounded">
      									<a href="<?= base_url() ?>admin/competency/Product Inovation I" class="text-decoration-none text-dark">
      										<h5 class="card-title">Roadmap Riset</h5>
      										<hr>
      										<p class="card-text">Roadmap riset dan pengembangan Produk diisi mulai riset awal (dasar) hingga menjadi produk prototype. </p>
      									</a>
      								</div>
      							</div>

      							<div class="card col-sm-3 ">
      								<div class="card-body shadow rounded">
      									<a href="<?= base_url() ?>admin/competency/Product Inovation I" class="text-decoration-none text-info">
      										<h5 class="card-title">Pengujian Produk </h5>
      										<hr>
      										<p class="card-text">Data pengujian dari produk inovasi yang dikembangkan.</p>
      									</a>
      								</div>
      							</div>

      							<div class="card col-sm-3 ">
      								<div class="card-body shadow rounded">
      									<a href="<?= base_url() ?>admin/competency/Product Inovation I" class="text-decoration-none text-secondary">
      										<h5 class="card-title">Kekayaan Intelektual (KI) Produk </h5>
      										<hr>
      										<p class="card-text">Kekayaan Intelektual yang diisi pada formulir online adalah KI yang berkaitan dengan Produk Invensi yang diajukan.</p>
      									</a>
      								</div>
      							</div>

      							<div class="card col-sm-3 ">
      								<div class="card-body shadow rounded">
      									<a href="<?= base_url() ?>admin/competency/Product Inovation I" class="text-decoration-none text-secondary">
      										<h5 class="card-title">Sertifikasi Produksi</h5>
      										<hr>
      										<p class="card-text">Merupakan data sertifikasi produk inovasi yang dimiliki.</p>
      									</a>
      								</div>
      							</div>

      							<div class="card col-sm-3 ">
      								<div class="card-body shadow rounded">
      									<a href="<?= base_url() ?>admin/competency/Product Inovation I" class="text-decoration-none text-secondary">
      										<h5 class="card-title">Izin Produk</h5>
      										<hr>
      										<p class="card-text">Merupakan data perizinan produk inovasi.</p>
      									</a>
      								</div>
      							</div>

      							<div class="card col-sm-3 ">
      								<div class="card-body shadow rounded">
      									<a href="<?= base_url() ?>admin/competency/Product Inovation I" class="text-decoration-none text-secondary">
      										<h5 class="card-title">Inventor </h5>
      										<hr>
      										<p class="card-text">Merupakan dokumen sebagai adanya produk inovasi.</p>
      									</a>
      								</div>
      							</div>

      							<div class="card col-sm-3 ">
      								<div class="card-body shadow rounded">
      									<a href="<?= base_url() ?>admin/competency/Product Inovation I" class="text-decoration-none text-secondary">
      										<h5 class="card-title">Data Dasar Calon Perusahaan </h5>
      										<hr>
      										<p class="card-text">Merupakan data profile dari calon perusahaan.</p>
      									</a>
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
