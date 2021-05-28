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
                    <h1 class="mt-4">Topic</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Topic List</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="float-left mt-1 ">
                                <i class="fas fa-table mr-1 "></i>
                                Topic List
                            </div>

                            <div class="float-right">
                                <a href="<?=base_url('dashboard/admin/topic/add');?>"
                                    class="btn btn-sm btn-outline-primary"><i class="fas fa-plus"></i> Add
                                    Topic</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Topic</th>
                                            <th>Universities</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th width="10%">Banner</th>
                                            <th width="10%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                    foreach ($topic as $t) { 
                                    ?>
                                        <tr>
                                            <td class="text-center"><?=$i;?></td>
                                            <td class="pointer" style="cursor:pointer;"
                                                onclick='window.location.href ="<?=base_url("dashboard/admin/topic/edit/".$t["topic_id"]);?>"'>
                                                <?=$t['topic_name'];?></td>
                                            <td class="text-center">
                                                <?php 
                                                    foreach ($t['uni_detail'] as $uni) {
                                                        $type = ['info','success','danger','warning','primary'];
                                                        $random_key = array_rand($type);
                                                        echo '<div class="mx-1 badge badge-'.$type[$random_key].' px-3">'.$uni['uni_name'].'</div>';
                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center" data-sort="<?=$t['topic_start_date'];?>">
                                                <?=date('d M Y H:i', strtotime($t['topic_start_date']));?>
                                            </td>
                                            <td class="text-center" data-sort="<?=$t['topic_end_date'];?>">
                                                <?=date('d M Y H:i', strtotime($t['topic_end_date']));?>

                                            </td>
                                            <td class="text-center">
                                                <img src="<?=base_url('assets/topic/'.$t['topic_banner']);?>"
                                                    width="100%">
                                            </td>
                                            <td class="text-center">
                                                <?php 
                                                if($t['topic_status']==1) { ?>
                                                <span href="#" class="text-success" style="cursor:pointer"
                                                    onclick='inactiveButton(<?=$t["topic_id"];?>, "<?=$t["topic_name"];?>")'>
                                                    <i class="far fa-lightbulb fa-fw"></i> Active
                                                </span>

                                                <?php } else { ?>
                                                <span class="text-danger" style="cursor:pointer"
                                                    onclick='activeButton(<?=$t["topic_id"];?>, "<?=$t["topic_name"];?>")'>
                                                    <i class="far fa-lightbulb fa-fw"></i> Inactive
                                                </span>
                                                <?php } ?>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function inactiveButton(id, topic) {
    Swal.fire({
        title: 'Are you sure?',
        html: "Deactivate this topic<br><b>" + topic + "</b>",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?=base_url('dashboard/admin/topic/inactive/');?>" + id,
                type: "POST",
                success: function() {
                    Swal.fire(
                        'Deactivate!',
                        'This topic has been deactivated.',
                        'success'
                    )
                    window.location.href =
                        "<?php echo base_url('dashboard/admin/topic'); ?>";
                }
            });
        }
    })
};

function activeButton(id, topic) {
    Swal.fire({
        title: 'Are you sure?',
        html: "Activate this topic<br><b>" + topic + "</b>",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?=base_url('dashboard/admin/topic/active/');?>" + id,
                type: "POST",
                success: function() {
                    Swal.fire(
                        'Deactivate!',
                        'This topic has been Activated.',
                        'success'
                    )
                    window.location.href =
                        "<?php echo base_url('dashboard/admin/topic'); ?>";
                }
            });
        }
    })
};
</script>

</html>