
<style>
.checkbok{
    clip :rect(0,0,0,0);
    position: absolute;
}

.textarea-red{
    border: 3px solid #F43636;
}

.btn-submit-uni{
    background: #F1D100;
    color: #0D3C9C;
}

.tombol{
    width: 100% !important
}

.items-collection{
    margin:20px 0 0 0;
}
.items-collection label.btn-default.active{
    background-color:#007ba7;
    color:#FFF;
}
.items-collection label.btn-default{
    width:90%;
    border:1px solid #305891;
    margin:5px; 
    border-radius: 17px;
    color: #305891;
}

/* .text-booking-uni{
    color : #0D3C9C;
    font-size: 1.6em;
    text-align: justify
} */

.btn-booking-uni{
    width:90%;
    border:4px solid #F43636;
    margin:5px; 
    font-weight: 900 !important;
    /* border-radius: 17px; */
    color: #F43636;
}
.btn-booking-uni.active{
    background-color:#F43636;
    color:#FFFFFF !important;
}

.btn-booking-uni:hover{
    background-color:#F43636;
    color:#FFFFFF !important;
}

.items-collection label .itemcontent{
    width:100%;
}
.items-collection .btn-group{
    width:90%
}


.card-book:hover {
    border: 3px solid #dedede;
}

.box-book {
    height: 870px;
    overflow-x: hidden;
    overflow-y: scroll;
}

/* Scrollbar styles */
.box-book::-webkit-scrollbar {
    width: 8px;
    height: 12px;
}

.box-book::-webkit-scrollbar-track {
    border: 1px solid #fff;
    border-radius: 10px;
}

.box-book::-webkit-scrollbar-thumb {
    background: #27387a;
    border-radius: 10px;
}

.box-book::-webkit-scrollbar-thumb:hover {
    background: #eda436;
}

.btn-book-uni {
    background: #ea912c;
    border-radius: 0 !important;
    letter-spacing: 0.8px;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    padding: 10px 15px;
    text-align: center;
}

.btn-book-uni:hover {
    background: #ed912f;
}

#booking {
    height: auto;
    padding: 5% 10% 2% 6%;
}

.btn-book {
    background: #ea912c;
    border-radius: 0 !important;
    letter-spacing: 0.8px;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    padding: 10px;
}

.btn-book:hover {
    background: #ed912f;
}

.btn-not {
    background: #0D2F7F;
    color: #595959;
    letter-spacing: 0.8px;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    padding: 10px;
}

.btn-not:hover {
    background: #133584;
}

.uni-book-header-desc{
    color: #343A40;
}

.region-of-origin{
    color: #0D2F7F;
    font-weight: 700;
}

@media screen and (max-width: 576px) and (min-width: 375px) {
    .btn-book {
        letter-spacing: 0.5px;
        font-size: 16px;
    }

    .box-book {
        height: 600px;
    }

    .btn-not {
        letter-spacing: 0.5px;
    }
}
</style>

<!-- if u want to book, please login first  -->
<?php 
    if(!$this->session->has_userdata('user_id')){
        $props = "data-target='#signUp' data-toggle='modal'";
    } else {
        $props= "";
    }
?>


<!-- Modal -->
<div class="modal fade" id="uni-story" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>


