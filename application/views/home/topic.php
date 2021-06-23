<style>
.img-box {
    width: 100%;
    height: 300px;
    border-radius: 10px;
    overflow: hidden;
}

.img-box img {
    margin: -75px 0 0 0;
}

.img-topic {
    cursor: pointer;
    width: 100%;
}

.badge-allin {
    background: #0D2F7F;
    font-weight: 200;
    scroll-margin-top: 350px;
    font-size: 14px;
    padding: 5px 8px;
    letter-spacing: 1px;
}

h4 {
    letter-spacing: 0.8px;
}

@media screen and (max-width: 576px) and (min-width: 375px) {
    h4 {
        font-size: 18px;
    }

    h5 {
        font-size: 15px;
    }

    .img-box {
        width: 100%;
        height: 200px;
        border-radius: 10px;
        overflow: hidden;
    }

    .badge-allin {
        font-size: 12px;
        margin-bottom: 3px;
        text-align: left;
        white-space: normal;
    }
}
</style>
<section class="container-fluid" id="talks-section">
    <?php if ($talk_day1 != "" ) {?>
    <div class="p-4 mb-4 day1talks">
        <div class="row" style="padding-top: 1em">
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
            <div class="col-md-6 mb-3">
                <div class="card card-topic shadow">
                    <div class="card-body">
                        <div class="img-box">
                            <img src="<?=base_url('assets/topic/'.$row['topic_banner']);?>" class="img-topic">
                        </div>
                        <div class="row px-2 pt-2 no-gutters talk-button">
                            <div class="col-11">
                                <p class="m-0"><?php echo $topic_start_date->format('M, dS Y - H:i') ?></p>
                                <h4 class="font-weight-bold text-dark"><?php echo $topic_name; ?></h4>
                                <?php
                        foreach($row['uni_detail'] as $uniDetail){
                        ?>
                                <span class="badge badge-allin text-white"
                                    id="topic-<?=$uniDetail['uni_id'];?>"><?php echo $uniDetail['uni_name']; ?></span>
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
                            <h5><?php echo $row['topic_desc']; ?></h5>
                            <?php
                    if(!$this->session->has_userdata('user_id')){
                        $props = "data-target='#signUp' data-toggle='modal'";
                    } else {
                        $props = "id='bookTopic'";
                    }

                    if(!in_array($topic_id, $bookingTopic)) {
                        ?>
                            <a class="nav-link btn btn-sm btn-block btn-outline-primary mb-1 btn-book btn-<?=$topic_id;?>"
                                data-topicid="<?php echo $topic_id; ?>" data-topicinfo="<?php echo $arrTopic;?>"
                                <?php echo $props; ?>>Join Now</a>
                            <?php
                    }
                    ?>
                        </div>
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
        <div class="row" style="padding-top: 1em">
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
            <div class="col-md-6 mb-3">
                <div class="card card-topic">
                    <div class="card-body">
                        <div class="img-box">
                            <img src="<?=base_url('assets/topic/'.$row['topic_banner']);?>" class="img-topic">
                        </div>
                        <div class="row px-2 pt-2 no-gutters talk-button">
                            <div class="col-11">
                                <p class="m-0"><?php echo $topic_start_date->format('M, dS Y - H:i') ?></p>
                                <h4 class="font-weight-bold text-dark"><?php echo $topic_name; ?></h4>
                                <?php
                        foreach($row['uni_detail'] as $uniDetail){
                        ?>
                                <span class="badge badge-allin text-white"
                                    id="topic-<?=$uniDetail['uni_id'];?>"><?php echo $uniDetail['uni_name']; ?></span>
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
                            <h5><?php echo $row['topic_desc']; ?></h5>
                            <?php
                    if(!$this->session->has_userdata('user_id')){
                        $props = "data-target='#signUp' data-toggle='modal'";
                    } else {
                        $props = "id='bookTopic'";
                    }

                    if(!in_array($topic_id, $bookingTopic)) {
                        ?>

                            <a class="nav-link btn btn-sm btn-block btn-outline-primary mb-1 btn-book btn-<?=$topic_id;?>"
                                data-topicid="<?php echo $topic_id; ?>" data-topicinfo="<?php echo $arrTopic; ?>"
                                <?php echo $props; ?>>Join Now</a>
                            <?php } ?>
                        </div>
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

$(".img-box").click(function() {
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
                        title: 'You’re on!',
                        html: 'You have successfully booked this university talk. <br> We’ll remind you before the event.',
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        $('.btn-' + topicId).prop('hidden', true);
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