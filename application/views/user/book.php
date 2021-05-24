<style>
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

<div class="container mt-5 p-3 shadow" style="background:#efefef; border:1px solid #dedede; border-radius:10px;">
    <div class="row px-3">
        <div class="col-md-12 text-center mt-3 px-5">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe incidunt animi ab ipsa placeat! Cum,
                omnis assumenda. Sequi at rem quod eligendi dolorum eum! Quam ipsa beatae aspernatur eligendi dicta!
            </p>
            <hr>
        </div>
        <?php
        foreach($uniData as $uniInfo) {
        ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo base_url().$uniInfo['uni_photo_banner']; ?>" alt="" height="200">
                    <div class="card-body text-center p-1">
                        <h5 class="m-0 p-2"><?php echo $uniInfo['uni_name']; ?></h5>
                    </div>
                    <div class="row no-gutters">
                        <?php
                            $day = 1;
                        foreach($uniInfo['uni_detail'] as $row) {
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
                            ?>
                            <div class="col">
                                <button class="btn btn-primary btn-block btn-sm btn-book" data-toggle="modal"
                                    data-target="#modal<?php echo $row['uni_dtl_id']; ?>">Day <?php echo $day; //echo $start[0]; ?></button>
                            </div>

                            <?php
                            $disabled = "";
                            if(count($uniInfo['uni_detail']) < 2) {
                                $disabled = "style='background:#c6c6c6 !important;border: 1px solid #c6c6c6 !important'";
                                ?>
                                <div class="col">
                                    <button class="btn btn-success btn-block btn-sm btn-book" data-toggle="modal" <?php echo $disabled; ?>
                                        data-target="#day2">Day 2</button>
                                </div>
                                <?php
                            }
                            ?>

                            <div class="modal" tabindex="-1" role="dialog" id="modal<?php echo $row['uni_dtl_id']; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Time</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            $duration = 15;
                                            $count = 0;
                                            for($i = 1; $i <= ($time*60)/$duration; $i++){
                                                $startTime = strtotime("+".$duration*$count." minutes", strtotime($assigned_time));
                                                $endTime = strtotime("+".$duration*$i." minutes", strtotime($assigned_time));
                                            ?>
                            
                                                <div class="row mb-2">
                                                    <div class="col-9 pr-0">
                                                        <button class="btn btn-outline-info btn-disabled btn-block" disabled><?php echo date('h:i', $startTime); ?> - <?php echo date('h:i', $endTime); ?> WIB</button>
                                                    </div>
                                                    <div class="col-3">
                                                        <button class="btn btn-primary btn-block btn-book-consul" data-uniid="<?php echo $uniInfo['uni_id']; ?>" data-starttime="<?php echo $start[0]." ".date('h:i:s', $startTime); ?>" data-endtime="<?php echo $start[0]." ".date('h:i:s', $endTime); ?>">Book</button>
                                                    </div>
                                                </div>
                                                <!-- <div class="row mb-2">
                                                    <div class="col-9 pr-0">
                                                        <button class="btn btn-dark btn-disabled btn-block" disabled>10:15 - 10:30 WIB</button>
                                                    </div>
                                                    <div class="col-3">
                                                        <button class="btn btn-outline-success btn-block" disabled>Booked</button>
                                                    </div>
                                                </div> -->

                                            <?php
                                            $count++;
                                            }
                                            ?>
                                        </div>
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
            <?php
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
                            <button type="button" class="btn btn-primary navigate-page-3">See More <i
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
            var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"][showDate.getMonth()];
            var str_showDate = showDate.getDate() + " " + month + " " + showDate.getFullYear();

            swal.fire({
                icon: 'question',
                title: 'Are you sure to book a consultation on <br><b>'+str_showDate+'</b> at <b> '+show_startTime.substr(0, 5)+' </b> ?',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Yes!',
                cancelButtonText: 'Wait!'
            }).then((result) => {
                if(result.isConfirmed) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>registration/consult/booking',
                        type: 'post',
                        data: {
                            startTime : startTime,
                            endTime : endTime,
                            uniId : uniId
                        },
                        success: function(msg) {
                            if(msg == "001") {
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


<!-- <?php
$start_time = strtotime("09:00");
$end_time = strtotime("12:00");
$duration = 15;
$diff = $end_time - $start_time;
$jam    =floor($diff / (60 * 60));
$menit    =$jam * 60;
$jumlah_sesi = $menit/$duration;

// starttime & endtime
for($i = 1; $i<=$jumlah_sesi ; $i++){
   $starttime = strtotime("+".$duration*$i-$duration."minutes", $start_time);
   $endtime = strtotime("+".$duration*$i."minutes", $start_time);
   echo date('h:i', $starttime)." - ".date('h:i', $endtime)."<br>";
}
?> -->