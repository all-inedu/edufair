<link href="https://unpkg.com/intro.js/minified/introjs.min.css" rel="stylesheet">
<style>
.introjs-helperLayer { height: 95px !important}
#register-form {
    color: #0C2F80;
    padding: 10% 10% 10% 6%;
}

#register-form .card {
    background: #FFFFFF;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    /* border: 1px solid #0C2F80; */
    /* border-radius: 10px; */
}

#register-form .card h5,
#register-form .card p {
    color: #0C2F80;
}

#register-form .card.profile h5 {
    color: #96B1CC;
}

.list-group-item {
    background: transparent !important;
    border: none !important;
    padding: 15px 0px;
}

.card-topic .list-group-item+.list-group-item,
.card-consult .list-group-item+.list-group-item {
    border-top: 1px solid blue !important;
}

.card-topic::before {
    content: "Scheduled Talks";
    position: absolute;
    top: 0;
    font-size: 21px;
    font-weight: 700;
    /* background: #0C2F80; */
    padding: 7px 10px;
    /* color: #FFF; */
    /* margin-top: -1.2em; */
    left: 1.2em;
    /* border-radius: 10px; */
}

.card-consult::before {
    content: "Scheduled University Consultation";
    position: absolute;
    top: 0;
    font-size: 21px;
    font-weight: 700;
    /* background: #0C2F80; */
    padding: 7px 10px;
    /* color: #FFF; */
    /* margin-top: -1.2em; */
    left: 1.2em;
    /* border-radius: 10px; */
}

#register-form .u-btn {
    border: 1px solid;
    padding: 5px 1.5em;
    border-radius: 1.5em;
}

.cancel-booking-topic,
.cancel-booking-consult {
    color: #F0AA53;
    border-color: #F0AA53;
    cursor: pointer;
}

.join-link {
    color: #E9C699;
    border-color: #E9C699;
    cursor: pointer;
}

body {
    font-family: 'Montserrat';
}

@media screen and (max-width: 576px) and (min-width: 375px) {
    h4 {
        font-size: 18px;
    }

    h5 {
        font-size: 16px;
    }

    p {
        font-size: 14px;
    }

    .u-btn {
        font-size: 14px;
    }

    .card-body {
        padding: 20px;
    }

    #register-form {
        color: #0C2F80;
        padding: 10px;
    }
}
</style>
<div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header px-4">
                <h5 class="modal-title">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post" id="personal-information-form" novalidate class="needs-validation">
                <div class="modal-body px-4">
                    <div class="list-group list-group-flush" id="edit-form">
                        <div class="row pb-2">
                            <div class="col-lg-3">Full Name</div>
                            <div class="col-lg-9 mb-2">
                                <input type="text" name="user_fullname"
                                    value="<?php echo $this->session->userdata('user_fullname'); ?>"
                                    class="form-control custom-box" />
                            </div>
                        </div>
                        <!-- <div class="row pt-2 pb-2">
                            <div class="col-lg-3">Date of Birth</div>
                            <div class="col-lg-9">
                                <input type="date" name="user_dob"
                                    value="<?php echo $this->session->userdata('user_dob'); ?>"
                                    class="form-control custom-box">

                            </div>
                        </div> -->
                        <div class="row pt-2 pb-2">
                            <div class="col-lg-3">Phone</div>
                            <div class="col-lg-9">
                                <input type="text" name="user_phone"
                                    value="<?php echo $this->session->userdata('user_phone'); ?>"
                                    class="form-control custom-box" />
                            </div>
                        </div>
                        <div class="row pt-2 pb-2">
                            <div class="col-lg-3">Email</div>
                            <div class="col-lg-9">
                                <input type="email" name="user_email"
                                    value="<?php echo $this->session->userdata('user_email'); ?>"
                                    class="form-control custom-box" />
                            </div>
                        </div>
                        <div class="row pt-2 pb-2">
                            <div class="col-lg-3">School</div>
                            <div class="col-lg-9">
                                <select name="school_option" id="userSchool" onchange="checkValue('userSchool')"
                                    required oninvalid="validation('userSchool')">
                                    <option value="<?php echo $this->session->userdata('user_school'); ?>"
                                        data-placeholder="true">
                                        <?php echo $this->session->userdata('user_school'); ?></option>
                                    <option value="other">Other</option>
                                </select>
                                <input type="text" class="form-control form-control-sm mt-1" id="userSchoolNew">
                                <input type="hidden" value="<?php echo $this->session->userdata('user_school'); ?>"
                                    name="user_school" id="user_school">
                            </div>
                        </div>
                        <div class="row pt-2 pb-2">
                            <div class="col-lg-3">Destination</div>
                            <div class="col-lg-9">
                                <select id="userDestination" onchange="checkValue('userDestination')" multiple required
                                    oninvalid="validation('userDestination')">
                                    <?php
                            for($i = 0 ; $i < count($dataCountry); $i++){ 
                            	?>
                                    <option value="<?php echo $dataCountry[$i]; ?>"><?php echo $dataCountry[$i]; ?>
                                    </option>
                                    <?php
                            }
                            ?>
                                </select>
                                <input type="hidden" value="<?php echo $this->session->userdata('user_country'); ?>"
                                    name="user_destination" id="user_destination">
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="col-lg-3">Major</div>
                            <div class="col-lg-9">
                                <select id="userMajor" onchange="checkValue('userMajor')" multiple required
                                    oninvalid="validation('userMajor')">
                                    <option value="other">Other</option>
                                    <?php
                            for($i = 0 ; $i < count($dataMajor); $i++){ 
                            	?>
                                    <option value="<?php echo $dataMajor[$i]; ?>"><?php echo $dataMajor[$i]; ?>
                                    </option>
                                    <?php
                            }
                            ?>
                                </select>
                                <input type="text" class="form-control form-control-sm mt-1 custom-box"
                                    name="user_major_other" id="userMajorNew">
                                <input type="hidden" value="<?php echo $this->session->userdata('user_major'); ?>"
                                    name="user_major" id="user_major">
                            </div>
                        </div>
                        </li>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary btn-edit-profile" type="submit">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- body -->
