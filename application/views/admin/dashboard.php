<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title">Dashboard</h4>
			<div class="btn-group mt-2">
				<ol class="breadcrumb hide-phone p-0 m-0">
					<li class="breadcrumb-item"><a href="<?= site_url('admin');?>">Dashboard</a></li>
				</ol>
			</div>

		</div>
	</div>
</div>
<!-- end page title end breadcrumb -->

<div class="row">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-3">
				<div class="card">
					<div class="card-body">
						<div class="icon-contain">
							<div class="row">
								<div class="col-2 align-self-center">
									<i class="fas fa-users text-gradient-danger"></i>
								</div>
								<div class="col-10 text-right">
									<h5 class="mt-0 mb-1"><?= number_format($statistik['pengguna']);?></h5>
									<p class="mb-0 font-12 text-muted">Total Pengguna</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card">
					<div class="card-body justify-content-center">
						<div class="icon-contain">
							<div class="row">
								<div class="col-2 align-self-center">
									<i class="fas fa-box text-gradient-success"></i>
								</div>
								<div class="col-10 text-right">
									<h5 class="mt-0 mb-1"><?= number_format($statistik['sayur']);?></h5>
									<p class="mb-0 font-12 text-muted">Total Sayur</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card">
					<div class="card-body">
						<div class="icon-contain">
							<div class="row">
								<div class="col-2 align-self-center">
									<i class="fas fa-boxes text-gradient-warning"></i>
								</div>
								<div class="col-10 text-right">
									<h5 class="mt-0 mb-1"><?= number_format($statistik['wishlist']);?></h5>
									<p class="mb-0 font-12 text-muted">Total Wishlist</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card ">
					<div class="card-body">
						<div class="icon-contain">
							<div class="row">
								<div class="col-2 align-self-center">
									<i class="far fa-chart-bar text-gradient-primary"></i>
								</div>
								<div class="col-10 text-right">
									<h5 class="mt-0 mb-1"><?= number_format($statistik['pengunjung']);?></h5>
									<p class="mb-0 font-12 text-muted">Total Pengunjung</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xl-12">
		<div class="card">
			<div class="card-body">
				<h5 class="header-title pb-3 mt-0">Data Wishlist Pengguna</h5>
				<div class="table-responsive">
					<table class="table table-hover table-striped dt-responsive nowrap"
						style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="datatable-buttons">
						<thead>
							<tr class="align-self-center">
								<th width="5%" class="text-center">No.</th>
								<th width="10%" class="text-center">Tanggal</th>
								<th>Pengguna</th>
								<th>Total keranjang</th>
								<th>Metode</th>
								<th>Bukti pembayaran</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($wishlist)):?>
							<?php $no = 1; foreach($wishlist as $val):?>
							<tr>
								<td class="text-center"><?= $no++;?></td>
								<td class="text-center"><?= date("d F Y", $val['created_at']);?></td>
								<td>
									<img src="<?= base_url();?><?= $val['profil'];?>" alt=""
										class="thumb-sm rounded-circle mr-2">
									<?= $val['nama'];?>
								</td>
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
									<?php if ($val['status'] == 1):?>
									<span class="badge badge-warning mr-2">Belum melakukan pembataran</span>
									<?php else:?>
									<?php if ($val['status'] == 2):?>
									<button class="btn btn-success btn-sm mr-2" data-toggle="modal"
										data-target="#verifikasi-checkout-<?= $val['id'];?>">konfirmasi
										pembayaran</button>
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
												<h5 class="modal-title" id="exampleModalLabel">Detail wishlist</h5>
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
												<small class="text-secondary">Wishlist pada
													<?= date("d F Y - H:i", $val['created_at']);?> WIB</small>
											</div>
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- /.modal -->

								<div id="verifikasi-checkout-<?= $val['id'];?>" class="modal fade" tabindex="-1"
									role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Hapus Operator</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form
													action="<?= site_url('admin/verifikasi_pembayaran/'.$val['id']);?>"
													method="post">
													<p>Apakah anda yakin ingin memverifikasi transaksi ini?</p>
													<div class="modal-footer px-0 mx-0">
														<button type="button" class="btn btn-secondary"
															data-dismiss="modal">Batal</button>
														<button type="submit" class="btn btn-success">Ya,
															verifikasi</button>
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
