<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <?php echo $alert; ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Masuk Sistem</h2>
            </div>
            <div class="panel-body">

                <form action="<?php echo site_url(); ?>user/login" class="form-horizontal" id="signinForm" method="post">
                    <div class="form-group mb-md">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ti ti-user"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Nama Pengguna" name="username" id="username">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-md">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="ti ti-key"></i>
                                </span>
                                <input type="password" class="form-control" placeholder="Kata Sandi" name="password" id="password">
                            </div>
                        </div>
                    </div>

            </div>
            <div class="panel-footer">
                <div class="clearfix">
                    <a href="<?php echo site_url('user/forgot'); ?>" class="pull-left">Lupa kata sandi?</a>
                    <input type="hidden" value="true" name="login">
                    <button type="submit" class="btn btn-primary pull-right">Masuk</button>
                </div>
            </div>
            </form>
        </div>

        <div class="text-center">
            &copy; 2019. SPK Penilaian
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