<div class="container-fluid" id="register-form" style="padding-top:20vh;padding-bottom:3rem;">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card profile">
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-lg-12">
                                    
                                    <img src="<?php echo base_url(); ?>assets/img/avatar-default.webp" width="100%"
                                        style="padding:0 35%">
                                </div>
                                <div class="col-lg-12 pt-3 pb-1">
                                    <h4><?php echo $this->session->userdata('user_fullname'); ?>
                                    </h4>
                                </div>
                                <div class="col-lg-12">
                                    <h5 class="text-dark">
                                        <?php echo ucfirst($this->session->userdata('user_status')); ?></h5>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-warning"
                                        style="color: #FFF;padding:5px 2em;background: #F0AA53" id="change-information"
                                        data-toggle="modal" data-target="#editprofile">Edit
                                        Profile</button>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="list-group list-group-flush" id="view-form">
                                        <!-- <li class="list-group-item py-2">
                                            <div class="row pt-2 pb-2">
                                                <div class="col-lg-4"><b>Date of Birth</b></div>
                                                <div class="col-lg-8">
                                                    <?php echo date('d M Y', strtotime($this->session->userdata('user_dob'))); ?>
                                                </div>
                                            </div>
                                        </li> -->
                                        <li class="list-group-item py-2">
                                            <div class="row">
                                                <div class="col-lg-4"><b>Phone</b></div>
                                                <div class="col-lg-8">
                                                    <?php echo $this->session->userdata('user_phone'); ?></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item py-2">
                                            <div class="row">
                                                <div class="col-lg-4"><b>Email</b></div>
                                                <div class="col-lg-8">
                                                    <?php echo $this->session->userdata('user_email'); ?></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item py-2">
                                            <div class="row">
                                                <div class="col-lg-4"><b>School</b></div>
                                                <div class="col-lg-8">
                                                    <?php echo $this->session->userdata('user_school'); ?></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item py-2">
                                            <div class="row">
                                                <div class="col-lg-4"><b>Destination</b></div>
                                                <div class="col-lg-8">
                                                    <?php echo $this->session->userdata('user_country'); ?></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item py-2">
                                            <div class="row">
                                                <div class="col-lg-4"><b>Major</b></div>
                                                <div class="col-lg-8">
                                                    <?php echo $this->session->userdata('user_major'); ?></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="row" data-title="Hallo" data-intro="Kamu bisa upload CV kamu disini">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url(); ?>upload/resume" method="POST" enctype="multipart/form-data" id="upload-form">
                                        <!-- <label class="sr-only" for="inlineFormInputGroup">Upload your CV / Resume here</label> -->
                                        <div class="input-group mb-2 upload-cv-field">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text file-logo"><i class="fas fa-file"></i></div>
                                                <div class="input-group-text file-close" hidden style="cursor:pointer"><i class="fas fa-times" style="color: red;"></i></div>
                                            </div>
                                            <input type="file" hidden name="uploaded_resume" id="upload-resume" onchange="save_file(this.value)">
                                            <input type="text" readonly class="form-control upload-filename" value="<?=$this->session->userdata('user_resume');?>" placeholder="Your resume">
                                            <div class="input-group-append">
                                                <button onclick="browse()" class="btn btn-primary btn-browse" style="background:#0C2F80;" type="button">Browse</button>
                                                <button class="btn btn-primary btn-upload" style="background:#0C2F80;" hidden type="submit">Upload CV</button>
                                            </div>
                                        </div>
                                        <!-- <input type="file" name="uploaded_resume">
                                        <label for="files"><?=$this->session->userdata('user_resume');?></label>
                                    </div>
                                        <button  class="btn btn-primary mt-3 mb-3"
                                            style="background:#0C2F80;" type="submit">
                                            Upload CV
                                        </button> -->
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    Need a guidance for your university prep? Click the button below for a free initial
                                    consultation with ALL-in Eduspace!
                                    <br>
                                    <button class="btn btn-primary mt-3 mb-3 btn-consult-allin"
                                        style="background:#0C2F80;"
                                        data-userid="<?=$this->session->userdata('user_id');?>">
                                        FREE Inital Consultation
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-topic">
                        <div class="card-body ml-3">
                            <?php if( (isset($dataTopic)) && (count($dataTopic) > 0) ) { ?>
                            <div class="list-group mt-4">
                                <?php
	    						foreach($dataTopic as $row) {
                                    $topic_start_date = new DateTime($row->topic_start_date);
                                    $topic_end_date = new DateTime($row->topic_end_date);
	    						?>
                                <div class="row mb-3">
                                    <div class="col-md-8 mb-2">
                                        <h5 class="mb-1"><b><?php echo $row->topic_name; ?></b></h5>
                                        <p class="mb-1"><i class="fas fa-calendar-alt"></i>
                                            <?php echo $topic_start_date->format('M, dS Y (H:i') ?> -
                                            <?php echo $topic_end_date->format('H:i') ?> WIB)
                                        </p>
                                    </div>
                                    <div class="col-md-4 align-content-center text-md-right">
                                        <?php
                                        // $date = '2021-07-25';
                                        $date = date('Y-m-d');
                                        $before = date('Y-m-d', strtotime("+1 day", strtotime($date)));
                                        $talk_date = date('Y-m-d', strtotime($row->topic_start_date));
                                        if($date==$talk_date) {
                                        ?>
                                        <a href="<?php echo $row->topic_zoom_link; ?>"
                                            class="u-btn join-link bg-white text-dark"
                                            style="text-decoration:none;">Join
                                            Talks</a>
                                        <?php } else if ($before<=$talk_date){ ?>
                                        <button class="u-btn cancel-booking-topic"
                                            data-topic="<?php echo rtrim(strtr(base64_encode($row->topic_id), '+/', '-_'), '='); ?>">Cancel</button>

                                        <?php } else { ?>
                                        <button class="u-btn bg-dark text-white">Expired</button>
                                        <?php }  ?>
                                    </div>


                                </div>
                                <?php
	    						}
	    						?>
                            </div>
                            <?php } else { ?><br>
                            <p>You have no university talk scheduled. Click <a
                                    href="<?php echo base_url(); ?>?section=talks">here</a> to book.</p>
                            <?php
								}
							?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:4em">
                <div class="col-lg-12">
                    <div class="card card-consult">
                        <div class="card-body ml-3">
                            <?php if( (isset($dataConsult)) && (count($dataConsult) > 0) ) { ?>
                            <div class="list-group mt-4">
                                <?php
								foreach($dataConsult as $row) {
                                    $consult_date = new DateTime($row->uni_dtl_start_date);
                                    $consult_end_date = new DateTime($row->uni_dtl_end_date);
									?>
                                <div class="row mb-3">
                                    <div class="col-md-8 mb-2">
                                        <h5 class="mb-1"><b><?php echo $row->uni_name; ?></b></h5>
                                        <p class="mb-1"><i class="fas fa-calendar-alt"></i>
                                            <?php echo $consult_date->format('M, dS Y (H:i') ?> -
                                            <?php echo $consult_end_date->format('H:i') ?> WIB)
                                        </p>
                                    </div>

                                    <div class="col-md-4 align-content-center text-md-right">
                                        <?php
                                        // $date = '2021-07-25';
                                        $date = date('Y-m-d');
                                        $before = date('Y-m-d', strtotime("+1 day", strtotime($date)));
                                        $consult_date = date('Y-m-d', strtotime($row->uni_dtl_start_date));
                                        if($date==$consult_date) {
                                        ?>
                                        <a href="<?php echo $row->uni_dtl_zoom_link; ?>"
                                            class="u-btn join-link bg-white text-dark"
                                            style="text-decoration:none;">Join
                                            Consultation</a>
                                        <?php } else if ($before<=$consult_date){ ?>
                                        <button class="u-btn cancel-booking-consult"
                                            data-consultation="<?php echo rtrim(strtr(base64_encode($row->booking_c_id), '+/', '-_'), '='); ?>">Cancel</button>
                                        <?php } else { ?>
                                        <button class="u-btn bg-dark text-white">Expired</button>
                                        <?php }  ?>
                                    </div>

                                </div>
                                <?php
								}
								?>
                            </div>
                            <?php } else {?> <br>
                            <p>You have no consultation scheduled. Click <a
                                    href="<?php echo base_url(); ?>?section=booking">here</a> to book.</p>
                            <?php
							    }	?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/5.1.0/intro.min.js"></script>
