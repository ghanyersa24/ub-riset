<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>

<!-- JS Libraies -->
<?php
if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "index") { ?>
	<script src="<?php echo base_url(); ?>assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
	<script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/page/index-0.js"></script>

<?php
} ?>

<!-- Template JS File -->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script>
	let head = document.getElementsByTagName('head')[0]
	let css = document.createElement('link');
	css.rel = 'stylesheet';
	css.href = '<?= base_url() . 'assets/css/dark-theme.css' ?>';
	let switchStatus = <?= $this->session->dark_mode == true ? 1 : 0 ?>;
	$(document).ready(function() {
		if (switchStatus == 1)
			head.append(css)
	});
	$("#dark-theme").on('change', function() {
		if ($(this).is(':checked')) {
			switchStatus = 1;
		} else {
			switchStatus = 0;
		}
		$.ajax({
			type: "POST",
			url: api + "account/profile/dark_mode",
			success: function(response) {
				if (response.data) {
					head.append(css)
				} else {
					css.remove()
				}
			}
		});
	});
</script>
</body>

</html>
