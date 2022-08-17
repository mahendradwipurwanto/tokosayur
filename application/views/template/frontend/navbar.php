<!-- Navigation Bar-->
<header id="topnav">
	<div class="topbar-main">
		<div class="container-fluid">

			<!-- Logo container-->
			<div class="logo">
				<a href="<?= base_url();?>" class="logo">
					<i class="mdi mdi-bowling text-success mr-1"></i> <span class="hide-phone"><?= $web_title;?></span>
				</a>

			</div>

			<div class="menu-extras topbar-custom">

				<ul class="list-inline float-right mb-0">
					<?php if($this->session->userdata('logged_in') == true):?>
					<?php if($this->session->userdata('role') == 2):?>
					<!-- notification-->
					<li class="list-inline-item dropdown notification-list">
						<a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
							role="button" aria-haspopup="false" aria-expanded="false">
							<i class="dripicons-cart noti-icon"></i>
							<?php if($this->session->userdata('keranjang')):?>
							<span
								class="badge badge-success noti-icon-badge"><?= count($this->session->userdata('keranjang'));?></span>
							<?php endif;?>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg border-0">
							<?php if($this->session->userdata('keranjang')):?>
							<!-- item-->
							<div class="dropdown-item noti-title">
								<h5>Keranjang (<?= count($this->session->userdata('keranjang'));?>)</h5>
							</div>
							<?php foreach($this->session->userdata('keranjang') as $val):?>
							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
								<p class="notify-details"><b><?= $val['sayur'];?></b><small
										class="text-muted">Menambahkan <?= $val['jumlah'];?> <?= $val['sayur'];?> ke
										keranjang anda</small></p>
							</a>
							<?php endforeach;?>
							<!-- All-->
							<a href="javascript:void(0);" class="dropdown-item notify-item border-top"
								data-toggle="modal" data-target="#simpan-wishlist">
								Tambahkan ke keranjang anda
							</a>
							<?php else:?>
							<!-- All-->
							<a class="dropdown-item notify-item border-top">
								Keranjang kosong
							</a>
							<?php endif;?>

						</div>
					</li>
					<?php endif;?>

					<!-- User-->
					<li class="list-inline-item dropdown notification-list">
						<a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown"
							href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="<?= base_url(); ?>assets/images/profile.png" alt="user" class="rounded-circle">
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-dropdown  border-0">
							<?php if($this->session->userdata('role') == 1):?>
							<a class="dropdown-item" href="<?= site_url('admin');?>"><i
									class="mdi mdi-account-circle m-r-5 text-muted"></i>
								Admin</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?= site_url('logout');?>"><i
									class="mdi mdi-logout m-r-5 text-muted"></i>
								Logout</a>
							<?php else:?>
							<a class="dropdown-item" href="<?= site_url('pengguna');?>"><i
									class="mdi mdi-account-circle m-r-5 text-muted"></i>
								Dashboard</a>
							<!-- <a class="dropdown-item" href="<?= site_url('pengguna/pengaturan');?>"><i
									class="mdi mdi-settings m-r-5 text-muted"></i>
								Setting</a> -->
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?= site_url('logout');?>"><i
									class="mdi mdi-logout m-r-5 text-muted"></i>
								Logout</a>
							<?php endif;?>
						</div>
					</li>
					<li class="menu-item list-inline-item">
						<!-- Mobile menu toggle-->
						<a class="navbar-toggle nav-link">
							<div class="lines">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</a>
						<!-- End mobile menu toggle-->
					</li>
					<?php else:?>
					<div style="margin-top: 13px;">
						<a href="<?= site_url('login');?>"
							class="btn btn-primary shadow-none btn-round waves-effect waves-light">Masuk</a>
						<a href="<?= site_url('register');?>"
							class="btn btn-outline-success btn-round waves-effect waves-light">Daftar</a>
					</div>
					<?php endif;?>

				</ul>
			</div>
			<!-- end menu-extras -->

			<div class="clearfix"></div>

		</div> <!-- end container -->
	</div>
	<!-- end topbar-main -->
	<?php if($this->uri->segment(1) == 'admin'):?>
	<!-- MENU Start -->
	<div class="navbar-custom">
		<div class="container-fluid">
			<div id="navigation">
				<!-- Navigation Menu-->
				<ul class="navigation-menu">

					<li class="has-submenu">
						<a href="<?= site_url('admin');?>"><i class="dripicons-device-desktop"></i>Dashboard</a>
					</li>

					<li class="has-submenu">
						<a href="<?= site_url('admin/kelola-sayur');?>"><i class="dripicons-to-do"></i>Kelola Data
							Sayur</a>
					</li>

					<li class="has-submenu">
						<a href="<?= site_url('admin/data-pengguna');?>"><i class="dripicons-user-group"></i>Data
							Pengguna</a>
					</li>

				</ul>
				<!-- End navigation menu -->
			</div> <!-- end #navigation -->
		</div> <!-- end container -->
	</div> <!-- end navbar-custom -->
	<?php endif;?>
</header>
<!-- End Navigation Bar-->


<div id="simpan-wishlist" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah keranjang</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body p-4">
				<form action="<?= site_url('home/tambah_wishlist');?>" method="post" enctype="multipart/form-data">
					<p>Tambahkan <b><?= count($this->session->userdata('keranjang'));?></b> item kedalam
						keranjang anda?</p>
					<h6>Sayur anda:</h6>
					<ul>
						<?php foreach ($this->session->userdata('keranjang') as $val):?>
						<li><?= $val['sayur'];?> + <?= $val['jumlah'];?> buah</li>
						<?php endforeach;?>
					</ul>
					<div class="form-group">
						<label for="inputKeteranganSayur" class="input-label">Tambahkan catatan <small
								class="text-secondary">(optional)</small></label>
						<textarea class="form-control" name="catatan" id="inputKeteranganSayur" name="catatan"
							rows="5"></textarea>
					</div>
					<div class="modal-footer px-0 mx-0 mb-0 pb-0">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Tambahkan</button>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="wrapper">
	<div class="container-fluid">
