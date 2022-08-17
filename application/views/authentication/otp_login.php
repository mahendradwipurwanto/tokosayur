<div class="card">
    <div class="card-header">
        <h5 class="card-header-title">Verifikasi OTP</h5>
    </div>
	<div class="card-body">

		<div class="text-center m-b-15">
			<a href="<?= base_url();?>" class="logo logo-admin"><img src="<?= base_url();?>assets/images/logo.png"
					height="50" alt="logo"></a>
		</div>

		<div class="p-3">
			<form class="form-horizontal m-t-20" action="<?= site_url('authentication/proses_verifikasiOtp');?>"
				method="post">
                <h6 class="font-weight-light">Harap masukkan kode OTP yang telah Anda terima.</h6>

				<div class="form-group row">
					<div class="col-12">
						<input class="form-control" type="number" name="kode_otp" required placeholder="Kode OTP">
					</div>
				</div>

				<div class="form-group text-center row m-t-20">
					<div class="col-12">
						<button class="btn btn-danger btn-block waves-effect waves-light" type="submit" id="send-button">Verifikasi OTP</button>
					</div>
				</div>

                <div class="text-center mt-4 font-weight-light">
                    Belum menerima kode OTP? <a href="<?= site_url('otp');?>" class="text-primary">Kirim ulang</a>
                </div>
			</form>
		</div>

	</div>
</div>
