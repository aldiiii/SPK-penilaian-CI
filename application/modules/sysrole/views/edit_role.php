<ol class="breadcrumb">                          
    <li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
    <li class=""><a href="<?php echo site_url('sysrole'); ?>">Role</a></li>
    <li class="active"><a href="#">Ubah</a></li>
</ol>

<div class="container-fluid">
	<div class="panel">
		<div class="panel-heading">
			<h2 class="panel-title">Ubah</h2>
		</div>
		<div class="panel-body">
			<form action="<?php echo site_url('sysrole/edit/'. $data->user_level_id); ?>" method="POST" id="addForm">

                <div class="col-sm-12">
                    <h5 class="text-muted"><?php echo $data->user_level_name; ?></h5>
                    <hr>
                </div>
                
                <?php
                if (!$modules) {
                    echo "<p class='text-muted text-center'>Module tidak tersedia</p>";
                }
                else{

                    // GetRole
                    $getRole = $this->_dataModel->getList($this->db->dbprefix ."_sys_role", array('user_level_id' => $data->user_level_id), array('task_id', 'ASC'));
                    $roles   = array();

                    if ($getRole) {

                        foreach ($getRole as $result) {
                           $roles[] = $result['task_id'];
                        }
                        
                    }

                    foreach ($modules as $result) {

                        // Get Task
                        $getTask = $this->_dataModel->getList($this->db->dbprefix ."_sys_task", array('module_id' => $result['module_id']), array('task_name', 'ASC'));
                        
                        echo "
                        <div class='form-group col-sm-4'>
                            <label class='control-label'>". $result['module_name'] ."</label><br>";
                        
                        if (!$getTask) {
                            echo "<p class='text-center text-muted'>Task tidak tersedia</p>";
                        }
                        else{
                            foreach ($getTask as $result2) {
                                
                                $checked = in_array($result2['task_id'], $roles) ? "checked" : "";

                                echo "
                                <label class='checkbox-inline icheck'>
                                    <input type='checkbox' name='task[]' value='". $result2['task_id'] ."' $checked> ". $result2['task_name'] ."
                                </label>
                                ";

                            }
                        }

                        echo "</div>";

                    }

                }
                ?>

			  	<div class="form-group col-sm-12">
			    	<input type="hidden" name="submit" value="true">
			      	<button type="submit" class="btn btn-primary">Simpan</button>
			      	<button type="button" class="btn btn-default btn-cancel">Batal</button>
			  	</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('input').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue',
            increaseArea: '20%' // optional
        });
    });
</script>