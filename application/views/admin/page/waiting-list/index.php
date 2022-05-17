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
                    <h1 class="mt-4">Waiting List</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item">Waiting List</li>
                        <?php
                            if($consult=="uni") {
                        ?>
                        <li class="breadcrumb-item active">University Consultation</li>
                        <?php } else { ?>
                        <li class="breadcrumb-item active">Initial Consultation with ALL-in Eduspace</li>
                        <?php }?>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="float-left mt-1 ">
                                <i class="fas fa-table mr-1 "></i>
                                Waiting List
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="waitingList" width="100%"
                                    cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th width="1%">No</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Status</th>
                                            <?php
                                                if($consult=="uni") {
                                            ?>
                                            <th>University</th>
                                            <?php } ?>
                                            <th>Register Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                    foreach ($waiting_list as $u) {
                                    ?>
                                        <tr class="my-auto">
                                            <td class="text-center"><?=$i;?></td>
                                            <td>
                                                <?=$u['user_fullname'];?>
                                            </td>
                                            <td class="text-center"><?=$u['user_email'];?></td>
                                            <td class="text-center">
                                                <?=$u['user_phone'];?>
                                            </td>
                                            <td class="text-center">
                                                <?=$u['user_status'];?>
                                            </td>
                                            <?php
                                                if($consult=="uni") {
                                            ?>
                                            <td class="text-center">
                                                <?=$u['uni_name'];?>
                                            </td>
                                            <?php } ?>
                                            <td class="text-center">
                                                <?=date("M, dS Y" , strtotime($u['wl_date']));?>
                                            </td>
                                        </tr>
                                        <?php 
                                        $i++;
                                    }
                                    ?>
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
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip()

    var tables = $('#waitingList').DataTable({
        "scrollX": true,
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excel',
            text: '<i class="fas fa-file-excel"></i> &nbsp; Export to Excel'
        }]
    });
});
</script>

</html>