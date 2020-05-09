<div class="main-content">
	<section class="section">
		<div class="section-header d-block justify-content-start align-items-center">
			<h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
		</div>
		<button class="btn btn-info " data-toggle="modal" data-target="#add" style="position: fixed; bottom: 36px;   right: 20px; padding: 18.5px;z-index: 10;">
			<i class="fa fa-plus"></i>
		</button>

		<div class="section-body">
			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card ">
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-striped" id="table">
									<thead>
										<tr>
											<th class="text-center">
												No.
											</th>
											<th>Nama</th>
											<th>Fakultas</th>
											<th>Status</th>
											<th>Kontak</th>
											<th>Aksi</th>
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
<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<form id="form-add" class="form-add">
				<div class="modal-body">
					<div class="form-group">
						<label class="d-block" for="add-id">Nama</label>
						<select style="width:100%" name="id" id="add-id" multiple="multiple" class="select2" data-placeholder="admin"></select>
					</div>
					<div class="form-group">
						<label for="is_admin">Akses</label>
						<select class="custom-select" name="is_admin" id="add-is_admin">
							<option selected disabled>Pilih salah satu</option>
							<option value="admin">Admin</option>
							<option value="verifikator">Verifikator</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Batal</button>
					<button class="btn btn-primary" id="btn-save" type="submit">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="view" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah Admin</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<form id="form-view" class="form-view">
				<div class="modal-body">
					<div class="form-group">
						<label class="d-block" for="view-id">Nama</label>
						<input readonly hidden id="view-value" type="number" class="form-control">
						<input readonly id="view-id" type="text" class="form-control">
					</div>
					<div class="form-group">
						<label for="is_admin">Akses</label>
						<select class="custom-select" name="is_admin" id="view-is_admin">
							<option selected disabled>Pilih salah satu</option>
							<option value="admin">Admin</option>
							<option value="verifikator">Verifikator</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Batal</button>
					<button class="btn btn-primary" id="btn-save" type="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	function users() {
		$.ajax({
			type: "GET",
			url: api + 'account/users/get',
			success: function(response) {
				let dataUser = response.data
				let listUser = ""
				dataUser.forEach(element => {
					listUser += `<option value="${element.id}">${element.nama+'  ('+element.id+')'}</option>`
				})
				$('#add-id').html(listUser)
				$('#add-id').select2({
					maximumSelectionLength: 1
				})
			}
		});
	}
	$(document).ready(function() {
		users()
		$("#table").DataTable({
			ajax: api + `service/admin/get`,
			columns: [{
					"render": function(data, type, row, meta) {

						return meta.row + meta.settings._iDisplayStart + 1;
					},
					className: "text-center"
				},
				{
					data: 'nama'
				},
				{
					data: 'fakultas'
				},
				{
					data: 'is_admin'
				},
				{
					data: 'kontak'
				},
				{
					"render": function(data, type, row, meta) {
						return `
						<button class="btn btn-default btn-delete"><i class="fas fa-trash"></i></button>
						<button class="btn btn-primary btn-view"><i class="fa fa-eye"></i> Detail </button>`;
					}
				}
			]
		})
		var table = $('#table').DataTable()
		$('#table tbody').on('click', 'button.btn-view', function() {
			let data = table.row($(this).parents('tr')).data()
			$('#view-value').val(data.id)
			$('#view-id').val(data.nama)
			$('#view-is_admin').val(data.is_admin)
			$('#view').modal('show')
		})

		$('#table tbody').on('click', 'button.btn-delete', function() {
			let data = table.row($(this).parents('tr')).data()
			swal({
					title: "Apakah Kamu yakin?",
					text: `menghapus ${data.nama} dari daftar admin.`,
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							type: "POST",
							url: api + 'service/admin/update',
							data: {
								id: data.id,
								is_admin: 'no'
							},
							success: function(response) {
								response_alert(response)
								if (!response.error)
									$('#table').dataTable().api().ajax.reload()
							}
						})
					}
				});
		})

		$('#form-view').validate({
			rules: {
				is_admin: {
					required: true
				},
			},
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: api + "service/admin/update",
					data: {
						id: $('#view-value').val(),
						is_admin: $('#view-is_admin').val()
					},
					success: function(response) {
						if (!response.error) {
							users()
							$('#view').modal('hide')
							$('#table').dataTable().api().ajax.reload()
						}
						response_alert(response)
					}
				})
			}
		})
		$('#form-add').validate({
			rules: {
				id: {
					required: true
				},
				is_admin: {
					required: true
				},
			},
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: api + "service/admin/update",
					data: $('#form-add').serialize(),
					success: function(response) {
						if (!response.error) {
							users()
							$('#add').modal('hide')
							$('#table').dataTable().api().ajax.reload()
						}
						response_alert(response)
					}
				})
			}
		})
	})
</script>
