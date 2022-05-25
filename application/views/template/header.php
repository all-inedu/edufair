<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title>Global University Fair | Your Study Abroad Starter Pack</title>
    <link rel="icon" href="<?= base_url('assets/img/icon.ico'); ?>" type="image/gif" sizes="16x16">
    <meta name="title" content="Global University Fair | Your Study Abroad Starter Pack">
    <meta name="description"
        content="Get Invited to Apply to Top Universities in USA, Europe &amp; Asia. It's Easy! Have Personal Conversations with Universities that Fit Your Interests &amp; Goals. FREE Online Expo!">
    <meta name="keywords" content="study abroad, education fair, education expo">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="language" content="English">
    <!-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="<?= base_url('assets/css/flipTimerss.css'); ?>" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style type="text/css">
    /* override styles here */
    /* .notie-container {
      box-shadow: none;
      background-color: #ff3d3d !important;
      z-index: 9999;
    } */
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

    .modal-content {
        border-radius: 0 !important;
        border: 0 !important;
    }

    .modal-header {
        border-bottom: none !important;
        padding: 5px 1rem !important;
    }

    .modal-header .close {
        padding: 5px 5px;
        margin: -5px -1rem -1rem auto;
        background: red;
        color: #fff;
    }

    .modal-header h5,
    .modal-body h5 {
        color: #235787 !important;
        font-size: 1.3em;
    }

    .btn {
        border-radius: 0 !important;
    }

    #home-section {
        background-color: #FFF;
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

    .home-header {
        width: 100%;
        display: flex;
    }

    .home-maps {
        width: 65%;
    }

    .home-title {
        width: 30%;
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
        border: 3px solid transparent;
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

    .swal2-title {
        font-size: 17px !important;
    }

    #btn-login {
        background: #235788;
        padding: 5px 35px 5px 35px;
        /* border: 1px solid #27387A; */
        /* border-radius: 20px 0px 0px 20px; */
        color: #fff;
        align-items: center;
    }

    #btn-login:hover {
        background: #F0D202;
        color: #235788;
    }

    #btn-signup {
        background: #0D2F7F;
        padding: 5px 30px 5px 15px;
        color: #fff;
        border-left: 2px solid #ECA754;
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
        padding: 2% 0px 1% 4% !important;
    }

    #booking h2,
    #talks h2,
    #about h2 {
        font-family: Montserrat-ExtraBold;
        text-transform: uppercase;
        color: #255896;
    }

    .tanggal {
        color: #F43636;
        font-weight: 600;
    }

    .edufair-uni-region {
        /* border: 3px solid #efaa52; */
        background: #F43636;
        color: #FFFFFF;
        /* border-radius: 12px; */
        font-size: 17px;
        margin-bottom: 10px;
    }

    .btn-tellme {
        font-weight: normal !important;
        background: #FFFFFF;
        border-radius: 0 !important;
        text-align: center;
        font-size: 1rem;
        padding: 8px;
        border: 1px solid #12116e;
        font-weight: 700;
        color: #0D3C9C;
        width: 100%
    }

    .btn-tellme a {
        color: #fff;
        text-decoration: none
    }

    .btn-tellme:hover {
        background: #235788;
    }



    .btn-book {
        background: #F1D202 !important;
        text-transform: capitalize !important;
        color: #0D3C9C !important;
        padding-left: 1.5rem;
        text-align: left;
        font-size: 1rem;
        border: none;
        font-weight: normal !important;
        color: #fff;
        width: 100%;
        border: 1px solid #F1D202;
        padding: 8px !important;
    }

    .btn-book:hover {
        background: #fff !important;
        border: 1px solid #F1D202;
    }

    .btn-book a {
        color: #0D3C9C;
        text-decoration: none
    }

    .card-topic {
        border-radius: 0;
        background: #f7ead7
    }

    .talk-button {
        cursor: pointer
    }

    .day1talks {
        margin-top: 3em
    }

    .preedu,
    .day1talks,
    .day2talks {
        /* border: 3px solid #12116e;
        border-radius: .5em; */
        position: relative;
    }


    .eventpre {
        padding: 0;
    }

    .preevent {
        /* border: 3px solid #12116e; */
        /* border-radius: .5em; */
        position: relative;
    }

    .preevent::before {
        content: "PRE-EVENT";
        border: 2px solid #255896;
        /* border-radius: 1.5em; */
        padding: .2em 1.5em;
        top: 0;
        z-index: 2;
        margin-left: 10px;
        background: #fff;
        font-size: 1.2em;
        color: #255896;
        font-weight: 700;
    }

    .preedu::before {
        content: "Pre Edufair";
        border: 2px solid #255896;
        border-radius: 1.5em;
        padding: .2em 1.5em;
        position: absolute;
        top: 0;
        margin-top: -1.2em;
        z-index: 2;
        background: #fff;
        font-size: 1.2em;
        color: #255896;
        font-weight: 700
    }

    .day1talks::before {
        content: "23 JULY";
        border: 2px solid #255896;
        /* border-radius: 1.5em; */
        padding: .2em 1.5em;
        position: absolute;
        top: 0;
        margin-top: -1.2em;
        z-index: 2;
        margin-left: 10px;
        background: #fff;
        font-size: 1.2em;
        color: #255896;
        font-weight: 700
    }

    .day2talks::before {
        content: "24 JULY";
        border: 2px solid #255896;
        /* border-radius: 1.5em; */
        margin-left: 10px;
        padding: .2em 1.5em;
        position: absolute;
        top: 0;
        margin-top: -1.2em;
        z-index: 2;
        background: #fff;
        font-size: 1.2em;
        color: #255896;
        font-weight: 700
    }

    #talks {
        height: auto;
        padding: 0px 0 50px 0
    }

    #talks h5 {
        color: #235788;
        font-size: 1.6em;
        text-align: justify
    }

    .modal-title-desc {
        font-weight: 700;
    }

    .title-desc-blue {
        background: #FFFFFF;
        /* padding-left: 1.5rem; */
        text-align: center;
        /* text-align: left; */
        font-size: 2rem;
        font-weight: 700;
        color: #0D3C9C;
    }

    .title-booking-blue {
        background: #FFFFFF;
        /* padding-left: 1.5rem; */
        text-align: center;
        /* text-align: left; */
        font-size: 2rem;
        font-weight: 700;
        color: #0D3C9C;
    }

    #booking {
        /* background: #EBF6FC; */
        /* background-image: url('assets/img/home/bg-unilist.webp'); */
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

    .background-lp {
        background-image: url('assets/img/home/edufair-background.webp');
        background-repeat: no-repeat;
        background-position: top right;
    }

    #talks-section {
        /* background: #EBF6FC; */
        /* background-image: url('assets/img/home/compressed/header-bg-3.webp'); */
        background-position: top;
        background-size: 100%;
        background-repeat: no-repeat;
        padding-left: 4%;
        padding-right: 6%;
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
        padding: 0 40px 0 40px;
    }

    #register-form {
        /* background-image: url('<?php echo base_url(); ?>assets/img/BG.webp'); */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: bottom;
        background-attachment: fixed;
    }

    @media screen and (max-width: 375px) and (min-width: 250px) {

        .container-fluid {
            margin: 0 !important;
            padding: 0px !important;
        }

        .navbar {
            background: #fff !important;
        }

        .navbar-brand {
            margin-right: 0px !important;
        }

        .navbar-brand img {
            width: 150px !important;
        }

        .navbar-allin {
            padding: 0 20px 0 20px !important;
        }

        .navbar-nav .nav-item {
            width: 100% !important;
        }

        #edufair-title-container {
            padding: 15vh 10% 5vh 10%;
            background-repeat: no-repeat;
            background-size: 80% auto;
            background-position: center 13%;
        }

        #home h5.edufair-desc {
            font-size: 1.2em;
            color: #27387a;
        }

        .flip-photo {
            padding: 0 50px !important;
        }

        h2 {
            font-size: 1.4em;
        }

        h5 {
            font-size: 1em !important;
        }

        p {
            font-size: 0.7em !important;
        }

        h4 {
            font-size: 0.9em !important;
        }

        .badge-allin {
            border-radius: 0 !important;
            font-size: 0.5em !important;
            white-space: normal !important;
            text-align: left !important;
        }

        .btn-book {
            font-size: 12px !important;
        }

        .preedu,
        .day1talks,
        .day2talks {
            margin: 20px 10px;
        }

        #booking {
            padding: 10px 30px !important;
        }

        .navbar-collapse {
            margin-top: 20px;
            border-top: 2px solid #dedede;
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

        #home {
            background: #FFF;
            padding-top: 18vh;
            height: auto;
        }

        #talks .row div {
            padding: 0;
        }
    }

    @media screen and (max-width: 576px) and (min-width: 375px) {
        .preevent::before {
            margin-left: -10px !important;
        }

        .day1talks::before {
            margin-left: -10px !important;
        }

        .day2talks::before {
            margin-left: -10px !important;
        }

        .navbar-brand {
            margin-right: 0 !important;
        }

        .navbar-brand img {
            width: 150px !important;
        }

        .navbar-nav .nav-item {
            width: 100% !important;
        }

        #edufair-title-container {
            padding: 1 8%;
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
            background-color: #fff;
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
            background: #fff;
            padding-top: 18vh;
            height: auto;
        }

        .home-maps {
            width: 60%;
        }

        .home-title {
            width: 37%;
        }

        .background-lp {
            background: #fff;
        }

        #talks .row div {
            padding: 0;
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
        #booking h2,
        #about h2 {
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
            margin: 0px -15px;
            padding: 20px 20px;
            background-color: #FFF !important;
            /* transition: background-color 200ms linear !important; */
        }

        .btn-user {
            margin-top: 10px;
        }

        .navbar.scrolled {
            padding-top: 30px;
        }
    }

    @media (max-width: 768px) and (min-width: 576px) {
        .navbar.scrolled {
            background-color: #FFF !important;
            z-index: 999 !important;
            /* transition: background-color 200ms linear; */
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
            z-index: 999 !important;
            /* transition: background-color 200ms linear !important; */
        }

        .btn-user {
            margin-top: 10px;
        }

        .navbar.scrolled {
            padding-top: 30px;
        }

        .talk-button {
            float: right;
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
        #booking h2,
        #about h2 {
            font-size: 3.4em;
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
            padding-left: 4%;
            padding-right: 6%;
        }


    }

    #footer-copy {
        background: #AED0EB;
    }

    footer,
    .footer {
        background: #D1E4F3;
    }

    .nav-block {
        background: #235788;
        padding: 2px;
        border-radius: 0;
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