<ol class="breadcrumb">
    <li class=""><a href="<?php echo site_url(); ?>"><i class="ti ti-home"></i></a></li>
    <li class=""><a href="<?php echo site_url('periodepenilaian'); ?>">Periode Penilaian</a></li>
    <li class="active"><a href="#">Tambah</a></li>
</ol>

<div class="container-fluid">
    <div class="panel">
        <div class="panel-heading">
            <h2 class="panel-title">Tambah Periode Penilaian</h2>
        </div>
        <div class="panel-body">
            <form action="<?php echo site_url('periodepenilaian/add'); ?>" method="POST" id="addForm" enctype="multipart/form-data">
                <div class="form-group col-sm-12">
                    <label class="control-label" for="nama_periode">Nama Periode<span class="form-mark">*</span></label>
                    <input type="text" class="form-control" name="nama_periode" id="nama_periode" placeholder="Masukan Nama Periode">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label" for="tanggal_mulai">Tanggal Mulai Periode<span class="form-mark">*</span></label>
                    <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai">
                </div>
                <div class="form-group col-sm-6">
                    <label class="control-label" for="tanggal_selesai">Tanggal Selesai Periode<span class="form-mark">*</span></label>
                    <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai">
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