<ol class="breadcrumb">                          
    <li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
    <li class=""><a href="<?php echo site_url('syslevel'); ?>">User Level</a></li>
    <li class="active"><a href="#">Tambah</a></li>
</ol>

<div class="container-fluid">
	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Tambah User Level</h2>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo site_url('syslevel/add'); ?>" method="POST" id="addForm">
				<!-- <div class="form-group">
				    <label class="col-sm-2 control-label">Id</label>
				    <div class="col-sm-3">
				      	<input type="text" class="form-control" name="idlevel" id="idlevel" placeholder="Masukan id">
				    </div>
			  	</div> -->
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Level</label>
				    <div class="col-sm-5">
				      	<input type="text" class="form-control" name="level" id="level" placeholder="Masukan level">
				    </div>
			  	</div>
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
                // idlevel: "required",
                level: "required"
            },
            messages: {
                // idlevel: "Id tidak boleh kosong",
                level: "Level tidak boleh kosong"
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