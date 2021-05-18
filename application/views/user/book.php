<style>
.btn-book {
    border-radius: 0 !important
}
</style>

<div class="container mt-5 p-3 shadow" style="background:#efefef; border:1px solid #dedede; border-radius:10px;">
    <div class="row px-3">
        <div class="col-md-12 text-center mt-3 px-5">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe incidunt animi ab ipsa placeat! Cum,
                omnis assumenda. Sequi at rem quod eligendi dolorum eum! Quam ipsa beatae aspernatur eligendi dicta!
            </p>
            <hr>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="m-0">Uni A</h3>
                </div>
                <div class="row no-gutters">
                    <div class="col">
                        <button class="btn btn-primary btn-block btn-sm btn-book" data-toggle="modal"
                            data-target="#exampleModal">Day 1</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-success btn-block btn-sm btn-book" data-toggle="modal"
                            data-target="#exampleModal">Day 2</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group mt-3">
        <div class="row">
            <div class="col-12">
                <hr>
                <div class="text-center">
                    <div class="row">
                        <div class="col text-left ml-3">

                        </div>
                        <div class="col text-right mr-3">
                            <button type="button" class="btn btn-primary navigate-page-3">Done <i
                                    class="fas fa-paper-plane pl-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Time</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-9 pr-0">
                        <button class="btn btn-outline-info btn-disabled btn-block" disabled>10:00 - 10:15 WIB</button>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary btn-block">Book</button>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-9 pr-0">
                        <button class="btn btn-dark btn-disabled btn-block" disabled>10:15 - 10:30 WIB</button>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-outline-success btn-block" disabled>Booked</button>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-9 pr-0">
                        <button class="btn btn-outline-info btn-disabled btn-block" disabled>10:30 - 10:45 WIB</button>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary btn-block">Book</button>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-9 pr-0">
                        <button class="btn btn-outline-info btn-disabled btn-block" disabled>10:45 - 11:00 WIB</button>
                    </div>
                    <div class="col-3">
                        <button class="btn btn-primary btn-block">Book</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <?php
$start_time = strtotime("09:00");
$end_time = strtotime("12:00");
$duration = 15;
$diff = $end_time - $start_time;
$jam    =floor($diff / (60 * 60));
$menit    =$jam * 60;
$jumlah_sesi = $menit/$duration;

// starttime & endtime
for($i = 1; $i<=$jumlah_sesi ; $i++){
   $starttime = strtotime("+".$duration*$i-$duration."minutes", $start_time);
   $endtime = strtotime("+".$duration*$i."minutes", $start_time);
   echo date('h:i', $starttime)." - ".date('h:i', $endtime)."<br>";
}
?> -->