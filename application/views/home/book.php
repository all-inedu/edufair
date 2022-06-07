<style>
    .checkbok {
        clip: rect(0, 0, 0, 0);
        position: absolute;
    }

    .textarea-red {
        border-radius: 0 !important;
        border: 2px solid #dedede;
    }

    .btn-submit-uni {
        background: #F1D202;
        color: #255896;
    }

    .btn-submit-uni:hover {
        color: #F1D202;
        background: #255896;
    }

    .tombol {
        width: 100% !important
    }

    .items-collection {
        /* margin: 20px 0 0 0; */
        margin: 0 0 20px 0;
    }

    .items-collection label.btn-default.active {
        background-color: #007ba7;
        color: #FFF;
    }

    .items-collection label.btn-default {
        width: 90%;
        border: 1px solid #305891;
        margin: 5px;
        border-radius: 17px;
    }

    .items-collection label.btn-default {
        width: 90%;
        border: 1px solid #305891;
        margin: 5px;
        border-radius: 17px;
        color: #305891;
    }

    /* .text-booking-uni{
    color : #0D3C9C;
    font-size: 1.6em;
    text-align: justify
} */

    .btn-booking-uni {
        width: 90%;
        border: 2px solid #dedede;
        margin: 5px;
        font-weight: 100 !important;
        font-size: 1.3em;
        border-radius: 0;
        padding: 15px 0 20px 0;
        color: #255896;
    }

    .btn-booking-uni.active {
        background: #255896;
        color: #FFFFFF !important;
    }

    .btn-booking-uni:hover {
        background: #255896;
        color: #FFFFFF !important;
    }

    .items-collection label .itemcontent {
        width: 100%;
    }

    .items-collection .btn-group {
        width: 90%
    }

    .items-collection label .itemcontent {
        width: 100%;
    }

    .items-collection .btn-group {
        width: 90%
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

    .btn-book-uni {
        background: #F1D202;
        border-radius: 0 !important;
        letter-spacing: 0.8px;
        color: #0D3C9C;
        font-size: 16px;
        font-family: 'Apercu-Medium';
        padding: 8px;
        text-align: center;
        border: 1px solid #F1D202;

    }

    .btn-book-uni:hover {
        background: #fff;
        border: 1px solid #F1D202;
    }

    #booking {
        height: auto;
        padding: 2% 6%;
    }

    .btn-book-uni:hover {
        background: #ed912f;
    }

    #booking {
        height: auto;
        /* padding: 5% 10% 2% 6%; */
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

    .uni-book-header-desc {
        color: #235788;
        font-size: 1.6em;
    }

    .region-of-origin {
        color: #0D2F7F;
        font-weight: 700;
    }

    .uni-book-header-desc {
        color: #343A40;
    }

    .region-of-origin {
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
if (!$this->session->has_userdata('user_id')) {
    $props = "data-target='#signUp' data-toggle='modal'";
} else {
    $props = "";
}
?>


<!-- Modal -->
<div class="modal fade" id="uni-story" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title-desc-blue" id="exampleModalLabel">Description</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-title-desc">

            </div>
        </div>
    </div>
</div>

<div class="container-fluid pb-4" id="booking">
    <div class="pb-4">
        <!-- <div class="talks-header" id="talks">
            <div class="row px-md-1 px-2">
                <div class="col-lg-9 col-sm-12 text-left mt-md-0 mt-3 pl-0">
                    <h2>UNIVERSITY LIST</h2>
                    <h5>You have a chance to book a personal consultation and join talks with
                            the universities listed below!
                            Book your schedule and come prepared to ask questions for the university representative about
                            admissions.
                        </h5>
                </div>
            </div>
        </div> -->
        <div class="row pb-5">
            <div class="col-lg-8 col-sm-12 text-left px-md-3 px-0">
                <h2>UNIVERSITY LIST</h2>
                <h5 class="uni-book-header-desc">You have a chance to book a personal consultation and join talks with
                    the universities listed below!
                    Book your schedule and come prepared to ask questions for the university representative about
                    admissions.
                </h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-md-4 px-0">
                <h5 class="region-of-origin">Region of origin:</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-12 text-left px-md-3 px-0">
                <?php
                foreach ($uniCountry as $key => $val) {
                ?>
                    <div class="dropdown show d-inline">
                        <button class="btn btn-sm mx-1 dropdown-toggle edufair-uni-region" data-toggle="dropdown">
                            <?php echo $key; ?>
                        </button>
                        <!-- <div class="dropdown-menu" id="dropdown-country"> -->
                        <!-- <a class="dropdown-item" data-country="<?php echo $key; ?>" href="#booking"><?php echo $key; ?></a> -->
                        <?php
                        if (count($val['uni_detail']) > 0) {
                        ?>
                            <div class="dropdown-menu" id="dropdown-country">
                                <?php
                                foreach ($val['uni_detail'] as $row) {
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
                <div class="mt-3 px-md-2 px-0 box-book">
                    <div class="row my-0" id="consult-container">
                        <?php
                        $i = 0;
                        $count = 1;
                        foreach ($uniData as $uniInfo) {
                            if (($uniInfo['uni_id'] == 21) OR ($uniInfo['uni_id'] == 65) OR ($uniInfo['uni_id'] == 66) ) {
                                continue;
                            }
                            $no_image = base_url() . 'assets/uni/banner/default.jpg';
                            // print("<pre>".print_r($uniInfo, true)."</pre>");exit;
                        ?>
                            <!-- <div class="col-md-6 mb-2 d-flex align-items-stretch" -->
                            <div class="col-md-4 mb-2 align-items-stretch" id="uni-<?php echo $uniInfo['uni_id']; ?>">
                                <div class="card">
                                    <!-- <div class="inst-unilist" data-container="body" data-toggle="modal"
                                    data-content="<?php echo $uniInfo['uni_description']; ?>" data-target="#uni-story"
                                    style="cursor: pointer">
                                    <img src="<?php echo base_url(); ?>assets/home/information-13.png" alt="">
                                </div> -->

                                    <!-- <div style="border: 3px solid #cfcfcf;position: absolute;z-index: 1;right:0;padding:.5em 1.5em;font-weight: bold;margin:2em; color: #CFCFCF; letter-spacing: .2em;transform: rotate(20deg);top: 20px">FULLY BOOKED</div> -->
                                    <div style="max-width:100%;">
                                        <img src="<?php echo base_url() . "assets/uni/banner/" . $uniInfo['uni_photo_banner']; ?>" onerror="this.onerror=null;this.src='<?= $no_image ?>';" alt="" width="100%">
                                    </div>

                                    <!-- <div class="card-body pl-4 p-1">
                                    <h4 class="m-0 pt-2 pb-2 font-weight-bold"
                                        style="color: #3d3d3d; letter-spacing:0.8px;">
                                        <?php echo strtoupper($uniInfo['uni_name']); ?></h4> 
                                </div> -->
                                    <div class="mt-2">
                                        <div class="col-md-12 bg-white">
                                            <div class="row">
                                                <?php
                                                $count_unidtl = [];
                                                foreach ($uniInfo['uni_detail'] as $dtl) {
                                                    if (($dtl['uni_dtl_id'] != "")) {
                                                        $count_unidtl[] = $dtl['uni_dtl_id'];
                                                    }
                                                }

                                                //if((count($count_unidtl)>0) and ($uniInfo['uni_topic_reg'] == "REGISTERED")) { 
                                                ?>
                                                <?php /*} else*/ if ((count($count_unidtl) > 0) /*and ($uniInfo['uni_topic_reg'] != "REGISTERED")*/) { ?>
                                                    <div class="col-6 p-0 pr-2">
                                                        <div class="btn btn-book-uni btn-block" style="cursor: pointer" data-toggle="modal" data-target="#modal-<?= $uniInfo['uni_id']; ?>">
                                                            Book Now
                                                        </div>
                                                    </div>
                                                    <div class="col-6 p-0">
                                                        <div class="desc-uni btn-outline-primary btn-block btn-tellme btn-topic" data-container="body" data-toggle="modal" data-content="<?php echo str_replace('"', "'", $uniInfo['uni_description']); ?>" data-target="#uni-story" style="cursor: pointer">
                                                            Tell Me More
                                                        </div>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="col-md-6 p-0">
                                                        <div class="desc-uni btn-outline-primary mb-1 btn-tellme btn-topic" data-container="body" data-toggle="modal" data-content="<?php echo str_replace('"', "'", $uniInfo['uni_description']); ?>" data-target="#uni-story" style="cursor: pointer">
                                                            Tell Me More
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                                <div class="modal fade" tabindex="-1" role="dialog" id="modal-<?= $uniInfo['uni_id']; ?>">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <?php
                                                            if ($uniInfo['uni_status_fullbooked'] == "NOT_FULL") {
                                                            ?>
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            <div class="modal-body">
                                                                <h5 class="pl-3 modal-title title-booking-blue">When will you be free?</h5>
                                                                <p class="pl-3" style="color: #235788; font-size: 18px;">Set your time!</p>
                                                                <?php
                                                                // check if uni status fullbook is not full
                                                                if ($uniInfo['uni_status_fullbooked'] == "NOT_FULL") {
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
                                                                                                foreach ($uniInfo['uni_detail'] as $key => $row) {
                                                                                                    $uni_dtl_id = $row['uni_dtl_id'];
                                                                                                    $assigned_time  = $row['uni_dtl_start_date'];
                                                                                                    $start = explode(" ", $assigned_time);
                                                                                                    $start_time = substr($start[1], 0, 5);

                                                                                                    $completed_time  = $row['uni_dtl_end_date'];
                                                                                                    $end = explode(" ", $completed_time);
                                                                                                    $end_time = substr($end[1], 0, 5);

                                                                                                    $d1 = new DateTime($assigned_time);
                                                                                                    $d2 = new DateTime($completed_time);

                                                                                                    $interval = $d2->diff($d1);
                                                                                                    $time = $interval->format('%H');
                                                                                                    $disabled = "";
                                                                                                ?>
                                                                                                    <div class="items w-50">
                                                                                                        <div class="info-block block-info clearfix">
                                                                                                            <div data-toggle="buttons" class="btn-group bizmoduleselect tombol">
                                                                                                                <label class="btn btn-booking-uni">
                                                                                                                    <div class="itemcontent">
                                                                                                                        <!-- <input type="text" value="<?php echo $uni_dtl_id ?>"> -->
                                                                                                                        <input type="hidden" class="sel-value-<?=$uni_dtl_id?>" name="var_id_value[]" value="<?php echo (array_search($uni_dtl_id, array_column($bookingConsult, 'uni_dtl_id')) !== false) ? $uni_dtl_id : null; ?>">
                                                                                                                        <input class="checkbok booking-red" type="checkbox" name="var_id[]" autocomplete="off" value="<?php echo $uni_dtl_id; ?>" <?php echo (array_search($uni_dtl_id, array_column($bookingConsult, 'uni_dtl_id')) !== false) ? "checked disabled" : ""; ?>>
                                                                                                                        <!-- <span class="fa fa-calendar fa-2x"></span> -->
                                                                                                                        <div class="text-booking-uni" style="text-align: center;padding-top: 0.5rem">
                                                                                                                            <?php echo date('d F Y', strtotime($assigned_time)); ?><br>
                                                                                                                            <small><?php echo $start_time.' - '.$end_time;?> WIB</small>
                                                                                                                        </div>
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
                                                                                    <div class="form-group px-1 pt-3">
                                                                                        <label for="exampleInputEmail1" class="mb-0" style="color: #235788">Question for
                                                                                            the
                                                                                            University</label>
                                                                                        <textarea type="text" class="form-control textarea-red" aria-describedby="emailHelp" placeholder="Drop your question(s) for the university representatives (not mandatory):" name="question" rows="5"></textarea>
                                                                                    </div>
                                                                                    <input type="hidden" name="uni_id" value="<?= $uniInfo['uni_id']; ?>">
                                                                                    <div class="text-right mx-1">
                                                                                        <button type="submit" class="btn btn-submit-uni">Submit</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
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