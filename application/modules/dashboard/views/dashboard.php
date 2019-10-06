<ol class="breadcrumb">
	<li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
	<li class="active"><a href="#">Dashboard</a></li>
</ol>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<div class="info-tile tile-orange">
				<div class="tile-icon"><i class="ti ti-user"></i></div>
				<div class="tile-heading"><span>Penutur</span></div>
				<div class="tile-body"><span><?php echo $penutur ?></span></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="info-tile tile-success">
				<div class="tile-icon"><i class="ti ti-view-list-alt"></i></div>
				<div class="tile-heading"><span>Kriteria</span></div>
				<div class="tile-body"><span><?php echo $kriteria ?></span></div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="info-tile tile-info">
				<div class="tile-icon"><i class="ti ti-pulse"></i></div>
				<div class="tile-heading"><span>Nilai</span></div>
				<div class="tile-body"><span><?php echo $nilai ?></span></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-8">
			<ul class="d-inline-flex">
				<li class="mr-40">
					< 2.5 Kurang</li> <li class="mr-40">2.5 - 2.9 Cukup
				</li>
				<li class="mr-40">3.0 - 3.4 Baik</li>
				<li>3.5 - 4 Sangat Baik</li>
			</ul>
		</div>
		<div class="col-sm-4 text-right">
			<div class="form-group">
				<select name="param" id="param" onchange="getUser()" class="form-control">
					<option value="">-- Pilih Penutur --</option>
					<option value="indra">indra Ganteng</option>
				</select>
			</div>
		</div>
	</div>

	<div class="panel">
		<div class="panel-body">
			<canvas id="myChart"></canvas>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var ctx = document.getElementById('myChart').getContext("2d");
		var periode = <?php echo json_encode($periode) ?>;

		var nilai_chart = <?php echo json_encode($nilai_chart) ?>;

		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: periode,
				datasets: [{
					label: "Nilai",
					borderColor: "#80b6f4",
					pointBorderColor: "#80b6f4",
					pointBackgroundColor: "#80b6f4",
					pointHoverBackgroundColor: "#80b6f4",
					pointHoverBorderColor: "#80b6f4",
					pointBorderWidth: 10,
					pointHoverRadius: 10,
					pointHoverBorderWidth: 1,
					pointRadius: 3,
					fill: false,
					borderWidth: 4,
					data: nilai_chart
				}]
			},
			options: {
				legend: {
					position: "bottom"
				},
				scales: {
					yAxes: [{
						ticks: {
							fontColor: "rgba(0,0,0,0.5)",
							fontStyle: "bold",
							beginAtZero: true,
							maxTicksLimit: 5,
							padding: 20
						},
						gridLines: {
							drawTicks: false,
							display: false
						}

					}],
					xAxes: [{
						gridLines: {
							zeroLineColor: "transparent"
						},
						ticks: {
							padding: 20,
							fontColor: "rgba(0,0,0,0.5)",
							fontStyle: "bold"
						}
					}]
				}
			}
		});
	});
</script>