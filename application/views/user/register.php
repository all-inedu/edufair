<style>
body {
    background-image: url("<?php echo base_url(); ?>assets/img/home/header-bg.webp");
    background-size: 100%;
    background-attachment: fixed;
}
</style>

<div class="container mb-5">
    <div class="col-xl-6 offset-xl-3 allin-registration shadow" style="background: #FFF">
        <h3 class="text-center" style="letter-spacing: 0.2em;margin-bottom: 1em;">REGISTRATION</h3>
        <hr>
        <form method="get" id="registerForm" novalidate class="needs-validation">
            <div class="row mt-4">
                <div class="col" data-page="1">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input name="user_fullname" type="text"
                                    class="form-control form-control-sm custom-box" placeholder="John Doe" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" class="form-control form-control-sm custom-box" name="user_email"
                                    placeholder="xxxxx@xxxx.com" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" class="form-control form-control-sm custom-box"
                                    placeholder="08xx xxxx xxxx" name="user_phone" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input id="user_password" type="password"
                                    class="form-control form-control-sm custom-box" name="user_password" minlength="8"
                                    required placeholder="Min. 8 Characters">
                                <div class="float-right px-2 btn-password" style="margin-top:-30px; cursor:pointer;">
                                    <i class="fas fa-eye-slash"></i>
                                </div>
                                <div class="invalid-feedback">
                                    Minimum 8 characters.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input id="confirm_user_password" type="password"
                                    class="form-control form-control-sm custom-box" name="confirm_user_password"
                                    minlength="8" required placeholder="Min. 8 Characters">
                                <div class="float-right px-2 btn-confirm-password"
                                    style="margin-top:-30px; cursor:pointer;">
                                    <i class="fas fa-eye-slash"></i>
                                </div>
                                <small id="confirmFeedback" class="text-danger" hidden>
                                    Sorry, your password doesn't match
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>You are a:</label>
                                <div class="form-control custom-box radio border-0">
                                    <div class="form-check form-check-inline">
                                        <input id="male" class="form-check-input input-status" type="radio"
                                            name="user_gender" value="male" checked>
                                        <label for="male" class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="female" class="form-check-input input-status" type="radio"
                                            name="user_gender" value="female">
                                        <label for="female" class="form-check-label">Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date of Birth:</label>
                                <input type="date" name="user_dateofbirth" class="form-control custom-box" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="form-group">
                                <label>You came here as:</label>
                                <div class="form-control custom-box radio border-0">
                                    <div class="form-check">
                                        <input id="parent" class="form-check-input input-status" type="radio"
                                            name="user_status" value="Parent">
                                        <label for="parent" class="form-check-label">Parent</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="student" class="form-check-input input-status" type="radio"
                                            name="user_status" value="Student" checked>
                                        <label for="student" class="form-check-label">Student</label>
                                    </div>
                                    <div class="form-check">
                                        <input id="teacher" class="form-check-input input-status" type="radio"
                                            name="user_status" value="Teacher/Consellor">
                                        <label for="teacher" class="form-check-label">Teacher/Consellor</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Is this your first time attending ALL-in event?</label>
                                <div class="form-control custom-box radio border-0">
                                    <div class="form-check form-check-inline">
                                        <input id="ft_yes" class="form-check-input" type="radio" name="user_first_time"
                                            value="yes" checked>
                                        <label for="ft_yes" class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="ft_no" class="form-check-input" type="radio" name="user_first_time"
                                            value="no">
                                        <label for="ft_no" class="form-check-label">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group float-left">
                        <a href="<?=base_url();?>" class="btn btn-warning"><i class="fas fa-arrow-left pr-2"> </i>
                            Back
                            to
                            Home</a>
                    </div>
                    <div class="form-group float-right">
                        <button type="button" class="btn btn-primary navigate navigate-page-2">Next <i
                                class="fas fa-arrow-right pl-2"></i></button>
                    </div>
                </div>
                <div class="col" data-page="2" style="display: none">
                    <div class="form-group form-change grade">
                        <label>What grade are you in?</label>
                        <!-- <input type="number" class="form-control form-control-sm custom-box" name="user_grade" placeholder=""
	                                onchange="limit(this)" required /> -->
                        <select class="form-control form-control-sm custom-box" name="user_grade" required
                            id="userGrade" style="font-size: 1rem">
                            <option value="" disabled selected>Your answer</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>

                    </div>
                    <div class="form-group form-change school">
                        <label>What school are you going to graduate from?</label>
                        <select name="school_option" id="userSchool" onchange="checkValue('userSchool')" required
                            oninvalid="validation('userSchool')">
                            <option data-placeholder="true"></option>
                            <option value="other">Other</option>
                        </select>
                        <input type="text" class="form-control form-control-sm mt-1" id="userSchoolNew">
                        <input type="hidden" value="" name="user_school" id="user_school">
                        <small class="form-text text-muted">Choose other if there are not your schools</small>
                    </div>
                    <div class="form-group form-change destination">
                        <label>Where's your country destination to study abroad?</label>
                        <select id="userDestination" onchange="checkValue('userDestination')" multiple required
                            oninvalid="validation('userDestination')">
                            <option data-placeholder="true"></option>
                        </select>
                        <small class="form-text text-muted">You can choose more than one</small>
                        <input type="hidden" value="" name="user_destination" id="user_destination">
                    </div>
                    <div class="form-group form-group-major form-change major">
                        <label>What's your intended major in university?</label>
                        <select id="userMajor" onchange="checkValue('userMajor')" multiple required
                            oninvalid="validation('userMajor')">
                            <option data-placeholder="true"></option>
                            <option value="other">Other</option>
                        </select>
                        <small class="form-text text-muted">You can choose more than one and Choose other if there
                            are not your intended major</small>
                        <input type="text" class="form-control form-control-sm mt-1 custom-box" name="user_major_other"
                            id="userMajorNew">
                        <input type="hidden" value="" name="user_major" id="user_major">
                    </div>
                    <div class="form-group">
                        <label>I know this Edufair from</label>
                        <select id="userLead" onchange="checkValue('userLead')" required
                            oninvalid="validation('userLead')" class="custom-box">
                            <option data-placeholder="true"></option>
                            <option value="other">Other</option>
                        </select>
                        <input type="text" class="form-control form-control-sm mt-1 custom-box" id="userLeadNew">
                        <input type="hidden" value="" name="user_lead" id="user_lead">
                    </div>
                    <div class="form-group  form-challenge">
                        <label>Whats your biggest challenge in prepping for university?</label>
                        <textarea class="form-control custom-box" name="user_biggest_challenge"
                            placeholder="Your answer" required></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="float-left"><button type="button" class="btn btn-primary navigate-page-1"><i
                                    class="fas fa-arrow-left pr-2"></i>
                                Back</button></div>
                        <div class="float-right"><button type="submit"
                                class="btn btn-success navigate-page-3 btn-register">Submit <i
                                    class="fas fa-paper-plane pl-2"></i></button></div>
                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
