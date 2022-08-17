<div class="card">
    <div class="card-header">
        <h5 class="card-header-title">Aktivasi akun</h5>
    </div>
	<div class="card-body">

		<div class="text-center m-b-15">
			<a href="<?= base_url();?>" class="logo logo-admin"><img src="<?= base_url();?>assets/images/logo.png"
					height="50" alt="logo"></a>
		</div>

		<div class="p-3">
			<form class="form-horizontal m-t-20" action="<?= site_url('authentication/aktivasi_akun');?>"
				method="post">
                <h6 class="font-weight-light">Masukan kode aktivasi Anda. Cek kotak masuk atau spam folder email Anda.</h6>

				<div class="form-group row">
					<div class="col-12">
						<input class="form-control" type="text" name="kode_aktivasi" required placeholder="Masukkan kode">
					</div>
				</div>

				<div class="form-group text-center row m-t-20">
					<div class="col-12">
						<button class="btn btn-danger btn-block waves-effect waves-light" type="submit" id="send-button">Aktivasi akun</button>
					</div>
				</div>

                <div class="text-center mt-4 font-weight-light">
                  Belum menerima email? <a href="<?= site_url('aktivasi-akun'); ?>" class="text-primary">Kirim ulang</a>
                </div>
			</form>
		</div>

	</div>
</div>
