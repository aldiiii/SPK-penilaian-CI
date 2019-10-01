<ol class="breadcrumb">
	<li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
	<li class="active"><a href="#">Hitung</a></li>
</ol>

<div class="container-fluid">
	<?php echo $alert; ?>


	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Daftar Nilai</h2>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th width="10%">No</th>
							<th width="30%">Jenjang Nilai</th>
							<th width="50%">Keterangan</th>
							<th width="10%">Nilai</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td>zzzzzzz</td>
						<td>22/199/1212</td>
						<td>Berhasil</td>
						<td>Berhasil</td>
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
			<h2 class="panel-title">Hitung</h2>
		</div>
		<div class="panel-body">
			<div class="row table-control">
				<div class="col-sm-8">
					<form action="<?php echo site_url('kriteria/add'); ?>">
						<button class="btn btn-primary"><i class="fa fa-plus"></i> Hitung</button>
					</form>
				</div>
				<div class="col-sm-4 text-right">
					<form class="form-inline" action="<?php echo site_url('kriteria/search'); ?>" id="searchForm">
						<div class="form-group">
							<select name="param" id="param" class="form-control">
								<option value="">-- Periode --</option>
								<option value="nama" <?php if ($param == 'nama') echo "selected"; ?>>Nama Periode</option>
							</select>
						</div>
						<button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
						<a href="<?php echo site_url('calculate'); ?>" class="btn btn-default-alt" data-toggle='tooltip' title='Refresh'><i class="fa fa-refresh"></i></a>
					</form>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th width="40%">Periode</th>
							<th width="30%">Tanggal Hitung</th>
							<th width="30%">Status</th>
						</tr>
					</thead>
					<tbody>
					<tr>
						<td>zzzzzzz</td>
						<td>22/199/1212</td>
						<td>Berhasil</td>
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