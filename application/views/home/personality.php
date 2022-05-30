<style>
.train {
    position: absolute;
    width: 100%;
    margin-top: 50px;
}

hr {
    border: 2px solid #dedede;
}

marquee img {
    height: 130px;
}

@media screen and (max-width: 750px) and (min-width: 250px) {
    .train {
        display: none;
    }

    marquee img {
        height: 80px;
    }
    
}

/* marquee {
    animation: scrolling 10s linear infinite;
}

@keyframes scrolling {
  0% { transform: translateX(0); }
  100% { transform: translatex(-144vw); }
} */


</style>
<section id="personality">
    <div class="container-fluid p-0 w-100">
        <?php
        if (!$this->session->has_userdata('user_id')) {
            $props = "data-target='#signUp' data-toggle='modal'";
        } else {
            $props = "";
        }
        ?>
        <!-- <div class="train">
            <hr class="mb-5">
            <hr class="mt-5">
        </div> -->
        <a href="<?=PERSONAL_TEST_LINK?>">
        <marquee class="py-3" <?php echo $props; ?> class="btn-personal-test" scrollamount="15" loop="infinite"
            onclick="setRedirectLink('personal-test')" onmouseover="this.stop();" onmouseout="this.start();">
            <div class="d-inline">
                <?php for ($i = 0; $i < 10; $i++) { ?>
                <img src="<?php echo base_url(); ?>assets/img/banner.webp" alt="Global University Edufair">
                <?php } ?>
            </div>
        </marquee>
        </a>
    </div>
</section>