<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header d-block justify-content-start align-items-center">
			<a href="<?= base_url('admin/perusahaan') ?>"><i class="fa fa-chevron-left h5"></i>
			</a>
			<h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
		</div>
		<div class="section-body">
			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card ">
						<div class="card-body">
							<div class="tabs">
								<input type="radio" id="tab1" name="tab-control" checked>
								<input type="radio" id="tab2" name="tab-control">
								<input type="radio" id="tab3" name="tab-control">
								<input type="radio" id="tab4" name="tab-control">
								<ul>
									<li title="profil">
										<label for="tab1" role="button" id="tabs-profil">
											<i class="fas fa-brain"></i>
											<br><span>Profil</span>
										</label>
									</li>
									<li title="pengurus">
										<label for="tab2" role="button" id="tabs-pengurus">
											<i class="fa fa-users"></i>
											<br><span>Pengurus</span>
										</label>
									</li>
									<li title="kepemilikan">
										<label for="tab3" role="button" id="tabs-kepemilikan">
											<i class="fas fa-code-branch"></i>
											<br><span>Kepemilikan</span>
										</label>
									</li>
									<li title="aset">
										<label for="tab4" role="button" id="tabs-aset">
											<i class="fas fa-list-ul"></i>
											<br><span>Aset</span>
										</label>
									</li>
								</ul>
								<div class="slider">
									<div class="indicator"></div>
								</div>
								<div class="alert alert-dark alert-has-icon mt-4 alert-dismissible" role="alert">
									<div class="alert-icon"><i class="fa fa-info-circle"></i></div>
									<div class="alert-body">
										<div class="alert-title">Petunjuk pengisian</div>
										Pastikan kamu mengisi data perusahaanmu dengan lengkap
										<div>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
									</div>
								</div>
								<div class="content">

									<section id="tab-profil">
										<form id="form-view-profil">
											<div class="row">
												<div class="col-md-4 px-3 border-right border-default">
													<div class="form-group">
														<input id="view-id" class="form-control" type="text" name="id" hidden readonly>
														<label for="view-nama" class="">Nama Perusahaan </label>
														<input id="view-nama" class="form-control" type="text" name="nama">
													</div>
													<div class="form-group">
														<label for="view-bentuk_usaha">Bentuk Usaha</label>
														<select name="bentuk_usaha" id="view-bentuk_usaha" class="form-control">
															<option value="PT">PT</option>
															<option value="CV">CV</option>
															<option value="Belum memiliki badan usaha">Belum Memiliki Badan Usaha</option>
														</select>
													</div>
													<div class="form-group">
														<label for="view-status_kantor">Status Kantor</label>
														<select name="status_kantor" id="view-status_kantor" class="form-control">
															<option value="Milik sendiri">Milik sendiri</option>
															<option value="Sewa">Sewa</option>
															<option value="Berbagi dengan perusahaan lain">Berbagi dengan perusahaan lain</option>
														</select>
													</div>
													<div class="form-group">
														<label for="view-tahun_berdiri">Tahun Berdiri</label>
														<input type="number" class="form-control" id="view-tahun_berdiri" name="tahun_berdiri">
													</div>
													<div class="form-group">
														<label for="view-nama_pendiri">Tahun Berdiri</label>
														<input type="text" class="form-control" id="view-nama_pendiri" name="nama_pendiri">
													</div>
													<div class="form-group">
														<label for="view-luas_ruang_produksi">Luas ruang produksi</label>
														<input type="number" class="form-control" id="view-luas_ruang_produksi" name="luas_ruang_produksi" placeholder="dalam m2">
													</div>
													<div class="form-group">
														<label for="view-akta">Upload Akta Perusahaan</label>
														<input type="text" class="form-control" name="akta" id="view-akta" hidden readonly>
														<input type="file" class="form-control" name="akta" id="view-akta_new">
													</div>
													<div class="form-group">
														<label for="view-izin">Upload Surat Izin Perusahaan <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="(SIUP,NIB,NPWP,Ijin Domisili, Rekening Perusahaan, dan dokumen pendukung lainnya) jadikan satu file di pdf">!</span></label>
														<input type="text" class="form-control" name="izin" id="view-izin" hidden readonly>
														<input type="file" class="form-control" name="izin" id="view-izin_new">
													</div>
												</div>
												<div class="col-md-8 px-3">
													<div class="row">
														<div class="col form-group">
															<label for="view-pegawai_tetap">Jumlah Pegawai Tetap</label>
															<input type="number" class="form-control" id="view-pegawai_tetap" name="pegawai_tetap">
														</div>
														<div class="col form-group">
															<label for="view-pegawai_tidak_tetap">Jumlah Pegawai Tidak Tetap</label>
															<input type="number" class="form-control" id="view-pegawai_tidak_tetap" name="pegawai_tidak_tetap">
														</div>
													</div>

													<div class="form-group">
														<label for="view-kota_kabupaten">Kota / Kabupaten</label>
														<input type="text" class="form-control" id="view-kota_kabupaten" name="kota_kabupaten">
													</div>
													<div class="form-group">
														<label for="view-email">Email</label>
														<input type="email" class="form-control" id="view-email" name="email">
													</div>
													<div class="form-group">
														<label for="view-telepon">No. Telepon</label>
														<input type="number" class="form-control" id="view-telepon" name="telepon">
													</div>
													<div class="row">
														<div class="col form-group">
															<label for="view-alamat_kantor">Alamat Kantor</label>
															<input id="view-alamat_kantor" class="form-control" type="text" name="alamat_kantor">
														</div>
														<div class="col form-group">
															<label for="view-alamat_produksi">Alamat Produksi</label>
															<input id="view-alamat_produksi" class="form-control" type="text" name="alamat_produksi">
														</div>
													</div>
													<div class="form-group">
														<label for="view-website">Website</label>
														<input id="view-website" class="form-control" type="text" name="website">
													</div>
													<div class="form-group">
														<label for="view-sosmed">Sosial Media</label>
														<input id="view-sosmed" class="form-control" type="text" name="sosmed">
													</div>
													<div class="form-group row">
														<div class="col-4">
															<label for="view-logo">Upload Logo</label>
															<button class="btn btn-secondary form-control" type="button" data-toggle="modal" data-target="#logo">pilih logo</button>
														</div>
														<div class="col-8">
															<img src="" alt="logo perusahaan" id="prev-view-logo_perusahaan" class="w-50">
														</div>
													</div>
													<button class="btn btn-primary btn-icon icon-left d-block mr-0 ml-auto" type="submit"><i class="fa fa-save mr-2"></i>Simpan Profil</button>
												</div>
											</div>
										</form>
									</section>

									<section id="tab-pengurus">
										<form id="form-view-pengurus">
											<input type="text" name="perusahaan_id" value="<?= $id ?>" hidden readonly class="form-control">
											<div class="form-group">
												<label for="view-user" class="d-block">Pilih Pengurus</label>
												<select name="users_id" id="view-user" class="select2 form-control" style="width:100%">

												</select>
											</div>
											<div class="form-group">
												<label for="view-jabatan">Jabatan</label>
												<input type="text" class="form-control" id="view-jabatan" name="jabatan">
											</div>
											<button class="btn btn-primary btn-icon icon-left d-block mr-0 ml-auto" type="submit"><i class="fa fa-save mr-2"></i>Simpan Pengurus</button>
										</form>
										<div class="row" id="listPengurus">
										</div>
									</section>

									<section id="tab-kepemilikan">
										<div class="table-responsive">
											<table class="table table-striped w-100" id="table-kepemilikan">
												<thead>
													<tr>
														<th class="text-center">
															No.
														</th>
														<th>Nama Pemilik</th>
														<th>Tipe Pemegang Saham</th>
														<th>Tipe Kewarganegaraan</th>
														<th>Negara Asal</th>
														<th class="text-center">Presentasi Kepemilikan</th>
														<th>Aksi</th>
													</tr>
												</thead>
											</table>
										</div>
										<br>
										<span class="h4">Tambah Pemilik Saham</span>
										<hr>
										<form id="form-view-kepemilikan">
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="view-pemilik_saham">Nama Pemilik Saham</label>
														<input type="text" name="perusahaan_id" value="<?= $id ?>" hidden readonly class="form-control">
														<input type="text" id="view-pemilik_saham" name="nama" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="add-pemegang_saham">Tipe Pemegang Saham</label>
														<select name="tipe" id="add-pemegang_saham" class="form-control">
															<option value="Perseorangan">Perseorangan</option>
															<option value="Kelompok">Kelompok</option>
															<option value="Perusahaan">Perusahaan</option>
														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="add-tipe_kewarganegaraan">Tipe Kewarganegaraan Pemegang Saham</label>
														<select name="kewarganegaraan" id="add-tipe_kewarganegaraan" class="form-control">
															<option value="Dalam Negeri">Dalam Negeri</option>
															<option value="Luar Negeri">Luar Negeri</option>

														</select>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="add-negara_asal">Nama Negara Asal</label>
														<input type="text" id="add-negara_asal" name="asal_negara" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="add-presentase_kepemilikan">Presentasi Kepemilikan</label>
														<input type="number" id="add-presentase_kepemilikan" name="presentase" class="form-control" max="100" min="0">
													</div>
												</div>

											</div>
											<button class="btn btn-primary btn-icon icon-left d-block mr-0 ml-auto" type="submit"><i class="fa fa-save mr-2"></i>Simpan Kepemilikan</button>
										</form>
									</section>

									<section id="tab-aset">
										<div class="table-responsive">
											<table class="table table-striped w-100" id="table-aset">
												<thead>
													<tr>
														<th class="text-center">
															No.
														</th>
														<th>Nama</th>
														<th>Tanggal Perolehan</th>
														<th>Nilai Aset</th>
														<th>Aksi</th>
													</tr>
												</thead>
											</table>
										</div>
										<form id="form-view-aset">
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="add-nama_aset">Nama Aset</label>
														<input type="text" name="perusahaan_id" value="<?= $id ?>" hidden readonly class="form-control">
														<input type="text" id="add-nama_aset" name="nama_aset" class="form-control">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="add-nilai_aset">Nilai Aset Saat Ini</label>
														<input type="text" id="add-nilai_aset" name="nilai_aset" class="form-control" data-type="currency">
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="add-tahun_perolehan">Tahun Perolehan Aset</label>
														<input name="tahun_perolehan" id="add-tahun_perolehan" class="form-control" type="number" max="2020" />
													</div>
												</div>
											</div>
											<button class="btn btn-primary btn-icon icon-left d-block mr-0 ml-auto" type="submit"><i class="fa fa-save mr-2"></i>Simpan Aset</button>
										</form>
									</section>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div id="progress-upload" class="position-fixed row bg-trans h-100" tabindex="-1" style="display:none; top:0; left:0; right:0;z-index:999;background: rgba(137, 191, 202, 0.48)">
	<div class="d-flex justify-content-center vw-100">
		<div class="d-flex align-items-center" style="width: 15%;top:50vh">
			<img src="https://media3.giphy.com/media/1YePlEuqaWfba/source.gif" alt="" class="w-100">
		</div>
	</div>
