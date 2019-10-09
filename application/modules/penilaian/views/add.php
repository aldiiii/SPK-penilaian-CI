<ol class="breadcrumb">
    <li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
    <li class=""><a href="<?php echo site_url('penilaian'); ?>">Penilaian</a></li>
    <li class="active"><a href="#">Tambah</a></li>
</ol>

<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h2 class="panel-title">Tambah Penilaian</h2>
        </div>
        <div class="panel-body">
            <form action="<?php echo site_url('penilaian/add'); ?>" method="POST" id="addForm" enctype="multipart/form-data">
                <div class="form-group col-sm-6">
                    <label class="control-label">Pilih Periode</label>
                    <select class="form-control params-assessment" name="periode_id" id="periode_id" style="width: 100%" data-placeholder="Pilih Periode ID">
                        <option value="">- Pilih Periode -</option>
                        <?php echo $periode; ?>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label">Pilih Penutur</label>
                    <select class="form-control params-assessment" name="penutur_id" id="penutur_id" style="width: 100%" data-placeholder="Pilih Periode ID">
                    </select>
                </div>
                <?php
                if (!empty($kriteria)) {
                    foreach ($kriteria as $key => $_kriteria) {
                        if (!empty($_kriteria['detail'])) { ?>
                            <div class="assessment-form" style="display: none">
                                <div class="col-md-12 title">
                                    <h4><?php echo $_kriteria['nama'] ?></h4>
                                </div>
                                <div class="col-md-12 table-wrapper">
                                    <table class="table table-responsive">
                                        <thead>
                                            <th width="10%">No</th>
                                            <th width="70%">Detail Kriteria</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach ($_kriteria['detail'] as $i => $_detail) { ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $_detail['nama_detail_kriteria'] ?></td>
                                                    <td>
                                                        <label class="radio-inline">
                                                            <input class="assessment" type="radio" name="point[<?= $_kriteria['kriteria_id'] ?>][<?= $i ?>]" value="1,<?= $_detail['kriteria_detail_id'] ?>"> 1
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input class="assessment" type="radio" name="point[<?= $_kriteria['kriteria_id'] ?>][<?= $i ?>]" value="2,<?= $_detail['kriteria_detail_id'] ?>"> 2
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input class="assessment" type="radio" name="point[<?= $_kriteria['kriteria_id'] ?>][<?= $i ?>]" value="3,<?= $_detail['kriteria_detail_id'] ?>"> 3
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input class="assessment" type="radio" name="point[<?= $_kriteria['kriteria_id'] ?>][<?= $i ?>]" value="4,<?= $_detail['kriteria_detail_id'] ?>"> 4
                                                        </label>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                <?php }
                    }
                }
                ?>
                <div class="form-group col-sm-12" style="margin-top: 50px;">
                    <input type="hidden" name="submit" value="true">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-default btn-cancel">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        
        $('#periode_id').on('change', function(){
            showAssessment();
            $.ajax({
                type: "POST",
                url: '<?php echo base_url("penilaian/get_penutur_available") ?>',
                data: {
                    periode_id: $('#periode_id option:selected').val(),
                },
                dataType:'JSON',
                success: function(data){
                    if (data.status == 200) {
                        var res = data.data;
                        var list = res.length - 1;
                        var option = "<option>Pilih Penutur</option>";
                        for (var i = 0; i <= list; i++) {
                            option += '<option value="' + res[i].user_id + '">' + res[i].user_name + '</option>';
                        }    
                    }  else {
                        var option = "<option>Pilih Penutur</option>";
                    }

                    console.log(option);

                    $("#penutur_id").html(option);

                    $('#penutur_id').on('change', function(){
                        showAssessment();
                    });
                }
            });
        });

        function showAssessment() {
            if (($('#penutur_id option:selected').val() > 0) && ($('#periode_id option:selected').val() > 0)) {
                $('.assessment-form').show();
                $('.assessment').attr('checked', false);
            } else {
                $('.assessment-form').hide();
            }
        }
        $("#addForm").validate({
            rules: {
                nama_periode: "required",
                tanggal_mulai: "required",
                tanggal_selesai: "required",
            },
            messages: {
                nama_periode: "Nama kriteria tidak boleh kosong",
                tanggal_mulai: "Tanggal mulai tidak boleh kosong",
                tanggal_selesai: "Tanggal selesai tidak boleh kosong",
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");

                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.parent("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents(".form-group").addClass("has-success").removeClass("has-error");
            }
        });
    });
</script>