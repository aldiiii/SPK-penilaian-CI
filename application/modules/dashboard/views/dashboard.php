<ol class="breadcrumb">
	<li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
	<li class="active"><a href="#">Dashboard</a></li>
</ol>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<div class="info-tile tile-orange">
				<div class="tile-icon"><i class="ti ti-car"></i></div>
				<div class="tile-heading"><span>Data</span></div>
				<div class="tile-body"><span>1</span></div>
				<div class="tile-footer"><span class="text-muted">Owned</span></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="info-tile tile-success">
				<div class="tile-icon"><i class="ti ti-light-bulb"></i></div>
				<div class="tile-heading"><span>Info</span></div>
				<div class="tile-body"><span>1</span></div>
				<div class="tile-footer"><span class="text-muted">Published</span></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="info-tile tile-info">
				<div class="tile-icon"><i class="ti ti-gallery"></i></div>
				<div class="tile-heading"><span>Data</span></div>
				<div class="tile-body"><span>1</span></div>
				<div class="tile-footer"><span class="text-muted">Published</span></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="info-tile tile-info">
				<div class="tile-icon"><i class="ti ti-credit-card"></i></div>
				<div class="tile-heading"><span>Info</span></div>
				<div class="tile-body"><span>1</span></div>
				<div class="tile-footer"><span class="text-muted">Owned</span></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-8">
		<ul class="d-inline-flex">
  <li class="mr-40">< 2.5 Kurang</li>
  <li class="mr-40">2.5 - 2.9 Cukup</li>
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

	<div id="highchar">
		
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		Highcharts.chart('highchar', {

			title: {
				text: 'Data Penilain Penutur'
			},

			subtitle: {
				text: 'Sistem Penilaian Penutur'
			},

			yAxis: {
				title: {
					text: 'Nilai'
				}
			},
			// xAxis: {
			// 	categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
			// 	'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
			// 	],
			// 	min: 0,
			// 	max: 11
			// },
			// legend: {
			// 	layout: 'vertical',
			// 	align: 'right',
			// 	verticalAlign: 'middle'
			// },

			// plotOptions: {
			// 	series: {
			// 		label: {
			// 			connectorAllowed: false
			// 		},
			// 		pointStart: 2010
			// 	}
			// },

			series: [{
				name: 'kriteria 1',
				data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
			}, {
				name: 'kriteria 2',
				data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
			}, {
				name: 'kriteria 3',
				data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
			}, {
				name: 'kriteria 4',
				data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
			}, {
				name: 'kriteria 5',
				data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
			}],

			responsive: {
				rules: [{
					condition: {
						maxWidth: 500
					},
					chartOptions: {
						legend: {
							layout: 'horizontal',
							align: 'center',
							verticalAlign: 'bottom'
						}
					}
				}]
			}
		});
	});

	function getUser() {
		const data = document.getElementById('param').value;
		
		console.log(data);
	}
</script>