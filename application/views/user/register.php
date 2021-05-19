	<div class="container-fluid">
	    <div class="container">
	        <div class="col-xl-6 offset-xl-3 allin-registration shadow"
	            style="margin-top:7vh;background:#efefef; border:1px solid #dedede">
	            <h3 class="text-center">Registration</h3>
	            <hr>
	            <form method="get" id="registerForm" novalidate class="needs-validation">
	                <div class="row">
	                    <div class="col" data-page="1">
	                        <div class="row">
	                            <div class="col-6">
	                                <div class="form-group">
	                                    <label>First Name</label>
	                                    <input name="user_first_name" type="text" class="form-control form-control-sm"
	                                        placeholder="Mikhael" required>
	                                </div>
	                            </div>
	                            <div class="col-6">
	                                <div class="form-group">
	                                    <label>Last Name</label>
	                                    <input name="user_last_name" type="text" class="form-control form-control-sm"
	                                        placeholder="Jackdad" required>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="row">
	                            <div class="col-6">
	                                <div class="form-group">
	                                    <label>Email address</label>
	                                    <input type="email" class="form-control form-control-sm" name="user_email"
	                                        placeholder="xxxxx@xxxx.com" required>
	                                </div>
	                            </div>
	                            <div class="col-6">
	                                <div class="form-group">
	                                    <label>Password</label>
	                                    <input type="password" class="form-control form-control-sm" name="user_password"
	                                        minlength="8" required>
	                                    <div class="invalid-feedback">
	                                        Minimum 8 characters.
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Phone Number</label>
	                            <input type="text" class="form-control form-control-sm" placeholder="08xx xxxx"
	                                name="user_phone" required>
	                        </div>
	                        <div class="form-group">
	                            <label>You are a:</label>
	                            <div class="form-control border-0">
	                                <div class="form-check form-check-inline">
	                                    <input class="form-check-input input-status" type="radio" name="user_gender"
	                                        value="male" checked>
	                                    <label class="form-check-label">Male</label>
	                                </div>
	                                <div class="form-check form-check-inline">
	                                    <input class="form-check-input input-status" type="radio" name="user_gender"
	                                        value="female">
	                                    <label class="form-check-label">Female</label>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>You came here as:</label>
	                            <div class="form-control border-0">
	                                <div class="form-check form-check-inline">
	                                    <input class="form-check-input input-status" type="radio" name="user_status"
	                                        value="parent">
	                                    <label class="form-check-label">Parent</label>
	                                </div>
	                                <div class="form-check form-check-inline">
	                                    <input class="form-check-input input-status" type="radio" name="user_status"
	                                        value="student" checked>
	                                    <label class="form-check-label">Student</label>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Is this your first time attending ALL-in event?</label>
	                            <div class="form-control border-0">
	                                <div class="form-check form-check-inline">
	                                    <input class="form-check-input" type="radio" name="user_first_time" value="yes"
	                                        checked>
	                                    <label class="form-check-label">Yes</label>
	                                </div>
	                                <div class="form-check form-check-inline">
	                                    <input class="form-check-input" type="radio" name="user_first_time" value="no">
	                                    <label class="form-check-label">No</label>
	                                </div>
	                            </div>
	                        </div>
	                        <hr>
	                        <div class="form-group text-right">
	                            <button type="button" class="btn btn-primary navigate navigate-page-2">Next <i
	                                    class="fas fa-arrow-right pl-2"></i></button>
	                        </div>
	                    </div>
	                    <div class="col" data-page="2" style="display: none">
	                        <div class="form-group">
	                            <label>What grade are you in?</label>
	                            <input type="number" class="form-control form-control-sm" name="user_grade" placeholder=""
	                                onchange="limit(this)" required />
	                        </div>
	                        <div class="form-group">
	                            <label>What school are you going to graduate from?</label>
	                            <select id="userSchool" onchange="checkValue('userSchool')" required
	                                oninvalid="validation('userSchool')">
	                                <option data-placeholder="true"></option>
	                                <option value="other">Other</option>
	                            </select>
	                            <input type="text" class="form-control form-control-sm mt-1" id="userSchoolNew">
	                            <input type="hidden" value="" name="user_school" id="user_school">
	                        </div>
	                        <div class="form-group">
	                            <label>Where's your country destination to study abroad?</label>
	                            <select id="userDestination" onchange="checkValue('userDestination')" multiple required
	                                oninvalid="validation('userDestination')">
	                                <option data-placeholder="true"></option>
	                            </select>
	                            <input type="hidden" value="" name="user_destination" id="user_destination">
	                        </div>
	                        <div class="form-group">
	                            <label>What's your intended major in university?</label>
	                            <select id="userMajor" onchange="checkValue('userMajor')" multiple required
	                                oninvalid="validation('userMajor')">
	                                <option data-placeholder="true"></option>
	                                <option value="other">Other</option>
	                            </select>
	                            <input type="text" class="form-control form-control-sm mt-1" name="user_major_other"
	                                id="userMajorNew">
	                            <input type="hidden" value="" name="user_major" id="user_major">
	                        </div>
	                        <div class="form-group">
	                            <label>I know this Edufair from</label>
	                            <select id="userLead" onchange="checkValue('userLead')" required
	                                oninvalid="validation('userLead')">
	                                <option data-placeholder="true"></option>
	                            </select>
	                            <input type="text" class="form-control form-control-sm mt-1" id="userLeadNew">
	                            <input type="hidden" value="" name="user_lead" id="user_lead">
	                        </div>
	                        <hr>
	                        <div class="form-group">
	                            <div class="row">
	                                <div class="col-xl-6 text-left"><button type="button"
	                                        class="btn btn-primary navigate-page-1"><i class="fas fa-arrow-left pr-2"></i>
	                                        Back</button></div>
	                                <div class="col-xl-6 text-right"><button type="submit"
	                                        class="btn btn-success navigate-page-3 btn-register">Submit <i
	                                            class="fas fa-paper-plane pl-2"></i></button></div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </form>
	        </div>
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
    placeholder: 'Select school name',
})

