<link rel="stylesheet" href="<?= base_url() . 'assets/css/viewer.min.css' ?>">
<link rel="stylesheet" href="<?= base_url() . 'assets/css/verifikasi-timeline.css' ?>">
<div class="main-content">
	<section class="section">
		<div class="section-header d-block justify-content-start align-items-center">
			<a href="<?= base_url('admin/verifikasi') ?>"><i class="fa fa-chevron-left h5"></i>
			</a>
			<h1 class="pt-2 pb-2 mt-0 ml-3"><?= $title ?></h1>
		</div>
		<div class="section-body">
			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-body">
							<ul class="nav nav-pills sticky-top bg-white py-3 px-3 shadow-light" id="myTab3" role="tablist">
								<li class="nav-item" style="line-height: 28px">
									<a class="nav-link active" id="ringkasan-tab3" data-toggle="tab" href="#ringkasan3" role="tab" aria-controls="ringkasan" aria-selected="true">Ringkasan</a>
								</li>
								<li class="nav-item" style="line-height: 28px">
									<a class="nav-link" id="produk-tab3" data-toggle="tab" href="#produk3" role="tab" aria-controls="produk" aria-selected="false">Produk</a>
								</li>
								<li class="nav-item" style="line-height: 28px">
									<a class="nav-link" id="tim-tab3" data-toggle="tab" href="#tim3" role="tab" aria-controls="tim" aria-selected="false">Tim</a>
								</li>
								<li class="nav-item" style="line-height: 28px">
									<a class="nav-link" id="bisnis-tab3" data-toggle="tab" href="#bisnis3" role="tab" aria-controls="bisnis" aria-selected="false">Bisnis</a>
								</li>
								<li class="nav-item" style="line-height: 28px">
									<a class="nav-link" id="foto-tab3" data-toggle="tab" href="#foto3" role="tab" aria-controls="foto" aria-selected="false">Foto</a>
								</li>
								<li class="nav-item" style="line-height: 28px">
									<a class="nav-link" id="riwayat-tab3" data-toggle="tab" href="#riwayat3" role="tab" aria-controls="riwayat" aria-selected="false">Riwayat</a>
								</li>
								<li class="nav-item" style="line-height: 28px">
									<a class="nav-link" id="verifikasi-tab3" data-toggle="tab" href="#verifikasi3" role="tab" aria-controls="verifikasi" aria-selected="false">Verifikasi</a>
								</li>
							</ul>
							<div class="tab-content py-4" id="myTabContent2">
								<div class="tab-pane fade show active" id="ringkasan3" role="tabpanel" aria-labelledby="ringkasan-tab3">
									<div class="row pb-4 border-bottom border-light mb-4">
										<div class="col-md-4 text-center">
											<img src="" alt="" id="logo_produk" class="img-fluid">
											<h5 id="nama_produk"></h5>
											<p><strong>Jenis:</strong> <span id="jenis"></span></p>
											<p><strong>Bidang:</strong> <span id="bidang"></span></p>
											<p><strong>produksi barang fisik:</strong> <span id="produksi_barang_fisik"></span></p>
											<p><strong>Kategori:</strong> <span id="kategori"></span></p>
										</div>
										<div class="col-md-8">
											<h5>Deskripsi</h5>
											<p id="deskripsi_singkat"></p>
											<div class="row">
												<div class="col-md-3">
													<h5>Website</h5>
													<p id="website"></p>
												</div>
												<div class="col-md-3">
													<h5>Sosial Media</h5>
													<p id="sosial_media"></p>
												</div>
												<div class="col-md-3">
													<h5>Tautan Video</h5>
													<p id="tautan_video"></p>
												</div>
												<div class="col-md-3">
													<h5>Kesiapan Teknologi</h5>
													<p id="kesiapan_teknologi"></p>
												</div>
											</div>
										</div>
									</div>
									<h5>Deskripsi Lengkap</h5>
									<p id="deskripsi_lengkap"></p>
									<h5>Latar Belakang</h5>
									<p id="latar_belakang"></p>
									<h5>Masalah</h5>
									<p id="masalah"></p>
									<h5>Solusi</h5>
									<p id="solusi"></p>
									<h5>Keunggulan & Keunikan</h5>
									<p id="keunggulan_keunikan"></p>
									<h5>Kegunaan & Manfaat</h5>
									<p id="kegunaan_manfaat"></p>
									<h5>Spesifikasi Teknis</h5>
									<p id="spesifikasi_teknis"></p>
									<h5>Keterbaharuan Produk</h5>
									<p id="keterbaharuan_produk"></p>
									<h5>Teknologi yang Dikembangkan</h5>
									<p id="teknologi_yang_dikembangkan"></p>
									<h5>Rencana Pengembangan</h5>
									<p id="rencana_pengembangan"></p>
								</div>
								<div class="tab-pane fade" id="produk3" role="tabpanel" aria-labelledby="produk-tab3">
									<h5>Roadmap Riset & Pengembangan Produk</h5>
									<div class="table-responsive">
										<table class="table table-striped w-100" id="table-roadmap">
											<thead>
												<tr>
													<th class="text-center">
														No.
													</th>
													<th>Nama Riset / Pengembangan</th>
													<th>Tahun Mulai</th>
													<th>Tahun Selesai</th>
													<th>Aktivitas</th>
													<th>Skema</th>
													<th>Sumber Pendanaan</th>
													<th>Nilai</th>
													<th>Tujuan</th>
													<th>Hasil</th>

												</tr>
											</thead>

										</table>
									</div>
									<h5 class="mt-4">Pengujian</h5>
									<div class="table-responsive">
										<table class="table table-striped w-100" id="table-pengujian">
											<thead>
												<tr>
													<th class="text-center">
														No.
													</th>
													<th>Nama</th>
													<th>Tahun</th>
													<th>Status</th>
													<th>Jenis</th>
													<th>Lembaga</th>
													<th>Tujuan</th>
													<th>Hasil</th>

												</tr>
											</thead>

										</table>
									</div>
									<h5 class="mt-4">Sertifikasi / Perijinan</h5>
									<div class="table-responsive">
										<table class="table table-striped w-100" id="table-sertifikasi">
											<thead>
												<tr>
													<th class="text-center">
														No.
													</th>
													<th>Nama / Jenis</th>
													<th>Status</th>
													<th>Nomor Permohonan</th>
													<th>File Permohonan</th>
													<th>Nomor Sertifikat</th>
													<th>File Sertifikat</th>
													<th>Tanggal Sertifikat Mulai Berlaku</th>
													<th>Tanggal Sertifikat Berakhir</th>
													<th>Pemilik Sertifikasi</th>
													<th>Deskripsi</th>
												</tr>
											</thead>

										</table>
									</div>
									<h5 class="mt-4">Mitra dan Kerjasama</h5>
									<div class="table-responsive">
										<table class="table table-striped w-100" id="table-mitra">
											<thead>
												<tr>
													<th class="text-center">
														No.
													</th>
													<th>Nama</th>
													<th>Isi Kerjasama</th>
													<th>MoU</th>
												</tr>
											</thead>

										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="tim3" role="tabpanel" aria-labelledby="tim-tab3">
									<div id="list-inventor" class="row"></div>
								</div>
								<div class="tab-pane fade" id="bisnis3" role="tabpanel" aria-labelledby="tim-tab3">
									<p>Status Usaha: <strong id="status-usaha"></strong></p>
									<h5>Target Pasar</h5>
									<p id="target-pasar"></p>
									<h5>Kompetitor</h5>
									<p id="kompetitor"></p>
									<h5>Jangkauan Pemasaran</h5>
									<p id="jangkauan-pemasaran"></p>
									<h5>Kanal Pemasaran</h5>
									<p id="kanal-pemasaran"></p>
									<h5>Dampak Sosial</h5>
									<p id="dampak-sosial"></p>
									<h5>Skema Harga</h5>
									<p id="skema-harga"></p>
									<p>Harga Pokok Produksi: <strong id="hpp"></strong></p>
									<h5>Pemasaran</h5>
									<div class="table-responsive">
										<table class="table table-striped w-100" id="table-pemasaran">
											<thead>
												<tr>
													<th class="text-center">
														No.
													</th>
													<th>Jenis jangkauan pemasaran</th>
													<th>Volume pemasaran</th>
													<th>Nilai pemasaran</th>
												</tr>
											</thead>
										</table>
									</div>

									<h5>Produksi</h5>
									<div class="table-responsive">
										<table class="table table-striped w-100" id="table-produksi">
											<thead>
												<tr>
													<th class="text-center">
														No.
													</th>
													<th>Tahun Produksi</th>
													<th>Jumlah Produksi</th>
													<th>Satuan</th>
												</tr>
											</thead>
										</table>
									</div>

									<h5>Penjualan</h5>
									<div class="table-responsive">
										<table class="table table-striped w-100" id="table-penjualan">
											<thead>
												<tr>
													<th class="text-center">
														No.
													</th>
													<th>Tahun Penjualan</th>
													<th>Jumlah Penjualan</th>
													<th>Satuan</th>
												</tr>
											</thead>
										</table>
									</div>

									<h5>Omset / Profit</h5>
									<div class="table-responsive">
										<table class="table table-striped w-100" id="table-omset">
											<thead>
												<tr>
													<th class="text-center">
														No.
													</th>
													<th>Tipe</th>
													<th>Tahun</th>
													<th>Nilai</th>
												</tr>
											</thead>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="foto3" role="tabpanel" aria-labelledby="tim-tab3">
									<h5>Foto Produk</h5>
									<div id="foto-produk" class="row"></div>
									<h5>Foto Kegiatan</h5>
									<div id="foto-kegiatan" class="row"></div>
								</div>
								<div class="tab-pane fade show" id="riwayat3" role="tabpanel" aria-labelledby="riwayat-tab3">

									<button class="btn btn-primary btn-icon icon-left mb-4" data-toggle="modal" data-target="#view"><i class="fa fa-download"></i> Download File Penting</button>
									<div class="row">
										<div class="col-md-12">
											<div id="timeline-wrap" class="main-timeline4">


											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="verifikasi3" role="tabpanel" aria-labelledby="tim-tab3">
									<form class="form-add-verifikasi" id="form-add-verifikasi">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="add-katsinov">Pilih tingkat katsinov</label>
													<select name="katsinov" id="add-katsinov" class="form-control" required>
														<option selected disabled>silahkan pilih Katsinov</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="add-file">File Evaluasi Katsinov</label>
													<input type="file" name="file_katsinov" id="add-file_katsinov" class="form-control" required>
													<a href="https://srv-file14.gofile.io/download/zcwImW/KATSINOV%20(IRL)%20-%20Meter%20(final).xls" target="_blank" class="ml-3 mt-3 text-decoration-none">Unduh Form Katsinov</a>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="add-tkt">Pilih tingkat TKT</label>
													<select name="tkt" id="add-tkt" class="form-control" required>
														<option selected disabled>silahkan pilih TKT</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="add-file">File Evaluasi TKT</label>
													<input type="file" name="file_tkt" id="add-file_tkt" class="form-control" required>
													<a href="https://srv-file14.gofile.io/download/zcwImW/TeknoMeter_v2.5.xlsx" target="_blank" class="ml-3 mt-3 text-decoration-none">Unduh Form TKT</a>
												</div>
											</div>
										</div>
										<button class="btn btn-primary d-block mr-0 ml-auto" type="submit">Verifikasi</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<div class="modal fade" id="view">
	<div class="modal-dialog modal-dialog-centered" role="document" style="z-index:9999999">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Download Penilaian</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<div class="modal-body row text-center" id="form-data">
			</div>
		</div>
	</div>
