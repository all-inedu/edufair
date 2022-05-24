<style>
.img-box {
    width: 100%;
    height: auto;
    border-radius: 10px;
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
        border-radius: 10px;
        overflow: hidden;
    }

    .badge-allin {
        font-size: 12px;
        margin-bottom: 3px;
        text-align: left;
        white-space: normal;
    }
    .preedu,
    .day1talks,
    .day2talks {
        padding: 25px 10px !important;
    }
}
</style>
<section id="talks-section">
    <div class="talks-header" id="talks">
        <div class="row">
            <div class="col-md-12">
                <div class="col-lg-5 col-sm-12 text-left pt-5 mt-4">
                    <h2>Talks</h2>
                    <h5>Have a conversation directly with the university representative about these trending topics
                        concerning
                        study
                        abroad and get information to support your university preparation strategy.</h5>
                </div>
            </div>
        </div>
    </div>
    <?php 
    if ($pre_event != "" ) {
        ?>
        <div class="eventpre p-4 mb-4 preevent">
            <div class="row" style="padding-top: 1em">
                <?php
                foreach($pre_event as $row) {
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
                                    <img src="<?=base_url('assets/topic/'.$row['topic_banner']);?>" class="img-topic">
                                </div>
                                <div class="row px-2 pt-2 no-gutters talk-button">
                                    <div class="col-11">
                                        <p class="m-0 tanggal">
                                            <?=$topic_start_date->format('M, dS Y (H:i') ?> -
                                            <?=$topic_end_date->format('H:i') ?> WIB)
                                        </p>
                                        <h4 class="deskripsi"><?php echo $topic_name; ?></h4>
                                        <?php
                                        foreach($row['uni_detail'] as $uniDetail){
                                            ?>
                                            <span class="badge badge-allin text-white mb-1"
                                                id="topic-<?=$uniDetail['uni_id'];?>"><?php echo $uniDetail['uni_name']; ?>
                                            </span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="px-2">
                                    <!-- <h5><?php echo $row['topic_desc']; ?></h5> -->
                                    <?php
                                    if(!$this->session->has_userdata('user_id')){
                                        $props = "data-target='#signUp' data-param='personal-test' data-toggle='modal'";
                                    } else {
                                        $props = "id='bookTopic'";
                                    }
                                    ?>
                                    <div class="col-md-12 p-0">
                                        <div class="row">
                                            <div class="col-md-12 mt-3">
                                                <?php
                                                if(!in_array($topic_id, $bookingTopic)) {
                                                    ?>
                                                    <div class="nav-link btn btn-sm btn-outline-primary d-inline mb-1 btn-book btn-<?=$topic_id;?>"
                                                        data-topicid="<?php echo $topic_id; ?>" data-topicinfo="<?php echo $arrTopic;?>"
                                                        <?php echo $props; ?>>
                                                        Join Now
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <div class=" desc-topic nav-link btn btn-sm btn-outline-primary d-inline ml-2 mb-1 btn-tellme" data-container="body" data-toggle="modal"
                                                    data-content="<?php echo $row['topic_desc']; ?>" data-target="#uni-story">
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
        <?php 
    }
    ?>
    <!-- Modal -->
    <div class="modal fade" id="uni-story" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
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
</script>