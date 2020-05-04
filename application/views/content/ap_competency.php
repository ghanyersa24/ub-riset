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


		<div class="section-body">
			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card ">
						<form id="form-view" name="form-view" method="post">
							<div class="card-body">
								<div class="tabs">
									<input type="radio" id="tab1" name="tab-control" checked>
									<input type="radio" id="tab2" name="tab-control">
									<input type="radio" id="tab3" name="tab-control">
									<input type="radio" id="tab4" name="tab-control">
									<ul>
										<li title="produk">
											<label for="tab1" role="button" id="tabs-produk">
												<i class="fas fa-brain"></i>
												<br><span>Produk</span>
											</label>
										</li>
										<li title="landasan">
											<label for="tab2" role="button" id="tabs-landasan">
												<i class="fab fa-react"></i>
												<br><span>Landasan</span>
											</label>
										</li>
										<li title="rancangan">
											<label for="tab3" role="button" id="tabs-rancangan">
												<i class="fas fa-code-branch"></i>
												<br><span>Rancangan</span>
											</label>
										</li>
										<li title="kepemilikan">
											<label for="tab4" role="button" id="tabs-kepemilikan">
												<i class="fas fa-list-ul"></i>
												<br><span>Kesiapan</span>
											</label>
										</li>
									</ul>
									<div class="slider">
										<div class="indicator"></div>
									</div>
									<div class="content">
										<section id="tab-produk">
											<div class="row">
												<div class="col-md-4 px-3 border-right border-default">
													<div class="form-group">
														<input id="view-id" class="form-control" type="text" name="id" hidden readonly>
														<label for="view-nama_produk" class="">Nama Produk <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Tooltip on right">!</span></label>
														<input id="view-nama_produk" class="form-control" type="text" name="nama_produk">
													</div>
													<div class="form-group">
														<label for="view-deskripsi_singkat">Deskripsi Singkat</label>
														<input id="view-deskripsi_singkat" class="form-control" type="text" name="deskripsi_singkat">
													</div>
													<div class="form-group">
														<label for="view-produksi_barang_fisik">Produksi Barang Fisik</label>
														<select class="custom-select" name="produksi_barang_fisik">
															<option value="ada">Ada</option>
															<option value="tidak">Tidak</option>
														</select>
													</div>
													<div class="form-group">
														<label for="view-jenis">Jenis</label>
														<select class="custom-select" name="jenis" id="view-jenis">
															<option value="digital">Digital</option>
															<option value="non digital">Non Digital</option>
														</select>
													</div>
													<div class="form-group">
														<label for="view-bidang">Bidang</label>
														<select class="custom-select" name="bidang" id="view-bidang">
															<option value="Pangan">Pangan</option>
															<option value="Energi">Energi</option>
															<option value="Transportasi">Transportasi</option>
															<option value="Rekayasa Keteknikan">Rekayasa Keteknikan</option>
															<option value="Kesehatan">Kesehatan</option>
															<option value="Pertahanan Keamanan">Pertahanan Keamanan</option>
															<option value="Material Maju">Material Maju</option>
															<option value="Kemaritiman">Kemaritiman</option>
															<option value="Sosial Budaya">Sosial Budaya</option>
														</select>
													</div>
												</div>
												<div class="col-md-8 px-3">
													<div class="form-group">
														<label for="view-website">Website</label>
														<input id="view-website" class="form-control" type="text" name="website">
													</div>
													<div class="form-group">
														<label for="view-media_sosial">Sosial Media</label>
														<input id="view-media_sosial" class="form-control" type="text" name="media_sosial">
													</div>
													<div class="form-group">
														<label for="view-tautan_video">Tautan Video</label>
														<input id="view-tautan_video" class="form-control" type="text" name="tautan_video">
													</div>
													<div class="form-group">
														<label for="view-kategori">Kategori</label>
														<select id="view-kategori" class="select2" multiple="multiple" data-placeholder="Kategori" style="width: 100%;" name="kategori[]">
															<option value="Pangan">Pangan</option>
															<option value="Energi">Energi</option>
															<option value="Transportasi">Transportasi</option>
															<option value="Rekayasa Keteknikan">Rekayasa Keteknikan</option>
															<option value="Kesehatan">Kesehatan</option>
															<option value="Pertahanan Keamanan">Pertahanan Keamanan</option>
															<option value="Material Maju">Material Maju</option>
															<option value="Kemaritiman">Kemaritiman</option>
															<option value="Sosial Budaya">Sosial Budaya</option>
														</select>
													</div>

													<div class="form-group row">
														<div class="col-4">
															<label for="view-logo_produk">Upload Logo</label>
															<button class="btn btn-secondary form-control" type="button" data-toggle="modal" data-target="#logo">pilih logo</button>
														</div>
														<div class="col-8">
															<img src="" alt="foto content" id="prev-view-logo_produk" class="w-50">
														</div>
													</div>
												</div>
											</div>
										</section>

										<section id="tab-landasan">
											<div class="form-group">
												<label for="view-deskripsi_lengkap">Deskripsi Lengkap</label>
												<textarea id="view-deskripsi_lengkap" name="deskripsi_lengkap" class="form-control"></textarea>
											</div>
											<div class="form-group">
												<label for="view-latar_belakang">Latar Belakang</label>
												<textarea id="view-latar_belakang" name="latar_belakang" class="form-control"></textarea>
											</div>
											<div class="form-group">
												<label for="view-masalah">Masalah</label>
												<textarea id="view-masalah" name="masalah" class="form-control"></textarea>
											</div>
											<div class="form-group">
												<label for="view-solusi">Solusi</label>
												<textarea id="view-solusi" name="solusi" class="form-control"></textarea>
											</div>
										</section>
										<section id="tab-rancangan">
											<div class="form-group">
												<label for="view-keunggulan_keunikan">Keunggulan & Keunikan</label>
												<textarea name="keunggulan_keunikan" id="view-keunggulan_keunikan" class="form-control"></textarea>
											</div>
											<div class="form-group">
												<label for="view-kegunaan_manfaat">Kegunaan & Manfaat</label>
												<textarea name="kegunaan_manfaat" id="view-kegunaan_manfaat" class="form-control"></textarea>
											</div>
											<div class="form-group">
												<label for="view-spesifikasi_teknis">Spesifikasi Teknis</label>
												<textarea name="spesifikasi_teknis" id="view-spesifikasi_teknis" class="form-control"></textarea>
											</div>
											<div class="form-group">
												<label for="view-keterbaruan_produk">Keterbaharuan Produk</label>
												<textarea id="view-keterbaruan_produk" name="keterbaruan_produk" class="form-control"></textarea>
											</div>
										</section>
										<section id="tab-kepemilikan">
											<div class="form-group">
												<label for="view-teknologi_yang_dikembangkan">Teknologi yang Dikembangkan</label>
												<textarea id="view-teknologi_yang_dikembangkan" name="teknologi_yang_dikembangkan" class="form-control"></textarea>
											</div>
											<div class="form-group">
												<label for="view-rencana_pengembangan">Rencana Pengembangan</label>
												<textarea id="view-rencana_pengembangan" name="rencana_pengembangan" class="form-control"></textarea>
											</div>
											<!-- CK EDITOR GROUP END -->
											<div class="form-group">
												<label for="view-kesiapan_teknologi">Kesiapan Teknologi</label>
												<select class="custom-select" name="kesiapan_teknologi" id="view-kesiapan_teknologi">
													<option selected disabled>Pilih salah satu</option>
													<option value="masih riset">Masih Riset</option>
													<option value="prototype">Prototype</option>
													<option value="siap komersil">Siap Komersil</option>
												</select>
											</div>
											<div class="form-group">
												<label for="view-kepemilikan_teknologi">Kepemilikan Teknologi</label>
												<select class="custom-select" name="kepemilikan_teknologi" id="view-kepemilikan_teknologi">
													<option selected disabled>Pilih salah satu</option>
													<option value="sendiri">Sendiri </option>
													<option value="instansi">Instansi</option>
												</select>
											</div>

											<div class="form-group">
												<label for="view-pemilik_teknologi">Nama Pemilik Teknologi</label>
												<input id="view-pemilik_teknologi" class="form-control" type="text" name="pemilik_teknologi">
											</div>
										</section>
									</div>
								</div>
							</div>
							<div class="card-footer text-right">
								<button class="btn btn-primary" id="btn-save" type="submit">Simpan Perubahan</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<div id="progress-upload" class="position-fixed row bg-trans h-100" tabindex="-1" style="display:none; top:0; left:0; right:0;z-index:999999;background: rgba(137, 191, 202, 0.48)">
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
					<label>Upload Logo Produk</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="view-logo" aria-describedby="btn-upload">
							<label class="custom-file-label" for="view-logo">Cari file</label>
						</div>
						<div class="input-group-append">
							<button class="btn btn-primary" type="button" id="btn-upload">Upload</button>
						</div>
					</div>
				</div>
				<div class="d-flex justify-content-center w-100 ">
					<img style="display:none" src="" alt="logo produk" id="prev-view-logo" class="w-75 text-center">
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#view-logo').change(function() {
		let filename = document.getElementById('view-logo').files[0].name
		$('label.custom-file-label').html(filename)
		$('#prev-view-logo').show()
	})

	$('#btn-upload').click(async function(e) {
		if (document.getElementById('view-logo').files[0] == undefined) {
			$('label.custom-file-label').html('<span class="text-danger">Pilih file terlebih dahulu</span>');
		} else {
			await $('#progress-upload').fadeIn().delay(500)
			$('body').addClass('overflow-hidden')
			let formData = new FormData();
			formData.append('logo_produk', document.getElementById('view-logo').files[0])
			formData.append('id', $('#view-id').val())
			await setTimeout(async function() {
				await $.ajax({
					type: "POST",
					url: api + 'service/produk/upload',
					data: formData,
					async: false,
					processData: false,
					contentType: false,
					success: function(response) {
						setTimeout(function() {
							response_alert(response)
							if (!response.error) {
								$('#prev-view-logo_produk').attr('src', response.data.logo_produk)
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
	$(document).ready(function() {
		triggerEditor('#form-view')
		$.ajax({
			type: "GET",
			url: api + 'service/produk/get/<?= $id ?>',
			success: function(response) {
				let data = response.data
				for (key in data) {
					$(`#view-${key}`).val(data[key])
				}
				$('#prev-view-logo_produk').attr('src', response.data.logo_produk)

				setEditor('view-latar_belakang', data.latar_belakang)
				setEditor('view-deskripsi_lengkap', data.deskripsi_lengkap)
				setEditor('view-masalah', data.masalah)
				setEditor('view-keunggulan_keunikan', data.keunggulan_keunikan)
				setEditor('view-keterbaruan_produk', data.keterbaruan_produk)
				setEditor('view-solusi', data.solusi)
				setEditor('view-spesifikasi_teknis', data.spesifikasi_teknis)
				setEditor('view-kegunaan_manfaat', data.kegunaan_manfaat)
				setEditor('view-teknologi_yang_dikembangkan', data.teknologi_yang_dikembangkan)
				setEditor('view-rencana_pengembangan', data.rencana_pengembangan)

				let kategori = JSON.parse(data.kategori)
				$(`#view-kategori`).val(kategori)
				$("#view-kategori").select2({
					tags: true,
					tokenSeparators: kategori
				})
			}
		})

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
				},
				kesiapan_teknologi: {
					required: true
				},
				kepemilikan_teknologi: {
					required: true
				},
				pemilik_teknologi: {
					required: true
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
						$.ajax({
							type: "POST",
							url: api + "service/produk/update",
							data: data,
							dataType: "json",
							success: function(response) {
								response_alert(response)
								setTimeout(function() {
									window.location.replace(`<?= base_url() ?>admin/detail/${pad(response.data.id)+'-'+response.data.nama_produk.replace(/ /gi,"-")}`)
								}, 2000)
							}
						})
					}
				})
			}
		})
	});

	$("#view-logo").change(function() {
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
</script>

