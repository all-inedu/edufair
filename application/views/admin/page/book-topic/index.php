<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/template/header'); ?>
</head>

<body class="sb-nav-fixed">
    <?php $this->load->view('admin/template/navbar'); ?>
    <div id="layoutSidenav">
        <?php $this->load->view('admin/template/sidebar'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Booking Topic</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Booking Topic</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card pt-3 p-2 px-4 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label>Topic:</label><br>
                                        <span style="cursor:pointer;" class="filter badge badge-info py-2 px-3 mb-2"
                                            data-topic="">All Topic
                                        </span>
                                        <?php
                                            foreach ($top as $top) {
                                        ?>
                                        <span style="cursor:pointer;" class="filter badge badge-info py-2 px-3 mb-2"
                                            data-topic="<?=$top['topic_name'];?>">
                                            <?=$top['topic_name'];?>
                                        </span>
                                        <?php } ?>'
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover nowrap" id="dataTopic" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Topic Name</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                            <th>Participants</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($topic as $t) {
                                        ?>
                                        <tr class="text-center">
                                            <td><?=$no;?></td>
                                            <td class="text-left"><?=$t['topic_name'];?></td>
                                            <td>
                                                <?=date("M dS Y, H:i",strtotime($t['topic_start_date']));?>
                                                <?=date("- H:i A",strtotime($t['topic_end_date']));?>
                                            </td>
                                            <td>
                                                <?php 
                                                    $data = [];
                                                    foreach ($t['user'] as $d) {
                                                        if(!empty($d['user_id']))
                                                        {
                                                            $data[] = $d['user_id']; 
                                                        }
                                                    }
                                                    echo count($data);
                                                ?>
                                            </td>
                                            <td>
                                                <table style="font-size:12px;" width="100%">
                                                    <?php 
                                                    foreach ($t['user'] as $u) {
                                                        if($u['user_id']=="") {
                                                            echo "<tr class='text-center'><td colspan=5>-</td></tr>";
                                                        } else {
                                                    ?>
                                                    <tr>
                                                        <td><?=$u['user_first_name']." ".$u['user_last_name'];?></td>
                                                        <td><?=$u['user_email'];?></td>
                                                        <td><?=ucfirst($u['user_status']);?></td>
                                                        <td><?=$u['user_school'];?></td>
                                                        <td><?=$u['user_grade'];?></td>
                                                    </tr>
                                                    <?php } } ?>
                                                </table>
                                            </td>
                                        </tr>
                                        <?php $no++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php $this->load->view('admin/template/footer'); ?>
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
var tables = $('#dataTopic').DataTable({
    "scrollX": true,
    dom: 'Bfrtip',
    buttons: [{
        extend: 'excel',
        text: '<i class="fas fa-file-excel"></i> &nbsp; Export to Excell'
    }]
});


$('.filter').click(function(e) {
    $('.filter').addClass('badge-info');
    $(this).removeClass('badge-info')
    $(this).addClass('badge-primary')
    var params = $(this).attr('data-topic')
    tables.column(1).search(params).draw();
})

// function topic(params) {
//     $(this).removeClass('badge-info')
// }
</script>

</html>