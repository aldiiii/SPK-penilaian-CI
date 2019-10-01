<ol class="breadcrumb">
	<li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
	<li class="active"><a href="#">Hasil Penilaian Kinerja</a></li>
</ol>

<div class="container-fluid">
	<?php echo $alert; ?>

	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Data Kriteria</h2>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th width="10%">ID Kriteria</th>
							<th width="70%">Nama Kriteria</th>
							<th width="20%">Bobot</th>
						</tr>
					</thead>
					<tbody>
						<?php

							if (!$kriteria) {
								echo "<tr><td colspan='3' align='center'>Data kosong</td></tr>";
							} else {
								$no = $number + 1;

								foreach ($kriteria as $_kriteria) {
									echo "
										<tr>
											<td>" . $_kriteria['kode'] . "</td>
											<td>" . $_kriteria['nama'] . "</td>
											<td>" . $_kriteria['bobot'] . "</td>
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

	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Matrix Alternatif - Kriteria</h2>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th width="20%">Alternatif / Kriteria</th>
							<th width="10%">C1</th>
							<th width="10%">C2</th>
							<th width="10%">C3</th>
							<th width="10%">C4</th>
							<th width="10%">C5</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Tony Kusnadi</td>
							<td>3.24</td>
							<td>4</td>
							<td>3.14</td>
							<td>3.14</td>
							<td>4</td>
						</tr>
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

	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Nilai Max Tiap Kriteria</h2>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th width="20%">Nilai Maksimal / Kriteria</th>
							<th width="10%">C1</th>
							<th width="10%">C2</th>
							<th width="10%">C3</th>
							<th width="10%">C4</th>
							<th width="10%">C5</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Nilai Maksimal</td>
							<td>3.24</td>
							<td>4</td>
							<td>3.14</td>
							<td>3.14</td>
							<td>4</td>
						</tr>
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

	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Matrix Ternormalisasi</h2>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th width="20%">Alternatif / Kriteria</th>
							<th width="10%">C1</th>
							<th width="10%">C2</th>
							<th width="10%">C3</th>
							<th width="10%">C4</th>
							<th width="10%">C5</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Tony</td>
							<td>3.24</td>
							<td>4</td>
							<td>3.14</td>
							<td>3.14</td>
							<td>4</td>
						</tr>
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

	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Matrix Terbobot</h2>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th width="20%">Alternatif / Kriteria</th>
							<th width="10%">C1</th>
							<th width="10%">C2</th>
							<th width="10%">C3</th>
							<th width="10%">C4</th>
							<th width="10%">C5</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Tony</td>
							<td>3.24</td>
							<td>4</td>
							<td>3.14</td>
							<td>3.14</td>
							<td>4</td>
						</tr>
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

	<div class="panel">
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th width="10%">No</th>
							<th width="40%">Alternatif</th>
							<th width="20%">Hasil Penilaian</th>
							<th width="30%">Keterangan</th>
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
								<td>" . $result['kode'] . "</td>
								<td>" . $result['nama'] . "</td>
								<td>" . $result['bobot'] . "</td>
								<td><span class='label label-".$label."'>". $status_label ."</span></td>
								<td class='table-action text-right'>
									<a class='btn btn-sm btn-primary' href='".base_url()."detailkriteria/index/".$result['kriteria_id']."'>Lihat Detail</a>
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