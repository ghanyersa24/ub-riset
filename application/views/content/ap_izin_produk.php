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
		<button class="btn btn-info " data-toggle="modal" data-target="#add" style="position: fixed; bottom: 36px;   right: 20px; padding: 18.5px;z-index: 10;">
			<i class="fa fa-plus"></i>
		</button>


		<div class="section-body">
			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table">
									<thead>
										<tr>
											<th class="text-center">
												No.
											</th>
											<th>Nama</th>
											<th>Tahun Perolehan</th>
											<th>Lembaga Penerbit</th>
											<th>Status</th>
											<th>Action</th>
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
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal fade" id="add">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title ?></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<form id="form-add">
				<div class="modal-body" id="form-data">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input id="add-produk_id" class="form-control" type="text" name="produk_id" hidden readonly value="<?= $id ?>">
								<label for="add-nama">Nama / Jenis Izin <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Contoh jenis BPOM MD, BPOM NA, Halal, Penyelanggara Sistem Elektronik, dll">!</span></label>
								<input type="text" id="add-nama" class="form-control" name="nama">

							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-lembaga">Lembaga Pemberi Izin <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jika izin sudah diperoleh">!</span></label>
								<input type="text" id="add-lembaga" name="lembaga" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-status">Status Perolehan</label>
								<select name="status" id="add-status" class="form-control">
									<option value="Belum Diperoleh">Belum Diperoleh</option>
									<option value="Pengajuan Permohonan">Pengajuan Permohonan</option>
									<option value="Disetujui">Disetujui</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-tahun_perolehan">Tahun Perolehan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jika sertifikat telah diperoleh">!</span></label>
								<input name="tahun_perolehan" id="add-tahun_perolehan" class="form-control" type="number"></input>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-no_izin">Nomor Sertifikat <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Nomor Sertifikat KI (misal: IDP0000xxxxx, IDM0000xxxxxx)">!</span></label>
								<input name="no_izin" id="add-no_izin" class="form-control" type="text"></input>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="add-tanggal_mulai">Tanggal Sertifikat Mulai Berlaku <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jika sertifikat telah diperoleh">!</span></label>
								<input name="tanggal_mulai" id="add-tanggal_mulai" class="form-control datepicker" type="text"></input>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-tanggal_selesai">Tanggal Sertifikat Berakhir <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jika sertifikat telah diperoleh">!</span></label>
								<input name="tanggal_selesai" id="add-tanggal_selesai" class="form-control datepicker" type="text">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-file">File Sertifikat <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="File format .pdf maks 10mb">!</span></label>
								<input name="file" id="add-file" class="form-control" type="file"></input>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="add-deskripsi">Deskripsi</label>
								<textarea name="deskripsi" id="add-deskripsi"></textarea>

							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-default" data-dismiss="modal"> Cancel</button>
					<button type="submit" class="btn btn-info" id="submit">Add</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="view">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah <?= $title ?></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<form id="form-view">
				<div class="modal-body" id="form-data">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input id="view-id" class="form-control" type="text" name="id" hidden readonly>
								<input id="view-produk_id" class="form-control" type="text" name="produk_id" hidden readonly value="<?= $id ?>">
								<label for="view-nama">Nama / Jenis Izin <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Contoh jenis BPOM MD, BPOM NA, Halal, Penyelanggara Sistem Elektronik, dll">!</span></label>
								<input type="text" id="view-nama" class="form-control" name="nama">

							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-lembaga">Lembaga Pemberi Izin <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jika izin sudah diperoleh">!</span></label>
								<input type="text" id="view-lembaga" name="lembaga" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-status">Status Perolehan</label>
								<select name="status" id="view-status" class="form-control">
									<option value="Belum Diperoleh">Belum Diperoleh</option>
									<option value="Pengajuan Permohonan">Pengajuan Permohonan</option>
									<option value="Disetujui">Disetujui</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-tahun_perolehan">Tahun Perolehan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jika sertifikat telah diperoleh">!</span></label>
								<input name="tahun_perolehan" id="view-tahun_perolehan" class="form-control" type="number"></input>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-no_izin">Nomor Sertifikat <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Nomor Sertifikat KI (misal: IDP0000xxxxx, IDM0000xxxxxx)">!</span></label>
								<input name="no_izin" id="view-no_izin" class="form-control" type="text"></input>
							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="view-tanggal_mulai">Tanggal Sertifikat Mulai Berlaku <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jika sertifikat telah diperoleh">!</span></label>
								<input name="tanggal_mulai" id="view-tanggal_mulai" class="form-control datepicker" type="text"></input>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-tanggal_selesai">Tanggal Sertifikat Berakhir <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jika sertifikat telah diperoleh">!</span></label>
								<input name="tanggal_selesai" id="view-tanggal_selesai" class="form-control datepicker" type="text">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-file">File Sertifikat <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="File format .pdf maks 10mb">!</span></label>
								<input name="file_old" id="view-file_old" class="form-control" type="text" hidden></input>
								<input name="file" id="view-file" class="form-control" type="file"></input>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="view-deskripsi">Deskripsi</label>
								<textarea name="deskripsi" id="view-deskripsi"></textarea>

							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-default" data-dismiss="modal"> Cancel</button>
					<button type="submit" class="btn btn-info" id="submit">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		triggerEditor('#form-add')
		triggerEditor('#form-view')
		$('#table').DataTable({
			"ajax": api + 'service/izin_produk/get/<?= $id ?>',
			"columns": [{
				"render": function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				},
				className: "text-center"
			}, {
				"data": "nama"
			}, {
				"data": "tahun_perolehan"
			}, {
				"data": "lembaga"
			}, {
				"data": "status"
			}, {
				"render": function(data, type, JsonResultRow, meta) {
					return '<button class="btn btn-primary"><i class="fa fa-eye"></i> Detail </button>';
				}
			}]
		});
		var table = $('#table').DataTable()
		$('#table tbody').on('click', 'button', function() {
			var data = table.row($(this).parents('tr')).data()
			$('#view-id').val(data.id)
			$('#view-nama').val(data.nama)
			setEditor('view-deskripsi', data.deskripsi)
			$('#view-file_old').val(data.file)
			$('#view-status').val(data.status)
			$('#view-tahun_perolehan').val(data.tahun_perolehan)
			$('#view-no_izin').val(data.no_izin)
			$('#view-tanggal_mulai').val(data.tanggal_mulai)
			$('#view-tanggal_selesai').val(data.tanggal_selesai)
			$('#view-lembaga').val(data.lembaga)
			$('#view').modal('show')
		})

		$('#form-add').validate({
			rules: {
				id: {
					required: true,
				},
				nama: {
					required: true,
				},
				status_perolehan: {
					required: true
				},
				file: {
					required: true
				},
			},
			submitHandler: function(form) {
				let temp = $('#form-add').serialize()
				let formData = new FormData()
				formData.append('file', document.getElementById('add-file').files[0])
				temp = temp.split('&')
				temp.forEach(value => {
					let temp_value = value.split('=')
					formData.append(temp_value[0], decodeURI(temp_value[1]))
				})
				formData.append('deskripsi', $('#add-deskripsi').val())
				$.ajax({
					type: "POST",
					url: api + "service/izin_produk/create",
					data: formData,
					async: false,
					processData: false,
					contentType: false,
					success: function(response) {
						if (!response.error) {
							$('#table').dataTable().api().ajax.reload()
							$('#form-add').trigger('reset')
							$('#add').modal('hide')
						}
						response_alert(response)
					}
				})
			}
		})

		$('#form-view').validate({
			rules: {
				id: {
					required: true,
				},
				nama: {
					required: true,
				},
				status_perolehan: {
					required: true
				},
			},
			submitHandler: function(form) {
				let temp = $('#form-view').serialize()
				let formData = new FormData()
				formData.append('file', document.getElementById('view-file').files[0])
				temp = temp.split('&')
				temp.forEach(value => {
					let temp_value = value.split('=')
					formData.append(temp_value[0], decodeURI(temp_value[1]))
				})
				formData.append('deskripsi', $('#view-deskripsi').val())
				$.ajax({
					type: "POST",
					url: api + "service/izin_produk/update",
					data: formData,
					async: false,
					processData: false,
					contentType: false,
					success: function(response) {
						if (!response.error) {
							$('#table').dataTable().api().ajax.reload()
							$('#view').modal('hide')
						}
						response_alert(response)
					}
				})
			}
		})

		$("#view-logo_produk").change(function() {
			readURL(this)
		})

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader()
				reader.onload = function(e) {
					$('#prev-view-logo_produk').attr('src', e.target.result)
				}
				reader.readAsDataURL(input.files[0])
			}
		}
	})
</script>