new SlimSelect({
    select: '#userSchool',
    allowDeselect: true,
    placeholder: 'Your answer',
})

new SlimSelect({
    select: '#userDestination',
    allowDeselect: true,
    placeholder: 'Your answer'
})

new SlimSelect({
    select: '#userMajor',
    allowDeselect: true,
    placeholder: 'Your answer'
})

new SlimSelect({
    select: '#userLead',
    allowDeselect: true,
    placeholder: 'Your answer'
})

$(document).ready(function() {
    $('#userSchoolNew').hide();
    $('#userMajorNew').hide();
    $('#userLeadNew').hide();

    // school 
    $.ajax({
        type: 'post',
        dataType: "json",
        url: "https://www.bigdata.crm-allinedu.com/api/school",
        success: function(datas) {
            $.each(datas, function(index, data) {
                $('#userSchool').append(
                    '<option value="' +
                    data.sch_name +
                    '">' +
                    data.sch_name +
                    '</option>'
                )
            });
        }
    });

    // country 
    $.ajax({
        type: 'post',
        dataType: "json",
        url: "https://www.bigdata.crm-allinedu.com/api/countries",
        success: function(datas) {
            $.each(datas, function(index, data) {
                $('#userDestination').append(
                    '<option value="' + data + '">' + data + '</option>'
                )
            });
        }
    });

    // major 
    $.ajax({
        type: 'post',
        dataType: "json",
        url: "https://www.bigdata.crm-allinedu.com/api/major",
        success: function(datas) {
            $.each(datas, function(index, data) {
                $('#userMajor').append(
                    '<option value="' + data + '">' + data + '</option>'
                )
            });
        }
    });

    // lead 
    $.ajax({
        type: 'post',
        dataType: "json",
        url: "<?php echo base_url(); ?>request/getAllDataLead",
        success: function(datas) {
            $.each(datas, function(index, data) {
                $('#userLead').append(
                    '<option value="' + data.lead_name + '">' + data.lead_name +
                    '</option>'
                )
            });
        }
    });

});

