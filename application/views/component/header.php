<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title><?= $title; ?> &mdash; BRAIN Apps</title>

	<!-- Global CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/modules/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.css">

	<!-- CSS per Page -->
	<?php
	if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "index") { ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/weather-icon/css/weather-icons.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/weather-icon/css/weather-icons-wind.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
	<?php
	} ?>
	<!-- Global Javascript -->
	<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="<?= base_url(); ?>assets/modules/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/select2/dist/js/select2.min.js"></script>
	<script src="<?= base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="module" src="<?= base_url() . 'assets/js/viewer.min.js' ?>"></script>

	<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
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
	<script>
		const api = '<?= base_url() ?>'
		let editorList = [];

		function editor(id) {
			return ClassicEditor.create(document.getElementById(id), {
				removePlugins: ['Heading', 'Link'],
				toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote']
			}).then(editor => {
				let key = '#' + id
				editorList.push({
					id,
					editor
				})
			}).catch(error => {
				console.error(error)
			})
		}

		function setEditor(id, data) {
			const index = getEditorIndex(id);
			editorList[index].editor.setData(data)
		}

		function getEditorIndex(key) {
			const dataIndex = editorList.findIndex((data) => data.id === key);
			return dataIndex;
		}

		function triggerEditor(id) {
			let editorId = $(id + ' textarea');
			for (let index = 0; index < editorId.length; index++) {
				editor(editorId[index].id)
			}
		}

		function triggerSetEditor(id, data) {
			let editorId = $(id + ' textarea');
			for (let index = 0; index < editorId.length; index++) {
				setEditor(editorId[index].id, data)
			}
		}

		function response_alert(response) {
			if (!response.error)
				swal('Berhasil !', response.message, 'success')
			else
				swal('Gagal !', response.message, 'error')
		}

		function pad(n) {
			var s = "000" + n;
			return s.substr(s.length - 4);
		}
		$(document).ready(function() {
			$("input[data-type='currency']").on({
				keyup: function() {
					this.value = formatRupiah(this.value, 'Rp. ');
				},

			});
			$("input[data-type='without-currency']").on({
				keyup: function() {
					this.value = formatRupiah(this.value);
				},

			});
		})

		function formatRupiah(angka, prefix) {
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
				split = number_string.split(','),
				sisa = split[0].length % 3,
				rupiah = split[0].substr(0, sisa),
				ribuan = split[0].substr(sisa).match(/\d{3}/gi);

			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>
	<style>
		.ck.ck-content ul,
		.ck.ck-content ul li {
			list-style-type: inherit;
		}
	</style>

</head>
