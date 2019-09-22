<ol class="breadcrumb">                          
    <li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
    <li class=""><a href="<?php echo site_url('sysuser'); ?>">User</a></li>
    <li class="active"><a href="#">Ubah</a></li>
</ol>

<div class="container-fluid">
	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Ubah User</h2>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo site_url('sysuser/edit/'. $data->user_id); ?>" method="POST" id="addForm">
				<div class="form-group">
				    <label class="col-sm-2 control-label">NIK</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan NIK" value="<?php echo $data->user_nik; ?>">
				    </div>
			  	</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Nama Lengkap</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control" name="name" id="name" placeholder="Masukan nama" value="<?php echo $data->user_name; ?>">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Alamat</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control" name="address" id="address" placeholder="Masukan alamat" value="<?php echo $data->user_address; ?>">
				    </div>
			  	</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Agama</label>
					<div class="col-sm-6">
							<select id="agama" class="form-control" name="agama" id="agama" style="width: 100%" data-placeholder="Pilih level">
									<option value="">- Pilih Agama -</option>
									<?php echo $data_agama; ?>
							</select>
					</div>
				</div>
				<div class="form-group">
				    <label class="col-sm-2 control-label">Tanggal Lahir</label>
				    <div class="col-sm-6">
				      	<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Masukan tanggal lahir" value="<?php echo $data->user_tgl_lahir; ?>">
					</div>
				</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control" name="email" id="email" placeholder="Masukan email (contoh@email.com)" value="<?php echo $data->user_email; ?>">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Kontak</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control" name="phone" id="phone" placeholder="Masukan nomor telepon (022xxxx/08xxxxx)" value="<?php echo $data->user_phone; ?>">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-sm-2 control-label">Mulai Kerja</label>
				    <div class="col-sm-6">
				      	<input type="date" class="form-control" name="mulai_kerja" id="mulai_kerja" placeholder="Masukan tanggal mulai kerja" value="<?php echo $data->user_start_work; ?>">
				    </div>
				</div>
					<div class="form-group">
							<label class="col-sm-2 control-label">Level</label>
							<div class="col-sm-6">
									<select id="level" class="form-control" name="level" id="level" style="width: 100%" data-placeholder="Pilih Level">
											<option value="">- Pilih Level -</option>
											<?php echo $optlevel; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<label class="col-sm-2 control-label" for="bobot_kriteria">Status<span class="form-mark">*</span></label>
							<div class="col-sm-6">
								<select name="user_status" id="status" class="form-control">
										<option value="">Pilih Status</option>
										<option <?php echo ($data->user_status == 1) ? "selected" : ""; ?> value="1">Aktif</option>
										<option <?php echo ($data->user_status == 2) ? "selected" : ""; ?> value="2">Tidak Aktif</option>
								</select>
							</div>
					</div>
			  	<!-- <div class="form-group">
				    <label class="col-sm-2 control-label">Kata Sandi</label>
				    <div class="col-sm-6">
				      	<input type="password" class="form-control" name="password" id="password" placeholder="Masukan kata sandi">
				    </div>
			  	</div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Ulangi Kata Sandi</label>
				    <div class="col-sm-6">
				      	<input type="password" class="form-control" name="retype" id="retype" placeholder="Masukan ulang kata sandi">
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
				// 	required: false,
				// 	minlength: 5
				// },
    //             retype: {
				// 	required: false,
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