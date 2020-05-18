<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header d-block justify-content-start align-items-center">
			<a href="<?= base_url('admin/detail/' . $slug) ?>" class="h5"><i class="fa fa-chevron-left"></i>
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
								<div class="alert alert-dark alert-has-icon mt-4 alert-dismissible" role="alert">
									<div class="alert-icon"><i class="fa fa-info-circle"></i></div>
									<div class="alert-body">
										<div class="alert-title">Petunjuk pengisian</div>
										Pastikan kamu mengisi data bisnis produkmu dengan lengkap
										<div>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
									</div>
								</div>
								<div class="content">
									<section id="tab-profil">
										<form id="form-view-data">

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<input id="view-id" class="form-control" type="text" name="id" hidden readonly>
														<input class="form-control" type="text" name="produk_id" value="<?= $id ?>" hidden readonly>
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
														<label for="view-jangkauan">Jangkauan Pemasaran<span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Penjelasan jangkauan pemasaran">!</span></label>
														<textarea class="form-control" id="view-jangkauan" name="jangkauan"></textarea>
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
														<label for="view-harga_produksi">Harga Pokok Produksi <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Penjelasan HPP">!</span></label>
														<textarea name="harga_produksi" id="view_harga_produksi"></textarea>

													</div>
													<button class="btn btn-primary d-block mr-0 mb-4 ml-auto" type="submit">Simpan Data Dasar</button>
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
										<form id="form-pemasaran">
											<input class="form-control" type="number" name="produk_id" value="<?= $id ?>" hidden readonly>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-jangkauan">Jenis Jangkauan Pemasaran</label>
														<select name="jangkauan" id="add-jangkauan" class="form-control">
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
														<input type="text" data-type="currency" class="form-control" id="add-nilai_pemasaran" name="nilai_pemasaran">
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
										<div class="alert alert-dark alert-has-icon mt-2 alert-dismissible" role="alert">
											<div class="alert-icon"><i class="fa fa-info-circle"></i></div>
											<div class="alert-body">
												<div class="alert-title">Petunjuk Pengisian Produksi</div>
												Isikan data produksi 2 tahun kebelakang dan 3 tahun kedepan
												<div>
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												</div>
											</div>
										</div>
										<div class="table-responsive">
											<table class="table table-striped w-100" id="table-produksi">
												<thead>
													<tr>
														<th class="text-center">
															No.
														</th>
														<th>Tahun Produksi</th>
														<th>Jumlah Produksi</th>
														<th>Satuan</th>

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
										<form id="form-produksi">
											<input class="form-control" type="text" name="produk_id" value="<?= $id ?>" hidden readonly>
											<div class="row">

												<div class="col-md-6">
													<div class="form-group">
														<label for="add-tahun">Tahun Produksi</label>
														<input type="number" class="form-control" id="add-tahun" name="tahun">
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-jumlah">Jumlah Produksi</label>
														<input type="text" data-type="without-currency" class="form-control" id="add-jumlah" name="jumlah">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-satuan">Satuan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Contoh: Kilogram, Meter, dll">!</span></label>
														<input type="text" name="satuan" id="add-satuan" class="form-control">

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
										<div class="alert alert-dark alert-has-icon mt-2 alert-dismissible" role="alert">
											<div class="alert-icon"><i class="fa fa-info-circle"></i></div>
											<div class="alert-body">
												<div class="alert-title">Petunjuk Pengisian Penjualan & omset</div>
												Isikan data penjualan & omset 2 tahun kebelakang dan proyeksi 3 tahun kedepan
												<div>
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												</div>
											</div>
										</div>
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
										<form id="form-penjualan">
											<input class="form-control" type="text" name="produk_id" value="<?= $id ?>" hidden readonly>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-jenis">Jenis Periode</label>
														<select name="jenis" id="add-jenis" class="form-control">
															<option value="Perolehan">Perolehan</option>
															<option value="Proyeksi">Proyeksi</option>
														</select>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-tahun">Tahun Penjualan</label>
														<input type="number" class="form-control" id="add-tahun" name="tahun">
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="add-jumlah">Jumlah Penjualan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jumlah unit produk yang terjual">!</span></label>
														<input type="text" data-type="without-currency" class="form-control" id="add-jumlah" name="jumlah">
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

															<th>Tipe</th>

															<th>Tahun</th>
															<th>Nilai</th>
															<th>Aksi</th>
														</tr>
													</thead>

												</table>
											</div>
										</div>
										<form id="form-omset">
											<input class="form-control" type="text" name="produk_id" value="<?= $id ?>" hidden readonly>
											<div class="row">

												<div class="col-md-6">
													<div class="form-group">
														<label for="add-tipe">Tipe Omset/Profit</label>
														<select name="tipe" id="add-tipe" class="form-control">
															<option value="Omset">Omset</option>
															<option value="Profit">Profit</option>

														</select>

													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label for="view-tahun">Tahun Omset/Profit</label>
														<input type="number" class="form-control" id="view-tahun" name="tahun">
													</div>

												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="view-nilai">Nilai Omset</label>
														<input type="text" data-type="currency" class="form-control" id="view-nilai" name="nilai">
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
						<div class="card-footer d-flex justify-content-end">
							<a href="<?= base_url() . 'admin/perusahaan_select/' . $slug ?>">
								<button class="btn btn-icon icon-left"><i class="fa fa-chevron-left"></i> Sebelumnya</button>
							</a>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>


