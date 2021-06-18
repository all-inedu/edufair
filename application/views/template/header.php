<!DOCTYPE html>
<html>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /> -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title>Global University Fair</title>
    <link rel="icon" href="<?=base_url('assets/img/icon.ico');?>" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="<?=base_url('assets/css/flipTimerss.css');?>" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style type="text/css">
    @font-face {
        font-family: 'SF-Pro-Display-Regular';
        src: url('<?php echo base_url(); ?>assets/font/SF-Pro-Display-Regular.otf');
    }

    @font-face {
        font-family: 'Montserrat-ExtraBold';
        src: url('<?php echo base_url(); ?>assets/font/Montserrat-ExtraBold.otf');
    }

    body {
        font-family: SF-Pro-Display-Regular;
        padding: 0;
        overflow: hidden;
    }

    #home-section {
        background: url('assets/img/home/header-bg.webp');
        background-repeat: no-repeat;
        background-position: top;
        background-size: 100% auto;
        background-color: #EBF6FC;
    }

    #home h1,
    #home h3 {
        font-family: Montserrat-ExtraBold
    }

    #home h3.edufair-date {
        color: transparent
    }

    #home h1.edufair-title {
        text-transform: uppercase;
        color: #27387a
    }

    #home h3.edufair-date-year {
        color: #eda853;
        letter-spacing: .3em
    }

    #home h3.edufair-date-string {
        color: transparent;
    }

    #home h5.edufair-desc {
        font-size: 1.6em;
        color: #27387a
    }

    .flip-photo {
        padding-left: 100px;
    }

    .navbar-nav .nav-item {
        font-size: 20px
    }

    .ss-main .ss-multi-selected .ss-values .ss-disabled,
    .ss-main .ss-single-selected .placeholder .ss-disabled {
        color: #646363 !important
    }

    .ss-main .ss-multi-selected,
    .ss-main .ss-single-selected {
        border-top: none !important;
        border-left: none !important;
        border-right: none !important
    }

    .allin-registration {
        margin-top: 7vh;
        padding: 2em;
        box-shadow: 5px 5px 5px 0 rgb(0, 0, 0, .1);
        border: 1px solid #dedede
    }

    .custom-box {
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        background: 0 0 !important
    }

    .custom-box.radio {
        border-bottom: none !important
    }

    .card-headers img {
        padding: 0 0;
    }

    .card {
        border: 3px solid transparent
    }

    #photo-banner .card {
        height: 12.2em
    }

    .seperate {
        color: #3d3d3d;
        margin: 0 -10px;
        position: relative
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
        box-shadow: 0 2px 2px rgb(0 0 0 / 10%)
    }

    .modal-login .avatar i {
        font-size: 38px;
        padding: 10px;
        color: #fff
    }

    .modal-login .modal-title {
        width: 100%;
        text-align: center;
        padding-top: 1rem
    }

    .modal-login .avatar img {
        width: 100%
    }

    .modal-login .modal-body {
        padding: 1em 3em
    }

    .modal-footer {
        justify-content: center !important
    }

    .navbar {
        padding: 20px 10px;
    }

    .navbar-light .navbar-nav .nav-link {
        color: rgba(0, 0, 0, .5);
        padding: 0 20px
    }

    #btn-login {
        background: #2d6689;
        padding: 5px 15px 5px 30px;
        /* border: 1px solid #27387A; */
        border-radius: 20px 0px 0px 20px;
        color: #fff;
    }

    #btn-login:hover {
        background: #9FC2CB;
        color: #1F1F1F;
    }

    #btn-signup {
        background: #2d6689;
        padding: 5px 30px 5px 15px;
        color: #fff;
        border-left: 1px solid #27387A;
        border-radius: 0px 20px 20px 0;
    }

    #btn-signup:hover {
        background: #EDA853;
        color: #fff;
    }

    .btn-user {
        background: #2d6689;
        padding: 5px 20px !important;
        margin-top: -5px;
        margin-left: 20px;
        border-radius: 20px;
        color: #fff !important;
    }

    li.nav-menu {
        padding-top: 5px
    }

    #edufair-title-container {
        padding: 0 10%;
        background-repeat: no-repeat;
        background-size: 80% auto;
        background-position: center 13%
    }

    .talks-header {
        padding: 2% 0px 4% 4% !important;
    }

    #booking h2,
    #talks h2 {
        font-family: Montserrat-ExtraBold;
        text-transform: uppercase;
        color: #0d2f7f
    }


    .edufair-uni-region {
        border: 3px solid #efaa52;
        background: 0 0;
        border-radius: 12px;
        font-size: 17px;
        margin-bottom: 10px;
    }

    .btn-book {
        background: #e78724;
        padding-left: 1.5rem;
        text-align: left;
        font-size: 1rem;
        border: none;
        font-weight: 700;
        color: #fff;
        width: 100%
    }

    .btn-book a {
        color: #fff;
        text-decoration: none
    }

    .card-topic {
        border-radius: 0;
        background: #f7ead7
    }

    .img-topic {
        display: block;
        width: 100%;
        min-height: 200px;
        border-radius: 25px
    }

    .talk-button {
        cursor: pointer
    }

    .day1talks {
        margin-top: 3em
    }

    .day1talks,
    .day2talks {
        border: 3px solid #12116e;
        border-radius: .5em;
        position: relative
    }

    .day1talks::before {
        content: "DAY 1";
        border: 3px solid #12116e;
        border-radius: 1.5em;
        padding: .2em 1.5em;
        position: absolute;
        top: 0;
        margin-top: -1.2em;
        z-index: 2;
        background: #fff;
        font-size: 1.2em;
        color: #12116e;
        font-weight: 700
    }

    .day2talks::before {
        content: "DAY 2";
        border: 3px solid #12116e;
        border-radius: 1.5em;
        padding: .2em 1.5em;
        position: absolute;
        top: 0;
        margin-top: -1.2em;
        z-index: 2;
        background: #fff;
        font-size: 1.2em;
        color: #12116e;
        font-weight: 700
    }

    #talks {
        height: auto;
        padding: 0px 0 50px 0
    }

    #booking h5,
    #talks h5 {
        color: #061f51;
        font-size: 1.6em;
        text-align: justify
    }

    #booking {
        background: #EBF6FC;
        background-image: url('assets/img/home/bg-unilist.webp');
        background-size: cover auto;
        background-position: top;
        background-repeat: no-repeat;
        padding-bottom: 5em
    }

    .badge-warning {
        background-color: #e78724 !important;
        border-radius: 1em;
        padding: .3em .8em
    }

    #talks-section {
        background: #EBF6FC;
        /* background-image: url('assets/img/home/compressed/header-bg-3.webp'); */
        background-position: top;
        background-size: 100%;
        background-repeat: no-repeat;
        padding-left: 6%;
        padding-right: 10%;
    }

    #register-form .card {
        border: 1px solid #ccc;
    }

    .loading {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #FFF;
        background-image: url('assets/home/logo_normal_small-300x68-1-e1593521308518.png');
        background-position: center center;
        background-repeat: no-repeat;
    }

    .navbar.scrolled {
        background-color: #FFF !important;
        transition: background-color 200ms linear;
    }

    .navbar-allin {
        padding: 0 140px 0 80px !important;
    }

    @media screen and (max-width: 576px) and (min-width: 375px) {
        #edufair-title-container {
            padding: 0 8%;
        }

        #home h5.edufair-desc {
            font-size: 1.3em;
        }

        #booking h5,
        #talks h5 {
            font-size: 1.2em;
        }

        .card-body {
            padding: 10px;
        }

        .navbar-collapse {
            margin-top: 20px;
            border-top: 2px solid #dedede;
        }

        .nav-block {
            margin-top: 20px;
            text-align: center;
            margin: 20px;
        }

        .navbar-light .navbar-nav .nav-link {
            color: rgba(0, 0, 0, .5);
            padding: 0px !important;
        }

        #btn-login {
            text-align: center;
            border-radius: 0;
            margin-top: 20px;
            width: 100%;
            margin-left: -16px;
        }

        #btn-signup {
            border-radius: 0;
            margin-right: 16px;
            margin-top: 10px;
            text-align: center;
        }

        #home-section {
            background-color: #EBF6FC;
        }

        .talks-header {
            padding: 0% 0% !important;
        }

        .container-fluid {
            padding-left: 15px !important;
            padding-right: 15px !important;
        }

        .flip-photo {
            margin-top: 30px;
            padding: 0 40px;
        }


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

        #home {
            background: #EBF6FC;
            padding-top: 18vh;
            height: auto;
        }

        #talks .row div {
            padding: auto 1em;
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

        #talks h2,
        #booking h2 {
            font-size: 3em;
        }

        #home h3.edufair-date-year,
        #home h3.edufair-date-string {
            font-size: 1.5em
        }

        #home h3.edufair-date-string {
            -webkit-text-stroke: 1.5px #27387a
        }

        #talks-section {
            background-image: url('');
            padding: 0px;
        }

        .edufair-uni-region {
            padding: 2px 10px !important;
        }

        .navbar {
            padding: 20px 30px 20px 20px;
            background-color: #FFF !important;
            transition: background-color 200ms linear !important;
        }

        .btn-user {
            margin-top: 10px;
        }

        .navbar.scrolled {
            padding-top: 30px;
        }
    }

    @media (max-width: 768px) and (min-width: 576px) {
        #home {
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

        #home h3.edufair-date-year,
        #home h3.edufair-date-string {
            font-size: 1.3em;
        }

        #home h3.edufair-date-string {
            -webkit-text-stroke: 1px #27387a
        }

        .flip-photo {
            padding: 20px;
        }

        .card-columns {
            -webkit-column-count: 2 !important;
            -moz-column-count: 2 !important;
            column-count: 2 !important;
        }

        #talks-section {
            padding: 0px;
        }

        .navbar {
            background-color: #FFF !important;
            transition: background-color 200ms linear !important;
        }

        .btn-user {
            margin-top: 10px;
        }

        .navbar.scrolled {
            padding-top: 30px;
        }
    }

    @media (max-width: 1024px) and (min-width: 768px) {
        body {
            background-image: url('<?php echo base_url(); ?>assets/img/home/background.png');
        }

        #home {
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

        #home h3.edufair-date-year,
        #home h3.edufair-date-string {
            font-size: 1.3em;
        }

        #home h3.edufair-date-string {
            -webkit-text-stroke: 1px #27387a
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
        #home {
            padding-top: 18vh;
        }

        #home h3.edufair-date {
            font-size: 3em;
            -webkit-text-stroke: 2.5px #eda853;
        }

        #home h1.edufair-title {
            font-size: 6.3em;
        }

        .card-columns {
            -webkit-column-count: 3 !important;
            -moz-column-count: 3 !important;
            column-count: 3 !important;
        }

        #talks h2,
        #booking h2 {
            font-size: 5em;
        }

        #home h3.edufair-date-year,
        #home h3.edufair-date-string {
            font-size: 3em;
        }

        #home h3.edufair-date-string {
            -webkit-text-stroke: 2.5px #27387a
        }

        .edufair-uni-region {
            padding: 6px 30px !important;
        }

        #talks-section {
            /* background-position: center 1%; */
        }
    }

    @media (min-width: 1400px) {
        #home h1.edufair-title {
            font-size: 8.8em;
        }

        #talks-section {
            padding-left: 6%;
            padding-right: 10%;
        }


    }

    #register-form {
        background-image: url('<?php echo base_url(); ?>assets/user/dashboard/bg.jpg');
        background-size: 100%;
        background-repeat: no-repeat;
        background-position: bottom;
    }

    #footer-copy {
        background: #AED0EB;
    }

    footer,
    .footer {
        background: #D1E4F3;
    }

    .nav-block {
        background: #27387A;
        padding: 5px 1em;
    }

    .nav-block a {
        color: #FFF !important;
    }
    </style>
</head>

<body>
    <!-- <div class="loading"></div> -->
    <?php
if ($this->session->flashdata('success')) {
    echo '<div class="flash-data" data-success="' . $this->session->flashdata('success') . '"></div>';
} else if ($this->session->flashdata('error')) {
    echo '<div class="flash-data" data-error="' . $this->session->flashdata('error') . '"></div>';
} else if ($this->session->flashdata('warning')) {
    echo '<div class="flash-data" data-warning="' . $this->session->flashdata('warning') . '"></div>';
}
?>