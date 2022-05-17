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
                    <h1 class="mt-4">Booking Consultation</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Booking Consultation </li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="<?=base_url('dashboard/admin/book/export/consult');?>" target="_blank"
                                class="btn btn-sm btn-dark float-right mb-3"><i class="fas fa-file-excel"></i> &nbsp;
                                Export to
                                Excel</a>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover nowrap" id="dataTopic" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>University Name</th>
                                            <th>Participants</th>
                                            <th>Total Join</th>
                                            <th>Total Cancel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($uni as $u) {
                                        ?>
                                        <tr class="text-center">
                                            <td><?=$no;?></td>
                                            <td class="text-left"><?=$u['uni_name'];?></td>
                                            <td>
                                                <table style="font-size:12px;" width="100%">
                                                    <?php 
                                                    $join = [];
                                                    $cancel = [];
                                                    foreach ($u['user'] as $user) {
                                                        if($user['user_id']=="") {
                                                            echo "<tr class='text-center'><td colspan=5>-</td></tr>";
                                                        } else {
                                                            if($user['booking_c_status']==0){
                                                                $status ="text-danger";  
                                                                $title ="Cancel";
                                                                 $cancel[] = $user['booking_c_status'];
                                                            } else {
                                                                $status ="";
                                                                $title ="Join"; 
                                                                 $join[] = $user['booking_c_status'];
                                                            }
                                                    ?>
                                                    <tr class="<?=$status;?>" data-toggle="tooltip" data-placement="top"
                                                        title="<?=$title;?>">
                                                        <td>
                                                            <?=date('M dS Y, H:i', strtotime($user['uni_dtl_t_start_time']));?>
                                                            <?=date('- H:i A', strtotime($user['uni_dtl_t_end_time']));?>
                                                        </td>
                                                        <td><?=$user['user_fullname'];?></td>
                                                        <td><?=$user['user_email'];?></td>
                                                        <td><?=ucfirst($user['user_status']);?></td>
                                                        <td><?=$user['user_school'];?></td>
                                                        <td><?=$user['user_grade'];?></td>
                                                    </tr>
                                                    <?php } } ?>
                                                </table>
                                            </td>
                                            <td>
                                                <?=count($join);?>
                                            </td>
                                            <td>
                                                <?=count($cancel);?>
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