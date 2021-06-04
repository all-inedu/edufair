<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

<head>
    <title><?=$title;?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="<?=base_url('assets/css/flipTimerss.css');?>" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style type="text/css">
    body {
        @import url('https://fonts.googleapis.com/css2?family=Asap&display=swap');
        font-family: 'Asap', sans-serif;
    }

    .ss-main .ss-single-selected .placeholder .ss-disabled,
    .ss-main .ss-multi-selected .ss-values .ss-disabled {
        color: #646363 !important;
    }

    .ss-main .ss-single-selected,
    .ss-main .ss-multi-selected {
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
    }

    .allin-registration {
        margin-top: 7vh;
        /*background: #efefef;*/
        padding: 2em;
        /*border-radius: 10px;*/
        box-shadow: 5px 5px 5px 0px rgb(0, 0, 0, 0.1);
        border: 1px solid #dedede
    }

    .custom-box {
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        background: none !important;
    }

    .custom-box.radio {
        border-bottom: none !important;
    }
body {
    padding: 0;
}

.card-headers img {
    padding: 0 20%;
}

.card {
    /*opacity: 0.8;*/
    border: 3px solid #fff;
    /*height: 12.2em;*/
}

#photo-banner .card {
    height: 12.2em;
}

.card:hover {
    border: 3px solid #39A5DC;
}

.seperate {
    color: #3d3d3d;
    margin: 0 -10px;
    position: relative;
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
    box-shadow: 0px 2px 2px rgb(0 0 0 / 10%);
}

.modal-login .avatar i {
    font-size: 38px;
    padding: 10px;
    ;
    color: #FFF;
}

.modal-login .modal-title {
    width: 100%;
    text-align: center;
    padding-top: 1rem;
}

.modal-login .avatar img {
    width: 100%;
}

.modal-login .modal-body {
    padding: 1em 3em;
}

.modal-footer {
    justify-content: center !important;
}

#home {
    height: 100vh;
    background: url('assets/img/home/header-bg.png');
    background-repeat: no-repeat;
    /* background-attachment: fixed; */
    background-size: 100%;
    background-position: center;
    padding-top: 18vh;
}
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