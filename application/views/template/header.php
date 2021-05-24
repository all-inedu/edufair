<!DOCTYPE html>
<html>

<head>
    <title><?=$title;?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.css" rel="stylesheet">
    </link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="<?=base_url('assets/css/flipTimerss.css');?>" />

    <style type="text/css">
    body {
        @import url('https://fonts.googleapis.com/css2?family=Asap&display=swap');
        font-family: 'Asap', sans-serif;
    }

    .ss-main .ss-single-selected .placeholder .ss-disabled,
    .ss-main .ss-multi-selected .ss-values .ss-disabled {
        color: #646363 !important;
    }

    .ss-main .ss-single-selected, .ss-main .ss-multi-selected{ border-top: none !important; border-left: none !important; border-right: none !important; }

    .allin-registration {
        margin-top: 7vh;
        /*background: #efefef;*/
        padding: 2em;
        /*border-radius: 10px;*/
        box-shadow: 5px 5px 5px 0px rgb(0, 0, 0, 0.1);
        border:1px solid #dedede
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