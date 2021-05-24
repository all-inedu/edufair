<style>
.card-book:hover {
    border: 3px solid #dedede;
}

.btn-book {
    border-radius: 0 !important
}

.box-book {
    height: 500px;
    overflow-x: hidden;
    overflow-y: scroll;
}

/* Scrollbar styles */
.box-book::-webkit-scrollbar {
    width: 8px;
    height: 12px;
}

.box-book::-webkit-scrollbar-track {
    border: 1px solid #fff;
    border-radius: 10px;
}

.box-book::-webkit-scrollbar-thumb {
    background: #fff;
    border-radius: 10px;
}

.box-book::-webkit-scrollbar-thumb:hover {
    background: #eda436;
}
</style>
<div class="container-fluid text-white p-0" id="booking">
    <div class="row justify-content-center bg-primary pb-5">
        <div class="col-md-7 text-center mt-5 p-5">
            <h2>Uni List</h2>
            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio sequi eligendi commodi voluptas
                sed!
                Aliquid earum id atque possimus, eaque maiores aut esse, quam veniam neque delectus aspernatur.
                Asperiores, fuga.</h5>
        </div>

        <div class="col-md-7 text-center">
            <?php
            foreach($uniCountry as $key => $val) {
            ?>
            <div class="dropdown show d-inline">
                <button class="btn bg-white text-muted btn-sm mx-1 px-3 dropdown-toggle" data-toggle="dropdown">
                    <?php echo $key; ?>
                </button>
                <?php
                if(count($val) > 1) {
                ?>
                <div class="dropdown-menu">
                    <?php
                    for($i = 0 ; $i < count($val) ; $i++){
                    ?>
                    <a class="dropdown-item" href="#"><?php echo $val[$i]; ?></a>
                    <?php
                    }
                    ?>
                </div>
                <?php
                }  
                ?>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="container mt-3 box-book">
            <div class="row my-0">
                <?php
                $i = 0;
                foreach($uniData as $uniInfo) {
                ?>
                    <div class="col-md-6 mb-2" id="col<?=$i;?>">
                        <div class="card">
                            <img src="<?php echo base_url().$uniInfo['uni_photo_banner']; ?>" alt="" height="200">
                            <div class="card-body text-center p-1">
                                <h4 class="m-0 text-muted">Uni <?php echo $uniInfo['uni_name'] ?></h4>
                            </div>
                            <div class="row no-gutters">
                            <?php
                            $day = 1;
                            foreach($uniInfo['uni_detail'] as $row) {
                                $assigned_time  = $row['uni_dtl_start_date'];
                                $start = explode(" ", $assigned_time);
                                $start_time = substr($start[1], 0, 5);

                                $completed_time  = $row['uni_dtl_end_date'];
                                $end = explode(" ", $completed_time );
                                $end_time = substr($end[1], 0, 5);

                                $d1 = new DateTime($assigned_time);
                                $d2 = new DateTime($completed_time);

                                $interval = $d2->diff($d1);
                                $time = $interval->format('%H');
                                ?>
                                <div class="col">
                                    <button class="btn btn-primary btn-block btn-sm btn-book" data-toggle="modal"
                                        data-target="#modal<?php echo $row['uni_dtl_id']; ?>">Day <?php echo $day; //echo $start[0]; ?></button>
                                </div>

                                <?php
                                $disabled = "";
                                if(count($uniInfo['uni_detail']) < 2) {
                                    $disabled = "style='background:#c6c6c6 !important;border: 1px solid #c6c6c6 !important'";
                                    ?>
                                    <div class="col">
                                        <button class="btn btn-success btn-block btn-sm btn-book" data-toggle="modal" <?php echo $disabled; ?>
                                            data-target="#day2">Day 2</button>
                                    </div>
                                    <?php
                                }
                                ?>
                                <div class="modal" tabindex="-1" role="dialog" id="modal<?php echo $row['uni_dtl_id']; ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Time</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            $duration = 15;
                                            $count = 0;
                                            for($i = 1; $i <= ($time*60)/$duration; $i++){
                                                $startTime = strtotime("+".$duration*$count." minutes", strtotime($assigned_time));
                                                $endTime = strtotime("+".$duration*$i." minutes", strtotime($assigned_time));
                                            ?>
                            
                                                <div class="row mb-2">
                                                    <div class="col-9 pr-0">
                                                        <button class="btn btn-outline-info btn-disabled btn-block" disabled><?php echo date('h:i', $startTime); ?> - <?php echo date('h:i', $endTime); ?> WIB</button>
                                                    </div>
                                                    <div class="col-3">
                                                        <button class="btn btn-primary btn-block btn-book-consul" data-uniid="<?php echo $uniInfo['uni_id']; ?>" data-starttime="<?php echo $start[0]." ".date('h:i:s', $startTime); ?>" data-endtime="<?php echo $start[0]." ".date('h:i:s', $endTime); ?>">Book</button>
                                                    </div>
                                                </div>
                                                <!-- <div class="row mb-2">
                                                    <div class="col-9 pr-0">
                                                        <button class="btn btn-dark btn-disabled btn-block" disabled>10:15 - 10:30 WIB</button>
                                                    </div>
                                                    <div class="col-3">
                                                        <button class="btn btn-outline-success btn-block" disabled>Booked</button>
                                                    </div>
                                                </div> -->

                                            <?php
                                            $count++;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <?php
                            $day++;
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                <!-- <div class="col-md-6 mb-2" id="col<?=$i;?>">
                    <div class="card card-book">
                        <img src="<?=base_url('assets/img/default.jpeg');?>" alt="">
                        <div class="card-body text-center p-1">
                            <h4 class="m-0 text-muted">Uni <?=$i;?></h4>
                        </div>
                        <div class="row no-gutters">
                            <div class="col">
                                <button class="btn btn-primary btn-block btn-sm btn-book" data-toggle="modal"
                                    data-target="#exampleModal">#1</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-success btn-block btn-sm btn-book" data-toggle="modal"
                                    data-target="#exampleModal">#2</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <?php 
                } 
                ?>
            </div>
        </div>
    </div>
</div>