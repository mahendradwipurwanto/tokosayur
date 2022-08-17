<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">
			<h4 class="page-title">Data Pengguna</h4>
			<div class="btn-group mt-2">
				<ol class="breadcrumb hide-phone p-0 m-0">
					<li class="breadcrumb-item"><a href="<?= site_url('admin');?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a>Pages</a></li>
					<li class="breadcrumb-item"><a href="<?= site_url('admin/data-pengguna');?>">Data Pengguna</a></li>
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
				<h5 class="header-title pb-3 mt-0">Data Pengguna</h5>
				<div class="table-responsive">
					<table class="table table-hover table-striped dt-responsive nowrap"
						style="border-collapse: collapse; border-spacing: 0; width: 100%;" id="datatable-buttons">
						<thead>
							<tr class="align-self-center">
								<th width="5%" class="text-center">No</th>
								<th>Pengguna</th>
								<th>Email</th>
								<th>No Telepon</th>
								<th width="10%" class="text-center">Status</th>
								<th width="10%" class="text-center"> </th>
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($pengguna)):?>
							<?php $no = 1; foreach($pengguna as $val):?>
							<tr>
								<td class="text-center"><?= $no++;?></td>
								<td>
									<img src="<?= base_url();?><?= $val->profil;?>" alt=""
										class="thumb-sm rounded-circle mr-2">
									<?= $val->nama;?>
								</td>
								<td><?= $val->email;?></td>
								<td><?= $val->no_telp == null ? '-' : $val->nama;?></td>
								<td class="text-center">
									<?php if($val->status == 0):?>
									<span class="badge badge-boxed badge-soft-secondary">belum aktivasi</span>
									<?php elseif($val->status == 1):?>
									<span class="badge badge-boxed badge-soft-success">active</span>
									<?php else:?>
									<span class="badge badge-boxed badge-soft-danger">tidak diketahui</span>
									<?php endif;?>
								</td>
								<td class="text-center"><button class="btn btn-primary btn-sm" data-toggle="modal"
										data-target="#detail-pengguna-<?= $val->user_id;?>">detail</button></td>

								<div id="detail-pengguna-<?= $val->user_id;?>" class="modal fade" tabindex="-1" role="dialog"
									aria-labelledby="mySmallModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Detail Pengguna</h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body p-4">
												<div class="media mb-4">
													<img class="d-flex mr-3 rounded-circle"
														src="<?= base_url();?><?= $val->profil;?>"
														alt="Generic placeholder image" height="64">
													<div class="media-body">
														<h5 class="mb-0 font-18"><?= $val->nama;?></h5>
														<p>Bergabung pada <?= date("d F Y - H:i", $val->created_at);?>
															WIB</p>
													</div>
												</div>

												<dl class="row mb-0">
													<dt class="col-sm-4">Email</dt>
													<dd class="col-sm-8"><a
															href="mailto:<?= $val->email;?>"><?= $val->email;?></a>
													</dd>

													<dt class="col-sm-4">Status Akun</dt>
													<dd class="col-sm-8">
														<?php if ($val->status == 0):?>
														<span class="badge badge-boxed badge-soft-secondary">belum
															aktivasi</span>
														<?php elseif ($val->status == 1):?>
														<span class="badge badge-boxed badge-soft-success">active</span>
														<?php else:?>
														<span class="badge badge-boxed badge-soft-danger">tidak
															diketahui</span>
														<?php endif;?>
													</dd>

													<dt class="col-sm-4">No. Telepon</dt>
													<dd class="col-sm-8"><?= $val->no_telp;?></dd>

													<dt class="col-sm-4">Alamat</dt>
													<dd class="col-sm-8"><?= $val->alamat == null ? 'Belum melengkapi' : $val->alamat;?></dd>
												</dl>
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
