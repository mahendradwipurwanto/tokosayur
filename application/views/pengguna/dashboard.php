<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title">Dashboard Pengguna</h4>
			<div class="btn-group mt-2">
				<ol class="breadcrumb hide-phone p-0 m-0">
					<li class="breadcrumb-item"><a href="<?= site_url('pengguna');?>">Dashboard</a></li>
				</ol>
			</div>

		</div>
	</div>
</div>
<!-- end page title end breadcrumb -->

<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h5 class="header-title pb-3 mt-0">Keranjang anda</h5>
				<div class="table-responsive">
					<table class="table table-hover table-striped dt-responsive nowrap"
						style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="datatable-buttons">
						<thead>
							<tr class="align-self-center">
								<th width="10%" class="text-center">Tanggal</th>
								<th width="10%" class="text-center">Kode</th>
								<th>Jumlah sayur</th>
								<th>Metode</th>
								<th>Bukti pembayaran</th>
								<th> </th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($wishlist)):?>
							<?php foreach($wishlist as $val):?>
							<tr>
								<td class="text-center"><?= date("d F Y", $val['created_at']);?></td>
								<td class="text-center">KRNJ-<?= $val['created_at'];?></td>
								<td><?= number_format(count($val['keranjang']));?> sayur</td>
								<td><?= $val['metode'];?></td>
								<td width="10%" class="text-center">
									<?php if(isset($val['bukti_bayar']) && $val['bukti_bayar'] != 'null'):?>
									<button class="btn btn-primary btn-sm" data-toggle="modal"
										data-target="#bukti-bayar-<?= $val['id'];?>">lihat</button>
									<?php else:?>
									-
									<?php endif;?>
								</td>
								<td width="10%" class="text-right">
									<?php if($val['status'] == 1):?>
									<button class="btn btn-success btn-sm mr-2" data-toggle="modal"
										data-target="#checkout-<?= $val['id'];?>">checkout</button>
									<?php else:?>
									<?php if($val['status'] == 2):?>
										<span class="badge badge-secondary mr-2">Menunggu konfirmasi admin</span>
									<?php else:?>
										<span class="badge badge-success mr-2">Pembayaran anda telah dikonfirmasi</span>
									<?php endif;?>
									<?php endif;?>
									<button class="btn btn-primary btn-sm" data-toggle="modal"
										data-target="#detail-wishlist-<?= $val['id'];?>">detail</button>
								</td>

								<div id="bukti-bayar-<?= $val['id'];?>" class="modal fade" tabindex="-1" role="dialog"
									aria-labelledby="mySmallModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Bukti pembayaran</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body p-4">
												<img src="<?= base_url();?><?= $val['bukti_bayar'];?>"
													class="w-100 h-auto" alt="">
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->

								<div id="detail-wishlist-<?= $val['id'];?>" class="modal fade" tabindex="-1"
									role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Detail</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body p-4">
												<dl class="row mb-0">
													<?php foreach($val['keranjang'] as $item):?>
													<dt class="col-sm-3">Sayur</dt>
													<dd class="col-sm-9"><?= $item->sayur;?> -
														<?= number_format($item->jumlah);?> buah</dd>
													<?php endforeach;?>
													<hr>
													<dt class="col-sm-3">Catatan</dt>
													<dd class="col-sm-9"><?= $val['catatan'];?></dd>
												</dl>
												<hr>
												<small class="text-secondary">Ditambahkan pada
													<?= date("d F Y - H:i", $val['created_at']);?> WIB</small>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->

								<div id="checkout-<?= $val['id'];?>" class="modal fade" tabindex="-1" role="dialog"
									aria-labelledby="mySmallModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Checkout</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body p-4">
												<form action="<?= site_url('pengguna/tambah_checkout');?>" method="post"
													enctype="multipart/form-data">
													<input type="hidden" name="id" value="<?= $val['id'];?>">
													<p>Checkout sebanyak <b><?= count($val['keranjang']);?></b> Sayur?
													</p>
													<h6>Sayur anda:</h6>
													<ul>
														<?php foreach($val['keranjang'] as $item):?>
														<li><?= $item->sayur;?> + <?= number_format($item->jumlah);?>
															buah</li>
														<?php endforeach;?>
													</ul>
													<hr>
													<h6>Metode pembayaran</h6>
													<div class="form-group">
														<select class="form-control select2" name="metode" required>
															<option value="Shopeepay">Shopeepay</option>
															<option value="DANA">DANA</option>
															<option value="BCA">BCA</option>
															<option value="BRI">BRI</option>
															<option value="MANDIRI">MANDIRI</option>
														</select>
													</div>
													<!-- <div id="accordion">
														<div class="accordion">
															<div class="accordion-header" role="button" data-toggle="collapse"
																data-target="#metode-shopeepay">
																<h4>Shopeepay</h4>
															</div>
															<div class="accordion-body collapse" id="metode-shopeepay" data-parent="#accordion">
																<div class="row mb-2">
																	<div class="col-5">
																		<span class="text-muted font-weight-normal">Atas Nama</span>
																	</div>
																	<div class="col-7">
																		<span class="text-dark font-weight-medium"><?= $shopeepay->value;?></span>
																	</div>
																</div>
																<div class="row mb-2">
																	<div class="col-5">
																		<span class="text-muted font-weight-normal">Nomor E-Wallet</span>
																	</div>
																	<div class="col-7">
																		<span class="text-dark font-weight-medium"><?= $shopeepay->desc;?></span>
																	</div>
																</div>
															</div>
														</div>
														<div class="accordion">
															<div class="accordion-header" role="button" data-toggle="collapse"
																data-target="#metode-dana">
																<h4>DANA</h4>
															</div>
															<div class="accordion-body collapse" id="metode-dana" data-parent="#accordion">
																<div class="row mb-2">
																	<div class="col-5">
																		<span class="text-muted font-weight-normal">Atas Nama</span>
																	</div>
																	<div class="col-7">
																		<span class="text-dark font-weight-medium"><?= $dana->value;?></span>
																	</div>
																</div>
																<div class="row mb-2">
																	<div class="col-5">
																		<span class="text-muted font-weight-normal">Nomor E-Wallet</span>
																	</div>
																	<div class="col-7">
																		<span class="text-dark font-weight-medium"><?= $dana->desc;?></span>
																	</div>
																</div>
															</div>
														</div>
														<div class="accordion">
															<div class="accordion-header" role="button" data-toggle="collapse"
																data-target="#metode-bca">
																<h4>BCA</h4>
															</div>
															<div class="accordion-body collapse" id="metode-bca" data-parent="#accordion">
																<div class="row mb-2">
																	<div class="col-5">
																		<span class="text-muted font-weight-normal">Atas Nama</span>
																	</div>
																	<div class="col-7">
																		<span class="text-dark font-weight-medium"><?= $bca->value;?></span>
																	</div>
																</div>
																<div class="row mb-2">
																	<div class="col-5">
																		<span class="text-muted font-weight-normal">Nomor E-Wallet</span>
																	</div>
																	<div class="col-7">
																		<span class="text-dark font-weight-medium"><?= $bca->desc;?></span>
																	</div>
																</div>
															</div>
														</div>
														<div class="accordion">
															<div class="accordion-header" role="button" data-toggle="collapse"
																data-target="#metode-bri">
																<h4>BRI</h4>
															</div>
															<div class="accordion-body collapse" id="metode-bri" data-parent="#accordion">
																<div class="row mb-2">
																	<div class="col-5">
																		<span class="text-muted font-weight-normal">Atas Nama</span>
																	</div>
																	<div class="col-7">
																		<span class="text-dark font-weight-medium"><?= $bri->value;?></span>
																	</div>
																</div>
																<div class="row mb-2">
																	<div class="col-5">
																		<span class="text-muted font-weight-normal">Nomor E-Wallet</span>
																	</div>
																	<div class="col-7">
																		<span class="text-dark font-weight-medium"><?= $bri->desc;?></span>
																	</div>
																</div>
															</div>
														</div>
														<div class="accordion">
															<div class="accordion-header" role="button" data-toggle="collapse"
																data-target="#metode-mandiri">
																<h4>MANDIRI</h4>
															</div>
															<div class="accordion-body collapse" id="metode-mandiri" data-parent="#accordion">
																<div class="row mb-2">
																	<div class="col-5">
																		<span class="text-muted font-weight-normal">Atas Nama</span>
																	</div>
																	<div class="col-7">
																		<span class="text-dark font-weight-medium"><?= $mandiri->value;?></span>
																	</div>
																</div>
																<div class="row mb-2">
																	<div class="col-5">
																		<span class="text-muted font-weight-normal">Nomor E-Wallet</span>
																	</div>
																	<div class="col-7">
																		<span class="text-dark font-weight-medium"><?= $mandiri->desc;?></span>
																	</div>
																</div>
															</div>
														</div>
													</div> -->
													<h6>Upload bukti pembayaran</h6>
													<div class="form-group">
														<label for="GETP_BUKTI" class="upload-card mx-auto">
															<img id="P_BUKTI" class="upload-img w-100 P_BUKTI cursor"
																src="<?= base_url() . 'assets/images/Pickanimage.png' ?>"
																alt="Placeholder">
														</label>
														<input type="file" id="GETP_BUKTI"
															class="form-control-file d-none" name="image"
															onchange="previewP_BUKTI(this);" accept="image/*">
														<small class="text-muted">Max 2Mb size, and use 1:1
															ratio.</small>
													</div>
													<div class="form-group mt-3">
														<h6 for="inputKeteranganSayur" class="input-label h6">Tambahkan
															catatan <small class="text-secondary">(optional)</small>
														</h6>
														<textarea class="form-control" name="catatan"
															id="inputKeteranganSayur" name="catatan" rows="5"
															style="height: 100px"><?= $val['catatan'];?></textarea>
													</div>
													<div class="modal-footer px-0 mx-0 mb-0 pb-0">
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">Batal</button>
														<button type="submit" class="btn btn-primary">Checkout</button>
													</div>
												</form>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->
							</tr>
							<?php endforeach;?>
							<?php endif;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('form').submit(function (event) {
		$('#send-button').prop("disabled", true);
		// add spinner to button
		$('#send-button').html(
			`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> memuat...`
		);
		return;
	});

	function previewP_BUKTI(input) {
		$(".P_BUKTI").removeClass('hidden');
		var file = $("#GETP_BUKTI").get(0).files[0];

		if (file) {
			var reader = new FileReader();

			reader.onload = function () {
				$("#P_BUKTI").attr("src", reader.result);
			}

			reader.readAsDataURL(file);
		}
	}

</script>
