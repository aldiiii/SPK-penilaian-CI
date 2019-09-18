<ol class="breadcrumb">                          
    <li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
    <li class="active"><a href="#">Module</a></li>
</ol>

<div class="container-fluid">
	<?php echo $alert; ?>

	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Module</h2>
		</div>
		<div class="panel-body">
			<div class="row table-control">
				<div class="col-sm-6">
					<form action="<?php echo site_url('sysmodule/add'); ?>">
						<button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</button>
					</form>
				</div>
				<div class="col-sm-6 text-right">
					<form class="form-inline" action="<?php echo site_url('sysmodule/search'); ?>" id="searchForm">
					  	<div class="form-group">
							<select name="param" id="param" class="form-control">
								<option value="">-- Cari Berdasarkan --</option>
								<option value="module_name" <?php if($param == 'module_name') echo "selected"; ?>>Module</option>
							</select>
						</div>
						<div class="form-group">
					    	<input type="text" name="key" id="key" class="form-control" value="<?php echo $key; ?>" placeholder="Masukan pencarian">
					  	</div>
					  	<button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
					  	<a href="<?php echo site_url('sysmodule'); ?>" class="btn btn-default-alt"  data-toggle='tooltip' title='Refresh'><i class="fa fa-refresh"></i></a>
					</form>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th width="80%">Module</th>
							<th width="15%"></th>
						</tr>
					</thead>
					<tbody>
					<?php 

					if (!$datas) {
						echo "<tr><td colspan='3' align='center'>Data Kosong</td></tr>";
					}
					else{
						$no = $number + 1;

						foreach ($datas as $result) {
							
							echo "
							<tr>
								<td>". $no ."</td>
								<td>". $result['module_name'] ."</td>
								<td class='table-action text-right'>
									<form action='". site_url() ."sysmodule/edit/". $result['module_id'] ."'>
										<button class='btn btn-sm btn-default-alt' data-toggle='tooltip' title='Ubah'><i class='fa fa-pencil'></i></button>
									</form>
									<form action='". site_url() ."sysmodule/delete/". $result['module_id'] ."'>
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
				<div class="col-sm-6">Total <b><?php echo $total; ?></b> item</div>
				<div class="col-sm-6 text-right">
					<div class="table-pagging"><?php echo $page_links; ?></div>
				</div>
			</div>
		</div>
	</div>
</div>