<div class="main-content">
	<section class="section">
		<div class="section-header d-block justify-content-start align-items-center">

			<a href="<?= base_url('admin/detail/' . $slug) ?>"><i class="fa fa-chevron-left h5"></i>

			</a>
			<h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
		</div>

		<div class="section-body">
			<div class="card">
				<div class="card-body">
					<div class="container">
						<p>Nama Inventor Yang Terdaftar</p>
						<ul id="listInventor">
						</ul>

						<form id="form-inventor">
							<div class="form-group">
								<label for="add-inventor">Tambah Nama Inventor</label>
								<select name="inventor[]" id="add-inventor" multiple="multiple" class="select2 form-control p-2" data-placeholder="inventor">

								</select>
							</div>
							<button id="btn-save" class="btn btn-icon icon-left btn-primary d-block mr-md-0 ml-md-auto">
								<i class="fa fa-save"></i>
								Simpan Perubahan</button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	function getList() {
		$.ajax({
			type: "GET",
			url: api + 'service/inventor/get/<?= $id ?>',
			success: function(response) {
				let dataUser = response.data.user
				let dataInventor = response.data.inventor
				let listInventor = listUser = ""
				dataUser.forEach(element => {
					listUser += `<option value="${element.id}">${element.nama+'  ('+element.id+')'}</option>`
				})
				dataInventor.forEach(element => {
					listInventor += `<li><span class="mr-3">${element.nama} (${element.id})</span> <i class="fas fa-trash click" onclick="del('${element.nama}',${element.id})"></i></li>`
				});
				$('#listInventor').html(listInventor)
				$('#add-inventor').html(listUser)
			}
		})
	}

	function del(nama, user_id) {
		swal({
				title: "Apakah kamu yakin?",
				text: `akan menghapus ${nama} sebagai inventor!`,
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						type: "POST",
						url: api + 'service/inventor/delete',
						data: {
							produk_id: <?= $id ?>,
							users_id: user_id
						},
						dataType: "json",
						success: function(response) {
							response_alert(response)
							if (!response.error)
								getList()
						}
					})
				}
			})

	}

	$(document).ready(function() {
		getList()

		$('#btn-save').click(function(e) {
			e.preventDefault();
			swal({
					title: "Apakah kamu yakin?",
					text: "akan menambahkan inventor dalam produk ini!",
					icon: "info",
					buttons: true,
					// dangerMode: true,
				})
				.then((willSave) => {
					if (willSave) {
						$.ajax({
							type: "POST",
							url: api + 'service/inventor/create',
							data: {
								produk_id: <?= $id ?>,
								inventor: $('#add-inventor').val()
							},
							dataType: "json",
							success: function(response) {
								response_alert(response)
								if (!response.error)
									getList()
							}
						})
					}
				})
		});
	})
</script>
