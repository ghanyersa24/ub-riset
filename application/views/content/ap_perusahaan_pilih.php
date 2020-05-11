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
						<p>Saat ini Produk <strong id="status"></strong> terdaftar pada perusahaan <strong id="perusahaan"></strong>. <br><span id="action" style="display: none" class="ml-1"><a href="#" class="text-decoration-none" onclick="showForm()">klik disini</a> untuk hapus dari perusahaan</span></p>
						<form id="form-add">
							<div class="form-group">
								<label for="add-perusahaan">Pilih Perusahaan</label>
								<select name="perusahaan" id="add-perusahaan" class="select2 form-control p-2" data-placeholder="inventor">
									<option selected disabled>Pilih Salah Satu</option>
								</select>
							</div>
							<button id="btn-save" class="btn btn-icon icon-left btn-primary d-block mr-md-0 ml-md-auto">
								<i class="fa fa-save"></i>
								Simpan Perubahan</button>
						</form>
						<hr>
						<p>Perusahaan yang anda inginkan belum terdaftar? daftar <a href="<?= base_url() . 'admin/perusahaan' ?>">di sini</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<script>
	let perusahaan

	function getList() {
		$.ajax({
			type: "GET",
			url: api + 'service/produk_perusahaan/listPerusahaan',
			success: function(response) {
				let dataPerusahaan = response.data
				let listPerusahaan = ""
				dataPerusahaan.forEach(element => {
					listPerusahaan += `<option value="${element.id}">${element.nama+''}</option>`
				})
				$('#add-perusahaan').html(listPerusahaan)
			}
		})
	}

	function showForm() {
		swal({
				title: "Apakah kamu yakin?",
				text: "akan menghapus perusahaan dari produk ini!",
				icon: "warning",
				buttons: true,
				// dangerMode: true,
			})
			.then((willSave) => {
				if (willSave) {
					$.ajax({
						type: "POST",
						url: api + 'service/produk_perusahaan/delete',
						data: {
							produk_id: <?= $id ?>,
							perusahaan_id: perusahaan
						},
						dataType: "json",
						success: function(response) {
							response_alert(response)
							if (!response.error) {
								getList()
								produk_perusahaan()
							}
						}
					})
				}
			})
	}

	function produk_perusahaan() {
		$.ajax({
			type: "GET",
			url: api + 'service/produk_perusahaan/get/<?= $id ?>',
			success: function(response) {
				if (response.data.length == 0) {
					$('#status').text('belum')
					$('#form-add').show()
					$('#perusahaan').text("")
					$('#action').hide()
				} else {
					perusahaan = response.data[0].id
					$('#status').text('telah')
					$('#perusahaan').text(response.data[0].nama + " (" + response.data[0].bentuk_usaha + ")")
					$('#action').show()
					$('#form-add').hide()
				}
			}
		});
	}

	$(document).ready(function() {
		getList()
		produk_perusahaan()

		$('#btn-save').click(function(e) {
			e.preventDefault();
			swal({
					title: "Apakah kamu yakin?",
					text: "akan menambahkan produk dalam perusahaan ini!",
					icon: "info",
					buttons: true,
					// dangerMode: true,
				})
				.then((willSave) => {
					if (willSave) {
						$.ajax({
							type: "POST",
							url: api + 'service/produk_perusahaan/create',
							data: {
								produk_id: <?= $id ?>,
								perusahaan_id: $('#add-perusahaan').val()
							},
							dataType: "json",
							success: function(response) {
								response_alert(response)
								if (!response.error) {
									getList()
									produk_perusahaan()
								}
							}
						})
					}
				})
		});
	})
</script>
