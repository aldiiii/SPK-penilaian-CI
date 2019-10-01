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
						<tr>
							<td>C1</td>
							<td>Kerjasama team</td>
							<td>0.8</td>
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
						<tr>
							<td>1</td>
							<td>Tony</td>
							<td>3.24</td>
							<td>Sangat Baik</td>
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
</div>