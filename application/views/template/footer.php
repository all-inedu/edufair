</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
    integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?=base_url('assets/js/alert.js');?>"></script>
<script src="<?=base_url('assets/js/jquery.flipTimer.js');?>"></script>
<script type="text/javascript">

$(document).ready(function(e) {
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
});

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
        if( (user_id == "") ) {
            var parent = $(this).closest(".modal").attr('id');
            $("#"+parent+" .close").click(); // close booking consult modal
            $("#btn-signup").click(); // show login modal
            
            return;
        }

        var startTime = $(this).data('starttime'); 
        var endTime = $(this).data('endtime');
        var unidtltimeid = $(this).data('unidtltimeid');
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
                        unidtltimeid : unidtltimeid
                    },
                    success: function(msg) {
                        console.log(msg);
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

$("#dropdown-country .dropdown-item").each(function() {
    $(this).click(function() {
        var countryName = $(this).data('country');


        $.ajax({
            url: "<?php echo base_url(); ?>home/findUniByCountry",
            type: "post",
            data : {
                countryName : countryName
            },
            success: function(msg) {
                if(msg != "05") {
                    $(".box-book").html(msg);
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


$("#forgot-password").click(function(e) {
    e.preventDefault();
    $("#signUpModal .close").click();
    $("#forgotPassModal").modal('toggle');

    // $("#signUpModal .modal-title").html("Forgot Password");
    // $("#signUpModal .modal-body").html('<form action="" method="post">'+
    //                 '<div class="form-group">'+
    //                     '<input type="email" id="fp_email" class="form-control" name="fp_email" placeholder="Enter Your Email Address" required="required">'+
    //                 '</div>'+
    //                 '<div class="form-group">'+
    //                     '<button type="button" class="btn btn-primary btn-lg btn-block fp-btn" onclick="forgotPassword()">Send</button>'+
    //                 '</div>'+
    //             '</form>');
    // $("#signUpModal .modal-footer").html("");
});

function forgotPassword() {
    var fpEmail = $("#fp_email").val();
    $.ajax({
        url: "<?php echo base_url(); ?>forgot-password",
        type: "post",
        data: {
            fpEmail : fpEmail
        },
        success: function(msg) {
            if(msg) {
                Swal.fire({
                    icon: 'success',
                    title: 'Please Check Your Email',
                    text: 'We already sent you an Email'
                });
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

function highlight(uni_id) {
    $(".card").css({"border-color" : "#FFF"})

    $("#uni-"+uni_id+" .card").css({
            "border-color" : "yellow"

    });
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
</script>
<script>
    $("#change-information").click(function() {
        $("#view-form").hide();
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
                    if(msg == "001") {
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
                title: 'Are you sure to cancel this talks ?',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Yes!',
                cancelButtonText: 'No!'
            }).then((result) => {
                if(result.isConfirmed) {

                    var topicId = $(this).data('topic');
                    
                    $.ajax({
                        url: "<?php echo base_url(); ?>/home/cancel/topic",
                        type: "post",
                        data: {
                            topicId : topicId
                        },
                        success: function(msg) {
                            if(msg == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'The topic has been canceled'
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
                title: 'Are you sure to cancel this consultation ?',
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: '<i class="fa fa-thumbs-up"></i> Yes!',
                cancelButtonText: 'No!'
            }).then((result) => {
                if(result.isConfirmed) {

                    var consultationId = $(this).data('consultation');
                    
                    $.ajax({
                        url: "<?php echo base_url(); ?>/home/cancel/consult",
                        type: "post",
                        data: {
                            consultationId : consultationId
                        },
                        success: function(msg) {
                            if(msg == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'The Consultation has been canceled'
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
</script>

</html>