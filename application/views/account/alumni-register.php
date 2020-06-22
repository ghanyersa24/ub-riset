<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<meta name="google-signin-client_id" content="233130642128-pj63qqpc93o94nvndo215920jtuhati9.apps.googleusercontent.com">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.css">
	<script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
	<title><?php echo $title; ?> &mdash; BRAIN Apps</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login.css">
	<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script>
		const api = '<?= base_url() ?>'
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-167752502-1"></script>

	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-167752502-1');
	</script>
	<style>
		label {
			color: white !important;
		}
	</style>
</head>

<body class="overflow-scroll">
	<div class="row min-vh-100">
		<div class="col-md-6 text-center d-flex align-items-center">
			<div class="col text-center d-flex justify-content-center">
				<img src="<?= base_url() . 'assets/img/logo.png' ?>" alt="" class="w-50 rounded d-none d-md-block">
			</div>
		</div>
		<div class="col-md-6 bg-primary d-flex align-items-center">
			<div class="col-md-8 offset-md-2">
				<div class="container">
					<p class="h4 text-white">Register Account</p>
					<form class="form-add" id="form-add">
						<div class="form-group">
							<label for="add-nama_lengkap">Nama Lengkap</label>
							<input id="add-nama_lengkap" class="form-control" type="text" name="nama_lengkap" value="" required>
						</div>
						<div class="form-group">
							<label for="add-email">Email</label>
							<input id="add-email" class="form-control" type="text" name="email" value="" required>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="add-password">Password</label>
									<input id="add-password" class="form-control" type="password" name="password" value="" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="add-password_konfirmasi">Konfirmasi Password</label>
									<input id="add-password_konfirmasi" class="form-control" type="password" name="password_konfirmasi" value="" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="add-kontak">No. HP</label>
									<input id="add-kontak" class="form-control" type="number" name="kontak" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="add-nim">NIM saat menjadi mahasiswa</label>
									<input id="add-nim" class="form-control" type="number" name="nim" required>
								</div>
							</div>
						</div>
						<div class="row">

							<!-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="add-identifier">Status</label>
                                <select id="add-status" class="form-control" name="status">
                                    <option value="dosen">Dosen </option>
                                    <option value="mahasiswa">Mahasiswa</option>
                                    <option value="alumni">Alumni </option>
                                </select>
                            </div>
                        </div> -->
						</div>
						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label for="add-fakultas">Fakultas</label>
									<select class="custom-select" required name="fakultas">
										<option value="FH">Hukum </option>
										<option value="FEB">Ekonomi dan Bisnis</option>
										<option value="FIA">Ilmu Administrasi</option>
										<option value="FP">Pertanian </option>
										<option value="FAPET">Peternakan </option>
										<option value="FT">Teknik </option>
										<option value="FK">Kedokteran </option>
										<option value="FPIK">Perikanan dan Ilmu Kelautan </option>
										<option value="FMIPA">Matematika dan IPA</option>
										<option value="FTP">Teknologi Pertanian </option>
										<option value="FISIP">Ilmu Sosial dan Ilmu Politik</option>
										<option value="FIB">Ilmu Budaya</option>
										<option value="FKH">Kedokteran Hewan</option>
										<option value="FILKOM">Ilmu Komputer</option>
										<option value="FKG">Kedokteran Gigi</option>
										<option value="Vokasi">Program Vokasi</option>
									</select> </div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label for="add-jurusan">Jurusan</label>
									<input id="add-jurusan" class="form-control" type="text" name="jurusan" required>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label for="add-prodi">Prodi</label>
									<input id="add-prodi" class="form-control" type="text" name="prodi" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="add-bukti">Foto bukti kelulusan (Surat yudisium/KTA/Surat Keterangan Lulus)</label>
							<input type="file" id="add-bukti" name="bukti" class="form-control">
						</div>
						<div class="d-flex justify-content-end">
							<button type="submit" class="btn btn-light text-right">Submit</button>
						</div>
					</form>
					<div class="text-center text-white mt-3 ml-3">
						<span> Copyright &copy; Brawijaya</span> <span> Research and Innovation</span>
					</div>
				</div>
			</div>

		</div>
	</div>
	<script>
		$('#form-add').validate({
			submitHandler: function(form) {
				let temp = $('#form-add').serialize()
				let formData = new FormData()
				formData.append('bukti', document.getElementById('add-bukti').files[0])
				temp = temp.split('&')
				temp.forEach(value => {
					let temp_value = value.split('=')
					formData.append(temp_value[0], decodeURI(temp_value[1]))
				})
				$.ajax({
					type: "POST",
					url: api + "account/register/account",
					data: formData,
					async: false,
					processData: false,
					contentType: false,
					success: function(response) {
						if (!response.error) {
							swal('Berhasil !', response.message, 'success')
							setTimeout(() => {
								window.location.replace(`<?= base_url() ?>alumni/login`)
							}, 2000);
						} else {
							swal('Gagal !', response.message, 'error')
						}
					}
				})
			}
		})
	</script>
</body>

</html>