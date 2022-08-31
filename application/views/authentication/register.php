<div class="card">
    <div class="card-header">
        <h5 class="card-header-title">Daftarkan akun anda</h5>
    </div>
    <div class="card-body">

        <div class="text-center m-b-15">
            <a href="<?= base_url();?>" class="logo logo-admin"><img src="<?= base_url();?>assets/images/logo.png" height="50" alt="logo"></a>
        </div>

        <div class="p-3">
            <form class="form-horizontal" action="<?= site_url('register/proses_daftar');?>" method="post">

                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control" type="text" name="nama" required placeholder="Nama lengkap" id="signinSrNama">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control" type="text" name="no_telp" required placeholder="Nomor telepon" id="signinSrTelepon">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <textarea class="form-control" type="text" name="alamat" required placeholder="Alamat lengkap"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control" type="email" name="email" required placeholder="Email">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control" type="password" name="password" required placeholder="Password">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <input class="form-control" type="password" name="password_conf" required placeholder="Konfirmasi Password">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <?=$captcha?>
                        <input class="form-control" type="text" name="captcha" required placeholder="Masukkan captcha">
                    </div>
                </div>

                <div class="form-group text-center row m-t-20">
                    <div class="col-12">
                        <button class="btn btn-danger btn-block waves-effect waves-light" type="submit" id="send-button">Daftar</button>
                    </div>
                </div>

                <div class="form-group m-t-10 mb-0 row">
                    <div class="col-12 m-t-20 text-center">
                        Sudah punya akun? <a href="<?= site_url('login');?>" class="text-muted">Masuk sekarang</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#signinSrNama").keydown(function(event){
      var inputValue = event.which;
        // allow letters and whitespaces only.
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0 && inputValue != 8 && inputValue != 37 && inputValue != 39)) { 
          event.preventDefault(); 
        }
      });
  });
  
  $("#signinSrTelepon").keyup(function(){
    var value = $(this).val();
    value = value.replace(/^(0*)/,"");
    $(this).val(value);
  });

  // Restricts input for the given textbox to the given inputFilter.
  function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
      textbox.addEventListener(event, function() {
        if (inputFilter(this.value)) {
          this.oldValue = this.value;
          this.oldSelectionStart = this.selectionStart;
          this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
          this.value = this.oldValue;
          this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
          this.value = "";
        }
      });
    });
  }

  // Install input filters Tambah Hp Pegawai.
  setInputFilter(document.getElementById("signinSrTelepon"), function(value) { return /^\d*$/.test(value); });
</script>