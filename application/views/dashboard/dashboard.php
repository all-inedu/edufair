<div class="container-fluid" style="margin-top:15vh;margin-bottom:3rem;">
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
			    				<ul class="list-group list-group-flush">
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
	    								<?php if(isset($dataTopic)) { ?>
			    						<h4>Your Scheduled Topics</h4>
		    							<div class="list-group mt-4">
			    						<?php
			    						foreach($dataTopic as $row) {
			    							$today = date_create(date('Y-m-d'));
			    							$eventDate = date_create($row->topic_start_date);
			    							$diff = date_diff($today, $eventDate);

			    							if($today < $eventDate)
			    								$string = $diff->format("%a")."days to go";
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
													if($diff->format("%a") > 1) {
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
										<h4>Your Scheduled Consultation</h4>
										<div class="list-group mt-4">
										<?php
										foreach($dataConsult as $row) {
											$today = date_create(date('Y-m-d'));
			    							$eventDate = date_create($row->uni_dtl_t_start_time);
			    							$diff = date_diff($today, $eventDate);

			    							if($today < $eventDate)
			    								$string = $diff->format("%a")."days to go";
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
												if($diff->format("%a") > 1) {
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