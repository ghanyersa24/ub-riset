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
							<ul class="nav nav-pills" id="myTab3" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="ringkasan-tab3" data-toggle="tab" href="#ringkasan3" role="tab" aria-controls="ringkasan" aria-selected="true">Ringkasan</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="produk-tab3" data-toggle="tab" href="#produk3" role="tab" aria-controls="produk" aria-selected="false">Produk</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="tim-tab3" data-toggle="tab" href="#tim3" role="tab" aria-controls="tim" aria-selected="false">Tim</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="bisnis-tab3" data-toggle="tab" href="#bisnis3" role="tab" aria-controls="bisnis" aria-selected="false">Bisnis</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="foto-tab3" data-toggle="tab" href="#foto3" role="tab" aria-controls="foto" aria-selected="false">Foto</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="riwayat-tab3" data-toggle="tab" href="#riwayat3" role="tab" aria-controls="riwayat" aria-selected="false">Riwayat</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="verifikasi-tab3" data-toggle="tab" href="#verifikasi3" role="tab" aria-controls="verifikasi" aria-selected="false">Verifikasi</a>
								</li>
							</ul>
							<div class="tab-content" id="myTabContent2">
								<div class="tab-pane fade show active" id="ringkasan3" role="tabpanel" aria-labelledby="ringkasan-tab3">
									<p>ringkasan</p>
								</div>
								<div class="tab-pane fade" id="produk3" role="tabpanel" aria-labelledby="produk-tab3">
									<p>produk</p>
								</div>
								<div class="tab-pane fade" id="tim3" role="tabpanel" aria-labelledby="tim-tab3">
									<p>Tim</p>
								</div>
								<div class="tab-pane fade" id="bisnis3" role="tabpanel" aria-labelledby="tim-tab3">
									<p>bisnis</p>
								</div>
								<div class="tab-pane fade" id="foto3" role="tabpanel" aria-labelledby="tim-tab3">
									<p>foto</p>
								</div>
								<div class="tab-pane fade" id="verifikasi3" role="tabpanel" aria-labelledby="tim-tab3">
									<form class="form-add-verifikasi" id="form-add-verifikasi">
										<div class="row">
											<div class="col-md-4">
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
											<div class="col-md-4">
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
											<div class="col-md-4">
												<div class="form-group">
													<label for="add-file">File Evaluasi</label>
													<input type="file" name="file_evaluasi" id="add-file_evaluasi" class="form-control" required>
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

<script>
	$(document).ready(function() {
		$.ajax({
			method: 'get',
			url: "<?= base_url() . 'service/super/get/' . $slug ?>",
			dataType: 'json',
			success: (r) => {
				console.log(r)
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
				file_evaluasi: {
					required: true
				},
			},
			submitHandler: function(form) {
				let formData = new FormData()
				formData.append('file_evaluasi', document.getElementById('add-file_evaluasi').files[0])
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
			}
		})
	})
</script>
