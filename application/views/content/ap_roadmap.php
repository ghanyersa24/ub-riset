<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title ?></h1>
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
												#
											</th>
											<th>Title</th>
											<th>Author</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th class="text-center">
												#
											</th>
											<th class="table_search"></th>
											<th class="table_search"></th>
											<th class="table_search"></th>
											<th>#</th>
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
			<div class="modal-body row" id="form-data">
				<div class="col-sm-4" style=" border-right: 5px solid;">
					<div class="row">
						<div class="form-group col-sm-8"> <label for="add-title">Title</label>
							<input type="text" class="form-control" id="add-title" name="title">
						</div>
						<div class="form-group col-4">
							<label for="role">Status</label>
							<select class="custom-select col" id="add-status">
								<option value="draft">Draft</option>
								<option value="publish">Publish</option>
							</select>
						</div>
						<div class="form-group col-sm-12">
							<div class="input-group mb-3">
								<input type="file" id="add-picture" name="picture" accept="image/*">
							</div>
							<img src="" alt="foto content" id="prev-add-picture" class="img-fluid">

						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="form-group">
						<label for="add-content"> Content</label>
						<textarea id="add-content"></textarea>
					</div>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-default" data-dismiss="modal"> Cancel</button>
				<button type="button" class="btn btn-info" id="submit">Add</button>
			</div>
		</div>
	</div>
</div>
<script>
	let content
	editor('#add-content', content)

	$(document).ready(function() {
		$('#table').DataTable({
			"ajax": api + 'service/roadmap/get',
			"columns": [{
				"render": function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				},
				className: "text-center"
			}, {
				"data": "title"
			}, {
				"data": "author"
			}, {
				"data": "status"
			}, {
				"render": function(data, type, JsonResultRow, meta) {
					return '<button class="btn btn-primary"><i class="fa fa-eye"></i> Detail </button>';
				}
			}]
		})

		var table = $('#table').DataTable()
		$('#table tbody').on('click', 'button', function() {
			var data = table.row($(this).parents('tr')).data()
			$('#view-id').val(data.id)
			$('#view-title').val(data.title)
			$('#view-status').val(data.status)
			$('#prev-view-picture').attr('src', data.pictures)
			content.setData(data.content)
			$('#view-content').html(data.content)
			$('#view').modal('show')
		})
	});

	$('#form-view').validate({
		rules: {
			id: {
				required: true,
			},
			nama_produk: {
				required: true,
			},
			jenis: {
				required: true
			},
			deskripsi_singkat: {
				required: true
			},
			bidang: {
				required: true,
			}
		},
		submitHandler: function(form) {
			var data = $('#form-view').serialize()
			$.ajax({
				type: "POST",
				url: api + "service/produk/update",
				data: data,
				dataType: "json",
				success: function(response) {
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
</script>
