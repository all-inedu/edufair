<style>
    .img-box {
        width: 100%;
        height: auto;
        overflow: hidden;
    }

    .img-box img {
        /* margin: -75px 0 0 0; */
    }

    .img-topic {
        cursor: pointer;
        width: 100%;
    }

    .badge-allin {
        background: #F43636;
        font-weight: 200;
        scroll-margin-top: 350px;
        font-size: 14px;
        padding: 5px 8px;
        letter-spacing: 1px;
    }

    h4 {
        font-size: 22px;
        letter-spacing: 0.8px;
    }

    .btn-book {
        letter-spacing: 0.8px;
        font-size: 18px;
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
            height: auto;
            overflow: hidden;
        }

        .badge-allin {
            font-size: 12px;
            margin-bottom: 3px;
            text-align: left;
            white-space: normal;
        }

        .day1talks,
        .day2talks {
            padding: 25px 10px !important;
        }
    }
</style>
<section id="talks-section">
    <?php if ($talk_day1 != "") { ?>
        <div class="p-4 mb-4 day1talks eventpre">
            <div class="row" style="padding-top: 1em">
                <?php
                foreach ($talk_day1 as $row) {
                    $topic_start_date = new DateTime($row['topic_start_date']);
                    $topic_end_date = new DateTime($row['topic_end_date']);
                    $topic_id = $row['topic_id'];
                    $topic_name = $row['topic_name'];
                    $arrTopic = array(
                        "topic_id"   => $topic_id,
                        "topic_name" => $topic_name,
                        "topic_date" => $topic_start_date
                    );
                    $arrTopic = base64_encode(json_encode($arrTopic));
                ?>
                    <div class="col-md-6 mb-3 d-flex align-items-stretch">
                        <div class="card bg-white shadow">
                            <div class="card-body">
                                <div class="img-box">
                                    <img src="<?= base_url('assets/topic/' . $row['topic_banner']); ?>" class="img-topic">
                                </div>
                                <div class="row px-2 pt-2 no-gutters talk-button">
                                    <div class="col-11">
                                        <p class="m-0 tanggal">
                                            <?= $topic_start_date->format('M, dS Y (H:i') ?> -
                                            <?= $topic_end_date->format('H:i') ?> WIB)
                                        </p>
                                        <h4 class="font-weight-bold text-dark"><?php echo $topic_name; ?></h4>
                                        <?php
                                        foreach ($row['uni_detail'] as $uniDetail) {
                                        ?>
                                            <span class="badge badge-allin text-white mb-1" id="topic-<?= $uniDetail['uni_id']; ?>"><?php echo $uniDetail['uni_name']; ?>
                                            </span>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="px-2">
                                    <hr class="m-0 my-2">
                                    <?php
                                    if (!$this->session->has_userdata('user_id')) {
                                        $props = "data-target='#signUp' data-toggle='modal'";
                                    } else {
                                        $props = "id='bookTopic'";
                                    }
                                    ?>
                                    <div class="col-md-12 p-0">
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <?php
                                                if (!in_array($topic_id, $bookingTopic)) {
                                                ?>
                                                    <div class="nav-link btn btn-sm btn-outline-primary d-inline mb-1 btn-book btn-<?= $topic_id; ?>" data-topicid="<?php echo $topic_id; ?>" data-topicinfo="<?php echo $arrTopic; ?>" <?php echo $props; ?>>
                                                        JOIN NOW
                                                        <div class="float-right mr-2">
                                                            <i class="fas fa-arrow-alt-circle-right"></i>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                <div div class=" desc-topic nav-link btn btn-sm btn-outline-primary d-inline ml-2 mb-1 btn-tellme" data-container="body" data-toggle="modal" data-content="<?php echo $row['topic_desc']; ?>" data-target="#uni-story">
                                                    Tell Me More
                                                    <!-- <div class="float-right mr-2">
                                                <i class="fas fa-arrow-alt-circle-right"></i>
                                            </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php }

    if ($talk_day2 != "") { ?>
        <div class="p-4 day2talks eventpre" style="margin-top: 5em">
            <div class="row" style="padding-top: 1em">
                <?php
                foreach ($talk_day2 as $row) {
                    $topic_start_date = new DateTime($row['topic_start_date']);
                    $topic_end_date = new DateTime($row['topic_end_date']);
                    $topic_id = $row['topic_id'];
                    $topic_name = $row['topic_name'];
                    $arrTopic = array(
                        "topic_id"   => $topic_id,
                        "topic_name" => $topic_name,
                        "topic_date" => $topic_start_date
                    );
                    $arrTopic = base64_encode(json_encode($arrTopic));
                ?>
                    <div class="col-md-6 mb-3 d-flex align-items-stretch">
                        <div class="">
                            <div class="card-body bg-white shadow">
                                <div class="img-box">
                                    <img src="<?= base_url('assets/topic/' . $row['topic_banner']); ?>" class="img-topic">
                                </div>
                                <div class="row px-2 pt-2 no-gutters talk-button">
                                    <div class="col-11">
                                        <p class="m-0 tanggal">
                                            <?= $topic_start_date->format('M, dS Y (H:i') ?> -
                                            <?= $topic_end_date->format('H:i') ?> WIB)
                                        </p>
                                        <h4 class="deskripsi"><?php echo $topic_name; ?></h4>
                                        <?php
                                        foreach ($row['uni_detail'] as $uniDetail) {
                                        ?>
                                            <span class="badge badge-allin text-white mb-1" id="topic-<?= $uniDetail['uni_id']; ?>"><?php echo $uniDetail['uni_name']; ?></span>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="px-2">
                                    <?php
                                    if (!$this->session->has_userdata('user_id')) {
                                        $props = "data-target='#signUp' data-toggle='modal'";
                                    } else {
                                        $props = "id='bookTopic'";
                                    }
                                    ?>
                                    <div class="col-md-12 p-0">
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <?php
                                                if (!in_array($topic_id, $bookingTopic)) {
                                                ?>
                                                    <div class="nav-link btn btn-sm btn-outline-primary d-inline mb-1 btn-book btn-<?= $topic_id; ?>" data-topicid="<?php echo $topic_id; ?>" data-topicinfo="<?php echo $arrTopic; ?>" <?php echo $props; ?>>
                                                        Join Now
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                                <div class=" desc-topic nav-link btn btn-sm btn-outline-primary d-inline ml-2 mb-1 btn-tellme" data-container="body" data-toggle="modal" data-content="<?php echo $row['topic_desc']; ?>" data-target="#uni-story">
                                                    Tell Me More

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- Modal -->
    <div class="modal fade" id="uni-story" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
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
</section>


<script>
    $(".desc-topic").each(function() {
        $(this).click(function() {
            var uni_story = $(this).data('content');
            // alert(uni_story);
            $("#uni-story .modal-body").html(uni_story);
        });
    });


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

            var data_param = $(this).data('param');
            if (data_param == "personal-test") {
                $("#join-link").prop('href', "<?php echo base_url(); ?>registration?param=" + data_param);
            } else {
                $("#join-link").prop('href', "<?php echo base_url(); ?>registration");
            }

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
                            html: 'You have successfully booked this university talk. <br> We’ll remind you by email before the event.<br><br>Check the dashboard for your agenda.',
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