</div>

<div id="logo" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="form-group">
					<label>Upload Logo Perusahaan</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="text" class="custom-file-input" id="view-logo" name="logo" hidden readonly>
							<input type="file" class="custom-file-input" id="view-logo_new" aria-describedby="btn-upload">
							<label class="custom-file-label" for="view-logo">Cari file</label>
						</div>
						<div class="input-group-append">
							<button class="btn btn-primary" type="button" id="btn-upload">Upload</button>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center w-100 ">
					<img style="display:none" src="" alt="logo perusahaan" id="prev-view-logo" class="w-75 text-center">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="view">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ubah Jabatan <span id="jabatan-nama"></span></h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<form id="form-view-jabatan" class="form-view">
				<div class="modal-body" id="form-data">
					<div class="form-group">
						<input id="jabatan-users_id" class="form-control" type="text" name="users_id" hidden readonly>
						<input id="jabatan-perusahaan_id" class="form-control" type="number" name="perusahaan_id" hidden readonly value="<?= $id ?>">
						<label for="jabatan-view">Jabatan</label>
						<input type="text" id="jabatan-view" name="jabatan" class="form-control">
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
	$('#view-logo_new').change(function() {
		let filename = document.getElementById('view-logo_new').files[0].name
		$('label.custom-file-label').html(filename)
		$('#prev-view-logo').show()
	})

	$('#btn-upload').click(async function(e) {
		if (document.getElementById('view-logo_new').files[0] == undefined) {
			$('label.custom-file-label').html('<span class="text-danger">Pilih file terlebih dahulu</span>');
		} else {
			await $('#progress-upload').fadeIn().delay(500)
			$('body').addClass('overflow-hidden')
			let formData = new FormData();
			formData.append('logo_new', document.getElementById('view-logo_new').files[0])
			formData.append('nama', $('#view-nama').val())
			formData.append('logo', $('#view-logo').val())
			formData.append('id', $('#view-id').val())
			await setTimeout(async function() {
				await $.ajax({
					type: "POST",
					url: api + 'service/perusahaan/upload',
					data: formData,
					async: false,
					processData: false,
					contentType: false,
					success: function(response) {
						setTimeout(function() {
							response_alert(response)
							if (!response.error) {
								$('#view-logo').val(response.data.logo)
								$('#prev-view-logo_perusahaan').attr('src', response.data.logo)
								$('label.custom-file-label').html('<span class="text-primary">File berhasil diupload</span>')
								$('#logo').modal('hide')
							}
						}, 500)
					}
				})
				await $('body').removeClass('overflow-hidden')
				await $('#progress-upload').fadeOut()
			}, 1500)
		}
	});
	$("#view-logo_new").change(function() {
		readURL(this)
	})

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader()
			reader.onload = function(e) {
				$('#prev-view-logo').attr('src', e.target.result)
			}
			reader.readAsDataURL(input.files[0])
		}
	}

	function getList() {
		$.ajax({
			type: "GET",
			url: api + 'service/pengurus/get/<?= $id ?>',
			success: function(response) {
				let dataUser = response.data.user
				let dataPengurus = response.data.pengurus
				let listPengurus = listUser = ""
				dataUser.forEach(element => {
					listUser += `<option value="${element.id}">${element.nama+'  ('+element.id+')'}</option>`
				})
				dataPengurus.forEach(element => {
					listPengurus += `<div class="card col-sm-3 ">
								<div class="card-body shadow rounded">
									<div style="height:200px">
										<img src="${element.foto}" alt="" class="w-100 h-100 click" style="object-fit:cover; object-position: center" onclick="view('${element.id}','${element.jabatan}','${element.nama}')">
									</div>
									<hr>
									<div class="d-flex justify-content-between">
									<span class="h5 card-title click" onclick="view('${element.id}','${element.jabatan}','${element.nama}')">${element.nama} (${element.jabatan})</span>
									<span><button type="button" class="btn btn-default" onclick="del(${element.id},${element.perusahaan_id},'${element.nama}')"><i class="fas fa-trash"></i></button></span>
									</div>
								</div>
							</div>`
				})
				$('#listPengurus').html(listPengurus)
				$('#view-user').html(listUser)
			}
		})
	}

	function view(id, jabatan, nama) {
		$('#jabatan-nama').text(nama)
		$('#jabatan-view').val(jabatan)
		$('#jabatan-users_id').val(id)
		$('#view').modal('show')
	}
	$(document).ready(function() {
		getList()

		$.ajax({
			type: "GET",
			url: api + 'service/perusahaan/get/<?= $id ?>',
			success: function(response) {
				let data = response.data
				for (key in data) {
					$(`#view-${key}`).val(data[key])
				}
				$('#prev-view-logo_perusahaan').attr('src', data.logo)
			}
		});

		$('#form-view-profil').validate({
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
					max: 2020
				},
				luas_ruang_produksi: {
					required: true
				},
				pegawai_tetap: {
					required: true
				},
				pegawai_tidak_tetap: {
					required: true
				},
				telepon: {
					required: true
				}
			},
			submitHandler: function(form) {
				let temp = $('#form-view-profil').serialize()
				let formData = new FormData()
				formData.append('akta_new', document.getElementById('view-akta_new').files[0])
				formData.append('izin_new', document.getElementById('view-izin_new').files[0])
				temp = temp.split('&')
				temp.forEach(value => {
					let temp_value = value.split('=')
					formData.append(temp_value[0], decodeURI(temp_value[1]))
				})
				$.ajax({
					type: "POST",
					url: api + "service/perusahaan/update",
					data: formData,
					async: false,
					processData: false,
					contentType: false,
					success: function(response) {
						response_alert(response)
						if (!response.error)
							window.location.replace(api + 'admin/perusahaan/' + response.data.slug)
					}
				})
			}
		})

		$('#form-view-kepemilikan').validate({
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: api + "service/kepemilikan/create",
					data: $("#form-view-kepemilikan").serialize(),
					success: function(response) {
						response_alert(response)
						if (!response.error) {
							$('#table-kepemilikan').dataTable().api().ajax.reload()
							$('#form-view-kepemilikan').trigger('reset')
						}
					}
				});
			}
		})

		$('#form-view-aset').validate({
			rules: {
				nama_aset: {
					required: true
				},
				nilai_aset: {
					required: true
				},
				tahun_perolehan: {
					required: true,
					min: 2000,
					max: 2020
				}
			},
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: api + "service/aset/create",
					data: $("#form-view-aset").serialize(),
					success: function(response) {
						response_alert(response)
						if (!response.error) {
							$('#table-aset').dataTable().api().ajax.reload()
							$('#form-view-aset').trigger('reset')
						}
					}
				});
			}
		})

		$('#form-view-pengurus').validate({
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: api + "service/pengurus/create",
					data: $('#form-view-pengurus').serialize(),
					success: function(response) {
						response_alert(response)
						if (!response.error) {
							getList()
							$('#form-view-pengurus').trigger('reset')
						}
					}
				});
			}
		})
		$("#form-view-jabatan").validate({
			submitHandler: (form) => {
				let name = $('#jabatan-nama').text()
				konfirmasi(`mengubah jabatan pengurus ${name}.`).then((willSave) => {
					if (willSave) {
						$.ajax({
							type: "POST",
							url: api + "service/pengurus/update",
							data: $('#form-view-jabatan').serialize(),
							success: function(response) {
								response_alert(response)
								if (!response.error) {
									getList()
									$('#view').modal('hide')
								}
							}
						});
					}
				})
			}
		})

		$('#table-kepemilikan').DataTable({
			"ajax": api + 'service/kepemilikan/get/<?= $id ?>',
			"columns": [{
				"render": function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				},
				className: "text-center"
			}, {
				"data": "nama"
			}, {
				"data": "tipe"
			}, {
				"data": "kewarganegaraan"
			}, {
				"data": "asal_negara"
			}, {
				"render": (data, type, row, meta) => {
					return row.presentase + '%'
				}
			}, {
				"render": function(data, type, JsonResultRow, meta) {
					return '<button class="btn btn-light"><i class="fas fa-trash"></i>Hapus </button>';
				}
			}]
		})

		$('#table-aset').DataTable({
			"ajax": api + 'service/aset/get/<?= $id ?>',
			"columns": [{
				"render": function(data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
				},
				className: "text-center"
			}, {
				"data": "nama_aset"
			}, {
				"data": "tahun_perolehan"
			}, {
				"data": "nilai_aset"
			}, {
				"render": function(data, type, JsonResultRow, meta) {
					return '<button class="btn btn-light"><i class="fas fa-trash"></i>Hapus </button>';
				}
			}]
		})

		$('#table-kepemilikan tbody').on('click', 'button', function() {
			var data = $('#table-kepemilikan').DataTable().row($(this).parents('tr')).data()
			swal({
					title: "Apakah Kamu yakin?",
					text: `menghapus data ${data.nama} sebagai pemilik modal ini!`,
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							type: "POST",
							url: api + 'service/kepemilikan/delete',
							data: {
								id: data.id,
							},
							success: function(response) {
								response_alert(response)
								if (!response.error)
									$('#table-kepemilikan').dataTable().api().ajax.reload()
							}
						})
					}
				})
		})

		$('#table-aset tbody').on('click', 'button', function() {
			var data = $('#table-aset').DataTable().row($(this).parents('tr')).data()
			swal({
					title: "Apakah Kamu yakin?",
					text: `menghapus data ${data.nama_aset} sebagai pemilik modal ini!`,
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						$.ajax({
							type: "POST",
							url: api + 'service/aset/delete',
							data: {
								id: data.id,
							},
							success: function(response) {
								response_alert(response)
								if (!response.error)
									$('#table-aset').dataTable().api().ajax.reload()
							}
						})
					}
				})
		})
	})

	$("#view-logo").change(function() {
		readURL(this)
	})

	function del(id, perusahaan, nama) {
		swal({
				title: "Apakah Kamu yakin?",
				text: `menghapus data ${nama} sebagai pengurus perusahaan ini!`,
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({
						type: "POST",
						url: api + 'service/pengurus/delete',
						data: {
							users_id: id,
							perusahaan_id: perusahaan,
						},
						success: function(response) {
							response_alert(response)
							if (!response.error)
								getList()
						}
					})
				}
			})
	}

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader()
			reader.onload = function(e) {
				$('#prev-view-logo').attr('src', e.target.result)
			}
			reader.readAsDataURL(input.files[0])
		}
	}
</script>
