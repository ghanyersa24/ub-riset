<div class="main-content">
	<section class="section">
		<div class="section-header d-block justify-content-start align-items-center">
			<h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
		</div>

		<div class="section-body">
			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card ">

						<div class="card-body">
							<h4>Daftar pengajuan verifikasi</h4>
							<div class="table-responsive">
								<table class="table table-striped" id="table">
									<thead>
										<tr>
											<th class="text-center">
												No.
											</th>
											<th>Nama Produk</th>
											<th>Inventor</th>
											<th>Bidang</th>
											<th>Tujuan Pengajuan</th>
											<th>Status</th>
											<th width="35%">Verifikator</th>
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

<script>
	let userVerification = []

	$(document).ready(function() {
		$.ajax({
			type: "GET",
			url: api + 'service/verifikator/get',
			success: function(response) {
				let user = []
				response.data.forEach(element => {
					userVerification.push({
						id: element.id,
						nama: element.nama
					})
				})
			}
		});
		$("#table").DataTable({
			ajax: api + 'service/pengajuan/get',
			columns: [{
					"render": function(data, type, row, meta) {

						return meta.row + meta.settings._iDisplayStart + 1;
					},
					className: "text-center"
				},
				{
					data: 'nama_produk'
				},
				{
					data: 'inventor'
				},
				{
					data: 'bidang'
				},
				{
					data: 'cluster'
				},
				{
					render: function(data, type, row, meta) {
						return status_pengajuan(row.status)
					}
				},
				{
					"render": function(data, type, row, meta) {
						if (row.status != 'dinilai')
							return verifikator(row.verifikator)
					}
				}
			]
		})


		let table = $('#table').DataTable()
		$('#table tbody').on('change', 'select', function() {
			let data = table.row($(this).parents('tr')).data()
			let row = table.row($(this).parents('tr'))[0][0] + 1
			swal({
					title: "Apakah kamu yakin?",
					icon: "info",
					text: `memplotting untuk memverifikasi produk!`,
					buttons: true,
				})
				.then(willsave => {
					if (willsave) {
						$.ajax({
							type: "POST",
							url: api + 'service/verifikator/update',
							data: {
								id: data.id,
								verifikator: $(`#table>tbody>tr:nth-of-type(${row})>td:nth-of-type(7)>select`).val()
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

		function verifikator(id) {
			let select = `<select class="custom-select select" name="bidang"> <option selected disabled>Pilih salah satu</option>`
			userVerification.forEach(element => {
				if (element.id == id)
					select += `<option selected value="${element.id}">${element.nama}</option>`
				else
					select += `<option value="${element.id}">${element.nama}</option>`
			});
			select += '</select>'
			return select

		}

		function status_pengajuan(params) {
			if (params == 'diajukan')
				return `<span class = "badge badge-pill badge-light"> DIAJUKAN </span>`
			else if (params == 'diperiksa')
				return `<span class = "badge badge-pill badge-warning"> DIPERIKSA </span>`
			else if (params == 'dinilai')
				return `<span class = "badge badge-pill badge-info"> SELESAI </span>`
		}

	})
</script>
