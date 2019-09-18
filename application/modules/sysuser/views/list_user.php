<ol class="breadcrumb">                          
    <li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
    <li class="active"><a href="#">User</a></li>
</ol>

<div class="container-fluid">
	<?php echo $alert; ?>

	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">User</h2>
		</div>
		<div class="panel-body">
			<div class="row table-control">
				<div class="col-sm-6">
					<form action="<?php echo site_url('sysuser/add'); ?>">
						<button class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</button>
					</form>
				</div>
				<div class="col-sm-6 text-right">
					<form class="form-inline" action="<?php echo site_url('sysuser/search'); ?>" id="searchForm">
						<div class="form-group">
							<select name="param" id="param" class="form-control">
								<option value="">-- Cari Berdasarkan --</option>
								<option value="user_name" 		<?php if($param == 'user_name') echo "selected"; ?>>Nama</option>
								<option value="user_email" 		<?php if($param == 'user_email') echo "selected"; ?>>Email</option>
							</select>
						</div>
					  	<div class="form-group">
					    	<input type="text" name="key" id="key" class="form-control" value="<?php echo $key; ?>" placeholder="Masukan pencarian" data-required="true">
					  	</div>
					  	<button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
					  	<a href="<?php echo site_url('sysuser'); ?>" class="btn btn-default-alt"  data-toggle='tooltip' title='Refresh'><i class="fa fa-refresh"></i></a>
					</form>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th width="35%">Nama</th>
							<th width="17.5%">Email</th>
							<th width="15%">Level</th>
							<th width="12.5%">Status</th>
							<th width="15%"></th>
						</tr>
					</thead>
					<tbody>
					<?php 

					if (!$datas) {
						echo "<tr><td colspan='7' align='center'>Data Kosong</td></tr>";
					}
					else{
						$no = $number + 1;

						foreach ($datas as $result) {

							if ($result['user_status'] == '0') {
		                        $status = "
		                                <a href='javascript:void(0)' location='". site_url() ."sysuser/status/". $result['user_id'] ."/1' class='tooltips btn-change' data-toggle='tooltip' title='Klik untuk merubah status'>
		                                    <span class='label label-danger'>Non-aktif</span>
		                                </a>
		                        ";
		                    }
		                    elseif ($result['user_status'] == '1') {
		                        $status = "
		                                <a href='javascript:void(0)' location='". site_url() ."sysuser/status/". $result['user_id'] ."/0' class='tooltips btn-change' data-toggle='tooltip' title='Klik untuk merubah status'>
		                                    <span class='label label-success'>Aktif</span>
		                                </a>
		                        ";
		                    }
							
							echo "
							<tr>
								<td>". $no ."</td>
								<td>". $result['user_name'] ."</td>
								<td>". $result['user_email'] ."</td>
								<td>". $result['user_level_name'] ."</td>
								<td>". $status ."</td>
								<td class='table-action text-right'>
									<form action='". site_url() ."sysuser/edit/". $result['user_id'] ."'>
										<button class='btn btn-sm btn-default-alt' data-toggle='tooltip' title='Ubah'><i class='fa fa-pencil'></i></button>
									</form>
									<form action='". site_url() ."sysuser/delete/". $result['user_id'] ."'>
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