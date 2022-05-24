<style>
.img-box {
    width: 100%;
    height: auto;
    border-radius: 0 !important;
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
    border-radius: 0 !important;
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
        border-radius: 0 !important;
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
        <div class="row px-md-1 px-2">
            <div class="col-lg-9 col-sm-12 text-left mt-md-0 mt-3 pl-0">
                <h2>MAIN STAGE SESSIONS</h2>
                <h5>Have a conversation directly with the university representative about these trending topics
                    concerning
                    study
                    abroad and get information to support your university preparation strategy.</h5>
            </div>
        </div>
    </div>


    <!-- PRE-EVENTS  -->
    <div class="eventpre px-md-4 preevent mt-4 mb-4">
        <div class="row px-0 pt-2">
            <div class="col-md-6 mb-3 p-md-3 p-0">
                <div class="card">
                    <div class="card-body bg-white p-1">
                        <div class="img-box">
                            <img src="https://picsum.photos/400/200" class="img-topic">
                        </div>
                        <div class="row px-0 pt-2 no-gutters talk-button">
                            <div class="col-12">
                                <p class="m-0 tanggal">
                                    10:00 AM WIB | 16 July 2022
                                </p>
                                <h4 class="deskripsi">PRE EDUFAIR</h4>
                                <span class="badge badge-allin text-white mb-1">ALL-in Eduspace</span>
                                </span>
                            </div>
                        </div>
                        <div class="px-0">
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class="nav-link btn btn-sm btn-outline-primary d-inline mb-1 mr-2 btn-book">
                                        Join Now
                                    </div>
                                    <div class=" desc-topic nav-link btn btn-sm btn-outline-primary d-inline mb-1 btn-tellme"
                                        data-container="body" data-toggle="modal">
                                        Tell Me More
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="uni-story" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content shadow">
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