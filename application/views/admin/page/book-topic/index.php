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
                            <a href="<?=base_url('dashboard/admin/book/export/topic');?>" target="_blank"
                                class="btn btn-sm btn-dark float-right mb-3"><i class="fas fa-file-excel"></i> &nbsp;
                                Export to
                                Excel</a>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover nowrap" id="dataTopic" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Topic Name</th>
                                            <th>Date</th>
                                            <th>Join</th>
                                            <th>Cancel</th>
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
                                                    $cancel = [];
                                                    $join = [];
                                                    foreach ($t['user'] as $d) {
                                                        if(!empty($d['user_id']))
                                                        {
                                                            if($d['booking_topic_status']==0)
                                                            {
                                                                $cancel[] = $d['booking_topic_status']; 
                                                            } else {
                                                                $join[] = $d['booking_topic_status']; 
                                                            }
                                                            $data[] = $d['user_id']; 
                                                        }
                                                    }
                                                    echo count($join);
                                                ?>
                                            </td>
                                            <td><?=count($cancel);?></td>
                                            <td>
                                                <table style="font-size:12px;" width="100%">
                                                    <?php 
                                                    foreach ($t['user'] as $u) {
                                                        if($u['user_id']=="") {
                                                            echo "<tr class='text-center'><td colspan=5>-</td></tr>";
                                                        } else {
                                                            if($u['booking_topic_status']==0){
                                                                $status ="text-danger";  
                                                                $title ="Cancel";
                                                            } else {
                                                                $status ="";
                                                                $title ="Join"; 
                                                            }
                                                    ?>
                                                    <tr class="<?=$status;?>" data-toggle="tooltip" data-placement="top"
                                                        title="<?=$title;?>">
                                                        <td><?=$u['user_fullname'];?></td>
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
    "scrollX": false,
    // dom: 'Bfrtip',
    // buttons: [{
    //     extend: 'excel',
    //     text: '<i class="fas fa-file-excel"></i> &nbsp; Export to Excell'
    // }]
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