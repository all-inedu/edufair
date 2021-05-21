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
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Topic</th>
                                            <th>Universities</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Thumbnail</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    for ($i=1; $i < 40 ; $i++) { 
                                    ?>
                                        <tr>
                                            <td class="text-center"><?=$i;?></td>
                                            <td style="cursor:pointer;"
                                                onclick='window.location.href ="<?=base_url("dashboard/admin/topic/edit/".$i);?>"'
                                                http://www.w3schools.com"">System Architect</td>
                                            <td class="text-center">Uni A, Uni B</td>
                                            <td class="text-center">July, 24th 2021</td>
                                            <td class="text-center">10:00 - 12:00</td>
                                            <td class="text-center">Photo</td>
                                            <td class="text-center">
                                                <span class="text-success">
                                                    <i class="far fa-lightbulb fa-fw"></i> Active
                                                </span>
                                            </td>
                                        </tr>
                                        <?php 
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