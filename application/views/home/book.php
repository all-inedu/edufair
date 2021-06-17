<style>
.card-book:hover {
    border: 3px solid #dedede;
}

.btn-book {
    border-radius: 0 !important
}

.box-book {
    height: 790px;
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
    background: #fff;
    border-radius: 10px;
}

.box-book::-webkit-scrollbar-thumb:hover {
    background: #eda436;
}

#booking {
    height: auto;
    /*background: #1c4e75;*/
    /* background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: top; */
    padding: 20px 0 50px 0;
}
</style>
<!-- Modal -->
<div class="modal fade" id="uni-story" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Desription</h5>
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
    <div class="container pb-4">
        <div class="row pb-5">
            <div class="col-sm-12 col-lg-7 mt-5" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50"
                data-aos-duration="1000">
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
            <div class="col text-left">
                <?php
                    foreach($uniCountry as $key => $val) {
                    ?>
                <div class="dropdown show d-inline">
                    <button class="btn bg-white text-muted btn-sm mx-1 px-3 dropdown-toggle edufair-uni-region"
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
                        <a class="dropdown-item"
                            onclick="highlight('<?php echo $row['uni_id']; ?>')"><?php echo $row['uni_name']; ?></a>
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
                border: 1px solid #FFF;
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
            <div class="row">
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
                                    <a href="#talks" style="color: #FFF; text-decoration: none">
                                        <div class="row">
                                            <div class="col-2 left-string">JOIN</div>
                                            <div class="col-4 right-string">UNIVERSITY TALKS</div>
                                        </div>
                                    </a>
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
                                    <h4 class="m-0 pt-2 pb-2" style="color: #000">
                                        <?php echo strtoupper($uniInfo['uni_name']); ?></h4>
                                </div>

                                <div class="card-footer btn-book">
                                    <div class="row no-gutters">
                                        <div class="col book-consultation-container" style="cursor: pointer"
                                            data-toggle="modal" data-target="#modal<?php echo $count; ?>">
                                            <a href='javascript:void'>BOOK YOUR CONSULTATION</a>
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
                                            id="modal<?php echo $count; ?>">
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
                                                                        <h4><?php echo date('d M Y', strtotime($key)); ?>
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
                                                                    <div class="col-sm-8 col-lg-9 pr-0">
                                                                        <button
                                                                            class="btn btn-outline-info btn-disabled btn-block"
                                                                            disabled><?php echo $uni_dtl_t_start_time; ?>
                                                                            -
                                                                            <?php echo $uni_dtl_t_end_time; ?>
                                                                            WIB</button>
                                                                    </div>
                                                                    <div class="col-sm-4 col-lg-3">
                                                                        <button
                                                                            class="btn btn-primary btn-block btn-book-consul"
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
                                                    } else {
                                                    ?>
                                                        <div class="row">
                                                            <div class="col" style="color: black;">
                                                                Hello this consultation is closed because full booked.
                                                                <a href="javascript:void(0)"
                                                                    data-uniid="<?php echo $uniInfo['uni_id']; ?>"
                                                                    class="notify-me">Notify Me</a>
                                                            </div>
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
    </script>