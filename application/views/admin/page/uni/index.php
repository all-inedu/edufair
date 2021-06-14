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
                    <h1 class="mt-4">University</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">University List</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="float-left mt-1 ">
                                <i class="fas fa-table mr-1 "></i>
                                University List
                            </div>

                            <div class="float-right">
                                <a href="<?=base_url('dashboard/admin/uni/add');?>"
                                    class="btn btn-sm btn-outline-primary"><i class="fas fa-plus"></i> Add
                                    University</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>University</th>
                                            <th width="25%">Description</th>
                                            <th>Country</th>
                                            <th>Consultation Date</th>
                                            <th width="10%">Photo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                    foreach ($uni as $u) {
                                    ?>
                                        <tr class="my-auto">
                                            <td class="text-center"><?=$i;?></td>
                                            <td class="pointer" style="cursor:pointer;"
                                                onclick='window.location.href ="<?=base_url("dashboard/admin/uni/edit/".$u["uni_id"]);?>"'>
                                                <?=$u['uni_name'];?>
                                            </td>
                                            <td><?=substr($u['uni_description'], 0, 100);?> ...</td>
                                            <td class="text-center">
                                                <?=$u['uni_country'];?><br>
                                                <?=$u['uni_detail_country'];?>
                                            </td>
                                            <td class="text-center">
                                                <ul class="list-group">
                                                    <?php 
                                                    foreach ($u['uni_detail'] as $dtl) {
                                                        $start = $dtl['uni_dtl_start_date'];
                                                        $end = $dtl['uni_dtl_end_date'];
                                                    ?>
                                                    <li class="list-group-item">
                                                        <?php
                                                        if($start!="") {
                                                        echo date('M, dS Y', strtotime($start))."<br>";
                                                        echo date('H:i', strtotime($start)). " - ";
                                                        echo date('H:i', strtotime($end));

                                                        } else {
                                                            echo 'Not Available';
                                                        }
                                                    ?>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </td>
                                            <td class="text-center">
                                                <img src="<?=base_url('assets/uni/banner/'.$u['uni_photo_banner']);?>"
                                                    width="100%">
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

</html>