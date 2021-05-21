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
            <div class="dropdown show d-inline">
                <button class="btn bg-white text-muted btn-sm mx-1 px-3 dropdown-toggle" data-toggle="dropdown">
                    United States
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                </div>
            </div>
            <div class="dropdown show d-inline">
                <button class="btn bg-white text-muted btn-sm mx-1 px-3 dropdown-toggle" data-toggle="dropdown">
                    United Kingdom
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                </div>
            </div>
            <div class="dropdown show d-inline">
                <button class="btn bg-white text-muted btn-sm mx-1 px-3 dropdown-toggle" data-toggle="dropdown">
                    Canada
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                </div>
            </div>
            <div class="dropdown show d-inline">
                <button class="btn bg-white text-muted btn-sm mx-1 px-3 dropdown-toggle" data-toggle="dropdown">
                    Europe
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                </div>
            </div>
            <div class="dropdown show d-inline">
                <button class="btn bg-white text-muted btn-sm mx-1 px-3 dropdown-toggle" data-toggle="dropdown">
                    Asia
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#col5">Lorem ipsum</a>
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                    <a class="dropdown-item" href="#">Lorem ipsum</a>
                </div>
            </div>
        </div>
        <div class="container mt-3 box-book">
            <div class="row my-0">
                <?php 
                        for ($i=0; $i < 20 ; $i++) { 
                        ?>
                <div class="col-md-6 mb-2" id="col<?=$i;?>">
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
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>