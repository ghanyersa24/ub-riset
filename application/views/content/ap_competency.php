<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
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
						<div class="card-header">
							<h4>Logo produk</h4>
						</div>
						<div class="my-3">
							<img class="w-50 rounded-circle" src="https://www.blexar.com/avatar.png" alt="gambar profil">
						</div>
						<p class="h5 text-capitalize pb-3" id="name"> Product Inovation I </p>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-7">
					<div class="card">
						<!-- <form id="form-view" method="post"> -->
						<div class="card-header">
							<h4>Detail Product</h4>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="view-name">Keunikan produk</label>
								<textarea name="spesifikasi" id="spesifikasi" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="view-name">Kesiapan Produk</label><select class="custom-select">
									<option selected disabled>Pilih salah satu</option>
									<option value="1">Perlu Riset</option>
									<option value="2">pengembangan </option>
									<option value="3">sudah siap komersil</option>
								</select>
							</div>
							<div class="form-group">
								<label for="view-name">Kepemilikan teknologi</label>
								<input type="text" class="form-control" id="view-name" name="name" value="UB Riset Administrator">
							</div>
							<div class="form-group">
								<label for="view-name">Spesifikasi Teknis Produk</label>
								<textarea name="spesifikasi" id="spesifikasi" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="view-name">Kepemilikan Kekayaan Intelektual </label><select class="custom-select">
									<option selected disabled>Pilih salah satu</option>
									<option value="1">paten</option>
									<option value="2">hak cipta</option>
									<option value="3">desain industri</option>
									<option value="3">desain tata letak dan sirkuit terpadu</option>
									<option value="3">merk dagang</option>
									<option value="3">rahasia dagang</option>
									<option value="3">belum punya</option>
								</select>
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
