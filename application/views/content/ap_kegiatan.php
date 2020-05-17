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
						<div class="card-body row" id="kompetensi">

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
			<form class="form-add" id="form-add">
				<div class="modal-body" id="form-data">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Foto Kegiatan</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="add-foto" aria-describedby="btn-upload">
										<label class="custom-file-label" for="add-foto">Cari file</label>
									</div>
								</div>
							</div>
							<div class="d-flex justify-content-center w-100 ">
								<img style="display: none; max-height:300px; max-width:75%" src="" alt="foto Kegiatan" id="prev-add-foto" class="text-center">
							</div>
						</div>
						<div class=" col-md-8">
							<div class="form-group">
								<label for="add-title">Judul</label>
								<input id="add-produk_id" class="form-control" type="number" name="produk_id" value="<?= $id ?>" readonly hidden>
								<input id="add-title" class="form-control" type="text" name="title">
							</div>
							<div class="form-group">
								<label for="view-keterangan">Keterangan</label>
								<textarea id="add-keterangan" name="keterangan" class="form-control"></textarea>
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
			<form class="form-view" id="form-view">
				<div class="modal-body" id="form-data">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label>Foto Kegiatan</label>
								<div class="input-group">
									<div class="custom-file">
										<input type="text" class="custom-file-input" id="view-foto_old" name="foto" readonly>
										<input type="file" class="custom-file-input" id="view-foto" aria-describedby="btn-upload">
										<label class="custom-file-label" for="view-foto">Cari file</label>
									</div>
								</div>
							</div>
							<div class="d-flex justify-content-center w-100 ">
								<img src="" alt="foto Kegiatan" id="prev-view-foto" class="text-center" style="max-height:300px; max-width:100%">
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label for="view-title">Judul</label>
								<input id="view-id" class="form-control" type="number" name="id" readonly hidden>
								<input id="view-produk_id" class="form-control" type="number" name="produk_id" value="<?= $id ?>" readonly hidden>
								<input id="view-title" class="form-control" type="text" name="title">
							</div>
							<div class="form-group">
								<label for="view-keterangan">Keterangan</label>
								<textarea id="view-keterangan" name="keterangan" class="form-control"></textarea>
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
	let res = []

	function get() {
		$.ajax({
			type: "GET",
			url: api + 'service/foto_kegiatan/get/<?= $id ?>',
			success: function(response) {
				res = response.data
				let card = ""
				if (res.length == 0)
					card = `<div class="col-12 text-center"> <p class="h5">Silahkan tambahkan foto kegiatan anda</p></div>`
				else
					res.forEach(element => {
						card += `<div class="card col-sm-3 ">
								<div class="card-body shadow rounded">
									<div style="height:200px">
										<img src="${element.foto}" alt="" class="w-100 h-100 click" style="object-fit:cover; object-position: center" onclick="view(${element.id})">
									</div>
									<hr>
									<div class="d-flex justify-content-between">
									<span class="h5 card-title click" onclick="view(${element.id})">${element.title.substring(0, 12)}</span>
									<span><button type="button" class="btn btn-default" onclick="del(${element.id},'${element.foto}')"><i class="fas fa-trash"></i></button></span>
									</div>
								</div>
							</div>`
					})
				$('#kompetensi').html(card)
			}
		})
	}

	function view(id) {
		res.forEach(element => {
			if (id == element.id) {
				$('#view-id').val(element.id)
				$('#view-title').val(element.title)
				$('#view-foto_old').val(element.foto)
				$('#prev-view-foto').attr('src', element.foto)
				setEditor('view-keterangan', element.keterangan)
			}
		})
		$('#view').modal('show')
	}

	function del(id, link) {
		swal({
				title: "Apakah Kamu yakin?",
				text: "menghapus foto kegiatan ini secara permanen!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						type: "POST",
						url: api + 'service/foto_kegiatan/delete',
						data: {
							id: id,
							foto: link
						},
						dataType: "json",
						success: function(response) {
							response_alert(response)
							if (!response.error)
								get()
						}
					})
				}
			});
	}
	$(document).ready(function() {
		get()
		triggerEditor('#form-add')
		triggerEditor('#form-view')
		$('#form-add').validate({
			rules: {
				title: {
					required: true
				},
				foto: {
					required: true
				},
			},
			submitHandler: function(form) {
				let formData = new FormData()
				formData.append('foto', document.getElementById('add-foto').files[0])
				formData.append('keterangan', $('#add-keterangan').val())
				formData.append('title', $('#add-title').val())
				formData.append('produk_id', $('#add-produk_id').val())
				$.ajax({
					type: "POST",
					url: api + "service/foto_kegiatan/create",
					data: formData,
					async: false,
					processData: false,
					contentType: false,
					success: function(response) {
						if (!response.error) {
							$('#form-add').trigger('reset')
							get()
							$('#add').modal('hide')
							$('#prev-add-foto').hide()
							setEditor('add-keterangan', "")
							$('#form-add label.custom-file-label').html('')
						}
						response_alert(response)
					}
				})
			}
		})

		$('#form-view').validate({
			rules: {
				title: {
					required: true
				},
				foto: {
					required: true
				},
			},
			submitHandler: function(form) {
				let formData = new FormData()
				formData.append('foto_new', document.getElementById('view-foto').files[0])
				formData.append('keterangan', $('#view-keterangan').val())
				formData.append('title', $('#view-title').val())
				formData.append('foto', $('#view-foto_old').val())
				formData.append('produk_id', $('#view-produk_id').val())
				formData.append('id', $('#view-id').val())
				$.ajax({
					type: "POST",
					url: api + "service/foto_kegiatan/update",
					data: formData,
					async: false,
					processData: false,
					contentType: false,
					success: function(response) {
						if (!response.error) {
							get()
							$('#view').modal('hide')
							$('#form-view label.custom-file-label').html('')
						}
						response_alert(response)
					}
				})
			}
		})

	});



	$("#add-foto").change(function() {
		let filename = document.getElementById('add-foto').files[0].name
		$('#form-add label.custom-file-label').html(filename)
		readURL(this, '#prev-add-foto')
		$('#prev-add-foto').show()
	})

	$("#view-foto").change(function() {
		let filename = document.getElementById('view-foto').files[0].name
		$('#form-view label.custom-file-label').html(filename)
		readURL(this, '#prev-view-foto')
	})

	function readURL(input, id) {
		if (input.files && input.files[0]) {
			var reader = new FileReader()
			reader.onload = function(e) {
				$(`${id}`).attr('src', e.target.result)
			}
			reader.readAsDataURL(input.files[0])
		}
	}
</script>