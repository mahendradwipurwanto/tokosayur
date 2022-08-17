<div class="card">
	<div class="card-body">

		<div class="text-center m-b-15">
			<a href="<?= base_url();?>" class="logo logo-admin"><img src="<?= base_url();?>assets/images/logo.png"
					height="50" alt="logo"></a>
		</div>

		<div class="p-3">
                <h6 class="font-weight-light">Activation your account now, check your email inbox or spam folder.</h6>

				<div class="form-group row">
					<div class="col-12">
						<input class="form-control" type="email" name="email" required value="<?= $mail;?>" readonly>
					</div>
				</div>
                <div class="mt-3">
                  <p>Demi menjaga keamanan, kami ingin melakukan verifikasi ke email anda. Yuk lakukan aktivasi sekarang sebelum melanjutkan ke dashboard.</p>
                </div>
                <div class="mt-3">
                  <a href="<?= site_url('aktivasi-akun');?>" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Aktivasi sekarang</a>
                </div>
		</div>

	</div>
</div>
