<ol class="breadcrumb">                          
    <li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
    <li class="active"><a href="#">Profil</a></li>
</ol>

<div class="container-fluid">
	<?php echo $alert; ?>

	<div data-widget-group="group1">
		<div class="row">
			<div class="col-sm-3">
				<div class="panel panel-profile">
				  	<div class="panel-body">
					    <img src="<?php echo $photo; ?>" class="img-circle">
					    <div class="name"><?php echo $name; ?></div>
					    <div class="info"><?php echo $level; ?></div>
					    <br>
					    <a href="#tab-photo" role="tab" data-toggle="tab" class="btn btn-primary"><i class="ti ti-export"></i> &nbsp; Ubah Foto</a>
				  	</div>
				</div><!-- panel -->
				<div class="list-group list-group-alternate mb-n nav nav-tabs">
					<a href="#tab-about" 	role="tab" data-toggle="tab" class="list-group-item active"><i class="ti ti-user"></i> Profil</a>
					<a href="#tab-setting" 	role="tab" data-toggle="tab" class="list-group-item"><i class="ti ti-settings"></i> Pengaturan</a>
				</div>
			</div><!-- col-sm-3 -->
			<div class="col-sm-9">
				<div class="tab-content">
					<!-- Tab About -->
					<div class="tab-pane active" id="tab-about">
						<div class="panel panel-default">
						    <div class="panel-heading">
						    	<h2>Profil</h2>
						    </div>
							<div class="panel-body">
								<div class="about-area">
									<div class="table-responsive">
									    <table class="table">
									        <tbody>
									          	<tr>
													<th>Nama</th>
													<td><?php echo $name; ?></td>
												</tr>
												  <tr>
										            <th>Alamat</th>
										            <td><?php echo $address; ?></td>
									          	</tr>
									          	<tr>
										            <th>Kontak/Whatsapp</th>
										            <td><?php echo $phone; ?></td>
									          	</tr>
									          	<tr>
										            <th>Email</th>
										            <td><?php echo $email; ?></td>
									          	</tr>
									          	<tr>
										            <th>Status</th>
										            <td><?php echo $status; ?></td>
									          	</tr>
									        </tbody>
									    </table>
									</div>
								</div>
							</div>
							<div class="panel-footer">
								<a href="#tab-edit" role="tab" data-toggle="tab" class="btn btn-primary">Ubah Profil</a>
							</div>
						</div>
					</div>
					<!-- End Tab About -->

					<!-- Tab Setting -->
					<div class="tab-pane" id="tab-setting">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2>Pengaturan Kata Sandi</h2>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" action="<?php echo site_url(); ?>user/change_password" method="POST" id="passwordForm">
									<div class="form-group">
									    <label class="col-sm-2 control-label">Sandi Sekarang</label>
									    <div class="col-sm-6">
									      	<input type="password" class="form-control" name="currpass" id="currpass" placeholder="Masukan sandi">
									    </div>
								  	</div>
								  	<div class="form-group">
									    <label class="col-sm-2 control-label">Sandi Baru</label>
									    <div class="col-sm-6">
									      	<input type="password" class="form-control" name="password" id="password" placeholder="Masukan sandi baru">
									    </div>
								  	</div>
								  	<div class="form-group">
									    <label class="col-sm-2 control-label">Ulangi Sandi</label>
									    <div class="col-sm-6">
									      	<input type="password" class="form-control" name="retype" id="retype" placeholder="Masukan ulang sandi">
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
					</div>
					<!-- End Tab Setting -->

					<!-- Tab Edit -->
					<div class="tab-pane" id="tab-edit">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2>Ubah Profil</h2>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" action="<?php echo site_url(); ?>user/change_account" method="POST" id="editForm">
								  	<div class="form-group">
									    <label class="col-sm-2 control-label">Nama</label>
									    <div class="col-sm-6">
									      	<input type="text" class="form-control" name="name" id="name" placeholder="Masukan nama" value="<?php echo $name; ?>">
									    </div>
								  	</div>
								  	<div class="form-group">
									    <label class="col-sm-2 control-label">Nama Pengguna</label>
									    <div class="col-sm-6">
									      	<input type="text" class="form-control" name="username" id="username" placeholder="Masukan nama pengguna" value="<?php echo $username; ?>" disabled>
									    </div>
								  	</div>
								  	<div class="form-group">
									    <label class="col-sm-2 control-label">Alamat</label>
									    <div class="col-sm-10">
									      	<input type="text" class="form-control" name="address" id="address" placeholder="Masukan alamat" value="<?php echo $address; ?>">
									    </div>
								  	</div>
								  	<div class="form-group">
									    <label class="col-sm-2 control-label">Kontak/Whatsapp</label>
									    <div class="col-sm-4">
									      	<input type="text" class="form-control" name="phone" id="phone" placeholder="Masukan nomor telepon (022xxxx/08xxxxx)" value="<?php echo $phone; ?>">
									    </div>
								  	</div>
								  	<div class="form-group">
									    <label class="col-sm-2 control-label">Email</label>
									    <div class="col-sm-6">
									      	<input type="text" class="form-control" name="email" id="email" placeholder="Masukan email (contoh@email.com)" value="<?php echo $email; ?>">
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
					</div>
					<!-- End Tab Edit -->

					<!-- Tab Photo -->
					<div class="tab-pane" id="tab-photo">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2>Ubah Foto</h2>
							</div>
							<div class="panel-body">
								<form class="form-horizontal" action="<?php echo site_url(); ?>user/change_photo" method="POST" enctype="multipart/form-data" id="photoForm">
								  	<div class="form-group">
									    <label class="col-sm-2 control-label">Foto</label>
									    <div class="col-sm-6">
									      	<input type="file" class="form-control" name="photo" id="photo" placeholder="Masukan foto" value="<?php echo $name; ?>">
									    </div>
								  	</div>
								  	<div class="form-group">
								    	<div class="col-sm-offset-2 col-sm-10">
								    		<input type="hidden" name="submit" value="true">
								      		<button type="submit" class="btn btn-primary">Unggah</button>
								    	</div>
								  	</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {

		// There is no special integration in BS between list-group and tabs, so we add it
		 $('.list-group-item').on('click',function(e){
	     	var previous = $(this).closest(".list-group").children(".active");
	     	previous.removeClass('active'); // previous list-item
	     	$(e.target).addClass('active'); // activated list-item
	   	});


		$("#editForm").validate( {
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
				}
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
				}
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

        $("#passwordForm").validate( {
            rules: {
            	currpass: {
					required: true,
					minlength: 5
				},
                password: {
					required: true,
					minlength: 5
				},
                retype: {
					required: true,
					equalTo: "#password"
				}
            },
            messages: {
                currpass: {
                    required: "Kata sandi sekarang tidak boleh kosong",
                    minlength: "Kata sandi sekarang minimal memiliki 5 karakter"
                },
                password: {
                    required: "Kata sandi tidak boleh kosong",
                    minlength: "Kata sandi minimal memiliki 5 karakter"
                },
                retype: {
                    required: "Kata sandi tidak boleh kosong",
                    equalTo: "Ulang kata sandi tidak sesuai"
                }
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

        $("#photoForm").validate( {
            rules: {
                photo: {
					required: true,
      				extension: "jpg|jpeg|png|gif|bmp"
				}
            },
            messages: {
                photo: {
                    required: "Foto tidak boleh kosong",
                    extension: "File yang diunggah harus gambar"
                }
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