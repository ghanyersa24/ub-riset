      <!-- Main Content -->

      <div class="main-content">
      	<section class="section">
      		<div class="section-header d-block justify-content-start align-items-center">
      			<h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
      		</div>
      		<div class="section-body">
      			<div class="row mt-sm-4">
      				<div class="col-12 col-md-12 col-lg-5">
      					<div class="card text-center">
      						<div class="my-3">
      							<img class="rounded" style="height: 250px; width: 250px; object-fit:cover" src="<?= $this->session->userdata('foto'); ?>" alt="gambar profil">
      						</div>
      						<p class="h5 text-capitalize" id="name"><?= $this->session->userdata('nama'); ?></p>
      						<p class="h5 text-capitalize" id="fakultas"><?= $this->session->userdata('fakultas'); ?></p>
      						<span class="bg-light mt-2 py-3 rounded-top text-center"> Brawijaya Research and Innovation</span>
      					</div>
      				</div>
      				<div class="col-12 col-md-12 col-lg-7">
      					<div class="card">
      						<form id="form-view" name="form-view" method="post">
      							<div class="card-header">
      								<h4>Edit Profile</h4>
      							</div>
      							<div class="card-body">
      								<label for="view-name">Email</label>
      								<p class="font-weight-bold"><?= $this->session->userdata('email'); ?></p>
      								<div class="form-group">
      									<label for="view-tanggal_lahir">Tanggal Lahir </label>
      									<input name="tanggal_lahir" id="view-tanggal_lahir" class="form-control datepicker" type="text" value="<?= $this->session->userdata('tanggal_lahir'); ?>">
      								</div>
      								<div class=" form-group">
      									<label for="view-contact">Kontak</label>
      									<input type="number" class="form-control" id="view-kontak" name="kontak" value="<?= $this->session->userdata('kontak'); ?>">
      								</div>
      								<!-- <div class="form-group">
      									<label for="view-pendidikan_terakhir">Pendidikan Terakhir</label>
      									<select class="custom-select" name="pendidikan_terakhir" value="D1">
      										<option value="SMA/Sederajat">SMA/Sederajat</option>
      										<option value="D1">D1</option>
      										<option value="D2">D2</option>
      										<option value="D3">D3</option>
      										<option value="S1">S1</option>
      										<option value="S2">S2</option>
      										<option value="S3">S3</option>
      									</select>
      								</div> -->
      							</div>
      							<div class="card-footer text-right">
      								<button class="btn btn-primary" id="btn-save" type="submit">Simpan Perubahan</button>
      							</div>
      						</form>
      					</div>
      				</div>
      			</div>
      		</div>
      	</section>
      </div>
      <script>
      	$('#form-view').validate({
      		rules: {
      			tanggal_lahir: {
      				required: true,
      			},
      			kontak: {
      				required: true,
      			},
      			email: {
      				required: true
      			},
      		},
      		submitHandler: function(form) {
      			$.ajax({
      				type: "POST",
      				url: api + 'account/update',
      				data: $('#form-view').serialize(),
      				dataType: "json",
      				success: function(response) {
      					response_alert(response)
      				}
      			});
      		}
      	})
      </script>