<ol class="breadcrumb">
	<li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
	<li class="active"><a href="#">Kriteria</a></li>
</ol>

<div class="container-fluid">
	<?php echo $alert; ?>

	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Kriteria</h2>
		</div>
		<div class="panel-body">
			<div class="row table-control">
				<div class="col-sm-6">
					<form action="<?php echo site_url('kriteria/add'); ?>">
						<button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</button>
					</form>
				</div>
				<div class="col-sm-6 text-right">
					<form class="form-inline" action="<?php echo site_url('kriteria/search'); ?>" id="searchForm">
						<div class="form-group">
							<select name="param" id="param" class="form-control">
								<option value="">-- Cari Berdasarkan --</option>
								<option value="nama" <?php if ($param == 'nama') echo "selected"; ?>>Nama Kriteria</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" name="key" id="key" class="form-control" value="<?php echo $key; ?>" placeholder="Masukan pencarian">
						</div>
						<button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
						<a href="<?php echo site_url('kriteria'); ?>" class="btn btn-default-alt" data-toggle='tooltip' title='Refresh'><i class="fa fa-refresh"></i></a>
					</form>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th width="25%">ID Kriteria</th>
							<th width="35%">Nama Kritertia</th>
							<th width="15%">Bobot</th>
							<th width="15%">Status</th>
							<th width="10%" class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php

						if (!$datas) {
							echo "<tr><td colspan='4' align='center'>Data kosong</td></tr>";
						} else {
							$no = $number + 1;

							foreach ($datas as $result) {
								if ($result['status'] == 1) {
									$status_label = "Aktif";
									$label = "success";
								}  else {
									$status_label = "Tidak Aktif";
									$label = "danger";
								}
								echo "
							<tr>
								<td>C" . $result['kriteria_id'] . "</td>
								<td>" . $result['nama'] . "</td>
								<td>" . $result['bobot'] . "</td>
								<td><span class='label label-".$label."'>". $status_label ."</span></td>
								<td class='table-action text-right'>
									<form action='" . site_url() . "kriteria/edit/" . $result['kriteria_id'] . "' >
										<button class='btn btn-sm btn-default-alt' data-toggle='tooltip' title='Ubah'><i class='fa fa-pencil'></i></button>
									</form>
									<form action='" . site_url() . "kriteria/delete/" . $result['kriteria_id'] . "'>
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