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
                    <h1 class="mt-4">User</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">User List</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <a href="<?=base_url('dashboard/admin/user/export/excel');?>" target="_blank"
                                class="btn btn-sm btn-dark float-right mb-3"><i class="fas fa-file-excel"></i> &nbsp;
                                Export to
                                Excel</a>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover nowrap" id="dataTable" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Students Name</th>
                                            <th>Status</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Gender</th>
                                            <th>School</th>
                                            <th>Grade</th>
                                            <th>Country Destination</th>
                                            <th>Major</th>
                                            <th>Lead</th>
                                            <th>Topic</th>
                                            <th>Consultation</th>
                                            <th>Register Date</th>
                                            <th>Resume</th>
                                            <th>#</th>
                                            <th>First Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=1;
                                        foreach ($user as $u) {
                                        ?>
                                        <tr class="text-center">
                                            <td><?=$no;?></td>
                                            <td class="text-left pointer">
                                                <?=$u['user_fullname'];?>
                                            </td>
                                            <td><?=ucfirst($u['user_status']);?></td>
                                            <td><?=$u['user_email'];?></td>
                                            <td><?=$u['user_phone'];?></td>
                                            <td><?=ucfirst($u['user_gender']);?></td>
                                            <td><?=$u['user_school'];?></td>
                                            <td><?=$u['user_grade'];?></td>
                                            <td><?=$u['user_country'];?></td>
                                            <td><?=$u['user_major'];?></td>
                                            <td><?=$u['user_know_from'];?></td>
                                            <td>
                                                <?php
                                                    foreach ($u['user_booking_topic'] as $topic) { 
                                                        if($topic['topic_name']=="") {
                                                            echo "<small class='text-danger'>-</small>";
                                                        } else {
                                                ?>
                                                <div class='badge badge-info' data-toggle="tooltip" data-placement="left"
                                                    style="cursor:pointer;"
                                                    title="<?=date("M dS Y | H:i A", strtotime($topic['topic_start_date']));?>">
                                                    <?=$topic['topic_name'];?>
                                                </div><br>
                                                <?php }} ?>
                                            </td>
                                            <td>
                                                <?php
                                                    foreach ($u['user_booking_consult'] as $consult) {
                                                        if($consult['uni_name']=="") {
                                                            echo "<small class='text-danger'>-</small>";
                                                        } else {
                                                ?>
                                                <div class='badge badge-warning' data-toggle="tooltip"
                                                    data-placement="left" style="cursor:pointer;" title="<?=date("M dS Y | H:i", strtotime($consult['uni_dtl_start_date']));?> - 
                                                    <?=date("H:i A", strtotime($consult['uni_dtl_end_date']));?>">
                                                    <?=$consult['uni_name'];?>
                                                </div><br>
                                                <?php }} ?>
                                            </td>
                                            <td><?=date("M dS Y",strtotime($u['user_register_date']));?></td>
                                            <td>
                                                <?php
                                                if ($u['user_resume'] != null) {
                                                ?>
                                                <a target="_blank" href="<?= base_url().'assets/user/uploads/'.$u['user_resume']; ?>">View here</a>
                                                <?php
                                                } else {
                                                    echo "-";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if($u['token_status']==1){
                                                        echo "Verified";
                                                    } else {
                                                        echo "Not Verified";
                                                    }
                                                ?>
                                            </td>
                                            <td><?= $u['user_first_time'] == 1 ? "Yes" : "No" ?></td>
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
</script>

</html>