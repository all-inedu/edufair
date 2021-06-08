<div class="container-fluid" id="register-form" style="margin-top:15vh;margin-bottom:3rem;">
    <div class="container">
    	<div class="row">
	    	<div class="col-lg-4">
	    		<div class="row">
	    			<div class="col-lg-12">
	    				<div class="card">
			    			<div class="card-body">
				    			<div class="row text-center">
				    				<div class="col-lg-12">
				    					<?php
				    					if($this->session->userdata('user_gender') == "male")
				    						$img = "avatar-profile-b.png";
				    					else
				    						$img = "avatar-profile-g.png";
				    					?>
				    					<img src="<?php echo base_url(); ?>assets/img/<?php echo $img; ?>" width="70%">
				    				</div>
				    				<div class="col-lg-12 pt-3 pb-1">
				    					<h4><?php echo $this->session->userdata('user_first_name')." ".$this->session->userdata('user_last_name'); ?></h4>
				    				</div>
				    				<div class="col-lg-12">
				    					<p><?php echo ucfirst($this->session->userdata('user_status')); ?></p>
				    				</div>
				    				<div class="col-lg-12">
				    					<button class="btn btn-primary" id="change-information"><i class="fas fa-edit"></i> Change My Personal Information</button>
				    				</div>
				    			</div>
				    		</div>
			    		</div>
	    			</div>
	    		</div>
	    		<div class="row mt-4">
	    			<div class="col-lg-12">
	    				<div class="card">
    						<div class="list-group" id="list-tab" role="tablist">
								<a class="list-group-item list-group-item-action active" id="topic-schedule" data-toggle="list" href="#list-topic" role="tab" aria-controls="talks">Talks</a>
								<a class="list-group-item list-group-item-action" id="consult-schedule" data-toggle="list" href="#list-consult" role="tab" aria-controls="consultation">Consultation</a>
						    </div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    	<div class="col-lg-8">
	    		<div class="row">
	    			<div class="col">
	    				<div class="card">
			    			<div class="card-body">
			    				<ul class="list-group list-group-flush" id="view-form">
								    <li class="list-group-item">
								    	<div class="row pb-2">
								    		<div class="col-lg-3"><b>Full Name</b></div>
								    		<div class="col-lg-9"><?php echo $this->session->userdata('user_first_name')." ".$this->session->userdata('user_last_name'); ?></div>
								    	</div>
								    </li>
								    <li class="list-group-item">
								    	<div class="row pt-2 pb-2">
								    		<div class="col-lg-3"><b>Date of Birth</b></div>
								    		<div class="col-lg-9"><?php echo date('d M Y', strtotime($this->session->userdata('user_dob'))); ?></div>
								    	</div>
								    </li>
								    <li class="list-group-item">
								    	<div class="row pt-2 pb-2">
								    		<div class="col-lg-3"><b>Phone</b></div>
								    		<div class="col-lg-9"><?php echo $this->session->userdata('user_phone'); ?></div>
								    	</div>
								    </li>
								    <li class="list-group-item">
								    	<div class="row pt-2 pb-2">
								    		<div class="col-lg-3"><b>Email</b></div>
								    		<div class="col-lg-9"><?php echo $this->session->userdata('user_email'); ?></div>
								    	</div>
								    </li>
								    <li class="list-group-item">
								    	<div class="row pt-2 pb-2">
								    		<div class="col-lg-3"><b>School</b></div>
								    		<div class="col-lg-9"><?php echo $this->session->userdata('user_school'); ?></div>
								    	</div>
								    </li>
								    <li class="list-group-item">
								    	<div class="row pt-2 pb-2">
								    		<div class="col-lg-3"><b>Destination</b></div>
								    		<div class="col-lg-9"><?php echo $this->session->userdata('user_country'); ?></div>
								    	</div>
								    </li>
								    <li class="list-group-item">
								    	<div class="row pt-2">
								    		<div class="col-lg-3"><b>Major</b></div>
								    		<div class="col-lg-9"><?php echo $this->session->userdata('user_major'); ?></div>
								    	</div>
								    </li>
								</ul>
								<form action="#" method="post" id="personal-information-form" novalidate class="needs-validation">
								<ul class="list-group list-group-flush" id="edit-form" style="display: none">
								    <li class="list-group-item">
								    	<div class="row pb-2">
								    		<div class="col-lg-3"><b>First Name</b></div>
								    		<div class="col-lg-3">
								    			<input type="text" name="user_first_name" value="<?php echo $this->session->userdata('user_first_name'); ?>" class="form-control custom-box" />
								    		</div>
								    		<div class="col-lg-3"><b>Last Name</b></div>
								    		<div class="col-lg-3">
								    			<input type="text" name="user_last_name" value="<?php echo $this->session->userdata('user_last_name'); ?>" class="form-control custom-box" />
								    		</div>
								    	</div>
								    </li>
								    <li class="list-group-item">
								    	<div class="row pt-2 pb-2">
								    		<div class="col-lg-3"><b>Date of Birth</b></div>
								    		<div class="col-lg-9">
								    			<input type="date" name="user_dob" value="<?php echo $this->session->userdata('user_dob'); ?>" class="form-control custom-box">
								    			
								    		</div>
								    	</div>
								    </li>
								    <li class="list-group-item">
								    	<div class="row pt-2 pb-2">
								    		<div class="col-lg-3"><b>Phone</b></div>
								    		<div class="col-lg-9">
								    			<input type="text" name="user_phone" value="<?php echo $this->session->userdata('user_phone'); ?>" class="form-control custom-box" />
								    		</div>
								    	</div>
								    </li>
								    <li class="list-group-item">
								    	<div class="row pt-2 pb-2">
								    		<div class="col-lg-3"><b>Email</b></div>
								    		<div class="col-lg-9">
								    			<input type="email" name="user_email" value="<?php echo $this->session->userdata('user_email'); ?>" class="form-control custom-box" />
								    		</div>
								    	</div>
								    </li>
								    <li class="list-group-item">
								    	<div class="row pt-2 pb-2">
								    		<div class="col-lg-3"><b>School</b></div>
								    		<div class="col-lg-9">
									    		<select name="school_option" id="userSchool" onchange="checkValue('userSchool')" required
					                                oninvalid="validation('userSchool')">
					                                <option value="<?php echo $this->session->userdata('user_school'); ?>" data-placeholder="true"><?php echo $this->session->userdata('user_school'); ?></option>
					                                <option value="other">Other</option>
					                            </select>
					                            <input type="text" class="form-control form-control-sm mt-1" id="userSchoolNew">
				                           		<input type="hidden" value="<?php echo $this->session->userdata('user_school'); ?>" name="user_school" id="user_school">
					                        </div>
								    	</div>
								    </li>
								    <li class="list-group-item">
								    	<div class="row pt-2 pb-2">
								    		<div class="col-lg-3"><b>Destination</b></div>
								    		<div class="col-lg-9">
								    			<select id="userDestination" onchange="checkValue('userDestination')" multiple required
					                                oninvalid="validation('userDestination')">
					                                <?php
					                                for($i = 0 ; $i < count($dataCountry); $i++){ 
					                                	?>
					                                	<option value="<?php echo $dataCountry[$i]; ?>"><?php echo $dataCountry[$i]; ?></option>
					                                	<?php
					                                }
					                                ?>
					                            </select>
					                            <input type="hidden" value="<?php echo $this->session->userdata('user_country'); ?>" name="user_destination" id="user_destination">
								    		</div>
								    	</div>
								    </li>
								    <li class="list-group-item">
								    	<div class="row pt-2">
								    		<div class="col-lg-3"><b>Major</b></div>
								    		<div class="col-lg-9">
								    			<select id="userMajor" onchange="checkValue('userMajor')" multiple required
					                                oninvalid="validation('userMajor')">
					                                <option value="other">Other</option>
					                                <?php
					                                for($i = 0 ; $i < count($dataMajor); $i++){ 
					                                	?>
					                                	<option value="<?php echo $dataMajor[$i]; ?>"><?php echo $dataMajor[$i]; ?></option>
					                                	<?php
					                                }
					                                ?>
					                            </select>
					                            <input type="text" class="form-control form-control-sm mt-1 custom-box" name="user_major_other"
					                                id="userMajorNew">
					                            <input type="hidden" value="<?php echo $this->session->userdata('user_major'); ?>" name="user_major" id="user_major">
								    		</div>
								    	</div>
								    </li>
								    <li class="list-group-item text-right">
								    	<button class="btn btn-primary" type="submit">Save</button>
								    	<div class="test"></div>
								    </li>
								</ul>
								</form>
			    			</div>
			    		</div>
	    			</div>
	    		</div>
	    		<div class="row mt-4">
	    			<div class="col-lg-12">
	    				<div class="card">
	    					<div class="card-body">
	    						<div class="tab-content">
	    							<div class="tab-pane fade show active" id="list-topic" role="tabpanel" aria-labelledby="topic-schedule">
	    								<?php if( (isset($dataTopic)) && (count($dataTopic) > 0) ) { ?>
			    						<h4>Your Scheduled Topics</h4>
		    							<div class="list-group mt-4">
			    						<?php
			    						foreach($dataTopic as $row) {
			    							$today = date_create(date('Y-m-d'));
			    							$eventDate = date_create($row->topic_start_date);
			    							$diff = date_diff($today, $eventDate);

			    							if($today < $eventDate)
			    								$string = $diff->format("%d")." days to go";
			    							else
			    								$string = "expired";
			    							?>
												<div class="list-group-item list-group-item-action flex-column align-items-start">
													<div class="d-flex w-100 justify-content-between">
														<h5 class="mb-1"><?php echo $row->topic_name; ?></h5>
														<small><?php echo $string; ?></small>
													</div>
													<p class="mb-1"><i class="fas fa-calendar-alt"></i> <?php echo date('d M Y H:i', strtotime($row->topic_start_date)); ?></p>
													<?php
													if($diff->format("%d") > 1) {
														?>	
														<small class="cancel-booking-topic" data-topic="<?php echo rtrim(strtr(base64_encode($row->topic_id), '+/', '-_'), '='); ?>" style=" color: red;cursor: pointer;">Cancel</small>
														<?php
													} else {
														?>
														<small data-link="<?php echo $row->topic_zoom_link; ?>" class="join-link" style=" color: blue">Click to join talks</small>
														<?php
													}	
													?>
												</div>
			    							<?php
			    						}
			    						?>
										</div>
										<?php } else { echo "No Scheduled Topic for you"; }?>
									</div>
									<div class="tab-pane fade" id="list-consult" role="tabpanel" aria-labelledby="consult-schedule">
										<?php if( (isset($dataConsult)) && (count($dataConsult) > 0) ) { ?>
										<h4>Your Scheduled Consultation</h4>
										<div class="list-group mt-4">
										<?php
										foreach($dataConsult as $row) {
											$today = date_create(date('Y-m-d'));
			    							$eventDate = date_create($row->uni_dtl_t_start_time);
			    							$diff = date_diff($today, $eventDate);

			    							if($today < $eventDate)
			    								$string = $diff->format("%d")."days to go";
			    							else
			    								$string = "expired";
											?>
											<div class="list-group-item list-group-item-action flex-column align-items-start">
												<!-- <img src="<?php echo base_url()."assets/uni/banner/".$row->uni_photo_banner; ?>" alt="" width="100px"> -->
												<div class="d-flex w-100 justify-content-between">
													<h5 class="mb-1"><?php echo $row->uni_name; ?></h5>
													<small><?php echo $string; ?></small>
												</div>
												<p class="mb-1"><i class="fas fa-calendar-alt"></i> <?php echo date('d M Y H:i', strtotime($row->uni_dtl_t_start_time)); ?></p>
												<?php
												if($diff->format("%d") > 1) {
													?>	
													<small class="cancel-booking-consult" data-consultation="<?php echo rtrim(strtr(base64_encode($row->uni_detail_time_id), '+/', '-_'), '='); ?>" style=" color: red; cursor: pointer">Cancel</small>
													<?php
												} else {
													?>
													<small data-link="<?php echo $row->uni_dtl_zoom_link; ?>" class="join-link" style=" color: blue">Click to join consultation</small>
													<?php
												}	
												?>
											</div>
											<?php
										}
										?>
										</div>
									<?php } else { echo "No Scheduled Consultation for you"; }?>
									</div>
								</div>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
    	</div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
	    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
<script>
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
</script>