<script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
<script>
    <?php if ($this->session->userdata('user_resume') == ''){
    ?> 
        introJs().setOptions({
            steps: [{
                element: document.querySelector('.upload-cv-field'),
                title: 'Welcome!',
                intro: 'Before getting started, please upload your CV / resume because you can win a chance to have your CV / resume checked by our mentor.'
            }]
        }).start();
    <?php
    }?> 

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

    $("#userDestination").change(function() {
        var val = $(this).val();
        $("#user_destination").val(val);
    });

    //** New 2022 */
    $("#upload-form").submit(function(e) {
        e.preventDefault();
        Swal.showLoading();

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            dataType: "JSON",
            data: new FormData(this),
            // cache : false,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                if (response.success == true) {
                    Swal.fire({
                        title: '',
                        text: response.message,
                        icon: 'success'
                    }).then((result) => {
                        location.reload();
                    });
                } else {
                    Swal.fire(response.error, '', 'error');
                }
            }
        })
    })
})

new SlimSelect({
    select: '#userSchool',
    allowDeselect: true,
    placeholder: 'Select school name',
})

/* country start */
var userCountry = "<?php echo $this->session->userdata('user_country'); ?>";
var array_userCountry = userCountry.split(",");

new SlimSelect({
    select: '#userDestination',
    allowDeselect: true,
    placeholder: 'Select destination'
}).set(array_userCountry)
/* country end */

