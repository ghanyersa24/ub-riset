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
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-12 col-sm-12 col-md-4">
									<ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">Prestasi</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">Kerjasama</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">Informasi Terbaru</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="contact-tab4" data-toggle="tab" href="#file" role="tab" aria-controls="file" aria-selected="false">File Tambahan</a>
										</li>
									</ul>
								</div>
								<div class="col-12 col-sm-12 col-md-8">
									<div class="tab-content no-padding" id="myTab2Content">
										<div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
											<div class="table-responsive">
												<table class="table table-striped" id="table">
													<thead>
														<tr>
															<th class="text-center">
																No.
															</th>
															<th>Nama Acara</th>
															<th>Penyelenggara</th>
															<th>Tahun</th>
															<th>Tingkat</th>
															<th>Pencapaian</th>
															<th>Action</th>
														</tr>
													</thead>
												</table>
											</div>
											<br>
											<hr class="bg-primary">
											<form id="form-prestasi">
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="add-acara">Nama Acara</label>
															<input id="add-produk_id" class="form-control" type="number" name="produk_id" hidden readonly value="<?= $id ?>">
															<input type="text" id="add-nama_acara" name="nama_acara" class="form-control">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="add-penyelenggara">Penyelenggara</label>
															<input type="text" id="add-penyelenggara" name="penyelenggara" class="form-control">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="add-tahun">Tahun</label>
															<input type="number" id="add-tahun" name="tahun" class="form-control">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="add-tingkat">Tingkat</label>
															<input type="text" id="add-tingkat" name="tingkat" class="form-control">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label for="add-pencapaian">Pencapaian</label>
															<input type="text" id="add-pencapaian" name="pencapaian" class="form-control" placeholder="Contoh: Juara 4">
														</div>
													</div>
													<div class="col-md-6">
														<div class="h-100 align-items-center d-flex">
															<button class="btn btn-primary btn-icon icon-left ml-auto mr-0 d-block" type="submit"><i class="fa fa-plus"></i> Tambah Prestasi</button>
														</div>
													</div>
												</div>
											</form>
										</div>
										<div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
											<form id="form-kerjasama">
												<input id="add-id" class="form-control" type="number" name="id" hidden readonly value="<?= $id ?>">

												<div class="form-group">
													<label for="add-kerjasama">Kerjasama Yang Diharapkan</label>
													<textarea name="kerjasama" id="add-kerjasama" class="form-control"></textarea>
												</div>
												<button class="btn btn-primary btn-icon icon-left ml-auto mr-0 d-block" type="submit"><i class="fa fa-save"></i> Simpan Kerjasama</button>
											</form>
										</div>
										<div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
											<div class="table-responsive">
												<table class="table table-striped w-100" id="table-informasi">
													<thead>
														<tr>
															<th class="text-center">
																No.
															</th>
															<th>Tanggal</th>
															<th>Informasi</th>
															<th>Action</th>
														</tr>
													</thead>
												</table>
											</div>
											<br>
											<hr>
											<form id="form-informasi">
												<div class="form-group">
													<input id="add-produk_id" class="form-control" type="number" name="produk_id" hidden readonly value="<?= $id ?>">
													<label for="add-informasi">Informasi Terbaru Produk</label>
													<textarea name="informasi" id="add-informasi" class="form-control"></textarea>
												</div>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label for="add-tanggal">Tanggal</label>
															<input type="date" id="add-tanggal" name="tanggal" class="form-control">
														</div>
													</div>
													<div class="col-md-6">
														<div class="h-100 align-items-center d-flex">
															<button class="btn btn-primary btn-icon icon-left ml-auto mr-0 d-block" type="submit"><i class="fa fa-save"></i> Simpan Informasi</button>
														</div>
													</div>
												</div>
											</form>
										</div>
										<div class="tab-pane fade" id="file" role="tabpanel" aria-labelledby="profile-tab4">
											<form id="form-file_tambahan" class="form-file_tambahan">
												<input id="add-id" class="form-control" type="number" name="id" hidden readonly value="<?= $id ?>">
												<div class="form-group">
													<label for="add-file_tambahan">File Tambahan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="File tambahan berupa informasi penting lain yang tidak tercantum dalam pengisian formulir produk inovasi, dikirim berbentuk rar/zip maks 10mb">!</span></label>
													<input type="text" id="add-file_tambahan" class="form-control" hidden readonly>
													<input type="file" name="file_tambahan" id="add-file_tambahan_new" class="form-control">
												</div>
												<button class="btn btn-primary btn-icon icon-left ml-auto mr-0 d-block" type="submit"><i class="fa fa-save"></i> Simpan Kerjasama</button>
											</form>
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
		triggerEditor('#form-kerjasama')
		triggerEditor('#form-informasi')
		$.ajax({
			type: "GET",
			url: api + "service/produk/get/<?= $id ?>",
			success: function(response) {
				setEditor('add-kerjasama', response.data.kerjasama)
				$('#add-file_tambahan').val(response.data.file_tambahan)
			}
		});
		$('#table').DataTable({
			"ajax": api + 'service/prestasi/get/<?= $id ?>',
			"columns": [{
					"render": function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					},
					className: "text-center"
				}, {
					"data": "nama_acara"
				}, {
					"data": "penyelenggara"
				}, {
					"data": "tahun"
				}, {
					"data": "tingkat"
				}, {
					"data": "pencapaian"
				},
				{
					"render": function(data, type, JsonResultRow, meta) {
						return `<button class="btn btn-light btn-delete mr-1"><i class="fas fa-trash"></i></button>`
					}
				}
			]
		})
		$('#table-informasi').DataTable({
			"ajax": api + 'service/informasi/get/<?= $id ?>',
			"columns": [{
				"render": function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				},
				className: "text-center"
			}, {
				"data": "tanggal"
			}, {
				"data": "informasi"
			}, {
				"render": function(data, type, JsonResultRow, meta) {
					return `<button class="btn btn-light btn-delete mr-1"><i class="fas fa-trash"></i></button>`
				}
			}]
		})
		$('#table tbody').on('click', '.btn-delete', function() {
			var data = $('#table').DataTable().row($(this).parents('tr')).data()
			swal({
					title: "Apakah Kamu yakin?",
					text: "menghapus <?= $title ?> ini secara permanen!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							type: "POST",
							url: api + 'service/prestasi/delete',
							data: {
								id: data.id,
							},
							success: function(response) {
								response_alert(response)
								if (!response.error)
									$('#table').dataTable().api().ajax.reload()
							}
						})
					}
				})
		})
		$('#form-informasi').validate({
			submitHandler: (form) => {
				$.ajax({
					type: "POST",
					url: api + "service/informasi/create",
					data: $('#form-informasi').serialize(),
					success: function(response) {
						response_alert(response)
						if (!response.error) {
							$('#form-informasi').trigger('reset')
							$('#table-informasi').dataTable().api().ajax.reload()
						}
					}
				});
			}
		})
		$('#form-file_tambahan').validate({
			rules: {
				file_tambahan: {
					required: true
				}
			},
			submitHandler: (form) => {
				let formData = new FormData()
				formData.append('file_tambahan_new', document.getElementById('add-file_tambahan_new').files[0])
				formData.append('file_tambahan', $('#add-file_tambahan').val())
				formData.append('id', $('#add-produk_id').val())
				$.ajax({
					type: "POST",
					url: api + "service/produk/tambahan",
					data: formData,
					async: false,
					processData: false,
					contentType: false,
					success: function(response) {
						response_alert(response)
					}
				});
			}
		})
		$('#table-informasi tbody').on('click', '.btn-delete', function() {
			var data = $('#table-informasi').DataTable().row($(this).parents('tr')).data()
			swal({
					title: "Apakah Kamu yakin?",
					text: "menghapus <?= $title ?> ini secara permanen!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							type: "POST",
							url: api + 'service/informasi/delete',
							data: {
								id: data.id,
							},
							success: function(response) {
								response_alert(response)
								if (!response.error)
									$('#table-informasi').dataTable().api().ajax.reload()
							}
						})
					}
				})
		})
		$('#form-kerjasama').validate({
			submitHandler: (form) => {
				$.ajax({
					type: "POST",
					url: api + "service/produk/kerjasama",
					data: $('#form-kerjasama').serialize(),
					success: function(response) {
						response_alert(response)
					}
				});
			}
		})
		$('#form-prestasi').validate({
			rules: {
				nama_acara: {
					required: true
				},
				penyelenggara: {
					required: true
				},
				tahun: {
					required: true,
					min: 2000,
					max: <?=date('Y')?>
				},
				tingkat: {
					required: true
				},
				pencapaian: {
					required: true
				},
			},
			submitHandler: (form) => {
				$.ajax({
					type: "POST",
					url: api + "service/prestasi/create",
					data: $('#form-prestasi').serialize(),
					success: function(response) {
						response_alert(response)
						if (!response.error) {
							$('#table').dataTable().api().ajax.reload()
							$('#form-prestasi').trigger('reset')
						}
					}
				});
			}
		})
		$('#form-file_tambahan').validate({
			rules: {
				file_tambahan: {
					required: true
				}
			},
			submitHandler: (form) => {
				let formData = new FormData()
				formData.append('file_tambahan_new', document.getElementById('add-file_tambahan').files[0])
				formData.append('file_tambahan', $('#view-file_tambahan').val())
			}
		})
	})
</script>
