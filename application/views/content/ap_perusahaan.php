<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header d-block justify-content-start align-items-center">
			<a href="#" class="h5" onclick="lastProduk()" class="ripple"><i class="fa fa-chevron-left"></i>
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
							<div class="alert alert-dark alert-has-icon mt-4 alert-dismissible" role="alert">
								<div class="alert-icon"><i class="fa fa-info-circle"></i></div>
								<div class="alert-body">
									<div class="alert-title">Petunjuk pengisian</div>
									Jangan lupa untuk melengkapi data perusahaanmu
									<div>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									</div>
								</div>
							</div>
							<div class="row" id="perusahaan">

							</div>
						</div>
						<div class="card-footer d-flex justify-content-end">
							<a href="#" onclick="lastProduk()" class="">
								<button class="btn btn-icon icon-left ripple"><i class="fa fa-chevron-left"></i> Sebelumnya</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Daftarkan Perusahaan Anda</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<form class="form-add" id="form-add">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="view-nama">Nama Perusahaan</label>
								<input type="text" class="form-control" id="view-nama" name="nama" placeholder="contoh : PT Subur Makmur">
							</div>
							<div class="form-group">
								<label for="view-nama">Nama Pendiri</label>
								<input type="text" class="form-control" id="view-nama_pendiri" name="nama_pendiri">
							</div>
							<div class="form-group">
								<label for="view-tahun_berdiri">Tahun Berdiri</label>
								<input type="number" class="form-control" id="view-tahun_berdiri" name="tahun_berdiri">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="view-bentuk_usaha">Bentuk Perusahaan</label>
								<select name="bentuk_usaha" id="bentuk_usaha" class="form-control">
									<option value="PT">PT</option>
									<option value="CV">CV</option>
									<option value="Belum memiliki badan usaha">Belum memiliki badan usaha</option>
								</select>
							</div>
							<div class="form-group">
								<label for="view-status_kantor">Status Kantor</label>
								<select name="status_kantor" id="status_kantor" class="form-control">
									<option value="Milik sendiri">Milik sendiri</option>
									<option value="Sewa">Sewa</option>
									<option value="Berbagi dengan perusahaan lain">Berbagi dengan perusahaan lain</option>
								</select>
							</div>
						</div>
					</div>


				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Batal</button>
					<button class="btn btn-primary" id="btn-save" type="submit">Daftarkan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	let res = []
	let user_id = '<?= $this->session->id; ?>'
	let lastProduk = () => {
		if (sessionStorage.getItem('lastProduk') == null)
			window.history.back()
		else
			window.location.replace(sessionStorage.getItem('lastProduk'))
	}

	function get() {
		$.ajax({
			type: "GET",
			url: api + 'service/perusahaan/get',
			success: function(response) {
				res = response.data
				let card = ""
				if (res.length == 0)
					card = `<div class="col-12 text-center"> <p class="h5">Anda belum terdaftar di perusahaan manapun, silahkan daftarkan perusahaan anda terlebih dahulu</p></div>`
				else
					res.forEach(element => {
						if (element.created_by == user_id)
							card += `<div class="card col-sm-3 ">
								<div class="card-body shadow rounded">
									<div style="height:200px">
										<img src="${element.logo==null?'https://i.imgur.com/QE3UIgf.png':element.logo}" alt="" class="w-100 h-100 click" style="object-fit:cover; object-position: center" onclick="view('${element.slug}')">
									</div>
									<hr>
									<div class="d-flex justify-content-between">
									<span class="h5 card-title click" onclick="view('${element.slug}')">${element.nama.substring(0, 12)}</span>
									<span><button type="button" class="btn btn-default" onclick="del(${element.id})"><i class="fas fa-trash"></i></button></span>
									</div>
								</div>
							</div>`
						else
							card += `<div class="card col-sm-3 ">
								<div class="card-body shadow rounded">
									<div style="height:200px">
										<img src="${element.logo==null?'https://i.imgur.com/QE3UIgf.png':element.logo}" alt="" class="w-100 h-100 click" style="object-fit:cover; object-position: center" onclick="view('${element.slug}')">
									</div>
									<hr>
									<div class="d-flex justify-content-between">
									<span class="h5 card-title click" onclick="view('${element.slug}')">${element.nama.substring(0, 12)}</span>
									</div>
								</div>
							</div>`
					})
				$('#perusahaan').html(card)
			}
		})
	}

	function del(id) {
		swal({
				title: "Apakah Kamu yakin?",
				text: "Menghapus Perusahaan Ini",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						type: "POST",
						url: api + 'service/perusahaan/delete',
						data: {
							id: id,
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

	function view(slug) {
		window.location.replace(api + 'admin/perusahaan/' + slug)
	}
	$(document).ready(function() {
		get()
		triggerEditor('#form-add')
		$('#form-add').validate({
			rules: {
				nama: {
					required: true
				},
				bentuk_usaha: {
					required: true
				},
				jenis: {
					required: true
				},
				tahun_berdiri: {
					required: true,
					min: 2000,
					max: <?=date('Y')?>
				}
			},
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: api + "service/perusahaan/create",
					data: $('#form-add').serialize(),
					success: function(response) {
						response_alert(response)
						if (!response.error) {
							get()
							$('#form-add').trigger('reset')
							$('#add').modal('hide')
						}
					}
				})
			}
		})

	});
</script>
