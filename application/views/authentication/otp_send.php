<?php
function mask_email($email)
{
    $mail_parts = explode("@", $email);
    $domain_parts = explode('.', $mail_parts[1]);
    $mail_parts[0] = mask($mail_parts[0], 2, 1); // show first 2 letters and last 1 letter
    $domain_parts[0] = mask($domain_parts[0], 2, 1); // same here
    $mail_parts[1] = implode('.', $domain_parts);
    return implode("@", $mail_parts);
}
function mask($str, $first, $last)
{
    $len = strlen($str);
    $toShow = $first + $last;
    return substr($str, 0, $len <= $toShow ? 0 : $first) . str_repeat("*", $len - ($len <= $toShow ? 0 : $toShow)) . substr($str, $len - $last, $len <= $toShow ? 0 : $last);
}
?>

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
			<center>Tekan tombol dibawah ini untuk menerima kode OTP sebelum login melalui akun email anda.</center>

			<div class="form-group row">
				<div class="col-12">
					<input class="form-control" type="email" name="email" required
						value="<?= $this->session->userdata('email');?>" readonly>
				</div>
			</div>

			<div class="mt-3 text-center">
				<a href="<?= site_url('send-otp/email'); ?>" class="btn btn-primary" id="send-button">Kirim kode OTP
					(<?= mask_email($this->session->userdata('email')); ?>)</a>
			</div>

			<div class="text-center mt-4 font-weight-light">
				Ganti akun? <a href="<?= site_url('logout'); ?>" class="text-primary">Keluar</a>
			</div>
		</div>

	</div>
</div>
