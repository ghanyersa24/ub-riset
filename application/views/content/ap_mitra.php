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
											<th witdh="35%">Nama Mitra</th>
											<th witdh="25%">Tujuan</th>
											<th witdh="20%">MOU</th>
											<th width="20%" class="text-center">Aksi</th>
										</tr>
									</thead>
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
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah <?= $title ?></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<form id="form-add" class="form-add">
				<div class="modal-body" id="form-data">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input id="add-produk_id" class="form-control" type="text" name="produk_id" hidden readonly value="<?= $id ?>">
								<label for="add-nama_mitra">Nama Mitra</label>
								<input type="text" id="add-nama_mitra" name="nama_mitra" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-tujuan">Tujuan</label>
								<input type="text" id="add-tujuan" name="tujuan" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-file">MOU <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="File format .pdf maks 10mb">!</span></label>
								<input name="file" id="add-mou" class="form-control" type="file"></input>
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
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah <?= $title ?></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<form id="form-view" class="form-view">
				<div class="modal-body" id="form-data">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input id="view-id" class="form-control" type="text" name="id" hidden readonly>
								<input id="view-produk_id" class="form-control" type="text" name="produk_id" hidden readonly value="<?= $id ?>">
								<label for="view-nama_mitra">Nama Mitra</label>
								<input type="text" id="view-nama_mitra" name="nama_mitra" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-tujuan">Tujuan</label>
								<input type="text" id="view-tujuan" name="tujuan" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="view-file">MOU <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="File format .pdf maks 10mb">!</span></label>
								<input name="mou" id="view-mou" class="form-control" type="text" hidden></input>
								<input name="mou_new" id="view-mou_new" class="form-control" type="file"></input>
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
		$('#table').DataTable({
			"ajax": api + 'service/mitra/get/<?= $id ?>',
			"columns": [{
					"render": function(data, type, row, meta) {
						return meta.row + meta.settings._iDisplayStart + 1;
					},
					className: "text-center"
				}, {
					"data": "nama_mitra"
				}, {
					"data": "tujuan"
				}, {
					"render": function(data, type, row, meta) {
						if (row.mou != null)
							return `<a class="text-decoration-none" href="${row.mou}"> klik disini</a>`;
					}
				},
				{
					"render": function(data, type, JsonResultRow, meta) {
						return `<button class="btn btn-light btn-delete mr-1"><i class="fas fa-trash"></i></button>
						<button class="btn btn-primary btn-view"><i class="fa fa-eye"></i> Detail </button>`
					}
				}
			]
		});
		var table = $('#table').DataTable()
		$('#table tbody').on('click', '.btn-view', function() {
			var data = table.row($(this).parents('tr')).data()
			for (key in data) {
				$(`#view-${key}`).val(data[key])
			}
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
							url: api + 'service/mitra/delete',
							data: {
								id: data.id,
								mou: data.mou,
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
				nama_mitra: {
					required: true,
				},
				tujuan: {
					required: true
				},
			},
			submitHandler: function(form) {
				let formData = new FormData()
				formData.append('mou', document.getElementById('add-mou').files[0])
				formData.append('produk_id', $('#add-produk_id').val())
				formData.append('nama_mitra', $('#add-nama_mitra').val())
				formData.append('tujuan', $('#add-tujuan').val())
				$.ajax({
					type: "POST",
					url: api + "service/mitra/create",
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
				nama_mitra: {
					required: true,
				},
				tujuan: {
					required: true
				},
			},
			submitHandler: function(form) {
				let formData = new FormData()
				formData.append('mou_new', document.getElementById('view-mou_new').files[0])
				formData.append('id', $('#view-id').val())
				formData.append('produk_id', $('#view-produk_id').val())
				formData.append('mou', $('#view-mou').val())
				formData.append('nama_mitra', $('#view-nama_mitra').val())
				formData.append('tujuan', $('#view-tujuan').val())
				$.ajax({
					type: "POST",
					url: api + "service/mitra/update",
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
</script>
