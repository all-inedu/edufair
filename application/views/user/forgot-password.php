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
	    <div class="container">
	        <div class="col-xl-6 offset-xl-3 allin-registration shadow">
	            <h3 class="text-center" style="letter-spacing: 0.2em;margin-bottom: 1em;">RESET PASSWORD</h3>
	            <hr>
	            <form method="post" id="resetPasswordForm" novalidate class="needs-validation">
	                <div class="row mt-4">
	                    <div class="col" data-page="1">
	                        <div class="row">
	                            <div class="col">
	                                <div class="form-group">
	                                    <label>New Password:</label>
	                                    <input name="password" type="password" class="form-control form-control-sm custom-box" required>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col">
	                                <div class="form-group">
	                                    <label>Confirmation Password: </label>
	                                    <input name="passconf" type="password" class="form-control form-control-sm custom-box" required>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                        	<div class="col">
	                        		<div class="form-group">
	                        			<button type="submit">Reset</button>
	                        		</div>
	                        	</div>
	                        </div>
	                    </div>
	                </div>
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
	$("#resetPasswordForm").submit(function(event){
		event.preventDefault();
        if ($("#resetPasswordForm")[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
            Swal.showLoading();

            $.ajax({
                url: "<?php echo base_url(); ?>registration/submit",
                type: "POST",
                data: $("#registerForm").serialize(),
                success: function(msg) {
                    if (msg == "001") {
                        window.location.href =
                            "<?php echo base_url(); ?>registration/topic";
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
	</script>
<?php $this->load->view('template/footer'); ?>