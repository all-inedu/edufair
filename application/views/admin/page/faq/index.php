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
                    <h1 class="mt-4">Frequently Ask Questions</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">FAQ > Question List</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="float-left mt-1 ">
                                <i class="fas fa-table mr-1 "></i>
                                Question List
                            </div>

                            <!-- <div class="float-right">
                                <a href="<?=base_url('dashboard/admin/uni/add');?>"
                                    class="btn btn-sm btn-outline-primary"><i class="fas fa-plus"></i> Add
                                    University</a>
                            </div> -->
                        </div>
                        <div class="card-body">
                            <a href="<?=base_url('dashboard/admin/book/export/question');?>" target="_blank"
                                class="btn btn-sm btn-dark float-right mb-3"><i class="fas fa-file-excel"></i> &nbsp;
                                Export to
                                Excel</a>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead class="text-center">
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>University Name</th>
                                            <th>User Name</th>
                                            <th>Questions</th>
                                            <th width="15%">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                    foreach ($faq as $f) {
                                        // $status = $f->question_status == 1 ? 'Answered' : 'Not Answered';
                                    ?>
                                        <tr class="my-auto <?php //echo $f->question_status == 1 ? 'bg-success' : 'bg-danger text-light';?>">
                                            <td class="text-center"><?=$i;?></td>
                                            <td><?=$f->uni_name?></td>
                                            <td class="pointer" style="cursor:pointer;">
                                                <?=$f->user_fullname;?>
                                            </td>
                                            <td><?=$f->q_question;?></td>
                                            <td class="text-center">
                                                <?=date('d M Y H:i:s', strtotime($f->created_at));?>
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