new SlimSelect({
    select: '#userDestination',
    allowDeselect: true,
    placeholder: 'Select destination'
})

new SlimSelect({
    select: '#userMajor',
    allowDeselect: true,
    placeholder: 'Select major'
})

new SlimSelect({
    select: '#userLead',
    allowDeselect: true,
    placeholder: 'Select lead'
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
        url: "https://www.bigdata.crm-allinedu.com/api/lead",
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
            if ($('#userLead').val() == 'Others') {
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






    // major 
    // if ($('#userMajor').val() == 'other') {
    //     $('#userMajorNew').show();
    //     $('#userMajorNew').focus();
    // } else {
    //     $('#userMajorNew').hide();
    // }


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
        if ($("#registerForm")[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
            Swal.showLoading();

            $.ajax({
                url: "<?php echo base_url(); ?>registration/submit",
                type: "POST",
                data: $("#registerForm").serialize(),
                success: function(msg) {
                    if (msg == "001") {
                        window.location.href =
                            "<?php echo base_url(); ?>registration/topic";
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


    // $("#registerForm").ajaxSubmit({
    // 	url: "<?php echo base_url(); ?>registration/submit",
    // 	type: 'POST',
    // 	data: $("#registerForm").serialize(),
    // 	success: function(msg){
    // 		alert(msg);return;
    // 		if(msg == "001") {
    // 			// window.location.href = "<?php echo base_url(); ?>registration/topic";
    // 		} else {
    // 			Swal.fire({
    // 				icon: 'error',
    // 				title: 'Oops...',
    // 				text: 'Something went wrong! Please try again.'
    // 			});
    // 		}
    // 	}
    // })
});

function validation(param) {
    switch (param) {
        case "userSchool":
            $("#userSchool").siblings(".ss-main").has(".ss-single-selected").css({
                "border": "1px solid #dc3545",
                "border-radius": ".2rem"
            });
            break;
        case "userDestination":
            $("#userDestination").siblings(".ss-main").has(".ss-multi-selected").css({
                "border": "1px solid #dc3545",
                "border-radius": ".2rem"
            });
            break;
        case "userMajor":
            $("#userMajor").siblings(".ss-main").has(".ss-multi-selected").css({
                "border": "1px solid #dc3545",
                "border-radius": ".2rem"
            });
            break;
        case "userLead":
            $("#userLead").siblings(".ss-main").has(".ss-single-selected").css({
                "border": "1px solid #dc3545",
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
	</script>