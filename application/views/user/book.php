<style>
body {
    background-image: url("<?php echo base_url(); ?>assets/img/home/header-bg.webp");
    background-size: 100%;
    background-attachment: fixed;
}

.btn-book {
    border-radius: 0 !important
}

.card {
    border: 3px solid #fff;
}

.card:hover {
    border: 3px solid #39A5DC;
}
</style>
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

<div class="container mt-5 p-3 shadow" style="background:#efefef; border:1px solid #dedede; border-radius:10px;">
    <div class="row px-3">
        <div class="col-md-12 text-center mt-3 px-5">
            <p>
            <h5>
                Gain accurate information by booking a 1-on-1 consultation with the universities. <br>
                If you skip, you can join later.

            </h5>
            </p>
            <hr>
        </div>
        <?php
                        $i = 0;
                        $count = 1;
                        foreach($uniData as $uniInfo) {
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
                <img src="<?php echo base_url()."assets/uni/banner/".$uniInfo['uni_photo_banner']; ?>" alt=""
                    width="100%">
                <div class="card-body pl-4 p-1">
                    <h4 class="m-0 pt-2 pb-2" style="color: #000">
                        <?php echo strtoupper($uniInfo['uni_name']); ?></h4>
                </div>

                <div class="card-footer btn-book">
                    <div class="row no-gutters">
                        <div class="col book-consultation-container" style="cursor: pointer" data-toggle="modal"
                            data-target="#modal-<?=$uniInfo['uni_id'];?>">
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

                        <div class="modal fade" tabindex="-1" role="dialog" id="modal-<?=$uniInfo['uni_id'];?>">
                            <div class="modal-dialog <?=$card;?> modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <?php
                                                if($uniInfo['uni_status_fullbooked'] == "NOT_FULL") {
                                                ?>
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="color: #000">Time</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                    <div class="col text-center pt-4 pb-4" style="color: #000">
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
                                                    <div class="col-sm-8 col-lg-8 pr-0">
                                                        <button class="btn btn-outline-info btn-disabled btn-block"
                                                            disabled><?php echo $uni_dtl_t_start_time; ?>
                                                            -
                                                            <?php echo $uni_dtl_t_end_time; ?>
                                                            WIB</button>
                                                    </div>
                                                    <div class="col-sm-4 col-lg-4">
                                                        <button
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
                                                    } else {
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
    <div class="form-group mt-3">
        <div class="row">
            <div class="col-12">
                <hr>
                <div class="text-center">
                    <div class="row">
                        <div class="col text-left ml-3">

                        </div>
                        <div class="col text-right mr-3">
                            <a href="<?php echo base_url(); ?>">
                                <button type="button" class="btn btn-primary navigate-page-3">Join Later<i
                                        class="fas fa-paper-plane pl-2"></i></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
<script>
$(".btn-book-consul").each(function() {
    $(this).click(function() {
        var startTime = $(this).data('starttime');
        var endTime = $(this).data('endtime');
        var uniId = $(this).data('uniid');

        var splitTime = startTime.split(" ");
        var show_startDate = splitTime[0];
        var show_startTime = splitTime[1];

        var showDate = new Date(show_startDate);
        var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
            [showDate.getMonth()];
        var str_showDate = showDate.getDate() + " " + month + " " + showDate.getFullYear();

        swal.fire({
            icon: 'question',
            title: 'Are you sure to book a consultation on <br><b>' + str_showDate +
                '</b> at <b> ' + show_startTime.substr(0, 5) + ' </b> ?',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Yes!',
            cancelButtonText: 'Wait!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url(); ?>registration/consult/booking',
                    type: 'post',
                    data: {
                        startTime: startTime,
                        endTime: endTime,
                        uniId: uniId
                    },
                    success: function(msg) {
                        if (msg == "001") {
                            Swal.fire({
                                icon: 'success',
                                title: 'You have successfully booked the schedule',
                                text: 'We\'ll remind you before the event'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong! Please try again.'
                            });
                        }
                    }
                });
            }
        });
    });
});
</script>