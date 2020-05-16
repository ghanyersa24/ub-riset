<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?php echo base_url(); ?>admin"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Logo_Universitas_Brawijaya.svg/1200px-Logo_Universitas_Brawijaya.svg.png" width="12%" alt=""> BRAIN Apps</a>
		</div>
		<div class="sidebar-brand sidebar-brand-sm text-center">
			<a href="<?php echo base_url(); ?>admin"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Logo_Universitas_Brawijaya.svg/1200px-Logo_Universitas_Brawijaya.svg.png" class="w-50" alt=""></a>
		</div>
		<ul class="sidebar-menu">
			<!-- dashboard -->
			<li class="menu-header">Dashboard</li>
			<?php $segment = $this->uri->segment(2) ?>
			<li class="<?php echo $segment == '' || $segment == 'index' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

			<!-- Power Go -->

			<!-- account -->
			<!-- Product -->
			<li class="<?php echo $segment == 'myproduct' || $segment == 'detail' || $segment == 'produk' || $segment == 'roadmap' || $segment == 'testing' || $segment == 'sertifikasi' || $segment == 'foto' || $segment == 'kegiatan' || $segment == 'inventor'|| $segment == 'bisnis'|| $segment == 'mitra'|| $segment == 'tambahan' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/myproduct"><i class="fas fa-fire"></i> <span>My Product</span></a></li>
			</li>
			<!-- <li class="dropdown <?php echo (is_null($slug) ? '' : $this->uri->segment(3) == $slug) ? 'active' : '' ?>">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Product</span></a>
				<ul class="dropdown-menu">
					<?php
					foreach ($produk as $value) {
					?>
						<li class="<?php echo (is_null($slug) ? '' : $value['slug'] == $slug) ? 'active' : ''; ?>"><a class="nav-link" href="<?= base_url() . "admin/detail/$value[slug]" ?>"> <?= $value['nama_produk'] ?></a></li>
					<?php
					}
					?>
				</ul>
			</li> -->

			<?php
			if ($this->session->userdata('is_admin') == 'admin' || $this->session->userdata('is_admin') == 'verifikator') {
			?>
				<li class="<?php echo $segment == 'verifikasi' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/verifikasi"><i class="fas fa-check-circle"></i><span>Verifikasi</span></a></li>
				</li>
			<?php
			} ?>
			<?php
			if ($this->session->userdata('is_admin') == 'admin') {
			?>
				<li class="<?php echo $segment == 'plotting' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/plotting"><i class="fas fa-at"></i><span>Plotting</span></a></li>
				</li>
				<li class="<?php echo $segment == 'manage' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/manage"><i class="fas fa-users"></i> <span>Management User</span></a></li>
			<?php
			} ?>
			<li class="<?php echo $segment == 'perusahaan' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/perusahaan"><i class="fas fa-briefcase"></i> <span>Perusahaan</span></a></li>
			<li class="<?php echo $segment == 'profile' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/profile"><i class="fas fa-user"></i> <span>Profile</span></a></li>
			<li class="<?php echo $segment == 'logout' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/logout"> <i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
		</ul>
	</aside>
</div>
