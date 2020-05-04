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
			<li class="<?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>

			<!-- Power Go -->

			<!-- account -->

			<li class="dropdown <?php echo (is_null($slug) ? '' : $this->uri->segment(3) == $slug) ? 'active' : '' ?>">
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
			</li>
			<li class="<?php echo $this->uri->segment(2) == 'profile' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>admin/profile"><i class="fas fa-user"></i> <span>profile</span></a></li>
			<li class="<?php echo $this->uri->segment(2) == 'logout' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>login"> <i class="fas fa-sign-out-alt"></i> <span>Logout</span></a></li>
		</ul>
	</aside>
</div>
