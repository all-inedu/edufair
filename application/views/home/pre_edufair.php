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
    background: #0D2F7F;
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
<section class="container-fluid" id="talks-section">
    <div class="p-4 mb-4 preedu">
        <div class="row" style="padding-top: 1em">
            <div class="col-md-12 mb-3 d-flex align-items-stretch">
                    <div class="card-body">
                        <div class="img-box">
                            <img src="assets/topic/CHOOSE_THE_RIGHT_MAJOR_LS1.png" class="img-topic">
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
// $(".hidden").hide()

// $(".img-box").click(function() {
//     $(this).next(".talk-button").next(".hidden").toggle("slow")
// });

// $(function() {
//     $('.talk-button').hover(function() {
//         $(this).children(".col-1").addClass('animate__animated animate__headShake text-primary');
//     }, function() {
//         $(this).children(".col-1").removeClass('animate__animated animate__headShake text-primary');
//     });
// });

// $(".talk-button").click(function() {
//     $(this).next(".hidden").toggle("slow");
// });

// $(".btn-book").each(function() {
//     $(this).click(function() {
//         var topicId = $(this).data('topicid');
//         $.ajax({
//             url: "<?php echo base_url(); ?>home/book/topic",
//             type: "POST",
//             data: {
//                 topic_id: topicId
//             },
//             success: function(msg) {
//                 if (msg == "001") {
//                     Swal.fire({
//                         icon: 'success',
//                         title: 'You’re on!',
//                         html: 'You have successfully booked this university talk. <br> We’ll remind you by email before the event.<br><br>Check the dashboard for your agenda.',
//                         confirmButtonText: 'OK',
//                     }).then((result) => {
//                         $('.btn-' + topicId).prop('hidden', true);
//                     });
//                 } else {
//                     Swal.fire({
//                         icon: 'error',
//                         title: 'Oops...',
//                         text: 'Something went wrong! Please try again.'
//                     });
//                 }
//             }
//         });
//     });
// });
</script>