<style>
.img-topic {
    cursor: pointer;
}
</style>
<section class="container-fluid" id="talks-section">
    <?php if ($talk_day1 != "" ) {?>
    <div class="p-4 mb-4 day1talks">
        <div class="card-columns " style="padding-top: 1em">
            <?php
        foreach($talk_day1 as $row) {
            $topic_start_date = new DateTime($row['topic_start_date']);
            $topic_id = $row['topic_id'];
            $topic_name = $row['topic_name'];
            $arrTopic = array(
                    "topic_id"   => $topic_id,
                    "topic_name" => $topic_name,
                    "topic_date" => $topic_start_date
                );
            $arrTopic = base64_encode(json_encode($arrTopic));
            ?>
            <div class="card card-topic">
                <div class="card-body">
                    <img src="<?=base_url('assets/topic/'.$row['topic_banner']);?>" class="img-topic" width="100%">
                    <div class="row px-2 pt-2 no-gutters talk-button">
                        <div class="col-11">
                            <small><?php echo $topic_start_date->format('M, dS Y - H:i') ?></small>
                            <h6 class="font-weight-bold"><?php echo $topic_name; ?></h6>
                            <?php
                        foreach($row['uni_detail'] as $uniDetail){
                        ?>
                            <span class="badge badge-warning"><?php echo $uniDetail['uni_name']; ?></span>
                            <?php
                        }
                        ?>
                        </div>
                        <div class="col-1 pl-3 align-self-end">
                            <i class="fas fa-arrow-down"></i>
                        </div>
                    </div>
                    <div class="hidden px-2">
                        <hr class="m-0 my-2">
                        <p><?php echo $row['topic_desc']; ?></p>
                        <?php
                    if(!$this->session->has_userdata('user_id')){
                        $props = "href='#signUp' data-toggle='modal'";
                    } else {
                        $props = "id='bookTopic'";
                    }
                    ?>

                        <?php
                    if(!in_array($topic_id, $bookingTopic)) {
                        ?>
                        <a class="nav-link btn btn-sm btn-block btn-outline-primary mb-1 btn-book"
                            data-topicid="<?php echo $topic_id; ?>" data-topicinfo="<?php echo $arrTopic; ?>"
                            <?php echo $props; ?>>Join Now</a>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
            <?php 
        }
        ?>
        </div>
    </div>
    <?php } if ($talk_day2 != "" ) {?>
    <div class="p-4 day2talks" style="margin-top: 5em">
        <div class="card-columns" style="padding-top: 1em">
            <?php
        foreach($talk_day2 as $row) {
            $topic_start_date = new DateTime($row['topic_start_date']);
            $topic_id = $row['topic_id'];
            $topic_name = $row['topic_name'];
            $arrTopic = array(
                    "topic_id"   => $topic_id,
                    "topic_name" => $topic_name,
                    "topic_date" => $topic_start_date
                );
            $arrTopic = base64_encode(json_encode($arrTopic));
        ?>
            <div class="card card-topic">
                <div class="card-body">
                    <img src="<?=base_url('assets/topic/'.$row['topic_banner']);?>" class="img-topic" width="100%">
                    <div class="row px-2 pt-2 no-gutters talk-button">
                        <div class="col-11">
                            <small><?php echo $topic_start_date->format('M, dS Y - H:i') ?></small>
                            <h6 class="font-weight-bold"><?php echo $topic_name; ?></h6>
                            <?php
                        foreach($row['uni_detail'] as $uniDetail){
                        ?>
                            <span class="badge badge-warning"><?php echo $uniDetail['uni_name']; ?></span>
                            <?php
                        }
                        ?>
                        </div>
                        <div class="col-1 pl-3 align-self-end">
                            <i class="fas fa-arrow-down"></i>
                        </div>
                    </div>
                    <div class="hidden px-2">
                        <hr class="m-0 my-2">
                        <p><?php echo $row['topic_desc']; ?></p>
                        <?php
                    if(!$this->session->has_userdata('user_id')){
                        $props = "href='#signUp' data-toggle='modal'";
                    } else {
                        $props = "id='bookTopic'";
                    }
                    ?>
                        <a class="nav-link btn btn-sm btn-block btn-outline-primary mb-1 btn-book"
                            data-topicid="<?php echo $topic_id; ?>" data-topicinfo="<?php echo $arrTopic; ?>"
                            <?php echo $props; ?>>Join Now</a>
                    </div>
                </div>
            </div>
            <?php 
        }
        ?>
        </div>
        <!-- <div class="row mt-3">
    <div class="col-md-12 text-center">
        <button class="btn btn-circle btn-outline-primary px-5">Join Now</button>
    </div>
</div> -->

        <?php }?>
</section>


<script>
$(".hidden").hide()

$(".img-topic").click(function() {
    $(this).next(".talk-button").next(".hidden").toggle("slow")
});

$(function() {
    $('.talk-button').hover(function() {
        $(this).children(".col-1").addClass('animate__animated animate__headShake text-primary');
    }, function() {
        $(this).children(".col-1").removeClass('animate__animated animate__headShake text-primary');
    });
});

$(".talk-button").click(function() {
    $(this).next(".hidden").toggle("slow");
});

$(".btn-book").each(function() {
    $(this).click(function() {
        var topicId = $(this).data('topicid');

        $.ajax({
            url: "<?php echo base_url(); ?>home/book/topic",
            type: "POST",
            data: {
                topic_id: topicId
            },
            success: function(msg) {
                if (msg == "001") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Yay, your booking is successful!<br>Check the dashboard for your agenda'
                    });
                } else if (msg == "07") { // utk sekarang tidak akan muncul notif ini
                    Swal.fire({
                        icon: 'info',
                        title: 'You already booked the topic'
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
    });
});
</script>