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
				<?php if (!$datas) {
					echo "<tr><td colspan='6' align='center'>Data kosong</td></tr>";
				} else {
					foreach ($datas as $result) {
						echo "<h5>".$result['nama_periode']."</h5>";
					?>
					<table class="table">
						<thead>
							<tr>
								<th width="35%">Nama</th>
								<?php 
									if (!empty($kriteria)) {
										foreach ($kriteria as $k) {
											echo '<th>'.$k['nama'].'</th>';
										}
									}
								?>
							</tr>
						</thead>
						<tbody>
								<?php if (!empty($result['detail'])) {
									foreach ($result['detail'] as $detail) {
										echo "
									<tr>
										<td>" . $detail['target_user_name'] . "</td>";
										if (!empty($detail['nilai'])) {
											foreach ($detail['nilai'] as $nilai) {
												echo "<td>".$nilai['score']."</td>";
											}
										}
									
									echo "</tr>";
									}
								}

							?>
						</tbody>
					</table>
				<?php }
				} ?>
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