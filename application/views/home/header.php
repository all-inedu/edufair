<style>
body {
    padding: 0;
}

.card-headers img {
    padding: 0 20%;
}

.card {
    border: 3px solid #fff;
}

.card:hover {
    border: 3px solid #39A5DC;
}

.seperate {
    color: #3d3d3d;
    margin: 0 -10px;
    position: relative;
}

.modal-login .avatar {
    position: absolute;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: -70px;
    width: 95px;
    height: 95px;
    border-radius: 50%;
    z-index: 9;
    background: #60c7c1;
    padding: 15px;
    box-shadow: 0px 2px 2px rgb(0 0 0 / 10%);
}

.modal-login .avatar i {
    font-size: 38px;
    padding: 10px;;
    color: #FFF;
}

.modal-login .modal-title {
    width: 100%;
    text-align: center; 
    padding-top: 1rem;
}

.modal-login .avatar img {
    width: 100%;
}

.modal-login .modal-body {
    padding: 1em 3em;
}
.modal-footer {
    justify-content: center !important;
}
</style>
<div id="signUpModal" class="modal fade">
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
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
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
<div class="container-fluid" style="margin-top:12vh;" id="home">
    <div class="row">
        <div class="col-md-5 p-5 bg-dark">
            <div class="row">
                <div class="col-md-4 p-1 img1">
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar1.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar5.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar3.png');?>">
                    </div>
                </div>
                <div class="col-md-4 p-1 img2">
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar4.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar2.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar3.png');?>">
                    </div>
                </div>
                <div class="col-md-4 p-1 img3">
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar4.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar6.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar5.png');?>">
                    </div>
                </div>
                <div class="col-md-4 p-1 img4">
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar8.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar7.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar9.png');?>">
                    </div>
                </div>
                <div class="col-md-4 p-1 img5">
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar8.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar10.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar5.png');?>">
                    </div>
                </div>
                <div class="col-md-4 p-1 img6">
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar10.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar7.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar5.png');?>">
                    </div>
                </div>
                <div class="col-md-4 p-1 img7">
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar7.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar5.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar6.png');?>">
                    </div>
                </div>
                <div class="col-md-4 p-1 img8">
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar6.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar4.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar3.png');?>">
                    </div>
                </div>
                <div class="col-md-4 p-1 img9">
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar9.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar10.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar8.png');?>">
                    </div>
                </div>
                <div class="col-md-4 p-1 img10">
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar7.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar5.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar6.png');?>">
                    </div>
                </div>
                <div class="col-md-4 p-1 img11">
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar6.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar4.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar3.png');?>">
                    </div>
                </div>
                <div class="col-md-4 p-1 img12">
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar9.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar10.png');?>">
                    </div>
                    <div class="card bg-light shadow card-headers">
                        <img src="<?=base_url('assets/img/avatar8.png');?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7 p-5 my-auto text-center">

            <h1>ALL-in Edufair</h1>
            <h5 class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet laboriosam eius doloremque
                fugiat nam
                saepe deleniti sunt voluptates animi eveniet officiis, doloribus nobis beatae illo cum maxime, optio
                ipsam dolores.</h5>

            <div class="flipTimer mt-5">
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
        var random = Math.floor(Math.random() * $('.card-headers', this).length);
        $('.card-headers', this).hide().eq(random).show();
    });

    $('.img2').each(function() {
        var random = Math.floor(Math.random() * $('.card-headers', this).length);
        $('.card-headers', this).hide().eq(random).show();
    });

    $('.img3').each(function() {
        var random = Math.floor(Math.random() * $('.card-headers', this).length);
        $('.card-headers', this).hide().eq(random).show();
    });

    $('.img4').each(function() {
        var random = Math.floor(Math.random() * $('.card-headers', this).length);
        $('.card-headers', this).hide().eq(random).show();
    });

    $('.img5').each(function() {
        var random = Math.floor(Math.random() * $('.card-headers', this).length);
        $('.card-headers', this).hide().eq(random).show();
    });

    $('.img6').each(function() {
        var random = Math.floor(Math.random() * $('.card-headers', this).length);
        $('.card-headers', this).hide().eq(random).show();
    });

    $('.img7').each(function() {
        var random = Math.floor(Math.random() * $('.card-headers', this).length);
        $('.card-headers', this).hide().eq(random).show();
    });

    $('.img8').each(function() {
        var random = Math.floor(Math.random() * $('.card-headers', this).length);
        $('.card-headers', this).hide().eq(random).show();
    });

    $('.img9').each(function() {
        var random = Math.floor(Math.random() * $('.card-headers', this).length);
        $('.card-headers', this).hide().eq(random).show();
    });
    $('.img10').each(function() {
        var random = Math.floor(Math.random() * $('.card-headers', this).length);
        $('.card-headers', this).hide().eq(random).show();
    });

    $('.img11').each(function() {
        var random = Math.floor(Math.random() * $('.card-headers', this).length);
        $('.card-headers', this).hide().eq(random).show();
    });

    $('.img12').each(function() {
        var random = Math.floor(Math.random() * $('.card-headers', this).length);
        $('.card-headers', this).hide().eq(random).show();
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
    }, 5000);
    </script>