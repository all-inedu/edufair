<style>
.card-columns {
    -webkit-column-count: 3 !important;
    -moz-column-count: 3 !important;
    column-count: 3 !important;
}

.card-topic {
    border: 3px solid #dedede;
}

.card-topic:hover {
    border: 3px solid #605c5c;
}

.img-topic {
    display: block;
    width: 100%;
}

.talk-button {
    cursor: pointer;
}

.day1talks, .day2talks {
    border: 1px solid #ffc107;border-radius: 0.5em;
    position: relative;
}

.day1talks::before {
    content: "Day 1";
    border: 2px solid #FFc107;
    border-radius: 1.5em;
    padding: 0.8em 2em;
    position: absolute;
    top: 0;
    margin-top: -1.8em;
    z-index: 2;
    background: #FFF;
}

.day2talks::before {
    content: "Day 2";
    border: 2px solid #FFc107;
    border-radius: 1.5em;
    padding: 0.8em 2em;
    position: absolute;
    top: 0;
    margin-top: -1.8em;
    z-index: 2;
    background: #FFF;
}
</style>

<section style="margin-bottom: 10%;">
<div class="container" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000">
    <div class="row">
        <div class="col-md-7 text-left mt-5 p-5">
            <h2>Talks</h2>
            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio sequi eligendi commodi voluptas sed!
                Aliquid earum id atque possimus, eaque maiores aut esse, quam veniam neque delectus aspernatur.
                Asperiores, fuga.</h5>
        </div>
    </div>
</div>
<div class="container p-4 mb-4 day1talks" id="talks" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000">
    <div class="card-columns" style="padding-top: 1em">
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
                <img src="<?=base_url('assets/img/default.jpeg');?>" class="img-topic">
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
                    <div class="col-1 pl-3 my-auto">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
                <div class="hidden px-2">
                    <hr class="m-0 my-2">
                    <p><?php echo $row['topic_desc']; ?></p>
                    <?php
                    if(!$this->session->has_userdata('user_id')){
                        $props = "href='#signUpModal' data-toggle='modal'";
                    } else {
                        $props = "id='bookTopic'";
                    }
                    ?>

                    <?php
                    if(!in_array($topic_id, $bookingTopic)) {
                        ?>
                        <a class="nav-link btn btn-sm btn-block btn-outline-primary mb-1 btn-book" data-topicid="<?php echo $topic_id; ?>" data-topicinfo="<?php echo $arrTopic; ?>" <?php echo $props; ?> >Join Now</a>
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
<div class="container p-4 mb-4 day2talks" style="margin-top: 5em" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50" data-aos-duration="1000" >
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
                <img src="<?=base_url('assets/img/'.$row['topic_banner']);?>" class="img-topic">
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
                    <div class="col-1 pl-3 my-auto">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
                <div class="hidden px-2">
                    <hr class="m-0 my-2">
                    <p><?php echo $row['topic_desc']; ?></p>
                    <?php
                    if(!$this->session->has_userdata('user_id')){
                        $props = "href='#signUpModal' data-toggle='modal'";
                    } else {
                        $props = "id='bookTopic'";
                    }
                    ?>
                    <a class="nav-link btn btn-sm btn-block btn-outline-primary mb-1 btn-book" data-topicid="<?php echo $topic_id; ?>" data-topicinfo="<?php echo $arrTopic; ?>" <?php echo $props; ?> >Join Now</a>
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
</div>
</section>

<script>
$(".hidden").hide()

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
                topic_id : topicId
            },
            success: function(msg) {
                if (msg == "001") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thank You for your participation'
                    });
                }else if (msg == "07") {
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