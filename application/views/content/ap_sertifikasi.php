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
											<th width="20%">Nama / Jenis</th>
											<th width="20%">Tanggal Mulai</th>
											<th width="20%">Tanggal Selesai</th>
											<th width="15%">Status Perolehan</th>
											<th>Aksi</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
						<div class="card-footer d-flex justify-content-end">
							<a href="<?= base_url() . 'admin/testing/' . $slug ?>">
								<button class="btn btn-icon icon-left"><i class="fa fa-chevron-left"></i> Sebelumnya</button>
							</a>
							<a href="<?= base_url() . 'admin/mitra/' . $slug ?>">
								<button class="btn btn-primary btn-icon icon-right ">Lanjutkan Pengisian <i class="fa fa-arrow-right"></i></button>
							</a>
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
								<label for="add-nama">Jenis Sertifikasi / Perijinan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Nama sertifikasi/pengujian, misal : Paten, BPOM, Halal, SNI, dst">!</span></label>
								<input type="text" class="form-control" name="jenis" id="add-jenis" placeholder="jenis sertifikasi">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-status_perolehan">Status Perolehan</label>
								<select name="status_perolehan" id="add-status_perolehan" class="form-control">
									<option value="Belum Diperoleh">Belum Diperoleh</option>
									<option value="Pengajuan Permohonan">Pengajuan Permohonan</option>
									<option value="Disetujui">Disetujui</option>
								</select>

							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-no_pemohon">Nomor Permohonan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jika sudah diajukan permohonan, misal: S0020190xxxx, P002019xxxx">!</span></label>
								<input type="text" id="add-no_pemohon" class="form-control" name="no_pemohon">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-file_formulir">File Formulir Permohonan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="File format .pdf maks 10mb">!</span></label>
								<input name="file_formulir" id="add-file_formulir" class="form-control" type="file"></input>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-no_sertifikat">Nomor Sertifikat Sertifikasi / Perijinan<span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Nomor Sertifikat (misal: IDP0000xxxxx, IDM0000xxxxxx)">!</span></label>
								<input name="no_sertifikat" id="add-no_sertifikat" class="form-control" type="text"></input>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-file">File Sertifikasi/Perijinan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="File format .pdf maks 10mb">!</span></label>
								<input name="file" id="add-file" class="form-control" type="file"></input>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-tanggal_mulai">Tanggal Sertifikat Mulai Berlaku</label>
								<input name="tanggal_mulai" id="add-tanggal_mulai" class="form-control datepicker" type="text"></input>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-tanggal_selesai">Tanggal Sertifikat Berakhir</label>
								<input name="tanggal_selesai" id="add-tanggal_selesai" class="form-control datepicker" type="text">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-pemegang">Pemilik Sertifikasi/Perijinan</label>
								<input name="pemegang" id="add-pemegang" class="form-control" type="text"></input>
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
								<label for="view-nama">Jenis Kekayaan Intelektual <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Nama sertifikasi/pengujian, misal : Paten, BPOM, Halal, SNI, dst">!</span></label>
								<input type="text" class="form-control" name="jenis" id="view-jenis">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-status_perolehan">Status Perolehan</label>
								<select name="status_perolehan" id="view-status_perolehan" class="form-control">
									<option value="Belum Diperoleh">Belum Diperoleh</option>
									<option value="Pengajuan Permohonan">Pengajuan Permohonan</option>
									<option value="Disetujui">Disetujui</option>
								</select>

							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-no_pemohon">Nomor Permohonan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jika sudah diajukan permohonan, misal: S0020190xxxx, P002019xxxx">!</span></label>
								<input type="text" id="view-no_pemohon" name="no_pemohon" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-file_formulir">File Formulir Permohonan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="File format .pdf maks 10mb">!</span></label>
								<input name="file_formulir" id="view-file_formulir_old" class="form-control" type="text" hidden></input>
								<input name="file_formulir" id="view-file_formulir" class="form-control" type="file"></input>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-no_sertifikat">Nomor Sertifikat <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Nomor Sertifikat KI (misal: IDP0000xxxxx, IDM0000xxxxxx)">!</span></label>
								<input name="no_sertifikat" id="view-no_sertifikat" class="form-control" type="text"></input>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-file">File Kekayaan Intelektual <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="File format .pdf maks 10mb">!</span></label>
								<input name="file" id="view-file_old" class="form-control" type="text" hidden></input>
								<input name="file" id="view-file" class="form-control" type="file"></input>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-tanggal_mulai">Tanggal Sertifikat Mulai Berlaku</label>
								<input name="tanggal_mulai" id="view-tanggal_mulai" class="form-control datepicker" type="text"></input>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-tanggal_selesai">Tanggal Sertifikat Berakhir</label>
								<input name="tanggal_selesai" id="view-tanggal_selesai" class="form-control datepicker" type="text">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-pemegang">Pemilik Kekayaan Intelektual</label>
								<input name="pemegang" id="view-pemegang" class="form-control" type="text"></input>
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
			"ajax": api + 'service/kekayaan_intelektual/get/<?= $id ?>',
			"columns": [{
				"render": function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				},
				className: "text-center"
			}, {
				"data": "jenis"
			}, {
				"data": "tanggal_mulai"
			}, {
				"data": "tanggal_selesai"
			}, {
				"data": "status_perolehan"
			}, {
				"render": function(data, type, JsonResultRow, meta) {
					return `<button class="btn btn-light btn-delete mr-1"><i class="fas fa-trash"></i></button>
						<button class="btn btn-primary btn-view"><i class="fa fa-eye"></i> Detail </button>`
				}
			}]
		});
		var table = $('#table').DataTable()
		$('#table tbody').on('click', '.btn-view', function() {
			var data = table.row($(this).parents('tr')).data()
			$('#view-jenis').val(data.jenis)
			setEditor('view-deskripsi', data.deskripsi)
			$('#view-id').val(data.id)
			$('#view-tahun').val(data.tahun)
			$('#view-file_old').val(data.file)
			$('#view-file_formulir_old').val(data.file_formulir)
			$('#view-status_perolehan').val(data.status_perolehan)
			$('#view-no_pemohon').val(data.no_pemohon)
			$('#view-no_sertifikat').val(data.no_sertifikat)
			$('#view-pemegang').val(data.pemegang)
			$('#view-tanggal_mulai').val(data.tanggal_mulai)
			$('#view-tanggal_selesai').val(data.tanggal_selesai)
			$('#view').modal('show')
		})
		$('#table tbody').on('click', '.btn-delete', function() {
			var data = table.row($(this).parents('tr')).data()
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
							url: api + 'service/kekayaan_intelektual/delete',
							data: {
								id: data.id,
								file_formulir: data.file_formulir,
								file: data.file,
							},
							dataType: "json",
							success: function(response) {
								response_alert(response)
								if (!response.error)
									$('#table').dataTable().api().ajax.reload()
							}
						})
					}
				})
		})

		$('#form-add').validate({
			rules: {
				jenis: {
					required: true,
				},
				status_perolehan: {
					required: true
				},
				tanggal_mulai: {
					required: true
				},
				tanggal_selesai: {
					required: true
				},
			},
			submitHandler: function(form) {
				let temp = $('#form-add').serialize()
				let formData = new FormData()
				formData.append('file_formulir', document.getElementById('add-file_formulir').files[0])
				formData.append('file', document.getElementById('add-file').files[0])
				temp = temp.split('&')
				temp.forEach(value => {
					let temp_value = value.split('=')
					formData.append(temp_value[0], decodeURI(temp_value[1]))
				})
				formData.append('deskripsi', $('#add-deskripsi').val())
				$.ajax({
					type: "POST",
					url: api + "service/kekayaan_intelektual/create",
					data: formData,
					async: false,
					processData: false,
					contentType: false,
					success: function(response) {
						if (!response.error) {
							$('#table').dataTable().api().ajax.reload()
							$('#form-add').trigger('reset')
							triggerSetEditor('#form-add', '')
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
				jenis: {
					required: true,
				},
				status_perolehan: {
					required: true
				},
			},
			submitHandler: function(form) {
				let temp = $('#form-view').serialize()
				let formData = new FormData()
				formData.append('file_formulir_new', document.getElementById('view-file_formulir').files[0])
				formData.append('file_new', document.getElementById('view-file').files[0])
				temp = temp.split('&')
				temp.forEach(value => {
					let temp_value = value.split('=')
					formData.append(temp_value[0], decodeURI(temp_value[1]))
				})
				formData.append('deskripsi', $('#view-deskripsi').val())
				$.ajax({
					type: "POST",
					url: api + "service/kekayaan_intelektual/update",
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
	});



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
</script>
