<div class="card">
	<div class="card-body">

		<div class="text-center m-b-15">
			<a href="<?= base_url();?>" class="logo logo-admin"><img src="<?= base_url();?>assets/images/logo.png"
					height="50" alt="logo"></a>
		</div>

		<div class="p-3">
			<form class="form-horizontal m-t-20" action="<?= site_url('authentication/proses_login');?>"
				method="post">

				<div class="form-group row">
					<div class="col-12">
						<input class="form-control" type="email" name="email" required placeholder="Masukkan email">
					</div>
				</div>

				<div class="form-group row">
					<div class="col-12">
						<input class="form-control" type="password" name="password" required
							placeholder="Masukkan password">
					</div>
				</div>

				<div class="form-group text-center row m-t-20">
					<div class="col-12">
						<button class="btn btn-danger btn-block waves-effect waves-light" type="submit" id="send-button">Login</button>
					</div>
				</div>

				<div class="form-group m-t-10 mb-0 row">
					<div class="col-sm-7 m-t-20">
						<a href="<?= site_url('lupa-password');?>" class="text-muted"><i class="mdi mdi-lock"></i>
							<small>Lupa password ?</small></a>
					</div>
					<div class="col-sm-5 m-t-20"><a href="<?= site_url('register');?>" class="text-muted"><i
								class="mdi mdi-account-circle"></i> <small>Daftar</small></a>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>
