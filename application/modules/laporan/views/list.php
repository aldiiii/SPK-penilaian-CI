<ol class="breadcrumb">
	<li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
	<li class="active"><a href="#">Hasil Penilaian Kinerja</a></li>
</ol>

<div class="container-fluid">
	<?php echo $alert; ?>

	<div id="print">
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
		</div>

		<div class="panel">
			<div class="panel-heading">
				<h2 class="panel-title">Matrix Alternatif - Kriteria</h2>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<?php if (!$alternatif_kriteria) {
						echo "<tr><td colspan='6' align='center'>Data kosong</td></tr>";
					} else { ?>
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
								<?php foreach ($alternatif_kriteria as $result) { ?>
								<tr>
									<td><?php echo $result['user_name']; ?></td>
									<?php if (!empty($result['detail_nilai'])) {
										foreach ($result['detail_nilai'] as $detail) {
											echo "<td>".$detail['score']."</td>";
										}
									} else {
										echo "<td colspan='5'>Data Tidak Ada</td>";
									}
									?>
								<tr>
								<?php } ?>
							</tbody>
						</table>
					<?php } ?>
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
							<tr>
							<?php
								if ($max->num_rows() == 0) {
									echo "<tr><td colspan='5' align='center'>Data kosong</td></tr>";
								} else {

									foreach ($max->result() as $_max) {
										echo "
												<td>" . $_max->score . "</td>
											";

										$no++;
									}
								}

								?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="panel">
			<div class="panel-heading">
				<h2 class="panel-title">Matrix Ternormalisasi</h2>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<?php if (!$alternatif_kriteria) {
						echo "<tr><td colspan='6' align='center'>Data kosong</td></tr>";
					} else { ?>
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
								<?php foreach ($alternatif_kriteria as $result) { ?>
								<tr>
									<td><?php echo $result['user_name']; ?></td>
									<?php if (!empty($result['detail_nilai'])) {
										foreach ($result['detail_nilai'] as $detail) {
											echo "<td>".$detail['pembagian']."</td>";
										}
									} else {
										echo "<td colspan='5'>Data Tidak Ada</td>";
									}
									?>
								<tr>
								<?php } ?>
							</tbody>
						</table>
					<?php } ?>
				</div>
			</div>
		</div>

		<div class="panel">
			<div class="panel-heading">
				<h2 class="panel-title">Matrix Terbobot</h2>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<?php if (!$alternatif_kriteria) {
						echo "<tr><td colspan='6' align='center'>Data kosong</td></tr>";
					} else { ?>
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
								<?php foreach ($alternatif_kriteria as $result) { ?>
								<tr>
									<td><?php echo $result['user_name']; ?></td>
									<?php if (!empty($result['detail_nilai'])) {
										foreach ($result['detail_nilai'] as $detail) {
											echo "<td>".$detail['hasil_bobot']."</td>";
										}
									} else {
										echo "<td colspan='5'>Data Tidak Ada</td>";
									}
									?>
								<tr>
								<?php } ?>
							</tbody>
						</table>
					<?php } ?>
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
								<th width="40%">Nama</th>
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
									echo "
								<tr>
									<td>" . $no . "</td>
									<td>" . $result['user_name'] . "</td>
									<td>" . $result['total'] . "</td>
									<td>" . $result['label'] . "</td>
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
		</div>
	</div>

	<div class="text-right" style="margin-bottom: 50px;">
		<button class="btn btn-primary" onclick='printDiv();'>Cetak Laporan</button>
	</div>
</div>

<script>
	function printDiv() 
	{

	var divToPrint=document.getElementById('print');

	var newWin=window.open('','Print-Window');

	newWin.document.open();

	newWin.document.write('<html><link type="text/css" href="<?php echo base_url(); ?>assets/css/print.css" rel="stylesheet"><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

	newWin.document.close();

	setTimeout(function(){newWin.close();},10);

	}
</script>