      <!-- Main Content -->

      <link rel="stylesheet" href="<?= base_url('assets/css/timeline.css') ?>">
      <div class="main-content">
      	<section class="section">
      		<div class="section-header">
      			<h1><?= $title ?></h1>
      		</div>
      		<div class="section-body">
      			<h2 class="section-title">Brawijaya Riset dan Inovasi</h2>
      			<p class="section-lead">Halaman untuk mengelola <?= $title ?>.</p>
      			<div class="row">
      				<div class="col-12">
      					<div class="card">
      						<div class="card-body row" id="kompetensi">
      							<div class="container">
      								<div class="row align-items-center mb-3">
      									<div class="col-md-6">
      										<h4>Roadmap Pengisian Produk</h4>
      									</div>
      									<div class="col-md-6">
      										<div class="d-flex flex-wrap justify-content-end align-items-center mr-0">
      											<a href="<?= base_url() . 'admin/tambahan/' . $slug ?>">
      												<button class="btn btn-icon icon-left btn-primary mr-md-2 mb-2 ml-0 mr-auto">
      													<i class="fa fa-plus"></i>
      													Data Tambahan</button>
      											</a>
      											<button id="btn-ajukan" class="btn btn-icon icon-left btn-primary mr-md-0 mb-2 ml-0 mr-auto">
      												<i class="fa fa-save"></i>
      												Ajukan verifikasi produk</button>
      										</div>
      									</div>
      								</div>
      								<div class="alert alert-light alert-has-icon">
      									<div class="alert-icon"><i class="far fa-lightbulb"></i></div>
      									<div class="alert-body">
      										<div class="alert-title">Petunjuk pengisian</div>
      										Pengisian tidak harus dilakukan hingga tahap terakhir, kamu bisa mengajukan validasi produkmu setelah pengisian dari tahap berapapun agar produk dapat ditampilkan pada website utama Brawijaya Riset dan Inovasi.
      									</div>
      								</div>
      								<div id="verifikasi-wrap"></div>
      								<div id="roadmap-pengisian">
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

      </div>

      <script>
      	let redirect = (to) => window.location.replace(`<?= base_url() . 'admin/' ?>${to}/<?= $slug ?>`)
      	let download = (link) => window.open(link)

      	function dateConvert(date) {
      		const months = [
      			'Januari',
      			'Februari',
      			'Maret',
      			'April',
      			'Mei',
      			'Juni',
      			'Juli',
      			'Agustus',
      			'September',
      			'Oktober',
      			'November',
      			'Desember'
      		];
      		let newDate = new Date(date)

      		let day = newDate.getDate()
      		let month = months[newDate.getMonth()]
      		let year = newDate.getFullYear()
      		if (newDate.day < 10) {
      			day = '0' + newDate.getDay()
      		}
      		return day + ' ' + month + ' ' + year
      	}

      	function addCheck(id) {
      		$(id).append(`<i class="fa fa-check"></i>`)
      	}
      	$(document).ready(function() {
      		$.ajax({
      			method: 'get',
      			url: "<?= base_url() . 'service/super/get/' . $slug ?>",
      			dataType: 'json',
      			success: (r) => {
      				const produk = r.data
      				let roadmapDetail = `<div class="row">
      										<div class="col-md-12">
      											<div class="main-timeline7">
      												<div class="timeline click" onclick="redirect('produk')">
      													<a href="<?= base_url() . 'admin/produk/' . $slug ?>">
      														<div class="timeline-icon"><i class="fa fa-box"></i></div>
      													</a>
      													<span class="year" id="data-produk-check">Tahap 1 </span>
      													<div class="timeline-content">
      														<h5 class="title">Data dasar produk</h5>
      														<p class="description">
      															Lengkapi data dasar produk kamu
      														</p>
      													</div>
      												</div>
      												<div class="timeline click" onclick="redirect('roadmap')">
      													<a href="<?= base_url() . 'admin/roadmap/' . $slug ?>">
      														<div class="timeline-icon"><i class="fa fa-bolt"></i></div>
      													</a>
      													<span class="year" id="roadmap-check">Tahap 2 </span>
      													<div class="timeline-content">
      														<h5 class="title">Roadmap Riset dan Pengembangan Produk</h5>
      														<p class="description">
      															Bagaimana pengembangan produk kamu kedepannya?
      														</p>
      													</div>
      												</div>
      												<div class="timeline click" onclick="redirect('testing')">
      													<a href="<?= base_url() . 'admin/testing/' . $slug ?>">
      														<div class="timeline-icon"><i class="fa fa-vial"></i></div>
      													</a>
      													<span class="year" id="pengujian-check">Tahap 3 </span>
      													<div class="timeline-content">
      														<h5 class="title">Pengujian Produk</h5>
      														<p class="description">
      															Apakah produkmu sudah pernah diujikan?
      														</p>
      													</div>
      												</div>
      												<div class="timeline click" onclick="redirect('sertifikasi')">
      													<a href="<?= base_url() . 'admin/sertifikasi/' . $slug ?>">
      														<div class="timeline-icon"><i class="fa fa-certificate"></i></div>
      													</a>
      													<span class="year" id="sertifikasi-check">Tahap 4 </span>
      													<div class="timeline-content">
      														<h5 class="title">Sertifikasi dan Perijinan Produk</h5>
      														<p class="description">
      															Apa saja sertifikasi dan perijinan produkmu?
      														</p>
      													</div>
      												</div>
      												<div class="timeline click" onclick="redirect('mitra')">
      													<a href="<?= base_url() . 'admin/mitra/' . $slug ?>">
      														<div class="timeline-icon"><i class="fa fa-handshake"></i></div>
      													</a>
      													<span class="year" id="mitra-check">Tahap 5 </span>
      													<div class="timeline-content">
      														<h5 class="title">Mitra dan Kerjsama</h5>
      														<p class="description">
      															Tunjukkan kekecean produkmu
      														</p>
      													</div>
      												</div>

      												<div class="timeline click" onclick="redirect('foto')">
      													<a href="<?= base_url() . 'admin/foto/' . $slug ?>">
      														<div class="timeline-icon"><i class="fa fa-camera"></i></div>
      													</a>
      													<span class="year" id="foto-produk-check">Tahap 6 </span>
      													<div class="timeline-content">
      														<h5 class="title">Foto Produk</h5>
      														<p class="description">
      															Tunjukkan kekecean produkmu
      														</p>
      													</div>
      												</div>
      												<div class="timeline click" onclick="redirect('kegiatan')">
      													<a href="<?= base_url() . 'admin/kegiatan/' . $slug ?>">
      														<div class="timeline-icon"><i class="fa fa-camera"></i></div>
      													</a>
      													<span class="year" id="foto-kegiatan-check">Tahap 7 </span>
      													<div class="timeline-content">
      														<h5 class="title">Foto Kegiatan</h5>
      														<p class="description">
      															Udah pernah ngapain aja sih produkmu
      														</p>
      													</div>
      												</div>

      												<div class="timeline click" onclick="redirect('inventor')">
      													<a href="<?= base_url() . 'admin/inventor/' . $slug ?>">
      														<div class="timeline-icon"><i class="fa fa-users"></i></div>
      													</a>
      													<span class="year" id="inventor-check">Tahap 8 </span>
      													<div class="timeline-content">
      														<h5 class="title">Inventor</h5>
      														<p class="description">
      															Siapa saja inventor produk kamu?
      														</p>
      													</div>
      												</div>

      												<div class="timeline click" onclick="redirect('perusahaan')">
      													<a href="<?= base_url() . 'admin/perusahaan_select/' . $slug ?>">
      														<div class="timeline-icon"><i class="fa fa-briefcase"></i></div>
      													</a>
      													<span class="year" id="perusahaan-check">Tahap 9 </span>
      													<div class="timeline-content">
      														<h5 class="title">Data Perusahaan</h5>
      														<p class="description">
      															Bagaimana kondisi internal perusahaanmu?
      														</p>
      													</div>
      												</div>
      												<div class="timeline click" onclick="redirect('bisnis')">
      													<a href="<?= base_url() . 'admin/bisnis/' . $slug ?>">
      														<div class="timeline-icon"><i class="fa fa-chart-bar"></i></div>
      													</a>
      													<span class="year" id="bisnis-check">Tahap 10</span>
      													<div class="timeline-content">
      														<h5 class="title">Data Bisnis</h5>
      														<p class="description">
      															Bagaimana kondisi bisnismu?
      														</p>
      													</div>
      												</div>
      											</div>
      										</div>
      									</div>`
      				if (produk.pengajuan == null) {
      					$('#roadmap-pengisian').html(roadmapDetail)
      				} else {
      					if (produk.pengajuan.status == 'dinilai') {
      						$('#roadmap-pengisian').html(roadmapDetail)
      						const pengajuan = r.data.pengajuan
      						$('#verifikasi-wrap').html(`<div class="d-flex flex-wrap justify-content-between mb-4">
															<div>
																<p class="mb-0">Validasi Terakhir: <strong>${dateConvert(pengajuan.created_at)}</strong></p>
																<p class="mb-0">Oleh: <strong>${pengajuan.nama_verifikator}</strong></p>
																<button class="btn btn-primary mb-3 btn-icon icon-left" data-toggle="modal" data-target="#view" ><i class="fa fa-download mr-1"></i>Download Penilaian</button>																
															</div>
															<div class="text-md-right">
																<p class="mb-0">Status TKT: <strong>${pengajuan.tkt}</strong></p>
																<p>Tingkat KATSINOV: <strong>${pengajuan.katsinov}</strong></p>
															</div>
														</div>
														<p class="mb-0">Catatan: ${pengajuan.catatan}</p>
														`)
      						let download = `<div class="modal-dialog modal-dialog-centered" role="document" style="z-index:9999999">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel">Download Penilaian</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
													</div>
													<div class="modal-body row text-center" id="form-data">`
      						if (pengajuan.file_katsinov != null)
      							download += `<div class="col">
												<button class="btn btn-light" onclick="download('${pengajuan.file_katsinov}')">Penilaian Katsinov</button>
											</div>`

      						if (pengajuan.file_tkt != null)
      							download += `<div class="col">
												<button class="btn btn-light" onclick="download('${pengajuan.file_tkt}')">Penilaian TKT</button>
											</div>`
      						download +=
      							`</div>
									</div>
										</div>`
      						$('#view').html(download)
      					} else {
      						$('#verifikasi-wrap').append(`<p>Kamu sedang mengajukan <strong>verifikasi</strong>, tunggu proses verifikasi selesai untuk dapat mengubah data lagi</p>`)
      					}
      				}
      				if (produk.produk.deskripsi_lengkap != null && produk.produk.deskripsi_lengkap != "") {
      					addCheck('#data-produk-check')
      				}
      				if (produk.roadmap.length != 0) {
      					addCheck('#roadmap-check')
      				}
      				if (produk.pengujian.length != 0) {
      					addCheck('#pengujian-check')
      				}
      				if (produk.ki.length != 0) {
      					addCheck('#sertifikasi-check')
      				}
      				if (produk.mitra.length != 0) {
      					addCheck('#mitra-check')
      				}
      				if (produk.foto_produk.length != 0) {
      					addCheck('#foto-produk-check')
      				}
      				if (produk.foto_kegiatan.length != 0) {
      					addCheck('#foto-kegiatan-check')
      				}
      				if (produk.inventor.length != 0) {
      					addCheck('#inventor-check')
      				}
      				if (produk.perusahaan.length != 0) {
      					addCheck('#perusahaan-check')
      				}
      				if (produk.data_bisnis.data_dasar != null) {
      					addCheck('#bisnis-check')
      				}
      			}
      		})

      		$('#btn-ajukan').click(async function(e) {
      			let clusterData = []
      			e.preventDefault()
      			await $.ajax({
      				method: 'get',
      				url: "<?= base_url() . 'service/cluster/get/' ?>",
      				dataType: 'json',
      				success: (r) => {
      					clusterData = r.data
      				}
      			})
      			let confirm = document.createElement('form')
      			confirm.id = 'confirm-form'
      			let clusterWrapper = document.createElement('select')
      			clusterWrapper.setAttribute('name', 'cluster_id')
      			clusterWrapper.className = 'form-control text-center'
      			let clusterOption = ''
      			clusterData.forEach(element => {
      				clusterOption += `<option value="${element.id}">${element.cluster}</option>`
      			});
      			clusterWrapper.innerHTML = clusterOption
      			confirm.append(clusterWrapper)
      			let confirmTitle = document.createElement('p')
      			confirmTitle.innerHTML = `Silahkan tulis "<?= $this->session->userdata('identifier') ?>" untuk mengkonfirmasi tindakan pengajuan produk untuk divalidasi!`
      			confirm.append(confirmTitle)
      			let confirmInput = document.createElement('input')
      			confirmInput.setAttribute('name', 'auth')
      			confirmInput.className = 'form-control text-center'
      			confirmInput.setAttribute('type', 'number')
      			confirm.append(confirmInput)

      			swal({
      					title: "Apakah kamu yakin?",
      					icon: "warning",
      					text: `Silahkan pilih tujuan pengajuanmu`,
      					content: {
      						element: confirm
      					},
      					// text: `Silahkan tulis "<?= $this->session->userdata('identifier') ?>" untuk mengkonfirmasi tindakan pengajuan produk untuk divalidasi!`,
      					// content: {
      					// 	element: "input",
      					// 	attributes: {
      					// 		type: "number",
      					// 		className: "text-center form-control",
      					// 	},
      					// },
      					buttons: true,
      				})
      				.then(pass => {
      					if (!pass) throw null;
      					let data = $('#confirm-form').serialize()
      					$.ajax({
      						type: "POST",
      						url: api + 'service/pengajuan/create',
      						data: data + '&slug=<?= $slug ?>',
      						success: function(response) {
      							response_alert(response)
      							if (!response.error) {
      								setTimeout(() => {
      									window.location.reload()
      								}, 2000);
      							}

      						}
      					});
      				})
      			// swal({
      			// 		title: "Apakah kamu yakin?",
      			// 		text: "akan mengajukan validasi dalam produk ini!",
      			// 		icon: "info",
      			// 		buttons: true,
      			// 	})
      			// 	.then((willSave) => {
      			// 		if (willSave) {
      			// 			$.ajax({
      			// 				type: "POST",
      			// 				url: api + 'service/inventor/create',
      			// 				data: {
      			// 					slug: <?= $slug ?>,
      			// 				},
      			// 				success: function(response) {
      			// 					response_alert(response)
      			// 					if (!response.error)
      			// 						getList()
      			// 				}
      			// 			})
      			// 		}
      			// 	})

      		});
      	});
      </script>
