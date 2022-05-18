
<script>
    $(document).ready(function(){
    <?php
    if ($this->session->flashdata('sukses')) {
    ?>
     
    const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })

    Toast.fire({
    icon: 'error',
    title: '<?=$this->session->flashdata('sukses');?>'
    })
    <?php
    }
    ?>});
</script>
</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
    integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?=base_url('assets/js/alert.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.flipTimer.js');?>"></script>
<script src="//unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
$(function() {
    $('[data-toggle="popover"]').popover({
        trigger: 'hover'
    })
})
$(window).on('load', function() {
    // $(".loading").fadeOut("slow");
    $("body").css({
        "overflow": "auto"
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(e) {
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
});

$(document).scroll(function() {
    var $nav = $(".navbar");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
})

$(".navigate-page-1").on('click', function() {
    $("div[data-page='2']").hide("slide", {
        direction: "right"
    }, 350, function() {
        $("div[data-page='1']").show("slide", {
            direction: "left"
        }, 350);
    });
});

$(".navigate-page-2").on('click', function() {
    $("div[data-page='1']").hide("slide", {
        direction: "left"
    }, 350, function() {
        $("div[data-page='2']").show("slide", {
            direction: "right"
        }, 350);
    });
});

$(".btn-book-consul").each(function() {
    $(this).click(function() {
        var user_id = "<?php echo $this->session->userdata('user_id'); ?>";
        if ((user_id == "")) {
            var parent = $(this).closest(".modal").attr('id');
            $("#" + parent + " .close").click(); // close booking consult modal
            $("#btn-signup").click(); // show login modal

            return;
        }

        var uniid = $(this).data('uniid');
        var startTime = $(this).data('starttime');
        var endTime = $(this).data('endtime');
        var unidtltimeid = $(this).data('unidtltimeid');
        var splitTime = startTime.split(" ");
        var show_startDate = splitTime[0];
        var show_startTime = splitTime[1];

        var showDate = new Date(show_startDate);
        var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
            [showDate.getMonth()];
        var str_showDate = showDate.getDate() + " " + month + " " + showDate.getFullYear();

        swal.fire({
            icon: 'question',
            title: 'You\'re about to book a consultation on <br><b>' + str_showDate +
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
                        uniid: uniid,
                        startTime: startTime,
                        endTime: endTime,
                        unidtltimeid: unidtltimeid
                    },
                    success: function(msg) {
                        // console.log(msg);
                        if (msg == "001") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Yay, your booking is successful!',
                                html: 'We’ll remind you by email before the event.<br>Check the dashboard for your agenda.',
                                confirmButtonText: 'OK',
                            }).then((result) => {
                                $('.btn-' + unidtltimeid).html("Booked")
                                $('.btn-' + unidtltimeid).prop(
                                    "disabled",
                                    true)
                            });
                        } else if (msg == "05") {
                            Swal.fire({
                                icon: 'error',
                                title: 'You have booked at this university!',
                                html: 'Check the dashboard for your agenda.'
                            });
                        } else if (msg == "06") {
                            Swal.fire({
                                icon: 'error',
                                title: 'You have booked at another university at the same time',
                                text: 'Check the dashboard for your agenda.'
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


$("#forgot-password").click(function(e) {
    e.preventDefault();
    $("#signUp .close").click();
    $("#forgotPass").modal('toggle');
});

function forgotPassword() {
    Swal.showLoading();

    var fpEmail = $("#fp_email").val();
    $.ajax({
        url: "<?php echo base_url(); ?>forgot-password",
        type: "post",
        data: {
            fpEmail: fpEmail
        },
        success: function(msg) {
            if (msg) {
                Swal.fire({
                    icon: 'success',
                    title: 'Please Check Your Email',
                    text: 'We already sent you an Email'
                });
                window.location = "<?php echo base_url(); ?>";
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again.'
                });
            }
        }
    })
}

$("#loginForm").submit(function(event) {
    event.preventDefault();

    Swal.showLoading();

    $.ajax({
        url: "<?php echo base_url(); ?>login",
        type: "POST",
        data: $("#loginForm").serialize(),
        success: function(msg) {

            if (msg == "001") {
                location.reload();
            } else if (msg == "02") {
                Swal.fire({
                    icon: 'info',
                    title: 'Hello there,',
                    html: 'Check your email to verify your account.<br> <small>If you are not receiving the verification link, you can resend it <a href="#resend-verification-link" onclick="resendVerificationLink()">here</a></small>',
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Your username/email or password is incorrect!'
                });
            }
        }
    });
});

function resendVerificationLink()
{
    $.ajax({
        url: "<?php echo base_url(); ?>resend/verification-link",
        type: "POST",
        success: function(msg) {
            msg = JSON.parse(msg);
            
            if (msg.code == "001") {
                Swal.fire('We\'ve sent verification link to your email.\n Please check your inbox.', '', 'success');
            } else {
                Swal.fire('Something went wrong. Please try again or contact the administrator', '', 'info');
            }
        }
    });
}
</script>
<script>
$("#change-information").click(function() {
    // $("#view-form").hide();
    $("#edit-form").show();
});

$("#personal-information-form").submit(function(event) {
    event.preventDefault();

    if ($("#personal-information-form")[0].checkValidity() === false) {
        event.stopPropagation();
    } else {
        Swal.showLoading();

        $.ajax({
            url: "<?php echo base_url(); ?>home/dashboard/update/information",
            type: 'post',
            data: $("#personal-information-form").serialize(),
            success: function(msg) {
                if (msg == "001") {
                    location.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! Please try again.'
                    });
                }
            }
        })
    }
});
</script>
<script>
$(".join-link").each(function() {
    $(this).click(function() {
        var link = $(this).data('link');
        window.location = link;
    });
});

$(".cancel-booking-topic").each(function() {
    $(this).click(function() {
        //tambah konfirmasi
        swal.fire({
            icon: 'question',
            title: 'Cancel this talk session?',
            text: 'If you cancel, you can book this university talk again anytime.',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Yes!',
            cancelButtonText: 'No!'
        }).then((result) => {
            if (result.isConfirmed) {

                var topicId = $(this).data('topic');

                $.ajax({
                    url: "<?php echo base_url(); ?>/home/cancel/topic",
                    type: "post",
                    data: {
                        topicId: topicId
                    },
                    success: function(msg) {
                        if (msg == 1) {
                            Swal.fire({
                                icon: 'success',
                                title: 'You have canceled this session.',
                                text: 'We hope to see you in the other university talks!'
                            });
                            location.reload();
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
        })
    });
});

$(".cancel-booking-consult").each(function() {
    $(this).click(function() {
        swal.fire({
            icon: 'question',
            title: 'Cancel this consultation?',
            text: 'If this time slot is booked by another user, you have to choose other time slots for a reschedule.',
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: '<i class="fa fa-thumbs-up"></i> Yes!',
            cancelButtonText: 'No!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.showLoading();
                var consultationId = $(this).data('consultation');

                $.ajax({
                    url: "<?php echo base_url(); ?>/home/cancel/consult",
                    type: "post",
                    data: {
                        consultationId: consultationId
                    },
                    success: function(msg) {
                        if (msg == 1) {
                            Swal.fire({
                                icon: 'success',
                                title: 'You have canceled this consultation.'
                            });
                            location.reload();
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
        })
    });
});

$(".btn-save-profile").click(function() {
    $("#btn-edit-profile").click();
});

$(".notify-me").each(function() {
    $(this).click(function() {
        var uniId = $(this).data('uniid');
        $.ajax({
            url: "<?php echo base_url(); ?>home/waiting-list",
            type: "post",
            data: {
                uniId: uniId
            },
            success: function(msg) {
                // console.log(msg);
                if (msg == "01") {
                    Swal.fire({
                        icon: 'info',
                        title: 'Spot Secured!',
                        html: 'Thank you for registering! <br> We`ll notify the date and time soon.'
                    });
                } else if (msg == "02") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Done!',
                        html: 'Thank you for registering! <br> We`ll notify the date and time soon.'
                    });
                } else if (msg == "04") {
                    $("#signUp").modal("show")
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong! Please try again.'
                    });
                }
                $('#modal-' + uniId).modal('hide');
            }
        });
    });
});
</script>
<script>
function highlight(uni_id, e) {
    // var uniContainer = $("#uni-" + uni_id + " .card").offset().top;
    // var parentContainer = $(".box-book").offset().top;

    // var distance = uniContainer - parentContainer;

    var elmnt = document.getElementById("uni-" + uni_id)
    elmnt.scrollIntoView({
        behavior: 'smooth',
        block: 'center'
    });

    $(".card").css({
        "border": "5px solid transparent"
    });

    $("#uni-" + uni_id + " .card").css({
        "border": "5px solid #27387A"
    });


    // $(".box-book").scrollTop(distance);

}

$(document).ready(function() {

    var url_string = window.location.href; //window.location.href
    var url = new URL(url_string);
    var section = url.searchParams.get("section");
    if (section == "talks") {
        $("html, body").animate({
            scrollTop: $("#talks").offset().top
        }, 800);
    } else if (section == "booking") {
        $("html, body").animate({
            scrollTop: $("#booking").offset().top
        }, 800);
    }

    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;
            var topPos = $(hash).offset().top;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: topPos
            }, 800, function() {

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });
});
</script>

</html>