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
					<!-- notification-->
					<li class="list-inline-item dropdown notification-list">
						<a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
							role="button" aria-haspopup="false" aria-expanded="false">
							<i class="dripicons-bell noti-icon"></i>
							<span class="badge badge-success noti-icon-badge">2</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg border-0">
							<!-- item-->
							<div class="dropdown-item noti-title">
								<h5>Notifikasi (3)</h5>
							</div>

							<!-- item-->
							<a href="javascript:void(0);" class="dropdown-item notify-item">
								<div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
								<p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy
										text of the printing and typesetting
										industry.</small></p>
							</a>

						</div>
					</li>
					<?php endif;?>
					<!-- User-->
					<li class="list-inline-item dropdown notification-list">
						<a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown"
							href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="<?= base_url(); ?>assets/images/profile.png" alt="user"
								class="rounded-circle">
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-dropdown  border-0">
							<?php if($this->session->userdata('role') == 1):?>
							<a class="dropdown-item" href="<?= site_url('admin');?>"><i
									class="mdi mdi-account-circle m-r-5 text-muted"></i>
								Admin Dashboard</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="<?= site_url('logout');?>"><i
									class="mdi mdi-logout m-r-5 text-muted"></i>
								Logout</a>
							<?php else:?>
							<a class="dropdown-item" href="<?= site_url('pengguna');?>"><i
									class="mdi mdi-account-circle m-r-5 text-muted"></i>
								Dashboard</a>
							<a class="dropdown-item" href="<?= site_url('pengguna/pengaturan');?>"><i
									class="mdi mdi-settings m-r-5 text-muted"></i>
								Setting</a>
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
						<a href="<?= site_url('admin');?>"><i
								class="dripicons-device-desktop"></i>Dashboard</a>
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

<div class="wrapper">
	<div class="container-fluid">
