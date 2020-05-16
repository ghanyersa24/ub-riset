<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header d-block justify-content-start align-items-center">
			<a href="<?= base_url('admin/detail/' . $slug) ?>"><i class="fa fa-chevron-left h5"></i>
			</a>
			<h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
		</div>


		<div class="section-body">
			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card ">

						<div class="card-body">
							<div class="tabs">
								<input type="radio" id="tab1" name="tab-control" checked>
								<input type="radio" id="tab2" name="tab-control">
								<input type="radio" id="tab3" name="tab-control">
								<input type="radio" id="tab4" name="tab-control">

								<ul>
									<li title="data dasar">
										<label for="tab1" role="button" id="tabs-profil">
											<i class="fas fa-stream"></i>
											<br><span>Data Dasar</span>
										</label>
									</li>
									<li title="pemasaran">
										<label for="tab2" role="button" id="tabs-pengurus">
											<i class="fa fa-bullhorn"></i>
											<br><span>Pemasaran</span>
										</label>
									</li>
									<li title="produksi">
										<label for="tab3" role="button" id="tabs-kepemilikan">
											<i class="fas fa-dice-d6"></i>
											<br><span>Produksi</span>
										</label>
									</li>
									<li title="penjualan & omset">
										<label for="tab4" role="button" id="tabs-aset">
											<i class="fas fa-poll"></i>
											<br><span>Penjualan & Omset</span>
										</label>
									</li>

								</ul>
								<div class="slider">
									<div class="indicator"></div>
								</div>
								<div class="content">
									<section id="tab-profil">
										<form id="form-view-data">
											<button class="btn btn-primary d-block mr-0 mb-4" type="submit">Simpan Data Dasar</button>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<input id="view-id" class="form-control" type="text" name="id" hidden readonly>
														<label for="view-status_usaha" class="">Status Usaha </label>
														<select id="view-status_usaha" class="form-control" name="status_usaha">
															<option value="Masih Berjalan">Masih Berjalan</option>
															<option value="Sudah Berhenti">Sudah Berhenti</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="view-target_pasar">Target Pasar <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Penjelasan mengenai target pasar yang akan dituju">!</span></label>
														<textarea class="form-control" id="view-target_pasar" name="target_pasar"></textarea>

													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="view-kompetitor">Kompetitor <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Identifikasi kompetitor serta perbandingan antara produk anda dengan kompetitor">!</span></label>
														<textarea class="form-control" id="view-kompetitor" name="kompetitor"></textarea>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="view-jangkauan_pemasaran">Jangkauan Pemasaran<span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Penjelasan jangkauan pemasaran">!</span></label>
														<textarea class="form-control" id="view-jangkauan_pemasaran" name="jangkauan_pemasaran"></textarea>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="view-kanal_pemasaran">Kanal Pemasaran <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Misal (public relation, social media, digital advertising, offline promo, dsb)">!</span></label>
														<textarea type="number" class="form-control" id="view-kanal_pemasaran" name="kanal_pemasaran"></textarea>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="view-dampak_sosial">Dampak Sosial <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Dampak sosial yang dihasilkan oleh produk">!</span></label>
														<textarea type="number" class="form-control" id="view-dampak_sosial" name="dampak_sosial"></textarea>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="view-skema_harga">Skema Harga <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Skema harga yang digunakan">!</span></label>
														<textarea type="number" class="form-control" id="view-skema_harga" name="skema_harga"></textarea>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="view-harga_pokok">Harga Pokok Produksi <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Penjelasan HPP">!</span></label>
														<input type="number" class="form-control" id="view-harga_pokok" name="harga_pokok">
													</div>
												</div>

											</div>
										</form>
									</section>

									<section id="tab-pemasaran">
										<div id="pemasaran-wrap">
											<div class="table-responsive">
												<table class="table table-striped w-100" id="table-pemasaran">
													<thead>
														<tr>
															<th class="text-center">
																No.
															</th>
															<th>Jenis jangkauan pemasaran</th>
															<th>Volume pemasaran</th>
															<th>Nilai pemasaran</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th class="text-center">

															</th>
															<th></th>
															<th></th>
															<th></th>
															<th></th>

														</tr>
													</tfoot>
												</table>
											</div>
										</div>
										<form id="form-add-pemasaran">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-jangkauan_pemasaran">Jenis Jangkauan Pemasaran</label>
														<select name="jangkauan_pemasaran" id="add-jangkauan_pemasaran" class="form-control">
															<option value="Regional">Regional</option>
															<option value="Nasional">Nasional</option>
															<option value="Ekspor">Ekspor</option>
														</select>

													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-volume_pemasaran">Volume Pemasaran <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jumlah volume produk yang dipasarkan hingga saat ini">!</span></label>
														<input type="text" class="form-control" id="view-volume_pemasaran" name="volume_pemasaran">
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-nilai_pemasaran">Nilai Pemasaran <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Nilai penjualan produk yang dipasarkan hingga saat ini">!</span></label>
														<input type="text" class="form-control" id="add-nilai_pemasaran" name="nilai_pemasaran">
													</div>

												</div>
												<div class="col-md-6">
													<div class="h-100 d-flex align-items-center">
														<button class="btn btn-primary" type="submit">Tambah Data Pemasaran</button>
													</div>
												</div>
											</div>
										</form>
									</section>
									<section id="tab-aset">
										<div class="table-responsive">
											<table class="table table-striped w-100" id="table-produksi">
												<thead>
													<tr>
														<th class="text-center">
															No.
														</th>
														<th>Jenis Periode</th>
														<th>Tahun Produksi</th>
														<th>Jumlah Produksi</th>

														<th>Aksi</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th class="text-center">

														</th>
														<th></th>
														<th></th>
														<th></th>

													</tr>
												</tfoot>
											</table>
										</div>
										<form id="form-add-produksi">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-jenis_periode_produksi">Jenis Periode</label>
														<select name="jenis_periode_produksi" id="add-jenis_periode_produksi" class="form-control">
															<option value="Perolehan">Perolehan</option>
															<option value="Proyeksi">Proyeksi</option>

														</select>

													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-tahun_produksi">Tahun Produksi</label>
														<input type="text" class="form-control" id="add-tahun_produksi" name="tahun_produksi">
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-jumlah_produksi">Jumlah Produksi</label>
														<input type="text" class="form-control" id="add-jumlah_produksi" name="jumlah_produksi">
													</div>
												</div>
												<div class="col-md-6">
													<div class="h-100 d-flex align-items-center">
														<button class="btn btn-primary" type="submit">Tambah Data Produksi</button>
													</div>
												</div>
											</div>
										</form>
									</section>
									<section id="tab-penjualan">
										<div id="penjualan-wrap">
											<h4>Data Penjualan</h4>
											<div class="table-responsive">
												<table class="table table-striped w-100" id="table-penjualan">
													<thead>
														<tr>
															<th class="text-center">
																No.
															</th>
															<th>Jenis Periode</th>
															<th>Tahun Penjualan</th>
															<th>Jumlah Penjualan</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th class="text-center">

															</th>
															<th></th>
															<th></th>
															<th></th>
															<th></th>

														</tr>
													</tfoot>
												</table>
											</div>
										</div>
										<form id="form-add-penjualan">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-jenis_periode_penjualan">Jenis Periode</label>
														<select name="jenis_periode_penjualan" id="add-jenis_periode_penjualan" class="form-control">
															<option value="Perolehan">Perolehan</option>
															<option value="Proyeksi">Proyeksi</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-tahun_penjualan">Tahun Penjualan</label>
														<input type="number" class="form-control" id="add-tahun_penjualan" name="tahun_penjualan">
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-jumlah_penjualan">Jumlah Penjualan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jumlah unit produk yang terjual">!</span></label>
														<input type="text" class="form-control" id="add-jumlah_penjualan" name="jumlah_penjualan">
													</div>

												</div>
												<div class="col-md-6">
													<div class="h-100 d-flex align-items-center">
														<button class="btn btn-primary" type="submit">Tambah Data Penjualan</button>
													</div>
												</div>
											</div>
										</form>
										<div class="py-4"></div>
										<div id="omset-wrap">
											<h4>Data Omset/Profit</h4>
											<div class="table-responsive">
												<table class="table table-striped w-100" id="table-omset">
													<thead>
														<tr>
															<th class="text-center">
																No.
															</th>
															<th>Jenis Periode</th>
															<th>Tipe</th>
															<th>Jenis omset / profit</th>
															<th>Tahun</th>
															<th>Nilai</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tfoot>
														<tr>
															<th class="text-center">

															</th>
															<th></th>
															<th></th>
															<th></th>
															<th></th>
															<th></th>

														</tr>
													</tfoot>
												</table>
											</div>
										</div>
										<form action="">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-jenis_periode_omset">Jenis Periode</label>
														<select name="jenis_periode_omset" id="add-jenis_periode_omset" class="form-control">
															<option value="Perolehan">Perolehan</option>
															<option value="Proyeksi">Proyeksi</option>

														</select>

													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-tipe_omset">Tipe Omset/Profit</label>
														<select name="tipe_omset" id="add-tipe_omset" class="form-control">
															<option value="Omset">Omset</option>
															<option value="Profit">Profit</option>

														</select>

													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-jenis_omset">Jenis Omset/Profit</label>
														<select name="jenis_omset" id="add-jenis_omset" class="form-control">
															<option value="Perusahaan">Perusahaan</option>
															<option value="Produk (yang diajukan)">Produk (yang diajukan)</option>

														</select>

													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="view-tahun_omset">Tahun Omset/Profit</label>
														<input type="number" class="form-control" id="view-tahun_omset" name="tahun_omset">
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="view-nilai_omset">Nilai Omset</label>
														<input type="number" class="form-control" id="view-nilai_omset" name="nilai_omset">
													</div>

												</div>
												<div class="col-md-6">
													<div class="h-100 d-flex align-items-center">
														<button class="btn btn-primary" type="submit">Tambah Data Omset/Profit</button>
													</div>
												</div>
											</div>
										</form>
									</section>
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
		// pemasaran
		$('#table-pemasaran').DataTable({
			"ajax": api + 'service/pemasaran/get/<?= $id ?>',
			"columns": [{
				"render": function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				},
				className: "text-center"
			}, {
				"data": "jangkauan"
			}, {
				"data": "volume_pemasaran"
			}, {
				"data": "nilai_pemasaran"
			}, {
				"render": function(data, type, JsonResultRow, meta) {
					return `<button class="btn btn-primary btn-view"><i class="fa fa-eye"></i> Detail </button>`
				}
			}]
		});
		// produksi
		$('#table-produksi').DataTable({
			"ajax": api + 'service/produksi/get/<?= $id ?>',
			"columns": [{
				"render": function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				},
				className: "text-center"
			}, {
				"data": "jenis"
			}, {
				"data": "tahun"
			}, {
				"data": "jumlah"
			}, {
				"render": function(data, type, JsonResultRow, meta) {
					return `
						<button class="btn btn-primary btn-view"><i class="fa fa-eye"></i> Detail </button>`
				}
			}]
		});
		// penjualan
		$('#table-penjualan').DataTable({
			"ajax": api + 'service/penjualan/get/<?= $id ?>',
			"columns": [{
				"render": function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				},
				className: "text-center"
			}, {
				"data": "jenis"
			}, {
				"data": "tahun"
			}, {
				"data": "jumlah"
			}, {
				"render": function(data, type, JsonResultRow, meta) {
					return `<button class="btn btn-primary btn-view"><i class="fa fa-eye"></i> Detail </button>`
				}
			}]
		});
		// omset
		$('#table-omset').DataTable({
			"ajax": api + 'service/omset/get/<?= $id ?>',
			"columns": [{
				"render": function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				},
				className: "text-center"
			}, {
				"data": "jenis"
			}, {
				"data": "tipe"
			}, {
				"data": "jenis_omset"
			}, {
				"data": "tahun"
			}, {
				"data": "nilai"
			}, {
				"render": function(data, type, JsonResultRow, meta) {
					return `<button class="btn btn-primary btn-view"><i class="fa fa-eye"></i> Detail </button>`
				}
			}]
		});
	})
</script>
