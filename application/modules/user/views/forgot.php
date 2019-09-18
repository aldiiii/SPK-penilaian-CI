<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Lupa Kata Sandi</h2>
            </div>
            <div class="panel-body">
                <p class="text-center">Silahkan hubungi bagian administrasi untuk mengatur ulang kata sandi anda.</p>
                <p class="text-center"><a href="<?php echo site_url(); ?>"><i class="fa fa-arrow-left"></i> Kembali</a></p>
            </div>
        </div>

        <div class="text-center">
            &copy; 2019. Teman Sharing
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#signinForm").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 2
                },
                password: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                username: {
                    required: "Nama pengguna tidak boleh kosong",
                    minlength: "Kata sandi minimal memiliki 2 karakter"
                },
                password: {
                    required: "Kata sandi tidak boleh kosong",
                    minlength: "Kata sandi minimal memiliki 5 karakter"
                }
            },
            errorElement: "em",
            errorPlacement: function(error, element) {
                // Add the `help-block` class to the error element
                // error.addClass( "help-block" );

                // if ( element.prop( "type" ) === "checkbox" ) {
                //     error.insertAfter( element.parent( "label" ) );
                // } else {
                //     error.insertAfter( element );
                // }
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