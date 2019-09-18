<ol class="breadcrumb">                          
    <li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
    <li class=""><a href="<?php echo site_url('systask'); ?>">Task</a></li>
    <li class="active"><a href="#">Ubah</a></li>
</ol>

<div class="container-fluid">
	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Ubah Task</h2>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?php echo site_url('systask/edit/'. $data->task_id); ?>" method="POST" id="addForm">
				<div class="form-group">
	                <label class="col-sm-2 control-label">Module</label>
	                <div class="col-sm-5">
	                    <select id="module" class="form-control" name="module" id="module" style="width: 100%" data-placeholder="Pilih Module">
	                        <option value="">- Pilih Module -</option>
	                        <?php echo $optmodule; ?>
	                    </select>
	                </div>
	            </div>
			  	<div class="form-group">
				    <label class="col-sm-2 control-label">Task</label>
				    <div class="col-sm-6">
				      	<input type="text" class="form-control" name="task" id="task" placeholder="Masukan task" value="<?php echo $data->task_name; ?>">
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
                module: "required",
                task: "required"
            },
            messages: {
                module: "Module tidak boleh kosong",
                task: "Task tidak boleh kosong"
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