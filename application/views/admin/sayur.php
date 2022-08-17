<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title">Kelola Data Sayur
				<button type="button" class="btn btn-primary float-right" data-toggle="modal"
					data-target="#tambah">Tambah sayur</button>
			</h4>
			<div class="btn-group mt-2">
				<ol class="breadcrumb hide-phone p-0 m-0">
					<li class="breadcrumb-item"><a href="<?= site_url('admin');?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a>Pages</a></li>
					<li class="breadcrumb-item"><a href="<?= site_url('admin/kelola-sayur');?>">Kelola Data Sayur</a>
					</li>
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
				<h5 class="header-title pb-3 mt-0">Data Sayur</h5>
				<div class="table-responsive">
					<table class="table table-hover table-striped dt-responsive nowrap"
						style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="datatable-buttons">
						<thead>
							<tr class="align-self-center">
								<th width="5%" class="text-center">No</th>
								<th width="10%"> </th>
								<th>Sayur</th>
								<th>Harga</th>
								<th>Stok</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($sayur)):?>
							<?php $no = 1; foreach($sayur as $val):?>
							<tr>
								<td class="text-center"><?= $no++;?></td>
								<td>
									<button class="btn btn-primary btn-sm" data-toggle="modal"
										data-target="#edit-<?= $val->id;?>">edit</button>
									<button class="btn btn-danger btn-sm" data-toggle="modal"
										data-target="#hapus-<?= $val->id;?>">hapus</button>
								</td>
								<td>
									<img src="<?= base_url();?><?= $val->gambar;?>" alt=""
										class="thumb-sm rounded-circle mr-2">
									<?= $val->sayur;?>
								</td>
								<td>Rp. <?= number_format($val->harga);?></td>
								<td><?= number_format($val->stok);?> buah</td>
								<td><button class="btn btn-primary btn-sm" data-toggle="modal"
										data-target="#keterangan-<?= $val->id;?>">keterangan</button></td>
							</tr>


							<div id="edit-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
								aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Edit sayur</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="<?= site_url('admin/edit_sayur');?>" method="post" enctype="multipart/form-data">
												<input type="hidden" name="id" value="<?= $val->id;?>" required>

												<div class="form-group">
													<label for="inputNamaSayur" class="input-label">Nama Sayur <small class="text-danger">*</small></label>
													<input type="text" class="form-control" id="inputNamaSayur"
														name="sayur" value="<?= $val->sayur;?>" required>
												</div>
												<div class="form-group">
													<label for="inputNamaSayur" class="input-label">Gambar Sayur <small class="text-secondary">(optional)</small></label>
													<input type="file" name="image" class="form-control" >
												</div>
												<div class="form-group">
													<label for="inputNamaSayur" class="input-label">Harga Sayur <small class="text-danger">*</small></label>
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text"
																id="inputGroup-sizing-lg">Rp.</span>
														</div>
														<input type="number" class="form-control"
															value="<?= $val->harga;?>" name="harga" required>
													</div>
												</div>
												<div class="form-group">
													<label for="inputNamaSayur" class="input-label">Stok Sayur <small class="text-danger">*</small></label>
													<div class="input-group">
														<input type="number" class="form-control" name="stok" value="<?= $val->stok;?>" required>
														<div class="input-group-append">
															<span class="input-group-text" id="inputGroup-sizing-lg">buah</span>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="inputKeteranganSayur"
														class="input-label">Keterangan <small class="text-secondary">(optional)</small></label>
													<textarea class="form-control" name="keterangan"
														id="inputKeteranganSayur"
														rows="5"><?= $val->keterangan;?></textarea>
												</div>
												<div class="modal-footer px-0 mx-0">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">Batal</button>
													<button type="submit" class="btn btn-primary">Edit</button>
												</div>
											</form>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->

							<div id="hapus-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
								aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Hapus sayur</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form action="<?= site_url('admin/hapus_sayur');?>" method="post">
												<input type="hidden" name="id" value="<?= $val->id;?>" required>
												<p>Apakah anda yakin ingin menghapus sayur, <b>Kentang</b>?</p>
												<div class="modal-footer px-0 mx-0">
													<button type="button" class="btn btn-secondary"
														data-dismiss="modal">Batal</button>
													<button type="submit" class="btn btn-danger">Hapus</button>
												</div>
											</form>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->

							<div id="keterangan-<?= $val->id;?>" class="modal fade" tabindex="-1" role="dialog"
								aria-labelledby="mySmallModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Keterangan sayur</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p><?= $val->keterangan == null ? 'Tidak ada' : $val->keterangan;?></p>
											<div class="modal-footer px-0 mx-0">
												<button type="button" class="btn btn-secondary"
													data-dismiss="modal">Batal</button>
											</div>
										</div>
									</div><!-- /.modal-content -->
								</div><!-- /.modal-dialog -->
							</div><!-- /.modal -->

							<?php endforeach;?>
							<?php endif;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah sayur</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= site_url('admin/tambah_sayur');?>" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="inputNamaSayur" class="input-label">Nama Sayur <small class="text-danger">*</small></label>
						<input type="text" class="form-control" id="inputNamaSayur" name="sayur"
							placeholder="Masukkan nama sayur" required>
					</div>
					<div class="form-group">
						<label for="inputNamaSayur" class="input-label">Gambar Sayur <small class="text-secondary">(optional)</small></label>
						<input type="file" id="input-file-now" name="image" class="dropify">
					</div>
					<div class="form-group">
						<label for="inputNamaSayur" class="input-label">Harga Sayur <small class="text-danger">*</small></label>
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" id="inputGroup-sizing-lg">Rp.</span>
							</div>
							<input type="number" class="form-control" name="harga" placeholder="Masukkan harga sayur" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputNamaSayur" class="input-label">Stok Sayur <small class="text-danger">*</small></label>
						<div class="input-group">
							<input type="number" class="form-control" name="stok" placeholder="Masukkan stok sayur" required>
							<div class="input-group-append">
								<span class="input-group-text" id="inputGroup-sizing-lg">buah</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputKeteranganSayur" class="input-label">Keterangan <small class="text-secondary">(optional)</small></label>
						<textarea class="form-control" name="keterangan" id="inputKeteranganSayur" rows="5"></textarea>
					</div>
					<div class="modal-footer px-0 mx-0">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
