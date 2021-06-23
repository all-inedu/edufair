<style>
.card-book:hover {
    border: 3px solid #dedede;
}

.btn-book {
    border-radius: 0 !important;
    letter-spacing: 0.8px;
}

.box-book {
    height: 780px;
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

#booking {
    height: auto;
    padding: 2% 10% 2% 6%;
}

.btn-not {
    background: #c4c4c4;
    color: #595959;
    letter-spacing: 0.8px;
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
<div class="container-fluid text-white pb-4" id="booking">
    <div class="pb-4">
        <div class="row pb-5">
            <div class="col-sm-12 col-lg-7 mt-5">
                <h2>University List</h2>
                <h5>You have a chance to book a personal consultation with all universities listed below! Book your
                    schedule and come prepared to ask questions for the uni reps about admissions.</h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5>Region of origin:</h5>
            </div>
        </div>
        <div class="row">
            <div class="col text-left" style="margin-left:-5px;">
                <?php
                    foreach($uniCountry as $key => $val) {
                    ?>
                <div class="dropdown show d-inline">
                    <button class="btn bg-white text-muted btn-sm mx-1 dropdown-toggle edufair-uni-region"
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
                            // print("<pre>".print_r($uniInfo, true)."</pre>");exit;
                        ?>
                        <div class="col-md-6 mb-2" id="uni-<?php echo $uniInfo['uni_id']; ?>">
                            <div class="card">
                                <div class="live-talks">
                                    <?php
                                        if($uniInfo['uni_topic_reg'] == "REGISTERED") {
                                        ?>
                                    <div class="text-white btn-topic" style="cursor:pointer"
                                        data-uniid="<?=$uniInfo['uni_id'];?>">
                                        <div class="row">
                                            <div class="col-md-2 col-2 left-string">JOIN</div>
                                            <div class="col-md-4 col-6 right-string">UNIVERSITY TALKS</div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                        ?>
                                </div>
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
                                    $count_unidtl = [];
                                    foreach($uniInfo['uni_detail'] as $dtl) {
                                        if(($dtl['uni_dtl_id']!="")) { 
                                            $count_unidtl[] = $dtl['uni_dtl_id'];
                                        }
                                    }
                                    if(count($count_unidtl)>0){
                                        $btn = "btn-book";
                                        $html='class="col book-consultation-container" style="cursor: pointer" data-toggle="modal" data-target="#modal-'.$uniInfo['uni_id'].'"';
                                        $text = "BOOK YOUR CONSULTATION";
                                        $data = "";
                                    } else {
                                        $btn = "btn-not";
                                        $html = 'class="col book-consultation-container"';
                                        $text = "<b>BOOK YOUR CONSULTATION</b>";
                                        $data = 'data-uniid="'.$uniInfo['uni_id'].'"';
                                    }
                                        
                                ?>
                                <div class="card-footer <?=$btn;?>" <?=$data;?>>
                                    <div class="row no-gutters">
                                        <div <?=$html;?>>
                                            <?=$text;?>
                                            <div class="float-right">
                                                <i class="fas fa-arrow-circle-right"></i>
                                            </div>
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
                                                        <div class="text-center pb-5">
                                                            <div class="swal2-icon swal2-question swal2-icon-show"
                                                                style="display: flex;">
                                                                <div class="swal2-icon-content">?</div>
                                                            </div>
                                                            <h5 class="text-dark text-center">
                                                                Hello this consultation is closed because
                                                                full booked.</h5>

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
                                    <h5>We have an encore with these universities! Make sure to save the date and book a
                                        consultation! </h5>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i = 0;
                        $count = 1;
                        foreach($uniUpcoming as $uniInfo) {
                            // print("<pre>".print_r($uniInfo, true)."</pre>");exit;
                        ?>
                        <div class="col-md-6 mb-2" id="uni-<?php echo $uniInfo['uni_id']; ?>">
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
                                            <div class="float-right">
                                                <i class="fas fa-arrow-circle-right"></i>
                                            </div>
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
                                                        <div class="text-center pb-5">
                                                            <div class="swal2-icon swal2-question swal2-icon-show"
                                                                style="display: flex;">
                                                                <div class="swal2-icon-content">?</div>
                                                            </div>
                                                            <h5 class="text-dark text-center">
                                                                <b>Hello!</b> <br>
                                                            </h5>
                                                            <p class="text-dark text-center" style="font-weight:200;">
                                                                if you want to book consultation at this university,
                                                                please
                                                                click the notify me button
                                                            </p>

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