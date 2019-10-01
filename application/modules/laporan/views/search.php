<ol class="breadcrumb">
	<li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
	<li class="active"><a href="#">Laporan</a></li>
</ol>

<div class="container-fluid">
	<?php echo $alert; ?>

	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Hasil Penilaian</h2>
		</div>
		<div class="panel-body">
            <div class="row table-control">
				<div class="col-sm-12 text-right">
					<form class="form-inline" action="<?php echo site_url('laporan/search'); ?>" id="searchForm">
						<div class="form-group">
							<select name="param" id="param" class="form-control">
                                <option value="">-- Pilih Periode --</option>
                                <?php if (!empty($periode)) {
                                    foreach ($periode as $_periode) { ?>
                                        <option value="<?php echo $_periode['periode_id'] ?>"><?php echo $_periode['nama_periode'] ?></option>
                                    <?php }
                                }
                                ?>
							</select>
						</div>
						<button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Cari</button>
						<a href="<?php echo site_url('laporan'); ?>" class="btn btn-default-alt" data-toggle='tooltip' title='Refresh'><i class="fa fa-refresh"></i></a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>