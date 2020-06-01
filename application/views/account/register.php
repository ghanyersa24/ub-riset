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
</head>

<body class="overflow-hidden">
	<div class="row vh-100">
		<div class="col-md-6 text-center d-flex align-items-center">
			<div class="col text-center d-flex justify-content-center">
				<img src="<?= base_url() . 'assets/img/logo.png' ?>" alt="" class="w-50 rounded d-none d-md-block">
			</div>
		</div>
		<div class="col-md-6 bg-primary d-flex align-items-center">
			<div class="col-md-8 offset-2">
				<p class="h4 text-white">Register Account</p>
				<form class="form-add" id="form-add">
					<div class="form-group">
						<label for="add-nama">Nama Lengkap</label>
						<input id="add-nama" class="form-control" type="text" name="nama" value="<?= $this->session->userdata('nama') ?>" required>
					</div>
					<div class="form-group">
						<label for="add-kontak">Kontak</label>
						<input id="add-kontak" class="form-control" type="number" name="kontak" required>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="add-identifier">NIP/NIM/NIK</label>
								<input id="add-identifier" class="form-control" type="number" name="identifier" required>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="add-identifier">Status</label>
								<select id="add-status" class="form-control" name="status">
									<option value="dosen">Dosen </option>
									<option value="mahasiswa">Mahasiswa</option>
									<option value="alumni">Alumni </option>
								</select>
							</div>
						</div>
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
					<div class="d-flex justify-content-end">
						<button type="submit" class="btn btn-light text-right">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="text-center fixed-bottom mb-3 ml-3">
		<span class="text-default"> Copyright &copy; Brawijaya</span> <span class="text-white"> Research and Innovation</span>
	</div>
	<script>
		$('#form-add').validate({
			submitHandler: function(form) {
				$.ajax({
					type: "POST",
					url: api + "account/register/email",
					data: $('#form-add').serialize(),
					success: function(response) {
						if (!response.error)
							swal('Berhasil !', response.message, 'success')
						else
							swal('Gagal !', response.message, 'error')
					}
				})
			}
		})
	</script>
</body>

</html>
