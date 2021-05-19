<style>
.card-columns {
    -webkit-column-count: 3 !important;
    -moz-column-count: 3 !important;
    column-count: 3 !important;
}

.card-topic {
    border: 3px solid #dedede;
}

.card-topic:hover {
    border: 3px solid #605c5c;
}

.img-topic {
    display: block;
    width: 100%;
}

.talk-button {
    cursor: pointer;
}
</style>


<div class="container p-4 mb-4" id="talks">
    <div class="row justify-content-md-center">
        <div class="col-md-7 text-center mt-5 p-5">
            <h2>Talks</h2>
            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio sequi eligendi commodi voluptas sed!
                Aliquid earum id atque possimus, eaque maiores aut esse, quam veniam neque delectus aspernatur.
                Asperiores, fuga.</h5>
        </div>
    </div>
    <div class="card-columns">
        <?php
            for ($i=0; $i < 5; $i++) { 
        ?>
        <div class="card card-topic">
            <div class="card-body">
                <img src="<?=base_url('assets/img/default.jpeg');?>" class="img-topic">
                <div class="row px-2 pt-2 no-gutters talk-button">
                    <div class="col-11">
                        <small>July, 24th 2021 - 09.00 WIB</small>
                        <h6 class="font-weight-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit</h6>
                    </div>
                    <div class="col-1 pl-3 my-auto">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
                <div class="hidden px-2">
                    <hr class="m-0 my-2">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste eum at quibusdam ex consequatur
                        voluptas cumque tenetur numquam quae, perferendis excepturi illo nam est eius ipsum laboriosam
                        architecto quia? Porro?</p>
                    <a class="nav-link btn btn-sm btn-block btn-outline-primary mb-1" href="#">Join Now</a>
                </div>
            </div>
        </div>
        <?php 
            }
        ?>
    </div>
    <hr>
    <br>
    <div class="card-columns">
        <?php
            for ($i=0; $i < 5; $i++) { 
        ?>
        <div class="card card-topic">
            <div class="card-body">
                <img src="<?=base_url('assets/img/default.jpeg');?>" class="img-topic">
                <div class="row px-2 pt-2 no-gutters talk-button">
                    <div class="col-11">
                        <small>July, 24th 2021 - 09.00 WIB</small>
                        <h6 class="font-weight-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit</h6>
                    </div>
                    <div class="col-1 pl-3 my-auto">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                </div>
                <div class="hidden px-2">
                    <hr class="m-0 my-2">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste eum at quibusdam ex consequatur
                        voluptas cumque tenetur numquam quae, perferendis excepturi illo nam est eius ipsum laboriosam
                        architecto quia? Porro?</p>
                    <a class="nav-link btn btn-sm btn-block btn-outline-primary mb-1" href="#">Join Now</a>
                </div>
            </div>
        </div>
        <?php 
            }
        ?>
    </div>
    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <button class="btn btn-circle btn-outline-primary px-5">Join Now</button>
        </div>
    </div>
</div>

<script>
$(".hidden").hide()

$(function() {
    $('.talk-button').hover(function() {
        $(this).children(".col-1").addClass('animate__animated animate__headShake text-primary');
    }, function() {
        $(this).children(".col-1").removeClass('animate__animated animate__headShake text-primary');
    });
});

$(".talk-button").click(function() {
    $(this).next(".hidden").toggle("slow");
});
</script>