</div>

<style>
	p {
		margin-bottom: 0.25rem
	}

	h5 {
		font-weight: bold
	}

	ul:not(.list-unstyled),
	ol {
		line-height: 0px
	}
</style>

<script>
	let download = (link) => window.open(link)

	function insertText(id, text) {
		let newText = text;
		if (text == null || text == '') {
			newText = '-'
		}
		$(id).append(newText)
	}

	function insertTextArray(id, textArray) {
		textArray.forEach(element => {
			insertText(id, element + ', ')
		})
	}

	function insertImage(id, image) {
		let newImage = image;
		if (image == null) {
			newImage = ''
		}
		$(id).attr('src', newImage)
	}

	function showProductGallery() {
		const gallery = new Viewer(document.getElementById('foto-produk'));
	}

	function showActivityGallery() {
		const gallery = new Viewer(document.getElementById('foto-kegiatan'));
	}

	$(document).ready(function() {

		$.ajax({
			method: 'get',
			url: "<?= base_url() . 'service/super/get/' . $slug ?>",
			dataType: 'json',
			success: (r) => {
				const produk = r.data.produk
				//produk
				insertImage('#logo_produk', produk.logo_produk)
				insertText('#nama_produk', produk.nama_produk)
				insertText('#jenis', produk.jenis)
				insertTextArray('#kategori', produk.kategori)
				insertText('#bidang', produk.bidang)
				insertText('#produksi_barang_fisik', produk.produksi_barang_fisik)
				insertText('#deskripsi_singkat', produk.deskripsi_singkat)
				insertText('#website', produk.website)
				insertText('#sosial_media', produk.media_sosial)
				insertText('#tautan_video', produk.tautan_video)
				insertText('#kesiapan_teknologi', produk.kesiapan_teknologi)
				//landasan
				insertText('#deskripsi_lengkap', produk.deskripsi_lengkap)
				insertText('#latar_belakang', produk.latar_belakang)
				insertText('#masalah', produk.masalah)
				insertText('#solusi', produk.solusi)
				//rancangan
				insertText('#keunggulan_keunikan', produk.keunggulan_keunikan)
				insertText('#kegunaan_manfaat', produk.kegunaan_manfaat)
				insertText('#spesifikasi_teknis', produk.spesifikasi_teknis)
				insertText('#keterbaharuan_produk', produk.keterbaharuan_produk)
				insertText('#teknologi_yang_dikembangkan', produk.teknologi_yang_dikembangkan)
				insertText('#rencana_pengembangan', produk.rencana_pengembangan)
				//table-roadmap
				const roadmap = r.data.roadmap
				$('#table-roadmap').DataTable({
					"data": roadmap,
					columns: [{
							"render": function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							},
							// className: "text-center"
						}, {
							data: "nama"
						},
						{
							data: "tahun_mulai"
						},
						{
							data: "tahun_selesai"
						},
						{
							data: "aktivitas"
						},
						{
							data: "skema"
						},
						{
							data: "sumber_pendanaan"
						},
						{
							data: "nilai_pendanaan"
						},
						{
							data: "tujuan"
						},
						{
							data: "hasil"
						},
					]

				});
				//table-pengujian
				const pengujian = r.data.pengujian
				$('#table-pengujian').DataTable({
					"data": pengujian,
					columns: [{
							"render": function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							},
							// className: "text-center"
						}, {
							data: "nama"
						},
						{
							data: "tahun"
						},
						{
							data: "status"
						},
						{
							data: "jenis"
						},
						{
							data: "lembaga"
						},
						{
							data: "tujuan"
						},
						{
							data: "hasil"
						},
					]

				});
				//sertifikat dan perijinan
				const sertifikasi = r.data.ki
				$('#table-sertifikasi').DataTable({
					"data": sertifikasi,
					columns: [{
							"render": function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							},
							// className: "text-center"
						}, {
							data: "jenis"
						},
						{
							data: "status_perolehan"
						},
						{
							data: "no_pemohon"
						},
						{
							"render": function(data, type, row, meta) {
								if (row.file_formulir != null) {

									return `<a target="_blank" href="${row.file_formulir}">${row.file_formulir.split('/').pop()}</a>`
								} else {
									return '<p>-</p>'
								}
							}
						},
						{
							data: "no_sertifikat"
						},
						{
							"render": function(data, type, row, meta) {
								if (row.file != null) {

									return `<a target="_blank" href="${row.file}">${row.file.split('/').pop()}</a>`
								} else {
									return '<p>-</p>'
								}
							}
						},
						{
							data: "tanggal_mulai"
						},
						{
							data: "tanggal_selesai"
						},
						{
							data: "pemegang"
						},
						{
							data: "deskripsi"
						},
					]

				});

				//mitra
				const mitra = r.data.mitra
				$('#table-mitra').DataTable({
					"data": mitra,
					columns: [{
							"render": function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							},
							// className: "text-center"
						}, {
							data: "nama_mitra"
						},
						{
							data: "tujuan"
						},
						{
							"render": function(data, type, row, meta) {
								return `<a target="_blank" href="${row.mou}">${row.mou.split('/').pop()}</a>`
							}
						},

					]

				});

				//data bisnis
				const bisnis = r.data.data_bisnis
				if (bisnis.data_dasar != null) {
					const data_dasar = bisnis.data_dasar
					insertText('#status-usaha', data_dasar.status_usaha)
					insertText('#target-pasar', data_dasar.target_pasar)
					insertText('#kompetitor', data_dasar.kompetitor)
					insertText('#jangkauan-pemasaran', data_dasar.jangkauan)
					insertText('#kanal-pemasaran', data_dasar.kanal_pemasaran)
					insertText('#dampak-sosial', data_dasar.dampak_sosial)
					insertText('#skema-harga', data_dasar.skema_harga)
					insertText('#hpp', data_dasar.harga_produksi)
				}

				const pemasaran = bisnis.pemasaran
				$('#table-pemasaran').DataTable({
					"data": pemasaran,
					columns: [{
							"render": function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							},
							// className: "text-center"
						}, {
							data: "jangkauan"
						},
						{
							data: "volume_pemasaran"
						},
						{
							data: "nilai_pemasaran"
						},
					]

				});

				const produksi = bisnis.produksi
				$('#table-produksi').DataTable({
					"data": produksi,
					columns: [{
							"render": function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							},
							// className: "text-center"
						},
						{
							data: "tahun"
						},
						{
							data: "jumlah"
						}, {
							data: "satuan"
						},

					]

				});

				const penjualan = bisnis.penjualan
				$('#table-penjualan').DataTable({
					"data": penjualan,
					columns: [{
							"render": function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							},
							// className: "text-center"
						},
						{
							data: "tahun"
						},
						{
							data: "jumlah"
						}, {
							data: "satuan"
						},

					]

				});

				const omset = bisnis.omset
				$('#table-omset').DataTable({
					"data": omset,
					columns: [{
							"render": function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							},
							// className: "text-center"
						},
						{
							data: "tipe"
						},
						{
							data: "tahun"
						}, {
							data: "nilai"
						},

					]

				});

				//inventor
				let listInventor = '';
				const dataInventor = r.data.inventor
				dataInventor.forEach(element => {
					listInventor += `<div class="card col-md-3 ">
								<div class="card-body shadow rounded">
									<div style="height:200px">
										<img src="${element.foto}" alt="" class="w-100 h-100" style="object-fit:cover; object-position: center">
									</div>
									<hr>
									<div class="d-flex justify-content-between">
									<p class="card-title" >${element.nama}<br />(${element.fakultas})</p>
									</div>
								</div>
							</div>`
				})
				$('#list-inventor').append(listInventor)

				//foto produk
				let listFotoProduk = '';
				const dataFotoProduk = r.data.foto_produk
				dataFotoProduk.forEach(element => {
					listFotoProduk += `<li class="card col-md-3 ">
								<div class="card-body shadow rounded">
									<div style="height:200px">
										<img src="${element.foto}" alt="" class="w-100 h-100 click" style="object-fit:cover; object-position: center" onclick="showProductGallery()">
									</div>
									<hr>
									<div class="d-flex justify-content-between">
									<p class="card-title" >${element.title}<br /></p>
									</div>
								</div>
							</li>`
				})

				$('#foto-produk').append(listFotoProduk)

				//foto kegiatan
				let listFotoKegiatan = '';
				const dataFotoKegiatan = r.data.foto_kegiatan
				dataFotoKegiatan.forEach(element => {
					listFotoKegiatan += `<div class="card col-md-3 ">
								<div class="card-body shadow rounded">
									<div style="height:200px">
										<img src="${element.foto}" alt="" class="w-100 h-100 click" style="object-fit:cover; object-position: center" onclick="showActivityGallery()">
									</div>
									<hr>
									<div class="d-flex justify-content-between">
									<p class="card-title" >${element.title}<br /></p>
									</div>
								</div>
							</div>`
				})
				$('#foto-kegiatan').append(listFotoKegiatan)

				//riwayat
				if (produk.file_tambahan != null && produk.file_tambahan != "") {
					let file_tambahan = `<div class="col">
						<button class="btn btn-light w-100" onclick="download('${produk.file_tambahan}')">File Tambahan</button>
					</div>`
					$('#form-data').append(file_tambahan)
				}

				if (r.data.data_bisnis.data_dasar != null) {
					if (bisnis.data_dasar.bmc != null && bisnis.data_dasar.bmc != "") {
						let file_bmc = `<div class="col">
						<button class="btn btn-light w-100" onclick="download('${bisnis.data_dasar.bmc}')">File BMC</button>
					</div>`
						$('#form-data').append(file_bmc)
					}

					if (bisnis.data_dasar.keuangan != null && bisnis.data_dasar.keuangan != "") {
						let file_kauangan = `<div class="col">
						<button class="btn btn-light w-100" onclick="download('${bisnis.data_dasar.keuangan}')">File Keuangan</button>
					</div>`
						$('#form-data').append(file_kauangan)
					}
				}


				const riwayat = r.data.riwayat
				riwayat.forEach(element => {
					$('#timeline-wrap').append(`<div class="timeline">
													<div class="timeline-content">
														<span class="year">${element.tahun}</span>
														<div class="inner-content">
															<h3 class="title">${element.type}</h3>
															<p class="description">
																${element.riwayat}
															</p>
														</div>
													</div>
												</div>`)
				});

			}
		})

		$('#form-add-verifikasi').validate({
			rules: {
				tkt: {
					required: true
				},
				katsinov: {
					required: true
				},
				file_katsinov: {
					required: true
				},
				file_tkt: {
					required: true
				},
			},
			submitHandler: function(form) {
				konfirmasi("memberikan penilaian TKT dan Katsinov dengan benar.").then((willSave) => {
					let formData = new FormData()
					formData.append('file_tkt', document.getElementById('add-file_tkt').files[0])
					formData.append('file_katsinov', document.getElementById('add-file_katsinov').files[0])
					formData.append('tkt', $('#add-tkt').val())
					formData.append('katsinov', $('#add-katsinov').val())
					formData.append('produk_id', <?= $id ?>)
					formData.append('id', sessionStorage.getItem("verifikasi_id"))
					$.ajax({
						type: "POST",
						url: api + "service/pengajuan/update",
						data: formData,
						async: false,
						processData: false,
						contentType: false,
						success: (response) => {
							response_alert(response)
							if (!response.error) {
								sessionStorage.clear()
								setTimeout(function() {
									window.location.replace(`<?= base_url() ?>admin/verifikasi`)
								}, 1500)
							}
						}
					})
				})

			}
		})
	})
</script>
