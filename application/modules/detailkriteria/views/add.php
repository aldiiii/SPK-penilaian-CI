<ol class="breadcrumb">
    <li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
    <li class=""><a href="<?php echo site_url('kriteria'); ?>">Kriteria</a></li>
    <li class="active"><a href="#">Tambah</a></li>
</ol>

<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h2 class="panel-title">Tambah Detail Kriteria</h2>
        </div>
        <div class="panel-body">
            <form action="<?php echo site_url('detailkriteria/add'); ?>" method="POST" id="addForm" enctype="multipart/form-data">
                <div class="form-group col-sm-12">
                    <label class="control-label" for="nama_detail_kriteria">Nama Detail Kriteria<span class="form-mark">*</span></label>
                    <input type="text" class="form-control" name="nama_detail_kriteria" id="nama_detail_kriteria" placeholder="Masukan Pertanyaan">
                </div>
                <div class="form-group col-sm-12">
                    <input type="hidden" name="submit" value="true">
                    <input type="hidden" name="id_kriteria" value="<?php echo $id_kriteria; ?>">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-default btn-cancel">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#addForm").validate({
            rules: {
                nama_detail_kriteria: "required",
            },
            messages: {
                nama_detail_kriteria: "Nama detail kriteria tidak boleh kosong",
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