/* major start */
var userMajor = "<?php echo $this->session->userdata('user_major'); ?>";
var array_userMajor = userMajor.split(",");

new SlimSelect({
    select: '#userMajor',
    allowDeselect: true,
    placeholder: 'Select major'
}).set(array_userMajor)
/* major end */

//* New 2022 */
function browse() {
    $("#upload-resume").click();
}

function save_file(value) {
    var split = value.split('\\');
    var file_name = split[split.length - 1];

    $(".file-logo").prop('hidden', true);
    $(".file-close").prop('hidden', false);
    $(".btn-browse").prop('hidden', true);
    $(".btn-upload").prop('hidden', false);
    $(".upload-filename").val(file_name);
}

$(".file-close").click(function() {
    $(".file-logo").prop('hidden', false);
    $(".file-close").prop('hidden', true);
    $(".btn-browse").prop('hidden', false);
    $(".btn-upload").prop('hidden', true);
    $(".upload-filename").val('');
});

//* New 2022 end */

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


// Inital Consultation 
$('.btn-consult-allin').click(function() {
    var uniId = 21;
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
                    title: 'Roger that!',
                    text: 'We have you on our database. We will notify you for the initial consultation date.'
                });
            } else if (msg == "02") {
                Swal.fire({
                    icon: 'success',
                    title: 'Roger that!',
                    text: 'We have you on our database. We will notify you for the initial consultation date.'
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
</script>