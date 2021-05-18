<style>
.topic-card {
    height: 50vh;
    overflow-x: hidden;
    overflow-y: scroll;
    padding: 0 10px;
}

@media only screen and (max-width: 600px) {
    .topic-card {
        height: auto;
        margin-bottom: 20px;
    }
}

input[type="checkbox"] {
    display: none;
}

input[type="checkbox"]:checked+label {
    background-color: #fff;
    color: #000;
    border: 3px solid #39A5DC;
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
}

.form-check {
    padding-left: 0rem !important;
}

.form-check label {
    margin-left: -20px;
    margin: 5px;
    width: 100%;
    padding: 10px 10px;
    color: #000;
    text-align: center;
    border: 3px solid #fff;
    background-color: #fff;
    border-radius: 4px;
    /* box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important; */
}

.form-check label:hover {
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
    cursor: pointer;
}

p {
    margin-bottom: 0px;
}
</style>

<div class="container mt-5 p-3 shadow" style="background:#efefef; border:1px solid #dedede; border-radius:10px;">
    <div class="row">
        <div class="col-md-12 text-center mt-3 px-5">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe incidunt animi ab ipsa placeat! Cum,
                omnis assumenda. Sequi at rem quod eligendi dolorum eum! Quam ipsa beatae aspernatur eligendi dicta!
            </p>
            <hr>
        </div>
        <div class="col-sm text-center">
            <h4>Day 1</h4>
            <div class="topic-card">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="day1-check-1">
                    <label class="form-check-label" for="day1-check-1">
                        <h5 class="m-0">Topic Title</h5>
                        <small><i class="fas fa-calendar-alt fa-fw"></i> 09.00 - 10.00 WIB</small>
                        <hr class="m-0 mx-5">
                        <i class="fas fa-university"></i>
                        <p>Uni A, Uni B, Uni C</p>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="day1-check-2">
                    <label class="form-check-label" for="day1-check-2">
                        <h5 class="m-0">Topic Title</h5>
                        <small><i class="fas fa-calendar-alt fa-fw"></i> 09.00 - 10.00 WIB</small>
                        <hr class="m-0 mx-5">
                        <i class="fas fa-university"></i>
                        <p>Uni A, Uni B, Uni C</p>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="day1-check-3">
                    <label class="form-check-label" for="day1-check-3">
                        <h5 class="m-0">Topic Title</h5>
                        <small><i class="fas fa-calendar-alt fa-fw"></i> 09.00 - 10.00 WIB</small>
                        <hr class="m-0 mx-5">
                        <i class="fas fa-university"></i>
                        <p>Uni A, Uni B, Uni C</p>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="day1-check-4">
                    <label class="form-check-label" for="day1-check-4">
                        <h5 class="m-0">Topic Title</h5>
                        <small><i class="fas fa-calendar-alt fa-fw"></i> 09.00 - 10.00 WIB</small>
                        <hr class="m-0 mx-5">
                        <i class="fas fa-university"></i>
                        <p>Uni A, Uni B, Uni C</p>
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm text-center">
            <h4>Day 2</h4>
            <div class="topic-card">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="day2-check-1">
                    <label class="form-check-label" for="day2-check-1">
                        <h5 class="m-0">Topic Title</h5>
                        <small><i class="fas fa-calendar-alt fa-fw"></i> 09.00 - 10.00 WIB</small>
                        <hr class="m-0 mx-5">
                        <i class="fas fa-university"></i>
                        <p>Uni A, Uni B, Uni C</p>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="day2-check-2">
                    <label class="form-check-label" for="day2-check-2">
                        <h5 class="m-0">Topic Title</h5>
                        <small><i class="fas fa-calendar-alt fa-fw"></i> 09.00 - 10.00 WIB</small>
                        <hr class="m-0 mx-5">
                        <i class="fas fa-university"></i>
                        <p>Uni A, Uni B, Uni C</p>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="day2-check-3">
                    <label class="form-check-label" for="day2-check-3">
                        <h5 class="m-0">Topic Title</h5>
                        <small><i class="fas fa-calendar-alt fa-fw"></i> 09.00 - 10.00 WIB</small>
                        <hr class="m-0 mx-5">
                        <i class="fas fa-university"></i>
                        <p>Uni A, Uni B, Uni C</p>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="day2-check-4">
                    <label class="form-check-label" for="day2-check-4">
                        <h5 class="m-0">Topic Title</h5>
                        <small><i class="fas fa-calendar-alt fa-fw"></i> 09.00 - 10.00 WIB</small>
                        <hr class="m-0 mx-5">
                        <i class="fas fa-university"></i>
                        <p>Uni A, Uni B, Uni C</p>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="day2-check-5">
                    <label class="form-check-label" for="day2-check-5">
                        <h5 class="m-0">Topic Title</h5>
                        <small><i class="fas fa-calendar-alt fa-fw"></i> 09.00 - 10.00 WIB</small>
                        <hr class="m-0 mx-5">
                        <i class="fas fa-university"></i>
                        <p>Uni A, Uni B, Uni C</p>
                    </label>
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
                            <a href="<?=base_url('registration/booking/');?>" type="button"
                                class="btn btn-warning navigate-page-3">Skip <i class="fas fa-arrow-right pl-2"></i></a>
                        </div>
                        <div class="col text-right mr-3">
                            <button type="button" class="btn btn-primary navigate-page-3">Join Now <i
                                    class="fas fa-paper-plane pl-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
$('.grid').masonry({
    // options
    itemSelector: '.grid-item',
    columnWidth: 200
});
</script>