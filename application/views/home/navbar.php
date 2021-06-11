<div class="bg-primary">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img
                    src="<?php echo base_url(); ?>assets/home/logo_normal_small-300x68-1-e1593521308518.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item nav-menu active">
                        <a class="nav-link" href="<?=base_url('#home');?>">Home <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item nav-menu">
                        <a class="nav-link" href="<?=base_url('#talks');?>">Talks</a>
                    </li>
                    <li class="nav-item nav-menu">
                        <a class="nav-link" href="<?=base_url('#booking');?>">Uni List</a>
                    </li>


                    <?php if($this->session->userdata('user_id')) { ?>
                    <li class="nav-item nav-menu dropdown">
                        <a class="nav-link dropdown-toggle btn-user" href="#" id="userMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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