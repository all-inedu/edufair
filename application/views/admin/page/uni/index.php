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
                            <i class="fas fa-table mr-1"></i>
                            University List
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>University</th>
                                            <th>Description</th>
                                            <th>Country</th>
                                            <th>Date & Time</th>
                                            <th>Photo</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    for ($i=0; $i < 40 ; $i++) { 
                                    ?>
                                        <tr class="my-auto">
                                            <td class="text-center"><?=$i;?></td>
                                            <td class="text-center">Uni A, Uni B</td>
                                            <td>System Architect</td>
                                            <td class="text-center">United States</td>
                                            <td class="text-center">
                                                July, 24th 2021 : 10:00 - 12:00 <br>
                                                July, 24th 2021 : 10:00 - 12:00
                                            </td>
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