<!DOCTYPE html>
<html>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title><?=$title;?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="<?php echo base_url(); ?>assets/css/slimselect.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css" />
    <link rel="stylesheet" href="<?=base_url('assets/css/flipTimerss.css');?>" />
    <link href="<?php echo base_url(); ?>assets/css/aos.css" rel="stylesheet">
    <style type="text/css">
    @font-face { font-family: 'SF-Pro-Display-Regular'; src: url('<?php echo base_url(); ?>assets/font/SF-Pro-Display-Regular.otf');  }
    @font-face { font-family: 'Montserrat-ExtraBold'; src: url('<?php echo base_url(); ?>assets/font/Montserrat-ExtraBold.otf');  }
    body{font-family:SF-Pro-Display-Regular;padding:0}#home h1,#home h3{font-family:Montserrat-ExtraBold}#home h3.edufair-date{color:transparent}#home h1.edufair-title{text-transform:uppercase;color:#27387a}#home h3.edufair-date-year{color:#eda853;letter-spacing:.3em}#home h3.edufair-date-string{color:transparent;}#home h5.edufair-desc{font-size:1.3em;color:#27387a}.navbar-nav .nav-item{font-size:20px}.ss-main .ss-multi-selected .ss-values .ss-disabled,.ss-main .ss-single-selected .placeholder .ss-disabled{color:#646363!important}.ss-main .ss-multi-selected,.ss-main .ss-single-selected{border-top:none!important;border-left:none!important;border-right:none!important}.allin-registration{margin-top:7vh;padding:2em;box-shadow:5px 5px 5px 0 rgb(0,0,0,.1);border:1px solid #dedede}.custom-box{border-top:none!important;border-left:none!important;border-right:none!important;background:0 0!important}.custom-box.radio{border-bottom:none!important}.card-headers img{padding:0 20%}.card{border:3px solid transparent}#photo-banner .card{height:12.2em}.seperate{color:#3d3d3d;margin:0 -10px;position:relative}.modal-login .avatar{position:absolute;margin:0 auto;left:0;right:0;top:-70px;width:95px;height:95px;border-radius:50%;z-index:9;background:#60c7c1;padding:15px;box-shadow:0 2px 2px rgb(0 0 0 / 10%)}.modal-login .avatar i{font-size:38px;padding:10px;color:#fff}.modal-login .modal-title{width:100%;text-align:center;padding-top:1rem}.modal-login .avatar img{width:100%}.modal-login .modal-body{padding:1em 3em}.modal-footer{justify-content:center!important}.navbar{padding:20px 10px;}.navbar-light .navbar-nav .nav-link{color:rgba(0,0,0,.5);padding:0 20px}#btn-signup{padding:5px 30px;border: 1px solid #27387A;border-radius:20px;color:#000}#btn-signup:hover{background:#2d6689;padding:5px 30px;border-radius:20px;color:#fff}li.nav-menu{padding-top:5px}#edufair-title-container{background-repeat:no-repeat;background-size:80% auto;background-position:center 13%}#booking h2,#talks h2{font-family:Montserrat-ExtraBold;text-transform:uppercase;color:#0d2f7f}.edufair-uni-region{border:3px solid #efaa52;background:0 0;border-radius:12px;font-size:20px}.btn-book{background:#e78724;padding-left:1.5rem;text-align:left;font-size:1rem;border:none;font-weight:700;color:#fff;width:100%}.btn-book a{color:#fff;text-decoration:none}.card-topic{border-radius:0;background:#f7ead7}.img-topic{display:block;width:100%;min-height:200px;border-radius:25px}.talk-button{cursor:pointer}.day1talks{margin-top:3em}.day1talks,.day2talks{border:3px solid #12116e;border-radius:.5em;position:relative}.day1talks::before{content:"DAY 1";border:3px solid #12116e;border-radius:1.5em;padding:.2em 1.5em;position:absolute;top:0;margin-top:-1.2em;z-index:2;background:#fff;font-size:1.2em;color:#12116e;font-weight:700}.day2talks::before{content:"DAY 2";border:3px solid #12116e;border-radius:1.5em;padding:.2em 1.5em;position:absolute;top:0;margin-top:-1.2em;z-index:2;background:#fff;font-size:1.2em;color:#12116e;font-weight:700}#talks{height:auto;padding:20px 0 50px 0}#booking h5,#talks h5{color:#061f51;font-size:1.3em;text-align:justify}#booking{background-image:url(assets/img/home/bg-unilist.png);background-size:100% auto;background-position:bottom;background-repeat:no-repeat;padding-bottom:5em}.badge-warning{background-color:#e78724!important;border-radius:1em;padding:.3em .8em}#talks-section{background-image:url(assets/img/home/header-bg-3-f.png);background-position:center -5.5%;background-size:100%;background-repeat:no-repeat}#register-form .card{border:1px solid #ccc;}

        @media screen and (max-width: 576px) and (min-width: 375px) {
            .col-sm-6 {
                flex: 0 0 50%;
                max-width: 50%;
            }

            .col-sm-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%;
            }

            .col-sm-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }

            #home-section {
                background: url('assets/img/home/compressed/header-bg-2.png');
                background-repeat: no-repeat;
                background-size: auto 100% !important;
                background-position: center;
            }

            #home {
                padding-top: 18vh;
                height: auto;
            }

            #talks .row div{
                padding:auto 1em;
            }

            #home h3.edufair-date {
                font-size: 2em;
                -webkit-text-stroke: 1.2px #eda853;
            }

            #home h1.edufair-title {
                font-size: 4em;
            }

            .card-columns {
                -webkit-column-count: 1 !important;
                -moz-column-count: 1 !important;
                column-count: 1 !important;
            }

            #talks h2, #booking h2{
                font-size: 3em;
            }

            #home h3.edufair-date-year, #home h3.edufair-date-string {
                font-size:1.5em
            }

            #home h3.edufair-date-string {
                -webkit-text-stroke:1.5px #27387a
            }   

            .edufair-uni-region {
                padding:2px 10px !important;
            }
        }

        @media (max-width: 768px) and (min-width: 576px) {
            #home{
                background: url('assets/img/home/compressed/header-bg-2.png');
                background-repeat: no-repeat;
                background-position: center top;
                background-size: 100% 100%;
            }

            #home {
                padding-top: 10vh;
            }

            #home h3.edufair-date {
                font-size: 1.3em;
                -webkit-text-stroke: 1px #eda853;
            }

            #home h1.edufair-title {
                font-size: 4.5em;
            }

            #home h3.edufair-date-year, #home h3.edufair-date-string {
                font-size:1.3em;
            }

            #home h3.edufair-date-string {
                -webkit-text-stroke:1px #27387a
            }

            .card-columns {
                -webkit-column-count: 2 !important;
                -moz-column-count: 2 !important;
                column-count: 2 !important;
            }

            #talks-section {
                background-position: center 0%;
            }
        }

        @media (max-width: 1024px) and (min-width: 768px) {
            body {
                background-image: url('<?php echo base_url(); ?>assets/img/home/background.png');
            }

            #home{
                background: url('assets/img/home/compressed/header-bg-2.png');
                background-repeat: no-repeat;
                background-position: center top;
                background-size: 100% 100%;
            }

            #home {
                padding-top: 10vh;
            }

            #home h3.edufair-date {
                font-size: 1.3em;
                -webkit-text-stroke: 1px #eda853;
            }

            #home h1.edufair-title {
                font-size: 4.5vw;
            }

            #home h3.edufair-date-year, #home h3.edufair-date-string {
                font-size:1.3em;
            }

            #home h3.edufair-date-string {
                -webkit-text-stroke:1px #27387a
            }

            .card-columns {
                -webkit-column-count: 2 !important;
                -moz-column-count: 2 !important;
                column-count: 2 !important;
            }

            #talks-section {
                background-position: center 0%;
            }
        }

        @media (min-width: 1024.1px) {
            #home-section {
                background: url('assets/img/home/compressed/header-bg-2.png');
                background-repeat: no-repeat;
                background-position: center top;
                background-size: 100% auto;
            }

            #home {
                padding-top: 18vh;
            }

            #home h3.edufair-date {
                font-size:3em;
                -webkit-text-stroke:2.5px #eda853;
            }

            #home h1.edufair-title {
                font-size: 8.8em;
            }

            .card-columns {
                -webkit-column-count: 3 !important;
                -moz-column-count: 3 !important;
                column-count: 3 !important;
            }

            #talks h2, #booking h2{
                font-size: 5em;
            }

            #home h3.edufair-date-year, #home h3.edufair-date-string {
                font-size:3em;
            }

            #home h3.edufair-date-string {
                -webkit-text-stroke:2.5px #27387a
            }

            .edufair-uni-region {
                padding:6px 50px !important;
            }
        }

</style>
</head>

<body>

    <?php
if ($this->session->flashdata('success')) {
    echo '<div class="flash-data" data-success="' . $this->session->flashdata('success') . '"></div>';
} else if ($this->session->flashdata('error')) {
    echo '<div class="flash-data" data-error="' . $this->session->flashdata('error') . '"></div>';
} else if ($this->session->flashdata('warning')) {
    echo '<div class="flash-data" data-warning="' . $this->session->flashdata('warning') . '"></div>';
}
?>