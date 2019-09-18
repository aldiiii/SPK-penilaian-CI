<!-- page heading start-->
<div class="page-heading">
    <h3>Pengaturan</h3>
    <ul class="breadcrumb">
        <li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i></a></li>
        <li class="active"> Pengaturan </li>
    </ul>
</div>
<!-- page heading end-->

<!--body wrapper start-->
<div class="wrapper">
	<?php echo $alert; ?>

	<div class="panel">
		<div class="panel-heading">
			<h3 class="panel-title">Pengaturan Akun</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo site_url(); ?>user/change_account" method="POST">
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Nama</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control data-input" name="name" placeholder="Masukan nama" value="<?php echo $data->user_name; ?>" data-required="true">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Nama Pengguna</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control data-input" name="name" placeholder="Masukan alamat" value="<?php echo $data->user_username; ?>" disabled data-required="true">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control data-input" name="email" placeholder="Masukan email" value="<?php echo $data->user_email; ?>" data-required="true">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Telepon</label>
				    <div class="col-sm-4">
				      	<input type="text" class="form-control data-input" name="phone" placeholder="Masukan telepon" value="<?php echo $data->user_phone; ?>" data-required="true">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Alamat</label>
				    <div class="col-sm-10">
				      	<input type="text" class="form-control data-input" name="address" placeholder="Masukan alamat" value="<?php echo $data->user_address; ?>" data-required="true">
				    </div>
			  	</div>
			  	<div class="form-group">
			    	<div class="col-sm-offset-2 col-sm-10">
			    		<input type="hidden" name="submit" value="true">
			      		<button type="submit" class="btn btn-primary">Simpan</button>
			    	</div>
			  	</div>
			</form>
		</div>
	</div>

	<div class="panel">
		<div class="panel-heading">
			<h3 class="panel-title">Ubah Kata Sandi</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo site_url(); ?>user/change_password" method="POST">
				<div class="form-group">
				    <label class="col-sm-2 control-label">Sandi Sekarang</label>
				    <div class="col-sm-6">
				      	<input type="password" class="form-control data-input" name="currpass" placeholder="Masukan sandi" data-required="true">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Sandi Baru</label>
				    <div class="col-sm-6">
				      	<input type="password" class="form-control data-input" name="newpass" id="password" placeholder="Masukan sandi baru" data-required="true" pattern=".{3,}" title="Minimum 3 characters required">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Ulangi Sandi</label>
				    <div class="col-sm-6">
				      	<input type="password" class="form-control data-input" name="retype" id="retype" placeholder="Masukan ulang sandi" data-required="true">
				    </div>
				    <div class="col-sm-4"><i id="retype-alert" class="label label-success">Retype password match</i></div>
			  	</div>
			  	<div class="form-group">
			    	<div class="col-sm-offset-2 col-sm-10">
			    		<input type="hidden" name="submit" value="true">
			      		<button type="submit" class="btn btn-primary">Simpan</button>
			    	</div>
			  	</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {

		$('#retype-alert').css('display', 'none');
		
		$('#retype').keyup(function(){

			if ($('#password').val() != '' && $('#password').val() == $('#retype').val()) {
				$('#retype-alert').html('Retype password match');
				$('#retype-alert').removeClass('label-danger');
				$('#retype-alert').addClass('label-success');
				$('#retype-alert').fadeIn();
			}
			else{
				$('#retype-alert').html('Retype password not match');
				$('#retype-alert').removeClass('label-success');
				$('#retype-alert').addClass('label-danger');
				$('#retype-alert').fadeIn();
			}

		});

	});
</script>