<ol class="breadcrumb">                          
    <li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
    <li class=""><a href="<?php echo site_url('sysrole'); ?>">Role</a></li>
    <li class="active"><a href="#">Tambah</a></li>
</ol>

<div class="container-fluid">
    <div class="panel">
    	<div class="panel-heading">
    		<h2 class="panel-title">Tambah Role</h2>
    	</div>
    	<div class="panel-body">
    		<form class="form-horizontal" action="<?php echo site_url('sysrole/add'); ?>" method="POST" id="addForm">
    			<div class="form-group">
                    <label class="col-sm-2 control-label">User Level</label>
                    <div class="col-sm-5">
                        <select id="user" class="form-control" name="user" id="user" style="width: 100%" data-placeholder="Pilih Level">
                            <option value="">- Pilih Level -</option>
                            <?php echo $optuser; ?>
                        </select>
                    </div>
                </div>
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
    			    <div class="col-sm-5">
    			      	<select id="task" class="form-control" multiple="true" name="task[]" style="width: 100%" data-placeholder="Pilih Task">
                            <option value="">- Pilih Task -</option>
                        </select>
    			    </div>
    		  	</div>
    		  	<div class="form-group">
    		    	<div class="col-sm-offset-2 col-sm-10">
    		    		<input type="hidden" name="dosubmit" value="true">
    		      		<button type="submit" class="btn btn-primary" id="btn-submit">Simpan</button>
    		      		<button type="button" class="btn btn-default btn-cancel">Batal</button>
    		    	</div>
    		  	</div>
    		</form>
    	</div>
    </div>
</div>

<script type="text/javascript">

	$('#module').change(function(){

        var id  = $(this).val();
        var url = "<?php echo site_url(); ?>sysrole/gettask/" + id;

        $('#task').html('<option value="">- Pilih Task -</option>');

        $.ajax({
            type : 'GET',
            url : url,
            dataType : 'HTML',
            success : function(data) {
                console.log(data);
                $('#task').html(data);
            },
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert('Error : Failed to get task for module'); 
            }
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#addForm").validate( {
            rules: {
                user: "required",
                module: "required",
                task: "required"
            },
            messages: {
                user: "Level tidak boleh kosong",
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

    $('#btn-submit').click(function(){
        
        var url     = "<?php echo site_url(); ?>sysrole/checkexist";

        var user    = $('#user').val();
        var module  = $('#module').val();
        var task    = $('#task').val();

        if (user != '' && module != '') {

            var data = {user: user, module: module, task: task};

            $.ajax({
                type : 'POST',
                url : url,
                data: data,
                dataType : 'JSON',
                success : function(data) {
                    console.log(data);
                    
                    if (data.status == 1) {
                        swal({
                            type: 'warning',
                            title: 'Peringatan',
                            text: 'Task '+ data.name +' sudah ada',
                        })
                    }
                    else{
                        $('#addForm').submit();
                    }
                    
                    return false;

                },
                error : function(XMLHttpRequest, textStatus, errorThrown) {
                    alert('Error : Failed to check id'); 
                }
            });

            return false;
        }

    });
</script>