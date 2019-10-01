<ol class="breadcrumb">
    <li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
    <li class=""><a href="<?php echo site_url('kriteria'); ?>">Kriteria</a></li>
    <li class="active"><a href="#">Tambah</a></li>
</ol>

<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h2 class="panel-title">Tambah Kriteria</h2>
        </div>
        <div class="panel-body">
            <form action="<?php echo site_url('kriteria/add'); ?>" method="POST" id="addForm" enctype="multipart/form-data">
                <div class="form-group col-sm-12">
                    <label class="control-label" for="kode">Kode<span class="form-mark">*</span></label>
                    <input type="text" class="form-control" name="kode" id="kode" placeholder="Masukan Kode">
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label" for="nama_kriteria">Nama Kriteria<span class="form-mark">*</span></label>
                    <input type="text" class="form-control" name="nama_kriteria" id="nama_kriteria" placeholder="Masukan Nama">
                </div>
                <div class="form-group col-sm-12">
                    <label class="control-label" for="bobot_kriteria">Bobot Kriteria<span class="form-mark">*</span></label>
                    <input type="text" class="form-control" name="bobot_kriteria" id="bobot_kriteria" placeholder="Masukan Bobot">
                </div>
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
    $(document).ready(function() {
        $("#addForm").validate({
            rules: {
                kode: "required",
                nama_kriteria: "required",
                bobot_kriteria: "required",
            },
            messages: {
                kode: "Nama kriteria tidak boleh kosong",
                nama_kriteria: "Nama kriteria tidak boleh kosong",
                bobot_kriteria: "Bobot kriteria tidak boleh kosong",
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