<?php
$this->load->view('template/header');
$this->load->view('home/navbar');
$this->load->view('home/header');
?>
<section class=" background-lp">
    <div class="container">
<?php
$this->load->view('home/pre_edufair');
$this->load->view('home/topic');
$this->load->view('home/personality');
$this->load->view('home/book');
?>
    </div>
</section>
<?php
$this->load->view('home/about');
$this->load->view('home/footer');
$this->load->view('template/footer');
?>

