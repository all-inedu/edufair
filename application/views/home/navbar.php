<div class="bg-primary">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-transparent">
        <div class="container-fluid navbar-allin">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
                <img src="<?php echo base_url(); ?>assets/home/logo_normal_small-300x68-1-e1593521308518.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                    <?php 
                $segment1 = $this->uri->segment(1);
                $segment2 = $this->uri->segment(2);
                if( ($segment1 == "home") && ($segment2 == "dashboard") ) {
                    $base_url = base_url();
                    $url_talks = $base_url."?section=talks";
                    $url_unilist = $base_url."?section=booking";
                    $url_about = $base_url."?section=about";
                } else {
                    $base_url = "";
                    $url_talks = "#talks";
                    $url_unilist = "#booking";
                    $url_about = "#about";
                }
                ?>
                    <li class="nav-item nav-menu active">
                        <a class="nav-link" href="<?php echo $base_url; ?>">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item nav-menu">
                        <a class="nav-link" id="link-talks" href="<?php echo $url_talks; ?>">Talks</a>
                    </li>
                    <li class="nav-item nav-menu">
                        <a class="nav-link" id="link-booking" href="<?php echo $url_unilist; ?>">University Booth</a>
                    </li>
                    <li class="nav-item nav-menu">
                        <a class="nav-link" id="link-booking" href="<?php echo $url_about; ?>">About Us</a>
                    </li>


                    <?php if($this->session->userdata('user_id')) { ?>
                    <li class="nav-item nav-menu dropdown nav-block">
                        <a class="nav-link dropdown-toggle" href="#" id="userMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome, <?php echo $this->session->userdata('user_first_name'); ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right text-left w-100" aria-labelledby="userMenuLink">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>home/dashboard"
                                style="color: #0A2F7C !important;"><i
                                    class="far fa-address-card fa-fw pr-3  float-right mt-1"></i>
                                Dashboard</a>
                            <hr class="m-0">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>logout"
                                style="color: #0A2F7C !important;"><i
                                    class="fas fa-sign-out-alt fa-fw pr-3 float-right mt-1"></i>
                                Logout</a>
                        </div>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item ml-3">
                        <a class="nav-link" id="btn-login" data-target="#signUp" data-toggle="modal"
                            style="cursor:pointer;">Log In</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="btn-signup" href="<?=base_url();?>registration">Sign
                            Up</a>
                    </li>
                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>
</div>