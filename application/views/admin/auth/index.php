<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/template/header'); ?>
    <style type="text/css">
    body {
        @import url('https://fonts.googleapis.com/css2?family=Asap&display=swap');
        font-family: 'Asap', sans-serif;
        height: 100vh;
        background: url('assets/img/home/header-bg.webp');
        background-size: 105%;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: top right;
    }

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
</head>

<body>
    <div class="container" style="padding-top:15%">
        <div class="row justify-content-center align-items-center">
            <form method="post" class="col-md-4 needs-validation" novalidate id="loginAdmin">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="text-center">
                            <h3>Login</h3>
                            <hr>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm custom-box" placeholder="Username"
                                name="user_name" required>
                            <div class="invalid-feedback">
                                The username is required.
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control-sm custom-box"
                                placeholder="Password" name="user_password" required>
                            <div class="invalid-feedback">
                                The password is required.
                            </div>
                        </div>
                        <hr>
                        <div class="float-left mt-2">
                            <a href="<?=base_url('');?>"><i class="fas fa-arrow-left fa-fw"></i> Back to Home</a>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-sm btn-outline-info">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
<?php $this->load->view('admin/template/footer'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();


$("#loginAdmin").submit(function(event) {
    event.preventDefault();
    if ($("#loginAdmin")[0].checkValidity() === false) {
        event.stopPropagation();
    } else {
        Swal.showLoading();
        var form_data = new FormData($('#loginAdmin')[0]);

        $.ajax({
            url: "<?=base_url('admin/auth');?>",
            type: "POST",
            data: form_data,
            processData: false,
            contentType: false,
            success: function(msg) {
                if (msg == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Horee!',
                        text: 'You have successfully logged in.',
                        showConfirmButton: false
                    })
                    setTimeout(function() {
                        window.location.href =
                            "<?php echo base_url('dashboard/admin/'); ?>";
                    }, 3000)
                } else if (msg == 2) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Your password is wrong.'
                    });
                } else if (msg == 3) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Username is not found.'
                    });
                }
            }
        });
    }
});
</script>

</html>