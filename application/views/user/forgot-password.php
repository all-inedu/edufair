<?php $this->load->view('template/header'); ?>
<style type="text/css">
.custom-box {
    border-top: none !important;
    border-left: none !important;
    border-right: none !important;
    background: none !important;
}

.custom-box.radio {
    border-bottom: none !important;
}
</style>
<div class="container-fluid">
    <div class="container" style="padding-top:7%;">
        <div class="col-xl-6 offset-xl-3 allin-registration shadow">
            <h3 class="text-center" style="letter-spacing: 0.2em;margin-bottom: 1em;">RESET PASSWORD</h3>
            <hr>
            <!-- oninput='confirmPassword.setCustomValidity(confirmPassword.value != newPassword.value ? true : false)' -->
            <form method="post" id="resetPasswordForm" novalidate class="needs-validation">
                <div class="row mt-4">
                    <div class="col" data-page="1">
                        <div class="row">
                            <div class="col">
                                <div class="form-group password-group">
                                    <label>New Password:</label>
                                    <input name="password" type="password"
                                        class="form-control form-control-sm custom-box" id="newPassword" required
                                        minlength="8">
                                    <div class="float-right px-2" id="btn-password"
                                        style="margin-top:-30px; cursor:pointer;">
                                        <i class="fas fa-eye-slash"></i>
                                    </div>
                                    <div class="invalid-feedback">Minimum. 8 characters</div>
                                    <div class="valid-feedback"></div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group confpassword-group">
                                    <label>Confirmation Password: </label>
                                    <input name="passconf" type="password"
                                        class="form-control form-control-sm custom-box" id="confirmPassword" required>
                                    <div class="float-right px-2" id="btn-confirm-password"
                                        style="margin-top:-30px; cursor:pointer;">
                                        <i class="fas fa-eye-slash"></i>
                                    </div>
                                    <div class="invalid-feedback">Password doesn't match</div>
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="userId" value="<?php echo $id; ?>" />
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $("#newPassword").on('keyup', function() {

        if ($(this).val().length < 8) {
            $(".password-group .invalid-feedback").show().html('Minimum. 8 characters');
        } else {
            $(".password-group .invalid-feedback").hide().html();
        }
    });

    $("#confirmPassword").on('keyup', function() {
        var newPass = $("#newPassword").val();
        var conPass = $(this).val();

        if (newPass.toLowerCase() != conPass.toLowerCase()) {
            $(".confpassword-group .invalid-feedback").show().html('Password doesn\'t match!');
        } else {
            $(".confpassword-group .invalid-feedback").hide().html();
        }
    });

    $("#resetPasswordForm").submit(function(event) {
        event.preventDefault();
        if ($("#resetPasswordForm")[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
            Swal.showLoading();

            $.ajax({
                url: "<?php echo base_url(); ?>reset-password",
                type: "POST",
                data: $("#resetPasswordForm").serialize(),
                success: function(msg) {
                    // console.log(msg)
                    if (msg == "001") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Reset Password',
                            timer: 1500
                        }).then((result) => {
                            window.location = '<?php echo base_url(); ?>';
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong! Please try again.'
                        });
                    }
                }
            });
        }
    });
});

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()

$('#btn-password').click(function() {
    var x = document.getElementById('newPassword')
    if (x.type === "password") {
        x.type = "text";
        $(this).html('<i class="fas fa-eye"></i>')
    } else {
        x.type = "password";
        $(this).html('<i class="fas fa-eye-slash"></i>')
    }
})

$('#btn-confirm-password').click(function() {
    var x = document.getElementById('confirmPassword')
    if (x.type === "password") {
        x.type = "text";
        $(this).html('<i class="fas fa-eye"></i>')
    } else {
        x.type = "password";
        $(this).html('<i class="fas fa-eye-slash"></i>')
    }
})
</script>
<?php $this->load->view('template/footer'); ?>