<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.css">
	<script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
	<title><?php echo $title; ?> &mdash; BRAIN Apps</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/login.css">
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
	<script src="https://apis.google.com/js/api:client.js"></script>

	<style type="text/css">
		#customBtn {
			display: inline-block;
			background: #003961;
			color: white;
			width: 190px;
			border-radius: 5px;
			/* border: thin solid #888; */
			box-shadow: 4px 4px 5px rgba(200, 200, 200, 1);
			white-space: nowrap;
		}

		#customBtn:hover {
			cursor: pointer;
		}

		span.label {
			font-family: serif;
			font-weight: normal;
		}

		span.icon {
			background: url('<?= base_url() ?>/assets/img/logo gapura.png') transparent 50% no-repeat;
			background-size: cover;
			display: inline-block;
			vertical-align: middle;
			width: 42px;
			height: 42px;
		}

		span.buttonText {
			display: inline-block;
			vertical-align: middle;
			padding-left: 42px;
			padding-right: 42px;
			font-size: 14px;
			font-weight: bold;
			/* Use the Roboto font that is loaded in the <head> */
			font-family: 'Roboto', sans-serif;
		}

		.primary {
			color: #fbaa19;
		}
	</style>
</head>

<body class="bg-primary overflow-hidden">

	<div class="vh-100 d-flex justify-content-center">
		<div id="loader" style="display: none" class="text-center">
			<div class="spinner-border text-danger" style="width: 10rem; height: 10rem; margin-left:3rem; margin-top:2rem" role="status">
				<span class="sr-only">Loading...</span>
			</div>
			<div class="spinner-border text-info" style="width: 14rem; height: 14rem; margin-left:1rem" role="status">
				<span class="sr-only">Loading...</span>
			</div>
			<div class="spinner-border text-light" style="width: 12rem; height: 12rem;margin-left:2rem;margin-top:1rem" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<div class="d-flex align-items-center" style="max-width:500px">
			<div style="display: none" id="greating" class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Hi, <span id="name"></span> !</strong> Selamat Datang di <strong>Brawijaya Research and Innovation</strong>, Sistem Informasi Manajemen Inovasi Universitas Brawijaya.
			</div>

			<div class="shadow bg-white p-5 login-form m-3" id="card-login">
				<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Logo_Universitas_Brawijaya.svg/1200px-Logo_Universitas_Brawijaya.svg.png" alt="" id="icon-login" class="p-2 bg-white rounded-circle login-icon position-icon" />
				<p class="h6 font-weight-bold mb-4 text-center">Masuk dengan Email UB</p>
				<!-- <form name="form-login" id="form-login">
					<div class="form-group">
						<label class="form-label" for="username">Username</label>
						<input id="username" class="form-control rounded-pill" type="text" name="username">
					</div>
					<div class="form-group mt-n1">
						<label class="form-label" for="password">Password</label>
						<input id="password" class="form-control rounded-pill" type="password" name="password">
					</div>
					<div class="text-center text-danger" id="msg"></div>
					<button class="btn btn-primary rounded-pill form-control" id="btn-login" type="submit">Login</button>
				</form>
				<p class="text-center mb-0">atau</p> -->

				<div id="gSignInWrapper">
					<div id="customBtn" class="customGPlusSignIn">
						<span class="icon"></span>
						<span class="buttonText">Gapura <span class="primary">UB</span></span>
					</div>
				</div>
				<div class="text-center mt-2">
				<p class="mb-0">atau</p>
				<p><a href="<?= base_url().'alumni/login'?>">Masuk</a> sebagai alumni</p>
				</div>
				<div id="name"></div>
				<div id="login-success" style="display:none">
					<div class="d-flex align-items-center justify-content-center mt-4">
						<p class="text-center mb-0 mr-2">Login Berhasil </p>
						<span class="spinner-border text-dark" role="status"></span>
					</div>
				</div>
				<div id="login-failed" style="display:none">
					<div class="d-flex align-items-center justify-content-center mt-4">
						<p class="text-center mb-0 mr-2 text-danger">Login Gagal, pastikan kamu <br>menggunakan EMAIL UB </p>

					</div>
				</div>
				<a target="_blank" href="<?= base_url().'assets/img/manualbook-brain.pdf' ?>">
				<button class="btn btn-primary btn-icon icon-left d-block mx-auto mt-3"><i class="fa fa-download"></i> Buku Panduan</button>
				</a>
			</div>
		</div>
		<div class="simple-footer fixed-bottom text-white">
			Copyright &copy; Brawijaya Research and Innovation
		</div>
	</div>
	<script>
		var googleUser = {};
		var startApp = function() {
			gapi.load('auth2', function() {
				// Retrieve the singleton for the GoogleAuth library and set up the client.
				auth2 = gapi.auth2.init({
					client_id: '233130642128-pj63qqpc93o94nvndo215920jtuhati9.apps.googleusercontent.com',
					cookiepolicy: 'single_host_origin',
					// Request scopes in addition to 'profile' and 'email'
					// scope: 'name'
				});
				attachSignin(document.getElementById('customBtn'));
			});
		};

		function attachSignin(element) {
			console.log(element.id);
			auth2.attachClickHandler(element, {},
				function(googleUser) {
					const profile = googleUser.getBasicProfile();
					$.ajax({
						type: "POST",
						url: api + 'account/login/spesial',
						data: {
							auth: profile.getId(),
							nama: profile.getName(),
							foto: profile.getImageUrl(),
							email: profile.getEmail(),
						},
						dataType: "json",
						success: function(response) {
							if (!response.error) {
								$('#login-success').css('display', 'block')
								setTimeout(function() {
									window.location.replace(`<?= base_url() ?>admin`)
								}, 2000)
							} else {
								swal('Info !', response.message, 'info')
								setTimeout(function() {
									window.location.replace(`<?= base_url() ?>register/account/${response.data}`)
								}, 2000)
							}
						}
					});
				},
				function(error) {
					// alert(JSON.stringify(error, undefined, 2));
					$('#login-failed').css('display', 'block')
					setTimeout(() => {
						$('#login-failed').css('display', 'none')
					}, 5000);
				});
		}
	</script>
	<script>
		startApp();
	</script>

	<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js">
	</script>
	<script>
		function bounce(height, delay = 0) {
			$('#icon-login').delay(delay).animate({
				'margin-top': height + "em"
			}, 500);
		}



		$('#form-login').submit(async function(e) {
			e.preventDefault()
			$('#card-login').hide()
			$('#loader').delay(300).fadeIn()
			await bounce(0)
			await $.ajax({
				type: "post",
				url: api + 'account/login',
				data: $('#form-login').serialize(),
				success: function(response) {
					if (!response.error) {
						$('#loader').delay(700).fadeOut();
						$("#icon-login").delay(700).fadeOut(1000, function() {
							$("#name").text(response.data.nama)
							$("#greating").fadeIn(2000, function() {
								window.location.replace("<?= base_url("admin") ?>")
							})
						})
					} else {
						$('#loader').delay(700).fadeOut();
						$('#card-login').delay(1450).slideDown(400);
						bounce(-13, 1000);
						$("#msg").text(response.message);
					}
				}
			})
		});

		$('input').focus(function() {
			$(this).parents('.form-group').addClass('focused');
		});

		$('input').blur(function() {
			var inputValue = $(this).val();
			if (inputValue == "") {
				$(this).removeClass('filled');
				$(this).parents('.form-group').removeClass('focused');
			} else {
				$(this).addClass('filled');
			}
		})
	</script>
</body>

</html>