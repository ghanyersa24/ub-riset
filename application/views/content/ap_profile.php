      <!-- Main Content -->

      <div class="main-content">
      	<section class="section">
      		<div class="section-header">
      			<h1><?= $title ?></h1>
      		</div>
      		<div class="section-body">
      			<div class="row mt-sm-4">
      				<div class="col-12 col-md-12 col-lg-5">
      					<div class="card text-center">
      						<div class="my-3">
      							<img class="w-50 rounded-circle" src="https://www.blexar.com/avatar.png" alt="gambar profil">
      						</div>
      						<p class="h5 text-capitalize" id="name"></p>
      						<button class="btn btn-light btn-lg" type="button" id="btn-change_password">Ganti Password</button>
      					</div>
      				</div>
      				<div class="col-12 col-md-12 col-lg-7">
      					<div class="card">
      						<!-- <form id="form-view" method="post"> -->
      						<div class="card-header">
      							<h4>Edit Profile</h4>
      						</div>
      						<div class="card-body">
      							<div class="form-group">
      								<label for="view-name">Nama Lengkap</label>
      								<input type="text" class="form-control" id="view-name" name="name" value="UB Riset Administrator">
      							</div>
      							<div class="form-group">
      								<label for="view-contact">Kontak</label>
      								<input type="number" class="form-control" id="view-contact" name="contact" value="082164028264">
      							</div>
      							<div class="form-group">
      								<label for="view-name">Email</label>
      								<input type="email" class="form-control" id="view-email" name="email" value="riset@ub.ac.id">
      							</div>
      						</div>
      						<div class="card-footer text-right">
      							<button class="btn btn-primary" id="btn-save">Simpan Perubahan</button>
      						</div>
      						<!-- </form> -->
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
