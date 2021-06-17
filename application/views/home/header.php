<div id="signUp" class="modal fade">
    <div class="modal-dialog modal-login modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="avatar">
                    <!-- <img src="<?php echo base_url(); ?>assets/home/login/avatar.png" alt="Avatar"> -->
                    <i class="fas fa-user-lock"></i>
                </div>
                <h5 class="modal-title">Member Login</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="loginForm" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password"
                            required="required">
                    </div>
                    <div class="form-group text-right">
                        <a href="javascript:void(0)" id="forgot-password">Forgot Password?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                New here ?<a href="<?php echo base_url(); ?>registration">Join Us</a>
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
        <div class="row align-items-start">
            <div class="col-md-8 order-md-2 order-sm-1 text-center" id="edufair-title-container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2 text-left">
                        <h3 class="edufair-date m-0">24 JULY</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 offset-xl-2 text-left">
                        <h3 class="edufair-date m-0">25 JULY</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <h1 class="edufair-title m-0">Edufair</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-6 col-xl-4 offset-xl-2 text-left">
                        <h3 class="edufair-date-year">2021</h3>
                    </div>
                    <div class="col-sm-6 col-lg-6 col-xl-4 text-right">
                        <h3 class="edufair-date-string">UPDATES</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-xl-5 col-xxl-3 offset-lg-5 offset-xl-6 offset-xxl-7">
                        <h5 class="mt-4 text-left edufair-desc"><b>Welcome to Edufair!</b><br>
                            Connect with the universities from all over the world and get live updates about the
                            education system abroad.</h5>
                    </div>
                </div>

                <!-- <div class="flipTimer mt-5">
                <div class="days" data-toggle="tooltip" data-placement="bottom" title="Days">
                </div>
                <div class="hours" data-toggle="tooltip" data-placement="bottom" title="Hours">
                    <label class="seperate">:</label>
                </div>
                <div class="minutes" data-toggle="tooltip" data-placement="bottom" title="Minutes">
                    <label class="seperate">:</label>
                </div>
                <div class="seconds" data-toggle="tooltip" data-placement="bottom" title="Seconds">
                    <label class="seperate">:</label>
                </div>
            </div> -->
            </div>
            <div class="col-md-4 order-md-1 order-sm-2 flip-photo">
                <div class="row">
                    <div class="col-md-4 col-4 p-1 img1">

                    </div>
                    <div class="col-md-4 col-4 p-1 img2">
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-03.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Uni/LOGO-15.png');?>" width="100%">
                        </div>
                    </div>
                    <div class="col-md-4 col-4 p-1 img3">
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Uni/LOGO-04.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-16.png');?>" width="100%">
                        </div>
                    </div>
                    <div class="col-md-4 col-4 p-1 img4">
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-05.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Uni/LOGO-17.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-32.png');?>" width="100%">
                        </div>
                    </div>
                    <div class="col-md-4 col-4 p-1 img5">
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Uni/LOGO-06.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-19.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Uni/LOGO-33.png');?>" width="100%">
                        </div>
                    </div>
                    <div class="col-md-4 col-4 p-1 img6">
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-07.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Uni/LOGO-18.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-37.png');?>" width="100%">
                        </div>
                    </div>
                    <div class="col-md-4 col-4 p-1 img7">
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Uni/LOGO-08.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-21.png');?>" width="100%">
                        </div>
                    </div>
                    <div class="col-md-4 col-4 p-1 img8">
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-09.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Uni/LOGO-20.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-29.png');?>" width="100%">
                        </div>
                    </div>
                    <div class="col-md-4 col-4 p-1 img9">
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Uni/LOGO-10.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-22.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Uni/LOGO-30.png');?>" width="100%">
                        </div>
                    </div>
                    <div class="col-md-4 col-4 p-1 img10">
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-12.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Uni/LOGO-23.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-26.png');?>" width="100%">
                        </div>
                    </div>
                    <div class="col-md-4 col-4 p-1 img11">
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Uni/LOGO-11.png');?>" width="100%">
                        </div>
                        <div class="card-headers">
                            <img src="<?=base_url('assets/img/home/Speaker/SPEAKER-25.png');?>" width="100%">
                        </div>
                    </div>
                    <div class="col-md-4 col-4 p-1 img12">

                    </div>
                </div>
            </div>
        </div>
        <div class="talks-header" id="talks">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-lg-5 col-sm-12 text-left mt-5">
                        <h2>Talks</h2>
                        <h5>Have a conversation directly with the university reps about these hot topics concerning
                            study
                            abroad and get information to support your university preparation strategy.</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        //Callback works only with direction = "down"
        $('.flipTimer').flipTimer({
            direction: 'down',
            date: 'July 24, 2021 09:00:00',
        });
    });
    </script>

    <script>
    $('.img1').each(function() {
        $('.card-headers', this).hide().eq(0).show();
    });

    $('.img2').each(function() {
        $('.card-headers', this).hide().eq(0).show();
    });

    $('.img3').each(function() {
        $('.card-headers', this).hide().eq(0).show();
    });

    $('.img4').each(function() {
        $('.card-headers', this).hide().eq(0).show();
    });

    $('.img5').each(function() {
        $('.card-headers', this).hide().eq(0).show();
    });

    $('.img6').each(function() {
        $('.card-headers', this).hide().eq(0).show();
    });

    $('.img7').each(function() {
        $('.card-headers', this).hide().eq(0).show();
    });

    $('.img8').each(function() {
        $('.card-headers', this).hide().eq(0).show();
    });

    $('.img9').each(function() {
        $('.card-headers', this).hide().eq(0).show();
    });
    $('.img10').each(function() {
        $('.card-headers', this).hide().eq(0).show();
    });

    $('.img11').each(function() {
        $('.card-headers', this).hide().eq(0).show();
    });

    $('.img12').each(function() {
        $('.card-headers', this).hide().eq(0).show();
    });

    setInterval(function() {
        let index = Math.floor(Math.random() * 12) + 1;
        $('.img' + index).each(function() {
            var random = Math.floor(Math.random() * $('.card-headers', this).length);
            $('.card-headers', this).hide().eq(random).show().addClass(
                "animate__animated animate__flipInY");
        });
    }, 5000);

    setInterval(function() {
        let index = Math.floor(Math.random() * 12) + 1;
        $('.img' + index).each(function() {
            var random = Math.floor(Math.random() * $('.card-headers', this).length);
            $('.card-headers', this).hide().eq(random).show().addClass(
                "animate__animated animate__flipInY");
        });
    }, 6000);

    setInterval(function() {
        let index = Math.floor(Math.random() * 12) + 1;
        $('.img' + index).each(function() {
            var random = Math.floor(Math.random() * $('.card-headers', this).length);
            $('.card-headers', this).hide().eq(random).show().addClass(
                "animate__animated animate__flipInY");
        });
    }, 7000);
    </script>