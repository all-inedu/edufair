<style>

.running{
    font-size: 34px;
}
.bg-gambar{
    /* url(assets/topic/CHOOSE_THE_RIGHT_MAJOR_LS1.png); */
    background: #EA912C;
    background-size: contain;
    background-repeat: no-repeat;
    /* height: 350px !important; */
    background-position: center;
    background-color: #EA912C;
    width: "80%";
    align-items: center;

}

.train {
    position: absolute;
}
.img-box {
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
        <div class="train">
            <hr class="mb-5">
            <hr class="mt-5">
        </div>
        <marquee class="py-3" <?php echo $props; ?> class="btn-personal-test" scrollamount="20" loop="infinite"
            onclick="setRedirectLink('personal-test')" onmouseover="this.stop();" onmouseout="this.start();">
            <img src="<?php echo base_url(); ?>assets/img/banner.webp" alt="Global University Edufair">
        </marquee>
    </div>
</section>