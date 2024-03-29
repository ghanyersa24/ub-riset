<div class="main-content">
	<section class="section">
		<div class="section-header d-block justify-content-start align-items-center">

			<a href="<?= base_url('admin/detail/' . $slug) ?>" class="h5"><i class="fa fa-chevron-left"></i>
			</a>
			<h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
		</div>

		<div class="section-body">
			<div class="card">
				<div class="card-body">
					<div class="container">

						<form id="form-inventor">
							<div class="form-group">
								<label for="add-inventor">Tambah Nama Inventor <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Jika inventor yang dicari tidak ada, harap meminta inventor yang bersangkutan untuk login sistem terlebih dahulu.">!</span></label>
								<select name="inventor[]" id="add-inventor" multiple="multiple" class="select2 form-control p-2" data-placeholder="inventor">

								</select>
							</div>
							<button id="btn-save" class="btn btn-icon icon-left btn-primary d-block mr-md-0 ml-md-auto">
								<i class="fa fa-plus"></i>
								Tambahkan Inventor</button>
						</form>
						<!-- <p>Nama Inventor Yang Terdaftar</p> -->
						<div class="row" id="listInventor">
						</div>
					</div>
				</div>
				<div class="card-footer d-flex justify-content-end">
					<a href="<?= base_url() . 'admin/kegiatan/' . $slug ?>">
						<button class="btn btn-icon icon-left"><i class="fa fa-chevron-left"></i> Sebelumnya</button>
					</a>
					<a href="<?= base_url() . 'admin/perusahaan_select/' . $slug ?>">
						<button class="btn btn-primary btn-icon icon-right ">Lanjutkan Pengisian <i class="fa fa-arrow-right"></i></button>
					</a>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	let user_id = '<?= $this->session->id; ?>',
		created_by = '<?= $created_by ?>'

	function getList() {
		$.ajax({
			type: "GET",
			url: api + 'service/inventor/get/<?= $id ?>',
			success: function(response) {
				let dataUser = response.data.user
				let dataInventor = response.data.inventor
				let listInventor = listUser = ""
				dataUser.forEach(element => {
					listUser += `<option value="${element.id}">${element.nama+'  ('+element.fakultas+')'}</option>`
				})
				dataInventor.forEach(element => {
					if (created_by != element.id)
						listInventor += `<div class="card col-sm-3 ">
								<div class="card-body shadow rounded">
									<div style="height:200px">
										<img src="${element.foto}" alt="" class="w-100 h-100 click" style="object-fit:cover; object-position: center" onclick="view('${element.id}')">
									</div>
									<hr>
									<div class="d-flex justify-content-between">
									<span class="h5 card-title click" onclick="view('${element.id}')">${element.nama} (${element.fakultas})</span>
									<span><button type="button" class="btn btn-default" onclick="del('${element.id}','${element.nama}')"><i class="fas fa-trash"></i></button></span>
									</div>
								</div>
							</div>`
					else {
						if (created_by == user_id)
							listInventor += `<div class="card col-sm-3 ">
								<div class="card-body shadow rounded">
									<div style="height:200px">
										<img src="${element.foto}" alt="" class="w-100 h-100 click" style="object-fit:cover; object-position: center" onclick="view('${element.id}')">
									</div>
									<hr>
									<div class="d-flex justify-content-between">
									<span class="h5 card-title click" onclick="view('${element.id}')">${element.nama} (${element.fakultas})</span>
									<span><button type="button" class="btn btn-default" onclick="del('${element.id}','${element.nama}')"><i class="fas fa-trash"></i></button></span>
									</div>
								</div>
							</div>`
						else
							listInventor += `<div class="card col-sm-3 ">
								<div class="card-body shadow rounded">
									<div style="height:200px">
										<img src="${element.foto}" alt="" class="w-100 h-100 click" style="object-fit:cover; object-position: center" onclick="view('${element.id}')">
									</div>
									<hr>
									<div class="d-flex justify-content-between">
									<span class="h5 card-title click" onclick="view('${element.id}')">${element.nama} (${element.fakultas})</span>
									</div>
								</div>
							</div>`
					}
				})
				$('#listInventor').html(listInventor)
				$('#add-inventor').html(listUser)
			}
		})
	}

	function del(user_id, nama) {
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
