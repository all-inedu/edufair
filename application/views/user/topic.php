<style>
.topic-card {
    height: 50vh;
    overflow-x: hidden;
    overflow-y: scroll;
    padding: 0 10px;
}

/* Scrollbar styles */
.topic-card::-webkit-scrollbar {
    width: 8px;
    height: 12px;
}

.topic-card::-webkit-scrollbar-track {
    border: 1px solid #498cdd;
    border-radius: 10px;
}

.topic-card::-webkit-scrollbar-thumb {
    background: #498cdd;
    border-radius: 10px;
}

.topic-card::-webkit-scrollbar-thumb:hover {
    background: #2b65a8;
}

@media only screen and (max-width: 600px) {
    .topic-card {
        height: auto;
        margin-bottom: 20px;
    }
}

input[type="checkbox"] {
    display: none;
}

input[type="checkbox"]:checked+label {
    background-color: #fff;
    color: #000;
    border: 3px solid #39A5DC;
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
}

.form-check {
    padding-left: 0rem !important;
}

.form-check label {
    margin-left: -20px;
    margin: 5px;
    width: 100%;
    padding: 10px 10px;
    color: #000;
    text-align: center;
    border: 3px solid #fff;
    background-color: #fff;
    border-radius: 4px;
    /* box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important; */
}

.form-check label:hover {
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
    cursor: pointer;
}

p {
    margin-bottom: 0px;
}
</style>

<div class="container mt-5 p-3 shadow" style="background:#efefef; border:1px solid #dedede; border-radius:10px;">
    <form method="post" novalidate id="form-topic">
        <div class="row">
            <div class="col-md-12 text-center mt-3 px-5">
                <p>
                    Join our University Talks and get trending admission insights based on the selected topics.<br>
                    If you skip, you can join later.
                </p>
                <hr>
            </div>
            <div class="col-sm text-center">
                <h4>Day 1</h4>
                <div class="topic-card">
                    <?php
                $count = 1;
                foreach($topicData_day1 as $topicDay1) {
                    $start_date = explode(" ", $topicDay1['topic_start_date']);
                    $start_time = $start_date[1];

                    $end_date = explode(" ", $topicDay1['topic_end_date']);
                    $end_time = $end_date[1];
                ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="day[1][<?php echo $count; ?>]"
                            value="<?php echo $topicDay1['topic_id']; ?>" id="day1-check-<?php echo $count; ?>">
                        <label class="form-check-label" for="day1-check-<?php echo $count; ?>">
                            <h5 class="m-0 p-2"><?php echo $topicDay1['topic_name']; ?></h5>
                            <small><i class="fas fa-calendar-alt fa-fw"></i> <?php echo substr($start_time, 0, 5); ?> -
                                <?php echo substr($end_time, 0, 5); ?> WIB</small>
                            <hr class="m-0 mx-5 pb-2">
                            <i class="fas fa-university"></i>
                            <p>
                                <?php
                        $uni_name = "";
                        foreach($topicDay1['uni_detail'] as $uniDay1) {
                            $uni_name .= ", ".$uniDay1['uni_name']; 
                        }
                        echo substr($uni_name, 1);
                        ?></p>
                        </label>
                    </div>
                    <?php
                $count++;
                } 
                ?>
                </div>
            </div>
            <div class="col-sm text-center">
                <h4>Day 2</h4>
                <div class="topic-card">
                    <?php
                $count = 1;
                foreach($topicData_day2 as $topicDay2) {
                    $start_date = explode(" ", $topicDay2['topic_start_date']);
                    $start_time = $start_date[1];

                    $end_date = explode(" ", $topicDay2['topic_end_date']);
                    $end_time = $end_date[1];
                ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="day[2][<?php echo $count; ?>]"
                            value="<?php echo $topicDay2['topic_id']; ?>" id="day2-check-<?php echo $count; ?>">
                        <label class="form-check-label" for="day2-check-<?php echo $count; ?>">
                            <h5 class="m-0 p-2"><?php echo $topicDay2['topic_name']; ?></h5>
                            <small><i class="fas fa-calendar-alt fa-fw"></i> <?php echo substr($start_time, 0, 5); ?> -
                                <?php echo substr($end_time, 0, 5); ?> WIB</small>
                            <hr class="m-0 mx-5 pb-2">
                            <i class="fas fa-university"></i>
                            <p>
                                <?php
                        $uni_name = "";
                        foreach($topicDay2['uni_detail'] as $uniDay1) {
                            $uni_name .= ", ".$uniDay1['uni_name']; 
                        }
                        echo substr($uni_name, 1);
                        ?></p>
                        </label>
                    </div>
                    <?php
                $count++;
                } 
                ?>
                </div>
            </div>
        </div>
        <div class="form-group mt-3">
            <div class="row">
                <div class="col-12">
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col text-left ml-3">
                                <a href="<?=base_url('registration/consult/');?>" type="button"
                                    class="btn btn-warning navigate-page-3">Skip <i
                                        class="fas fa-arrow-right pl-2"></i></a>
                            </div>
                            <div class="col text-right mr-3">
                                <button type="submit" class="btn btn-primary navigate-page-3" id="join-now">Join Now <i
                                        class="fas fa-paper-plane pl-2"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
$('.grid').masonry({
    // options
    itemSelector: '.grid-item',
    columnWidth: 200
});
</script>
<script>
$(document).ready(function() {
    $("#form-topic").submit(function(event) {
        event.preventDefault();

        $.ajax({
            url: "<?php echo base_url(); ?>registration/topic/booking",
            type: "POST",
            data: $("#form-topic").serialize(),
            success: function(msg) {
                if (msg == "001") {
                    window.location.href = "<?php echo base_url(); ?>registration/consult";
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! Please try again.'
                    });
                }
            }
        });

    });
});
</script>