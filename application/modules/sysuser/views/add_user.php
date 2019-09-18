<ol class="breadcrumb">                          
    <li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
    <li class=""><a href="<?php echo site_url('sysuser'); ?>">User</a></li>
    <li class="active"><a href="#">Tambah</a></li>
</ol>

<div class="container-fluid">
	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Tambah User</h2>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo site_url('sysuser/add'); ?>" method="POST" id="addForm">
				<div class="form-group">
				    <label class="col-sm-2 control-label">Nama</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control" name="name" id="name" placeholder="Masukan nama">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control" name="email" id="email" placeholder="Masukan email (contoh@email.com)">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">No. Telpon</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control" name="phone" id="phone" placeholder="Masukan nomor telepon (022xxxx/08xxxxx)">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Alamat</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control" name="address" id="address" placeholder="Masukan alamat">
				    </div>
			  	</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Level</label>
						<div class="col-sm-6">
								<select id="level" class="form-control" name="level" id="level" style="width: 100%" data-placeholder="Pilih level">
										<option value="">- Pilih level -</option>
										<?php echo $optlevel; ?>
								</select>
						</div>
					</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Kata Sandi</label>
				    <div class="col-sm-6">
				      	<input type="password" class="form-control" name="password" id="password" placeholder="Maukan kata sandi">
				    </div>
			  	</div>
			  	<!-- <div class="form-group">
				    <label class="col-sm-2 control-label">Ulangi Kata Sandi</label>
				    <div class="col-sm-6">
				      	<input type="password" class="form-control" name="retype" id="retype" placeholder="Masukan ulang kata sandi" data-required="true">
				    </div>
			  	</div> -->
			  	<div class="form-group">
			    	<div class="col-sm-offset-2 col-sm-10">
			    		<input type="hidden" name="submit" value="true">
			      		<button type="submit" class="btn btn-primary">Simpan</button>
			      		<button type="button" class="btn btn-default btn-cancel">Batal</button>
			    	</div>
			  	</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#addForm").validate( {
            rules: {
                name: "required",
                email: {
					required: true,
					email: true
				},
                phone: {
			      	required: true,
			      	number: true
			    },
                address: "required",
                level: "required",
                username: {
					required: true,
					minlength: 2
				},
    //             password: {
				// 	required: true,
				// 	minlength: 5
				// },
    //             retype: {
				// 	required: true,
				// 	minlength: 5,
				// 	equalTo: "#password"
				// }
				type: "required"
            },
            messages: {
                name: "Nama tidak boleh kosong",
                email: "Format email tidak sesuai",
                phone: {
					required: "Nomor telepon tidak boleh kosong",
					number: "Hanya bisa memasukan angka"
				},
                address: "Alamat tidak boleh kosong",
                level: "Level tidak boleh kosong",
                username: {
					required: "Nama pengguna tidak boleh kosong",
					minlength: "Nama pengguna minimal memiliki 2 karakter"
				},
                // password: {
                //     required: "Kata sandi tidak boleh kosong",
                //     minlength: "Kata sandi minimal memiliki 5 karakter"
                // },
                // retype: {
                //     required: "Kata sandi tidak boleh kosong",
                //     minlength: "Kata sandiminimal memiliki 5 karakter",
                //     equalTo: "Ulang kata sandi tidak sesuai"
                // }
                type: "Tipe harus dipilih"
            },
            errorElement: "em",
            errorPlacement: function ( error, element ) {
                // Add the `help-block` class to the error element
                error.addClass( "help-block" );

                if ( element.prop( "type" ) === "checkbox" ) {
                    error.insertAfter( element.parent( "label" ) );
                } else {
                    error.insertAfter( element );
                }
            },
            highlight: function ( element, errorClass, validClass ) {
                $( element ).parents(".form-group").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $( element ).parents(".form-group").addClass("has-success").removeClass("has-error");
            }
        });
    });
</script>