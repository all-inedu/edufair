<style>
#about {
    background: #EBF6FC;
    padding: 6% 10%;
}

#about h3 {
    color: #0D2F7F;
    font-size: 35px;
    font-weight: bold;
    font-family: Montserrat-ExtraBold;
    text-transform: uppercase;
    margin-bottom: 20px;
    margin-top: 30px;
}

#about h5 {
    color: #444444;
    font-size: 23px;
    line-height: 1.3;
}

.about-desc {
    padding: 0 10%;
    margin-bottom: 30px;
}

.img-about {
    height: 75px;
    padding: 10% 44%;
    margin-bottom: 34px;
    vertical-align: center;
}

/* .img-about img {
    width: 100%;
} */

.p-icon {
    color: #444444;
    font-size: 15px !important;
    line-height: 20px !important;
}

@media screen and (max-width: 576px) and (min-width: 375px) {
    #about {
        background: #EBF6FC;
        padding: 10% 5%;
    }

    .about-desc {
        padding: 0 1%;
    }

    #about h5 {
        margin-top: 20px;
        color: #444444;
        font-size: 1.2em;
        line-height: 1.2;
        text-align: justify;
    }

    .img-about {
        height: 40px;
        padding: 0% 0%;
    }

    .img-about img {
        width: 30%;
    }
}
</style>


<div class="container-fluid text-white pb-5" id="about">
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <h3>About Us</h3>
            <div class="about-desc">
                <h5>ALL-In Eduspace is an experienced independent university consultant based in Jakarta, Indonesia. We
                    guide students who plan to study at top universities abroad and place them at their best fit
                    schools. We
                    provide personal and tailored mentoring services, no matter where you are,
                </h5>
            </div>
        </div>
    </div>
    <div class="row text-center mt-2">
        <div class="col-md-4 col-6 mb-2">
            <div class="img-about">
                <img width="100%" src="<?=base_url('assets/img/home/about/icons_1.png');?>">
            </div>
            <p class="p-icon">100% students <br> accepted at target universities</p>
        </div>
        <div class="col-md-4 col-6 mb-2">
            <div class="img-about">
                <img width="100%" src="<?=base_url('assets/img/home/about/icons_2.png');?>">
            </div>
            <p class="p-icon">More than 50 <br> school clients</p>
        </div>
        <div class="col-md-4 col-6 mb-2">
            <div class="img-about">
                <img width="100%" src="<?=base_url('assets/img/home/about/icons_3.png');?>">
            </div>
            <p class="p-icon">More than 1,000 <br> Essays Reviewed</p>
        </div>
        <div class="col-md-4 col-6 mb-2">
            <div class="img-about">
                <img width="100%" src="<?=base_url('assets/img/home/about/icons_4.png');?>">
            </div>
            <p class="p-icon">More than 50 <br> corporate partners</p>
        </div>
        <div class="col-md-4 col-6 mb-2">
            <div class="img-about pb-3">
                <img width="80%" src="<?=base_url('assets/img/home/about/icons_5.png');?>">
            </div>
            <p class="p-icon">150+ point <br> SAT score improvement</p>
        </div>
        <div class="col-md-4 col-6 mb-2">
            <div class="img-about">
                <img width="100%" src="<?=base_url('assets/img/home/about/icons_6.png');?>">
            </div>
            <p class="p-icon">More than 1,500 <br> Event Participants</p>
        </div>
    </div>
</div>