$("#confirm_user_password").change(function() {
    var psw = $("#user_password").val()
    var pswConfirm = $(this).val()
    if (psw != pswConfirm) {
        $(this).removeClass("is-valid");
        $(this).addClass("is-invalid");
        $("#confirmFeedback").removeAttr("hidden")
    } else {
        $(this).removeClass("is-invalid");
        $(this).addClass("is-valid");
        $("#confirmFeedback").prop("hidden", true)
    }
})

function checkValue(param) {
    switch (param) {
        case "userSchool":
            // school 
            if ($('#userSchool').val() == 'other') {
                $('#userSchoolNew').show();
                $("#userSchoolNew").focus();
                $("#userSchoolNew").prop('required', true);
            } else {
                $('#userSchoolNew').hide();
                $("#userSchoolNew").prop('required', false);
            }

            var is_filled = $("#userSchool").siblings(".ss-main").has('.ss-single-selected').has('.placeholder').html();
            if (is_filled) {
                $("#userSchool").siblings(".ss-main").has(".ss-single-selected").css({
                    "border": "1px solid #28a745",
                    "border-radius": ".2rem"
                }); //filled
            }
            break;
        case "userDestination":
            var is_filled = $("#userDestination").siblings(".ss-main").has('.ss-multi-selected').has('.ss-values').has(
                '.ss-value');
            if (is_filled) {
                $("#userDestination").siblings(".ss-main").has(".ss-multi-selected").css({
                    "border": "1px solid #28a745",
                    "border-radius": ".2rem"
                });
            }
            break;
        case "userMajor":
            // major
            var is_filled = $("#userMajor").siblings(".ss-main").has('.ss-multi-selected').has('.ss-values').has(
                '.ss-value');
            if (is_filled) {
                $("#userMajor").siblings(".ss-main").has(".ss-multi-selected").css({
                    "border": "1px solid #28a745",
                    "border-radius": ".2rem"
                });
            }
            break;
        case "userLead":
            // lead 
            if ($('#userLead').val() == 'other') {
                $('#userLeadNew').show();
                $('#userLeadNew').focus();
                $('#userLeadNew').prop('required', true);
            } else {
                $('#userLeadNew').hide();
                $('#userLeadNew').prop('required', false);
            }
            var is_filled = $("#userLead").siblings(".ss-main").has('.ss-single-selected').has('.placeholder').html();
            if (is_filled) {
                $("#userLead").siblings(".ss-main").has(".ss-single-selected").css({
                    "border": "1px solid #28a745",
                    "border-radius": ".2rem"
                });
            }
            break;


    }
}

//****** set user_school to hidden input start ********//
$("#userSchoolNew").keyup(function() {
    $("#user_school").val($(this).val());
});

$("#userSchool").change(function() {
    var val = $(this).val();
    $("#user_school").val(val);
});
//****** set user_school to hidden input end ********//
//****** set user_major to hidden input start ********//
$("#userMajor").change(function() {
    var val = $(this).val();
    if (val.includes("other")) {
        $('#userMajorNew').show();
        $('#userMajorNew').focus();
        $("#userMajorNew").prop('required', true);
    } else {
        $("#userMajorNew").hide();
        $("#userMajorNew").prop('required', false);
    }
    $("#user_major").val(val);
});
//****** set user_major to hidden input end ********//
//****** set user_lead to hidden input start ********//
$("#userLeadNew").keyup(function() {
    $("#user_lead").val($(this).val());
});

$("#userLead").change(function() {
    var val = $(this).val();
    $("#user_lead").val(val);
});
//****** set user_lead to hidden input end ********//
$("#userDestination").change(function() {
    var val = $(this).val();
    $("#user_destination").val(val);
});

function limit() {

}

