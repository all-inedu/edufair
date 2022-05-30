<style>
    .hide-notif {
        right: -350px !important;
    transition: 0.7s all ease-in-out;
    }

    .show-notif {
        right: 10px !important;
    transition: 0.7s all ease-in-out;
    }

    .notif-card {
    position: fixed;
    bottom: 20px;
    right: -350px;
    width: 350px;
    z-index: 9999;
    background: #fff;
    color: #225787;
    border: 1px solid #dedede;
    border-left: 4px solid #C72E3B;
    border-right: 4px solid #225787;
    
    transition: 0.7s all ease-in-out;
}

.notif-cv {
    position: relative;
    padding: 10px;
    padding-bottom: 20px;
}

.notif-text {
    margin-bottom: 20px;
}

a.notif-submit {
    background: #f0d202;
    padding: 5px 10px;
    text-decoration: none;
    color: #225787;
}

.notif-submit:hover {
    background: #225787;
    color: #fff;

}
</style>
<div id="signUp" class="modal fade">
    <div class="modal-dialog modal-login modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="avatar">
                    <!-- <img src="<?php echo base_url(); ?>assets/home/login/avatar.png" alt="Avatar"> -->
                    <i class="fas fa-user-lock"></i>
                </div>
                <h5 class="modal-title mt-3">Member Log In</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="loginForm" method="post" action="<?php echo base_url(); ?>login">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" required="required">
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                required="required" id="password">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="showPassword"><i class="fas fa-eye-slash"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <a href="javascript:void(0)" id="forgot-password">Forgot Password?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-btn btn-sm">Log In</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                New here ?<a href="<?php echo base_url(); ?>registration" id="join-link">Join Us</a>
            </div>
        </div>
    </div>
</div>
<div id="forgotPass" class="modal fade">
    <div class="modal-dialog modal-login modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="avatar">
                    <!-- <img src="<?php echo base_url(); ?>assets/home/login/avatar.png" alt="Avatar"> -->
                    <i class="fas fa-user-lock"></i>
                </div>
                <h5 class="modal-title">Forgot Password</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <input type="email" id="fp_email" class="form-control" name="fp_email"
                            placeholder="Enter Your Email Address" required="required">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-lg btn-block fp-btn"
                            onclick="forgotPassword()">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<section id="home-section">
    <div class="container-fluid" id="home" style="padding-bottom:25px;">
        <div class="home-header">
            <div class="home-maps">
                <img src="<?php echo base_url(); ?>assets/img/maps.png" alt="Global University Edufair" class="w-100">
            </div>
            <div class="home-title">
                <img src="<?php echo base_url(); ?>assets/img/title 2022.png" alt="Global University Edufair"
                    class="w-100">
            </div>
        </div>
    </div>
</section>

<?php
 if (($this->session->userdata('user_resume') == '') && ($this->session->userdata('user_id') != '')) {
?>
<div class="notif-card shadow">
    <div class="notif-cv">
        <div class="notif-text">
            Haven't submit CV? Click the button below
        </div>
        <a href="<?=base_url()?>home/dashboard" class="notif-submit">Submit CV</a>
    </div>
</div>
<?php
}
?>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

<script>
$("#showPassword").click(function() {
    var x = document.getElementById('password')
    if (x.type === "password") {
        x.type = "text";
        $(this).html('<i class="fas fa-eye"></i>')
    } else {
        x.type = "password";
        $(this).html('<i class="fas fa-eye-slash"></i>')
    }
});

function setRedirectLink(data_param) {
    if (data_param == "personal-test") {
        $("#join-link").prop('href', "<?php echo base_url(); ?>registration?param=" + data_param);
    } else {
        $("#join-link").prop('href', "<?php echo base_url(); ?>registration");
    }
}
</script>