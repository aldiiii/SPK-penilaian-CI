<ol class="breadcrumb">
	<li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
	<li class="active"><a href="#">Penilaian</a></li>
</ol>

<div class="container-fluid">
	<?php echo $alert; ?>

	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Penilaian</h2>
		</div>
		<div class="panel-body">
			<div class="row table-control">
				<div class="col-sm-6">
					<form action="<?php echo site_url('penilaian/add'); ?>">
						<button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</button>
					</form>
				</div>
				<div class="col-sm-6 text-right">
					<form class="form-inline" action="<?php echo site_url('penilaian/search'); ?>" id="searchForm">
						<div class="form-group">
							<select name="param" id="param" class="form-control">
								<option value="">-- Cari Berdasarkan --</option>
								<option value="user_name" <?php if ($param == 'user_name') echo "selected"; ?>>Nama Penilaian</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" name="key" id="key" class="form-control" value="<?php echo $key; ?>" placeholder="Masukan pencarian">
						</div>
						<button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
						<a href="<?php echo site_url('penilaian'); ?>" class="btn btn-default-alt" data-toggle='tooltip' title='Refresh'><i class="fa fa-refresh"></i></a>
					</form>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th width="10%">No</th>
							<th width="35%">Nama Periode</th>
							<th width="15%">Tanggal Mulai</th>
							<th width="15%">Tanggal Selesai</th>
							<th width="15%">Dibuat oleh</th>
							<th width="35%" class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php

						if (!$datas) {
							echo "<tr><td colspan='6' align='center'>Data kosong</td></tr>";
						} else {
							$no = $number + 1;

							foreach ($datas as $result) {
								echo "
							<tr>
								<td>" . $no . "</td>
								<td>" . $result['nama_periode'] . "</td>
								<td>" . $result['tanggal_mulai'] . "</td>
								<td>" . $result['tanggal_selesai'] . "</td>
								<td class='text-capitalize'>" . $result['user_username'] . "</td>
								<td class='table-action text-right'>
									<form action='" . site_url() . "penilaian/edit/" . $result['periode_id'] . "' >
										<button class='btn btn-sm btn-default-alt' data-toggle='tooltip' title='Ubah'><i class='fa fa-pencil'></i></button>
									</form>
									<form action='" . site_url() . "penilaian/delete/" . $result['periode_id'] . "'>
										<button class='btn btn-sm btn-danger btn-delete' data-toggle='tooltip' title='Hapus'><i class='fa fa-trash'></i></button>
									</form>
								</td>
							</tr>
							";

								$no++;
							}
						}

						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="panel-footer">
			<div class="row">
				<div class="col-sm-6">Total <b><?php echo $total; ?></b> items</div>
				<div class="col-sm-6 text-right">
					<div class="table-pagging"><?php echo $page_links; ?></div>
				</div>
			</div>
		</div>
	</div>
</div>