<script>
	$(document).ready(function() {
		triggerEditor('#form-view-data')
		// Data dasar
		$.ajax({
			type: "GET",
			url: api + "service/datadasar/get/<?= $id ?>",
			success: function(response) {
				let data = response.data
				$('#view-id').val(data.id)
				$('#view-status_usaha').val(data.status_usaha)
				$('#view-harga_produksi').val(data.harga_produksi)
				setEditor('view-target_pasar', data.target_pasar)
				setEditor('view-kompetitor', data.kompetitor)
				setEditor('view-jangkauan', data.jangkauan)
				setEditor('view-kanal_pemasaran', data.kanal_pemasaran)
				setEditor('view-dampak_sosial', data.dampak_sosial)
				setEditor('view-skema_harga', data.skema_harga)
			}
		});
		$('#form-view-data').validate({
			submitHandler: (form) => {
				$.ajax({
					type: "POST",
					url: api + "service/datadasar/create",
					data: $('#form-view-data').serialize(),
					success: function(response) {
						response_alert(response)
						if (!response.error)
							$('#view-id').val(response.data.id)
					}
				});
			}
		})
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
					return `<button class="btn btn-light btn-delete mr-1"><i class="fas fa-trash"></i></button>`
				}
			}]
		});
		$('#form-pemasaran').validate({
			submitHandler: (form) => {
				$.ajax({
					type: "POST",
					url: api + "service/pemasaran/create",
					data: $("#form-pemasaran").serialize(),
					success: function(response) {
						response_alert(response)
						if (!response.error) {
							$('#form-pemasaran').trigger('reset')
							$('#table-pemasaran').dataTable().api().ajax.reload()
						}
					}
				});
			}
		})
		$('#table-pemasaran tbody').on('click', '.btn-delete', function() {
			var data = $('#table-pemasaran').DataTable().row($(this).parents('tr')).data()
			swal({
					title: "Apakah Kamu yakin?",
					text: "menghapus data pemasaran <?= $title ?> ini secara permanen!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							type: "POST",
							url: api + 'service/pemasaran/delete',
							data: {
								id: data.id,
							},
							success: function(response) {
								response_alert(response)
								if (!response.error)
									$('#table-pemasaran').dataTable().api().ajax.reload()
							}
						})
					}
				})
		})
		// produksi
		$('#table-produksi').DataTable({
			"ajax": api + 'service/produksi/get/<?= $id ?>',
			"columns": [{
				"render": function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				},
				className: "text-center"
			}, {
				"data": "tahun"
			}, {
				"data": "jumlah"
			}, {
				"data": "satuan"
			}, {
				"render": function(data, type, JsonResultRow, meta) {
					return `
						<button class="btn btn-light btn-delete mr-1"><i class="fas fa-trash"></i></button>`
				}
			}]
		});
		$('#form-produksi').validate({
			submitHandler: (form) => {
				$.ajax({
					type: "POST",
					url: api + "service/produksi/create",
					data: $("#form-produksi").serialize(),
					success: function(response) {
						response_alert(response)
						if (!response.error) {
							$('#form-produksi').trigger('reset')
							$('#table-produksi').dataTable().api().ajax.reload()
						}
					}
				});
			}
		})
		$('#table-produksi tbody').on('click', '.btn-delete', function() {
			var data = $('#table-produksi').DataTable().row($(this).parents('tr')).data()
			swal({
					title: "Apakah Kamu yakin?",
					text: "menghapus data produksi<?= $title ?> ini secara permanen!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							type: "POST",
							url: api + 'service/produksi/delete',
							data: {
								id: data.id,
							},
							success: function(response) {
								response_alert(response)
								if (!response.error)
									$('#table-produksi').dataTable().api().ajax.reload()
							}
						})
					}
				})
		})

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
					return `<button class="btn btn-light btn-delete mr-1"><i class="fas fa-trash"></i></button>`
				}
			}]
		});
		$('#form-penjualan').validate({
			submitHandler: (form) => {
				$.ajax({
					type: "POST",
					url: api + "service/penjualan/create",
					data: $("#form-penjualan").serialize(),
					success: function(response) {
						response_alert(response)
						if (!response.error) {
							$('#form-penjualan').trigger('reset')
							$('#table-penjualan').dataTable().api().ajax.reload()
						}
					}
				});
			}
		})
		$('#table-penjualan tbody').on('click', '.btn-delete', function() {
			var data = $('#table-penjualan').DataTable().row($(this).parents('tr')).data()
			swal({
					title: "Apakah Kamu yakin?",
					text: "menghapus data penjualan <?= $title ?> ini secara permanen!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							type: "POST",
							url: api + 'service/penjualan/delete',
							data: {
								id: data.id,
							},
							success: function(response) {
								response_alert(response)
								if (!response.error)
									$('#table-penjualan').dataTable().api().ajax.reload()
							}
						})
					}
				})
		})

		// omset
		$('#table-omset').DataTable({
			"ajax": api + 'service/omset/get/<?= $id ?>',
			"columns": [{
				"render": function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				},
				className: "text-center"
			}, {
				"data": "tipe"
			}, {
				"data": "tahun"
			}, {
				"data": "nilai"
			}, {
				"render": function(data, type, JsonResultRow, meta) {
					return `<button class="btn btn-light btn-delete mr-1"><i class="fas fa-trash"></i></button>`
				}
			}]
		});
		$('#form-omset').validate({
			submitHandler: (form) => {
				$.ajax({
					type: "POST",
					url: api + "service/omset/create",
					data: $("#form-omset").serialize(),
					success: function(response) {
						response_alert(response)
						if (!response.error) {
							$('#form-omset').trigger('reset')
							$('#table-omset').dataTable().api().ajax.reload()
						}
					}
				});
			}
		})
		$('#table-omset tbody').on('click', '.btn-delete', function() {
			var data = $('#table-omset').DataTable().row($(this).parents('tr')).data()
			swal({
					title: "Apakah Kamu yakin?",
					text: "menghapus data omset <?= $title ?> ini secara permanen!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							type: "POST",
							url: api + 'service/omset/delete',
							data: {
								id: data.id,
							},
							success: function(response) {
								response_alert(response)
								if (!response.error)
									$('#table-omset').dataTable().api().ajax.reload()
							}
						})
					}
				})
		})
	})
</script>