$(document).ready(function() {
    $("#registerForm").submit(function(event) {
        event.preventDefault();
        var fullname = $("input[name=user_fullname]").val();
        var email = $("input[name=user_email]").val();
        var password = $("input[name=user_password]").val();
        var phone = $("input[name=user_phone]").val();
        var gender = $("input[name=user_gender]").val();
        var dateofbirth = $("input[name=user_dateofbirth]").val();
        var status = $("input[name=user_status]").val();
        var first_time = $("input[name=user_first_time]").val();
        // var grade = $("select[name=user_grade]").val();
        // var school = $("input[name=user_school]").val();
        // var destination = $("input[name=user_destination]").val();
        // var major = $("input[name=user_major]").val();
        // var lead = $("input[name=user_lead]").val();
        // var biggest = $("input[name=biggest-challenge]").val();

        if ((fullname == "") || (email == "") || (password == "") || (password
                .length < 8) || (phone ==
                "") || (gender == "") || (dateofbirth == "")) {
            $(".navigate-page-1").trigger("click");
            return;
        }
        //  else if ((grade == "") || (school == "") || (destination == "") || (major == "") || (lead ==
        //         "")) {
        //     // alert(grade + " and " + school + " and " + destination + " and " + major + " and " + lead);
        //     $(".navigate-page-2").trigger("click");
        //     return;
        // }



        if ($("#registerForm")[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
            Swal.showLoading();

            $.ajax({
                url: "<?php echo base_url(); ?>registration/submit",
                type: "POST",
                data: $("#registerForm").serialize(),
                success: function(msg) {
                    msg = JSON.parse(msg);

                    if (msg.code == "001") {
                        Swal.fire({
                            title: 'Welcome to ALL-in Edufair',
                            html: "Please verify your email to continue <br>" +
                                "Verification link will expired in 24 hours ",
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Dismiss'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "<?php echo base_url(); ?>";
                            }
                        });
                    } else if (msg.code == "09") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Your email address has been used'
                        });
                        $(".navigate-page-1").trigger("click");
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

    $("input[name=user_status]").click(function() {
        var val = $(this).val();
        if (val == "Parent") {
            $(".form-group-major").show();
            $("#userMajor").prop('required', true);

            $(".form-change.grade").show();
            $("#userGrade").prop('required', true);

            $(".form-change.grade label").html("What grade is your child in?");
            $(".form-change.school label").html("What school is he/she going to graduate from?");
            $(".form-change.destination label").html(
                "In what country does he/she want to study abroad? <br> (can choose more than 1)");
            $(".form-change.major label").html(
                "What is your child's intended major in university? <br> (can choose more than 1)");
            $(".form-challenge label").html(
                "What is your biggest challenge in helping your children preparing for university?"
            );


        } else if (val == "Teacher/Consellor") {
            $(".form-group-major").hide();
            $("#userMajor").prop('required', false);

            $(".form-change.grade").hide();
            $("#userGrade").prop('required', false);

            $(".form-change.school label").html("What school are you from?");
            $(".form-change.destination label").html(
                "What country are your students generally interested in studying abroad?");
            $(".form-challenge label").html(
                "What is your biggest challenge in helping your students preparing for university?"
            );

        } else {
            $(".form-group-major").show();
            $("#userMajor").prop('required', true);

            $(".form-change.grade").show();
            $("#userGrade").prop('required', true);

            $(".form-change.grade label").html("What grade are you in?");
            $(".form-change.school label").html("What school are you going to graduate from?");
            $(".form-change.destination label").html(
                "Where's your country destination to study abroad?");
            $(".form-change.major label").html("What's your intended major in university?");
            $(".form-challenge label").html(
                "Whats your biggest challenge in prepping for university?"
            );
        }
    })
});

function validation(param) {
    switch (param) {
        case "userSchool":
            $("#userSchool").siblings(".ss-main").has(".ss-single-selected").css({
                "border-bottom": "1px solid #dc3545",
                "border-radius": ".2rem"
            });
            break;
        case "userDestination":
            $("#userDestination").siblings(".ss-main").has(".ss-multi-selected").css({
                "border-bottom": "1px solid #dc3545",
                "border-radius": ".2rem"
            });
            break;
        case "userMajor":
            $("#userMajor").siblings(".ss-main").has(".ss-multi-selected").css({
                "border-bottom": "1px solid #dc3545",
                "border-radius": ".2rem"
            });
            break;
        case "userLead":
            $("#userLead").siblings(".ss-main").has(".ss-single-selected").css({
                "border-bottom": "1px solid #dc3545",
                "border-radius": ".2rem"
            });
            break;
    }


}

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
})()

$('.btn-password').click(function() {
    var x = document.getElementById('user_password')
    if (x.type === "password") {
        x.type = "text";
        $(this).html('<i class="fas fa-eye"></i>')
    } else {
        x.type = "password";
        $(this).html('<i class="fas fa-eye-slash"></i>')
    }
})

$('.btn-confirm-password').click(function() {
    var x = document.getElementById('confirm_user_password')
    if (x.type === "password") {
        x.type = "text";
        $(this).html('<i class="fas fa-eye"></i>')
    } else {
        x.type = "password";
        $(this).html('<i class="fas fa-eye-slash"></i>')
    }
})
</script>