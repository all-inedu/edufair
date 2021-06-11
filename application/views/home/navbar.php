<div class="bg-primary">
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-transparent">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/home/logo_normal_small-300x68-1-e1593521308518.png" alt=""></a>
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
                } else {
                    $base_url = "";
                    $url_talks = "#talks";
                    $url_unilist = "#booking";
                }
                ?>
                <li class="nav-item nav-menu active">
                    <a class="nav-link" href="<?php echo $base_url; ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item nav-menu">
                    <a class="nav-link" id="link-talks" href="<?php echo $url_talks; ?>">Talks</a>
                </li>
                <li class="nav-item nav-menu">
                    <a class="nav-link" id="link-booking" href="<?php echo $url_unilist; ?>">Uni List</a>
                </li>


                <?php if($this->session->userdata('user_id')) { ?>
                <li class="nav-item nav-menu dropdown nav-block">
                    <a class="nav-link dropdown-toggle" href="#" id="userMenuLink" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Welcome, <?php echo $this->session->userdata('user_first_name'); ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="userMenuLink">
                        <a class="dropdown-item" href="<?php echo base_url(); ?>home/dashboard"><i
                                class="far fa-address-card"></i> Profile</a>
                        <a class="dropdown-item" href="<?php echo base_url(); ?>logout"><i
                                class="fas fa-sign-out-alt"></i> Logout</a>
                    </div>
                </li>
                <?php } else { ?>
                <li class="nav-item ml-5">
                    <a class="nav-link" id="btn-signup" href="#signUp" data-toggle="modal">Sign Up</a>
                </li>
                <?php } ?>

                </ul>
            </div>
        </div>
    </nav>
</div>