<div class="container-fluid pb-4" id="booking">
    <div class="pb-4">
        <div class="row pb-5">
            <div class="col-lg-5 col-sm-12 text-left pt-5 mt-4 ">
                <h2>UNIVERSITY LIST</h2>
                <h5 class="uni-book-header-desc">You have a chance to book a personal consultation and join talks with the universities listed below!
                    <br>
                    Book your schedule and come prepared to ask questions for the university representative about
                    admissions.
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5 class="region-of-origin">Region of origin:</h5>
            </div>
        </div>
        <div class="row">
            <div class="col text-left" style="margin-left:-5px;">
                <?php
                    foreach($uniCountry as $key => $val) {
                    ?>
                <div class="dropdown show d-inline">
                    <button class="btn btn-sm mx-1 dropdown-toggle edufair-uni-region"
                        data-toggle="dropdown">
                        <?php echo $key; ?>
                    </button>
                    <!-- <div class="dropdown-menu" id="dropdown-country"> -->
                    <!-- <a class="dropdown-item" data-country="<?php echo $key; ?>" href="#booking"><?php echo $key; ?></a> -->
                    <?php
                        if(count($val['uni_detail']) > 0) {
                        ?>
                    <div class="dropdown-menu" id="dropdown-country">
                        <?php
                                foreach($val['uni_detail'] as $row){
                                ?>
                        <a class="dropdown-item" onclick="highlight('<?php echo $row['uni_id']; ?>')">
                            <?php echo $row['uni_name']; ?>
                        </a>
                        <?php
                                }
                                ?>
                    </div>
                    <?php
                        }
                        ?>
                    <!-- </div> -->
                </div>
                <?php
                    }
                    ?>
            </div>
            <style>
            .live-talks {
                position: absolute;
                left: 0;
                top: 0;
                margin-top: 1em;
                margin-left: 2em;
                width: 100%;
            }

            .live-talks .left-string {
                background: rgb(255, 84, 42);
                background: linear-gradient(90deg, rgba(255, 84, 42, 1) 0%, rgba(201, 66, 0, 1) 45%, rgba(211, 0, 5, 1) 100%);
                padding: .3em .3em;
                font-weight: bold;
                letter-spacing: 2px;
                text-align: center;
            }

            .live-talks .right-string {
                text-align: center;
                padding: .3em .8em;
                background: #0A2F7C;
                /* border: 1px solid #FFF; */
            }

            .inst-unilist {
                position: absolute;
                top: 0;
                right: 0;
                margin-right: 1em;
                margin-top: 1em;
            }

            .inst-unilist img {
                width: 30px;
            }
            </style>
            <div class="row p-4">
                <div class="mt-3 p-2 box-book">
                    <div class="row my-0" id="consult-container">
                        <?php
                        $i = 0;
                        $count = 1;
                        foreach($uniData as $uniInfo) {
                            $no_image = base_url().'assets/uni/banner/default.jpeg';
                            // print("<pre>".print_r($uniInfo, true)."</pre>");exit;
                        ?>
                        <!-- <div class="col-md-6 mb-2 d-flex align-items-stretch" -->
                        <div class="col-md-4 mb-2 align-items-stretch"
                            id="uni-<?php echo $uniInfo['uni_id']; ?>">
                            <div class="card">
                                <!-- <div class="inst-unilist" data-container="body" data-toggle="modal"
                                    data-content="<?php echo $uniInfo['uni_description']; ?>" data-target="#uni-story"
                                    style="cursor: pointer">
                                    <img src="<?php echo base_url(); ?>assets/home/information-13.png" alt="">
                                </div> -->

                                <!-- <div style="border: 3px solid #cfcfcf;position: absolute;z-index: 1;right:0;padding:.5em 1.5em;font-weight: bold;margin:2em; color: #CFCFCF; letter-spacing: .2em;transform: rotate(20deg);top: 20px">FULLY BOOKED</div> -->
                                <div style="max-width:100%;">
                                    <img src="<?php echo base_url()."assets/uni/banner/".$uniInfo['uni_photo_banner']; ?>" onerror="this.onerror=null;this.src='<?=$no_image?>';"
                                        alt="" width="100%">
                                </div>
                                
                                <div class="card-body pl-4 p-1">
                                    <h4 class="m-0 pt-2 pb-2 font-weight-bold"
                                        style="color: #3d3d3d; letter-spacing:0.8px;">
                                        <!-- <?php echo strtoupper($uniInfo['uni_name']); ?></h4> -->
                                </div>
                                <div class="card-footer p-0">
                                <div class="col-md-12 p-2">
                                    <div class="">
                                        <?php 
                                            $count_unidtl = [];
                                            foreach($uniInfo['uni_detail'] as $dtl) {
                                                if(($dtl['uni_dtl_id']!="")) { 
                                                    $count_unidtl[] = $dtl['uni_dtl_id'];
                                                }
                                            }

                                            //if((count($count_unidtl)>0) and ($uniInfo['uni_topic_reg'] == "REGISTERED")) { ?>
                                        <!-- <div class="col-md-6 btn-book book-consultation-container"
                                            style="cursor: pointer" data-toggle="modal"
                                            data-target="#modal-<?=$uniInfo['uni_id'];?>">
                                            <div class="mx-3">
                                                BOOK YOUR CONSULTATION
                                                <div class="float-right">
                                                    <i class="fas fa-arrow-alt-circle-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 btn-not btn-topic" style="cursor: pointer"
                                            data-uniid="<?=$uniInfo['uni_id'];?>">
                                            <div class="mx-3">
                                                JOIN TALK
                                                <div class="float-right">
                                                    <i class="fas fa-arrow-alt-circle-right"></i>
                                                </div>
                                            </div>
                                        </div> -->
                                        <?php /*} else*/ if((count($count_unidtl)>0) and ($uniInfo['uni_topic_reg'] != "REGISTERED")) { ?>
                                        <div class="col-md-6 d-inline btn-book-uni book-consultation-container"
                                            style="cursor: pointer" data-toggle="modal"
                                            data-target="#modal-<?=$uniInfo['uni_id'];?>"><?php //echo count($count_unidtl); ?>
                                            
                                                Join Now
                                                <!-- <div class="float-right">
                                                    <i class="fas fa-arrow-alt-circle-right"></i>
                                                </div> -->
                                            
                                        </div>
                                        <div class="col-md-6 desc-uni btn-outline-primary d-inline ml-2 mb-1 btn-tellme btn-topic" class="inst-unilist" data-container="body" data-toggle="modal"
                                    data-content="<?php echo $uniInfo['uni_description']; ?>" data-target="#uni-story"
                                    style="cursor: pointer">
                                                Tell Me More
                                                <!-- <div class="float-right">
                                                    <i class="fas fa-arrow-alt-circle-right"></i>
                                                </div> -->
                                            
                                        </div>
                                        <?php } else { ?>
                                        <div class="col-md-10 desc-uni btn-outline-primary d-inline mb-1 btn-tellme btn-topic" class="inst-unilist" data-container="body" data-toggle="modal"
                                        data-content="<?php echo $uniInfo['uni_description']; ?>" data-target="#uni-story"
                                        style="cursor: pointer">
                                            
                                                Tell Me More
                                                <!-- <div class="float-right">
                                                    <i class="fas fa-arrow-alt-circle-right"></i>
                                                </div> -->
                                            
                                        </div>
                                        <?php } ?>
                                        <?php
                                        if(count(($uniInfo['uni_detail']))>1) {
                                            $card = "modal-lg";
                                            $col = "col-md-6";
                                        } else {
                                            $card = "";
                                            $col = "col-md-12";
                                        }
                                    ?>

                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            id="modal-<?=$uniInfo['uni_id'];?>">
                                            <div class="modal-dialog <?=$card;?> modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <?php
                                                if($uniInfo['uni_status_fullbooked'] == "NOT_FULL") {
                                                ?>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title title-booking-blue">Choose Your Schedule</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                    <div class="modal-body">
                                                        <?php
                                                    // check if uni status fullbook is not full
                                                    if($uniInfo['uni_status_fullbooked'] == "NOT_FULL") {
                                                    ?>
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <form method="POST" class="booking-form" action="<?php echo base_url(); ?>booking/consult">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="items-collection d-flex">
                                                                                <?php
                                                                                $day = 1;
                                                                                foreach($uniInfo['uni_detail'] as $key => $row) {
                                                                                    $uni_dtl_id = $row['uni_dtl_id'];
                                                                                    $assigned_time  = $row['uni_dtl_start_date'];
                                                                                    $start = explode(" ", $assigned_time);
                                                                                    $start_time = substr($start[1], 0, 5);

                                                                                    $completed_time  = $row['uni_dtl_end_date'];
                                                                                    $end = explode(" ", $completed_time );
                                                                                    $end_time = substr($end[1], 0, 5);

                                                                                    $d1 = new DateTime($assigned_time);
                                                                                    $d2 = new DateTime($completed_time);

                                                                                    $interval = $d2->diff($d1);
                                                                                    $time = $interval->format('%H');
                                                                                    $disabled = "";
                                                                                    ?>
                                                                                    <!-- <div class="<?=$col;?>">
                                                                                        <div class="row">
                                                                                            <div class="col text-center pt-4 pb-4"
                                                                                                style="color: #000">
                                                                                                <h4><?php //echo date('d M Y', strtotime($assigned_time)); ?>
                                                                                                </h4>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> -->
                                                                                    <div class="items w-50">
                                                                                        <div class="info-block block-info clearfix">
                                                                                            <div data-toggle="buttons" class="btn-group bizmoduleselect tombol">
                                                                                                <label class="btn btn-booking-uni">
                                                                                                    <div class="itemcontent">
                                                                                                        <!-- <input type="text" value="<?php echo $uni_dtl_id?>"> -->
                                                                                                        <input class="checkbok booking-red" type="checkbox" name="var_id[]" autocomplete="off" value="<?php echo $uni_dtl_id; ?>" <?php echo (array_search($uni_dtl_id, array_column($bookingConsult, 'uni_dtl_id')) != "") ? "checked disabled" : ""; ?>>
                                                                                                        <!-- <span class="fa fa-calendar fa-2x"></span> -->
                                                                                                        <h5 class="text-booking-uni" style="text-align: center;padding-top: 0.5rem"><?php echo date('d M Y H:i', strtotime($assigned_time)); ?></h5>
                                                                                                    </div>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php
                                                                                $day++;
                                                                                }
                                                                                ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleInputEmail1" class="text-dark">Write your questions</label>
                                                                            <textarea type="text" class="form-control textarea-red" aria-describedby="emailHelp" placeholder="type your questions here" name="question"></textarea>
                                                                        </div>
                                                                        <input type="hidden" name="uni_id" value="<?=$uniInfo['uni_id'];?>">
                                                                        <button type="submit" class="btn btn-submit-uni">Submit</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        
                                                        </div>
                                                        <?php
                                                    // check if uni status fullbook is fully booked
                                                    }  else {
                                                    ?>
                                                        <div class="text-center pb-5 px-3">
                                                            <div class="swal2-icon swal2-question swal2-icon-show"
                                                                style="display: flex;">
                                                                <div class="swal2-icon-content">?</div>
                                                            </div>
                                                            <h5 class="text-dark text-center">
                                                                Hello this consultation is closed because full booked.</h5>

                                                            <button data-dismiss="modal"
                                                                class="btn btn-warning text-dark mt-3 mr-2">Close</button>

                                                            <button data-uniid="<?php echo $uniInfo['uni_id']; ?>"
                                                                class="btn btn-primary mt-3 notify-me ml-2">Notify
                                                                Me</button>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <?php 
                        $count++;
                        } 
                        ?>
                    </div>
                    <hr class="my-3" style="border:1px dashed #EB4D1A;">

                    <!-- UPCOMING SESSION  -->
                    <div class="row my-0">
                        <div class="col-md-12 mb-3">
                            <div class="card"
                                style="background:rgb(250,250,250); background: linear-gradient(313deg, rgba(250,250,250,1) 0%, rgba(255,255,255,0.6166841736694677) 38%);">
                                <div class="card-body">
                                    <h5>We have an upcoming session with universities listed below scheduled after the
                                        sessions on July 24th - 25th. Secure your spot now!</h5>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i = 0;
                        $count = 1;
                        foreach($uniUpcoming as $uniInfo) {
                            // print("<pre>".print_r($uniInfo, true)."</pre>");exit;
                        ?>
                        <div class="col-md-6 mb-2 d-flex align-items-stretch"
                            id="uni-<?php echo $uniInfo['uni_id']; ?>">
                            <div class="card">
                                <div class="inst-unilist" data-container="body" data-toggle="modal"
                                    data-content="<?php echo $uniInfo['uni_description']; ?>" data-target="#uni-story"
                                    style="cursor: pointer">
                                    <img src="<?php echo base_url(); ?>assets/home/information-13.png" alt="">
                                </div>

                                <!-- <div style="border: 3px solid #cfcfcf;position: absolute;z-index: 1;right:0;padding:.5em 1.5em;font-weight: bold;margin:2em; color: #CFCFCF; letter-spacing: .2em;transform: rotate(20deg);top: 20px">FULLY BOOKED</div> -->
                                <img src="<?php echo base_url()."assets/uni/banner/".$uniInfo['uni_photo_banner']; ?>"
                                    alt="" width="100%">
                                <div class="card-body pl-4 p-1">
                                    <h4 class="m-0 pt-2 pb-2 font-weight-bold"
                                        style="color: #3d3d3d; letter-spacing:0.8px;">
                                        <?php echo strtoupper($uniInfo['uni_name']); ?></h4>
                                </div>
                                <?php
                                    $btn = "btn-book";
                                    $html='class="col book-consultation-container" style="cursor: pointer" data-toggle="modal" data-target="#modal-'.$uniInfo['uni_id'].'"';
                                    $text = "UPCOMING SESSION";
                                    $data = "";
                                ?>
                                <div class="card-footer <?=$btn;?>" <?=$data;?>>
                                    <div class="row no-gutters">
                                        <div <?=$html;?>>
                                            <?=$text;?>
                                            <!-- <div class="float-right">
                                                <i class="fas fa-arrow-circle-right"></i>
                                            </div> -->
                                        </div>

                                        <?php
                                        if(count(($uniInfo['uni_detail']))>1) {
                                            $card = "modal-lg";
                                            $col = "col-md-6";
                                        } else {
                                            $card = "";
                                            $col = "col-md-12";
                                        }
                                    ?>

                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            id="modal-<?=$uniInfo['uni_id'];?>">
                                            <div class="modal-dialog <?=$card;?> modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <?php
                                                if($uniInfo['uni_status_fullbooked'] == "NOT_FULL") {
                                                ?>
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Time</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                    <div class="modal-body">
                                                        <?php
                                                    // check if uni status fullbook is not full
                                                    if($uniInfo['uni_status_fullbooked'] == "NOT_FULL") {
                                                    ?>
                                                        <div class="row">
                                                            <?php
                                                        $day = 1;
                                                        foreach($uniInfo['uni_detail'] as $key => $row) {
                                                            $uni_dtl_id = $row['uni_dtl_id'];
                                                            $assigned_time  = $row['uni_dtl_start_date'];
                                                            $start = explode(" ", $assigned_time);
                                                            $start_time = substr($start[1], 0, 5);

                                                            $completed_time  = $row['uni_dtl_end_date'];
                                                            $end = explode(" ", $completed_time );
                                                            $end_time = substr($end[1], 0, 5);

                                                            $d1 = new DateTime($assigned_time);
                                                            $d2 = new DateTime($completed_time);

                                                            $interval = $d2->diff($d1);
                                                            $time = $interval->format('%H');
                                                            $disabled = "";
                                                            ?>
                                                            <div class="<?=$col;?>">
                                                                <div class="row">
                                                                    <div class="col text-center pt-4 pb-4"
                                                                        style="color: #000">
                                                                        <h4><?php echo date('d M Y', strtotime($assigned_time)); ?>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            foreach($row['uni_dtl_time'] as $detailTime){
                                                                $uni_dtl_time_id = $detailTime['uni_detail_time_id'];
                                                                $startTimeData = explode(" ", $detailTime['uni_dtl_t_start_time']);
                                                                $uni_dtl_t_start_time = substr($startTimeData[1], 0, 5);
                                                                $endTimeData = explode(" ", $detailTime['uni_dtl_t_end_time']);
                                                                $uni_dtl_t_end_time = substr($endTimeData[1], 0, 5);
                                                                $uni_dtl_t_status = $detailTime['uni_dtl_t_status'];
                                                                $disabled = "";
                                                                $booked = "Book";
                                                                if($uni_dtl_t_status != 1) {
                                                                    $disabled = "disabled";
                                                                    $booked = "Booked";
                                                                }
                                                                ?>

                                                                <div class="row mb-2">
                                                                    <div class="col-sm-8 col-lg-8 pr-0">
                                                                        <button
                                                                            class="btn btn-outline-info btn-disabled btn-block"
                                                                            disabled><?php echo $uni_dtl_t_start_time; ?>
                                                                            -
                                                                            <?php echo $uni_dtl_t_end_time; ?>
                                                                            WIB</button>
                                                                    </div>
                                                                    <div class="col-sm-4 col-lg-4">
                                                                        <button <?=$props;?>
                                                                            class="btn btn-primary btn-block btn-book-consul btn-<?=$uni_dtl_time_id;?>"
                                                                            data-uniid="<?=$uniInfo['uni_id'];?>"
                                                                            data-starttime="<?php echo $detailTime['uni_dtl_t_start_time']?>"
                                                                            data-endtime="<?php echo $detailTime['uni_dtl_t_end_time']; ?>"
                                                                            data-unidtltimeid="<?php echo $uni_dtl_time_id; ?>"
                                                                            <?php echo $disabled; ?>>
                                                                            <?php echo $booked; ?>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                            </div>
                                                            <?php
                                                        $day++;
                                                        }
                                                        ?>
                                                        </div>
                                                        <?php
                                                    // check if uni status fullbook is fully booked
                                                    }  else {
                                                    ?>
                                                        <div class="text-center pb-5 px-3">
                                                            <div class="swal2-icon swal2-question swal2-icon-show"
                                                                style="display: flex;">
                                                                <div class="swal2-icon-content">?</div>
                                                            </div>
                                                            <h5 class="text-dark text-center">
                                                                <b>Be on the list for this consultation?</b> <br>
                                                            </h5>
                                                            <p class="text-dark text-center" style="font-weight:200;">
                                                                Click "YES" to secure your spot and be notified on the
                                                                available schedule!
                                                            </p>

                                                            <button data-dismiss="modal"
                                                                class="btn btn-warning text-dark mt-3 mr-1">Close</button>

                                                            <button data-uniid="<?php echo $uniInfo['uni_id']; ?>"
                                                                class="btn btn-primary mt-3 px-4 notify-me ml-1">Yes</button>
                                                        </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                        $count++;
                        } 
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </section>

    <script>
    $(".inst-unilist").each(function() {
        $(this).click(function() {
            var uni_story = $(this).data('content');
            // alert(uni_story);
            $("#uni-story .modal-body").html(uni_story);
        });
    });

    $(".desc-uni").each(function() {
        $(this).click(function() {
            var uni_story = $(this).data('content');
            // alert(uni_story);
            $("#uni-story .modal-body").html(uni_story);
        });
    });


    $(".btn-topic").each(function() {
        $(this).click(function() {
            var uni_id = $(this).data('uniid')
            var e = document.getElementById("topic-" + uni_id)

            e.scrollIntoView({
                behavior: 'smooth',
                block: 'center',
            });
        });
    });
    </script>