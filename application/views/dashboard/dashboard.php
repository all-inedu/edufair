<style>
#register-form { color: #0C2F80; }
#register-form .card{
	background: transparent;
	border: 1px solid #0C2F80;
	border-radius: 1.2em;
}
#register-form .card h5, #register-form .card p { color: #0C2F80; }

#register-form .card.profile h5 { color: #96B1CC; }
.list-group-item {background: transparent !important; border: none !important;}
.card-topic .list-group-item + .list-group-item, .card-consult .list-group-item + .list-group-item {
	border-top: 1px solid blue !important;
}
.card-topic::before {
	content: "Talks";
	position: absolute;
	top: 0;
	background: #0C2F80;
	padding: 7px 5em;
	color: #FFF;
	margin-top: -1.2em;
	left: 1.5em;
	border-radius: .5em;
}

.card-consult::before {
	content: "Uni Consultation";
	position: absolute;
	top: 0;
	background: #0C2F80;
	padding: 7px 5em;
	color: #FFF;
	margin-top: -1.2em;
	left: 1.5em;
	border-radius: .5em;
}

#register-form .u-btn {
	border: 1px solid;
	padding: 5px 1.5em;
	border-radius: 1.5em;
}

.cancel-booking-topic, .cancel-booking-consult { color: #F0AA53; border-color: #F0AA53; cursor: pointer; }
.join-link { color: #E9C699; border-color: #E9C699; cursor: pointer; }

</style>
<div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="post" id="personal-information-form" novalidate class="needs-validation">
      <div class="modal-body">
      	
        <ul class="list-group list-group-flush" id="edit-form">
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
		    
		</ul>
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
<div class="container-fluid" id="register-form" style="padding-top:15vh;padding-bottom:3rem;">
    <div class="container">
    	<div class="row">
	    	<div class="col-lg-4">
	    		<div class="row">
	    			<div class="col-lg-12">
	    				<div class="card profile">
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
				    					<h5><?php echo ucfirst($this->session->userdata('user_status')); ?></h5>
				    				</div>
				    				<div class="col-lg-12">
				    					<button class="btn btn-warning" style="color: #FFF;padding:5px 2em;background: #F0AA53" id="change-information" data-toggle="modal" data-target="#editprofile">Edit Profile</button>
				    					<a href="https://all-inedu.com/sign-me/"><button class="btn btn-danger">Initial Consult</button></a>
				    				</div>
				    			</div>
				    			<div class="row">
				    				<div class="col-lg-12">
				    					<ul class="list-group list-group-flush" id="view-form">
				    						<li class="list-group-item">
										    	<div class="row pt-2 pb-2">
										    		<div class="col-lg-5"><b>Date of Birth</b></div>
										    		<div class="col-lg-7"><?php echo date('d M Y', strtotime($this->session->userdata('user_dob'))); ?></div>
										    	</div>
										    </li>
										    <li class="list-group-item">
										    	<div class="row pt-2 pb-2">
										    		<div class="col-lg-5"><b>Phone</b></div>
										    		<div class="col-lg-7"><?php echo $this->session->userdata('user_phone'); ?></div>
										    	</div>
										    </li>
										    <li class="list-group-item">
										    	<div class="row pt-2 pb-2">
										    		<div class="col-lg-5"><b>Email</b></div>
										    		<div class="col-lg-7"><?php echo $this->session->userdata('user_email'); ?></div>
										    	</div>
										    </li>
										    <li class="list-group-item">
										    	<div class="row pt-2 pb-2">
										    		<div class="col-lg-5"><b>School</b></div>
										    		<div class="col-lg-7"><?php echo $this->session->userdata('user_school'); ?></div>
										    	</div>
										    </li>
										    <li class="list-group-item">
										    	<div class="row pt-2 pb-2">
										    		<div class="col-lg-5"><b>Destination</b></div>
										    		<div class="col-lg-7"><?php echo $this->session->userdata('user_country'); ?></div>
										    	</div>
										    </li>
										    <li class="list-group-item">
										    	<div class="row pt-2">
										    		<div class="col-lg-5"><b>Major</b></div>
										    		<div class="col-lg-7"><?php echo $this->session->userdata('user_major'); ?></div>
										    	</div>
										    </li>
				    					</ul>
				    				</div>
				    			</div>
				    		</div>
			    		</div>
	    			</div>
	    		</div>
	    		<!-- <div class="row mt-4">
	    			<div class="col-lg-12">
	    				<div class="card">
    						<div class="list-group" id="list-tab" role="tablist">
								<a class="list-group-item list-group-item-action active" id="topic-schedule" data-toggle="list" href="#list-topic" role="tab" aria-controls="talks">Talks</a>
								<a class="list-group-item list-group-item-action" id="consult-schedule" data-toggle="list" href="#list-consult" role="tab" aria-controls="consultation">Consultation</a>
						    </div>
	    				</div>
	    			</div>
	    		</div> -->
	    	</div>
	    	<div class="col-lg-8">
	    		<div class="row mt-3">
	    			<div class="col-lg-12">
	    				<div class="card card-topic">
	    					<div class="card-body ml-3">
	    						<?php if( (isset($dataTopic)) && (count($dataTopic) > 0) ) { ?>
    							<div class="list-group mt-4">
    								<h4>Scheduled Talks</h4>
	    						<?php
	    						foreach($dataTopic as $row) {
	    							$topic_start_date = new DateTime($row->topic_start_date);
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
												<h5 class="mb-1"><b><?php echo $row->topic_name; ?></b></h5>
												<!-- <small><?php echo $string; ?></small> -->
												<?php
												if($diff->format("%d") > 1) {
													?>	
													<small class="u-btn cancel-booking-topic" data-topic="<?php echo rtrim(strtr(base64_encode($row->topic_id), '+/', '-_'), '='); ?>">Cancel</small>
													<?php
												} else {
													?>
													<small data-link="<?php echo $row->topic_zoom_link; ?>" class="u-btn join-link" >Click to join talks</small>
													<?php
												}	
												?>
											</div>
											<p class="mb-1"><i class="fas fa-calendar-alt"></i> <?php echo $topic_start_date->format('M, dS Y - H:i') ?></p>
											
										</div>
	    							<?php
	    						}
	    						?>
								</div>
								<?php } else { ?><br>
									<p>You haven't book a topic. Click <a href="<?php echo base_url(); ?>?section=talks">here</a> to book a topic.</p>
									<?php
									}
								?>
	    						<!-- <div class="tab-content">
	    							<div class="tab-pane fade show active" id="list-topic" role="tabpanel" aria-labelledby="topic-schedule">
	    								
									</div>
									<div class="tab-pane fade" id="list-consult" role="tabpanel" aria-labelledby="consult-schedule">
										
									</div>
								</div> -->
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
									<h4>Scheduled Consultations</h4>
								<?php
								foreach($dataConsult as $row) {
									$topic_start_date = new DateTime($row->uni_dtl_t_start_time);
									$today = date_create(date('Y-m-d'));
	    							$eventDate = date_create($row->uni_dtl_t_start_time);
	    							$diff = date_diff($today, $eventDate);

	    							if($today < $eventDate)
	    								$string = $diff->format("%d")." days to go";
	    							else
	    								$string = "expired";
									?>
									<div class="list-group-item list-group-item-action flex-column align-items-start">
										<!-- <img src="<?php echo base_url()."assets/uni/banner/".$row->uni_photo_banner; ?>" alt="" width="100px"> -->
										<div class="d-flex w-100 justify-content-between">
											<h5 class="mb-1"><b><?php echo $row->uni_name; ?></b></h5>
											<!-- <small><?php echo $string; ?></small> -->
											<?php
											if($diff->format("%d") > 1) {
												?>	
												<small class="u-btn cancel-booking-consult" data-consultation="<?php echo rtrim(strtr(base64_encode($row->uni_detail_time_id), '+/', '-_'), '='); ?>">Cancel</small>
												<?php
											} else {
												?>
												<small data-link="<?php echo $row->uni_dtl_zoom_link; ?>" class="u-btn join-link">Click to join consultation</small>
												<?php
											}	
											?>
										</div>
										<p class="mb-1"><i class="fas fa-calendar-alt"></i> <?php echo $topic_start_date->format('M, dS Y - H:i') ?></p>
										
									</div>
									<?php
								}
								?>
								</div>
							<?php } else {?> <br>
								<p>You haven't book a consultation. Click <a href="<?php echo base_url(); ?>?section=booking">here</a> to book a consultation.</p>
							<?php
							 	}	?>
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