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
											<th>Waktu pengajuan</th>
											<th>Tujuan pengajuan</th>
											<th>Status</th>
											<th>Aksi</th>
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
	$(document).ready(function() {
		$("#table").DataTable({
			ajax: api + `service/pengajuan/get/todolist`,
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
					data: 'created_at'
				},
				{
					data: 'cluster'
				},
				{
					"render": function(data, type, row, meta) {
						return status_pengajuan(row.status)
					}
				},
				{
					"render": function(data, type, row, meta) {
						if (row.status != 'dinilai' && row.status != 'diajukan')
							return '<button class="btn btn-primary"><i class="fa fa-eye"></i> Periksa </button>';
					}
				}
			]
		})
		var table = $('#table').DataTable()
		$('#table tbody').on('click', 'button', function() {
			let data = table.row($(this).parents('tr')).data()
			sessionStorage.setItem("verifikasi_id", data.id)
			let baseUrl = "<?= base_url() . 'admin/verifikasi/' ?>"
			window.location.replace(baseUrl + data.slug);
		})

		function status_pengajuan(params) {
			if (params == 'diajukan')
				return `<span class = "badge badge-pill badge-light"> BARU DIAJUKAN </span>`
			else if (params == 'diperiksa')
				return `<span class = "badge badge-pill badge-warning"> BELUM DIPERIKSA </span>`
			else if (params == 'dinilai')
				return `<span class = "badge badge-pill badge-info"> SELESAI DINILAI</span>`
		}
	})
</script>