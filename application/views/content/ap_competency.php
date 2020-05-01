<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1><?= $title ?></h1>
		</div>


		<div class="section-body">
			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card ">
						<form id="form-view" name="form-view" method="post">
							<div class="card-body">
								<div class="form-group">
									<input id="view-id" class="form-control" type="text" name="id" hidden readonly>
									<label for="view-nama_produk" class="">Nama Produk <span class="badge badge-secondary badge-xs" data-toggle="tooltip" data-placement="right" title="Tooltip on right">!</span></label>
									<input id="view-nama_produk" class="form-control" type="text" name="nama_produk">
								</div>
								<div class="form-group">
									<label for="view-deskripsi_singkat">Deskripsi Singkat</label>
									<textarea name="deskripsi_singkat" id="view-deskripsi_singkat" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label for="view-kategori">Kategori</label>
									<select id="view-kategori" class="select2" multiple="multiple" data-placeholder="Kategori" style="width: 100%;" name="kategori">
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
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label for="view-jenis">Jenis</label>
											<select class="custom-select" name="jenis" id="view-jenis">
												<option value="digital">Digital</option>
												<option value="non digital">Non Digital</option>
											</select>
										</div>
									</div>
									<div class="col">
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
									<div class="col-12">
										<div class="form-group">
											<label for="view-produksi_barang_fisik">Produksi Barang Fisik</label>
											<select class="custom-select" name="produksi_barang_fisik">
												<option value="ada">Ada</option>
												<option value="tidak">Tidak</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-4">
										<label for="view-logo_produk">Logo Produk</label>
										<input type="file" id="view-logo_produk" name="logo_produk" accept="image/*">
									</div>
									<div class="col-8">
										<img src="" alt="foto content" id="prev-view-logo_produk" class="w-50">
									</div>
								</div>

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

								<!-- CK EDITOR GROUP START-->
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
<script>
	let latarBelakang,
		deskripsiLengkap,
		masalah,
		keunggulanKeunikan,
		keterbaruanProduk,
		solusi,
		spesifikasiTeknis,
		kegunaanManfaat,
		rencanaPengembangan

	editor('latar_belakang', latarBelakang)
	editor('deskripsi_lengkap', deskripsiLengkap)
	editor('masalah', masalah)
	editor('solusi', solusi)
	editor('keterbaruan_produk', keterbaruanProduk)
	editor('spesifikasi_teknis', spesifikasiTeknis)
	editor('kegunaan_manfaat', kegunaanManfaat)
	editor('keunggulan_keunikan', keunggulanKeunikan)
	editor('rencana_pengembangan', rencanaPengembangan)
	$(document).ready(function() {
		$.ajax({
			type: "GET",
			url: api + 'service/produk/get/1',
			success: function(response) {
				let data = response.data
				for (key in data) {
					$('#view-' + key).val(data[key])
				}
				$("#view-kategori").select2({
					tags: true,
					tokenSeparators: data.kategori
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
	});

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
