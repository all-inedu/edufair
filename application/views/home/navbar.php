<style>
.navbar {
    padding: 20px 10px;
    background: #91D7EB !important;
}

.navbar-light .navbar-nav .nav-link {
    color: rgba(0, 0, 0, .5);
    padding: 0 20px;
}

#btn-signup {
    background: white;
    padding: 5px 30px;
    border-radius: 20px;
    color: #000;
}

#btn-signup:hover {
    background: #2d6689;
    padding: 5px 30px;
    border-radius: 20px;
    color: white;
}

li.nav-menu {
    padding-top: 5px;
}
</style>
<nav class="navbar fixed-top shadow navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">ALL-in Eduspace</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item nav-menu active">
                    <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item nav-menu">
                    <a class="nav-link" href="#talks">Talks</a>
                </li>
                <li class="nav-item nav-menu">
                    <a class="nav-link" href="#booking">Uni List</a>
                </li>


                <?php if($this->session->userdata('user_id')) { ?>
                <li class="nav-item nav-menu dropdown">
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
                    <a class="nav-link" id="btn-signup" href="#signUpModal" data-toggle="modal">Sign Up</a>
                </li>
                <?php } ?>

            </ul>
        </div>
    </div>
</nav>