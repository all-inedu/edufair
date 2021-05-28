<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/template/header'); ?>
</head>

<style>
#photoPreview {
    height: 43vh;
    object-fit: cover;
}
</style>

<body class="sb-nav-fixed">
    <?php $this->load->view('admin/template/navbar'); ?>
    <div id="layoutSidenav">
        <?php $this->load->view('admin/template/sidebar'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">University</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard/admin/uni');?>">University List</a>
                        </li>
                        <li class="breadcrumb-item active">Add University</li>
                    </ol>
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 float-right">
                                    <div class="float-right ml-2">
                                        <button class="btn btn-sm btn-outline-danger text-dark"
                                            onclick='deleteData(<?=$uni["uni_id"];?>,"<?=$uni["uni_name"];?>")'
                                            id='deleteData'>Delete</button>
                                    </div>
                                    <div class="float-right">
                                        <button class="btn btn-sm btn-outline-warning text-dark" onclick="editData()"
                                            id="editData">Edit</button>
                                    </div>
                                </div>
                            </div>
                            <form method="post" id="addUni" class="needs-validation" novalidate
                                enctype="multipart/form-data">
                                <div class="row flex-wrap-reverse">
                                    <div class="col-md-5">
                                        <div class="border shadow">
                                            <img src="<?=base_url('assets/uni/banner/'.$uni['uni_photo_banner']);?>"
                                                alt="" width="100%" id="photoPreview">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>University Name</label>
                                            <input type="text" name="uni_id" value="<?=$uni['uni_id'];?>" hidden>
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="University Name" name="uni_name"
                                                value="<?=$uni['uni_name'];?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control form-control-sm" name="uni_country"
                                                id="uniCountry" required>
                                                <option value="">Select the country</option>
                                                <option value="United States">United States</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Europe">Europe</option>
                                                <option value="Asia">Asia</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="uniCountryDtl">
                                            <label>Country Detail</label>
                                            <select name="uni_detail_country" id="countryDtl"
                                                class="form-control form-control-sm">
                                                <option data-placeholder="true"></option>
                                                <option value="<?=$uni['uni_detail_country'];?>">
                                                    <?=$uni['uni_detail_country'];?></option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control form-control-sm" name="uni_description"
                                                rows="5" required><?=$uni['uni_description'];?></textarea>
                                        </div>


                                        <div class="form-group">
                                            <label>Photo Banner</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imgUpload"
                                                    onchange="readURL(this);">
                                                <input type="text" id="uniBanner" name="uni_photo_banner" hidden>
                                                <input type="text" id="uniBanner" name="uni_photo_banner_old"
                                                    value="<?=$uni['uni_photo_banner'];?>" hidden>
                                                <label class="custom-file-label"
                                                    for="imgUpload"><?=$uni['uni_photo_banner'];?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="float-right" id="buttonSubmit">
                                    <button class="btn btn-sm btn-success px-4">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header my-auto">
                            <div class="float-left">
                                <h5>Consultation</h5>
                            </div>
                            <div class="float-right">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addConsult">Add
                                    Consultation</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th width="2%">No</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Duration</th>
                                        <th>Slots</th>
                                        <th>Zoom Link</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($uni['uni_detail'] as $dtl) { ?>
                                    <?php if($dtl['uni_dtl_start_date']!="") { ?>
                                    <tr>
                                        <td class="text-center"><?=$no;?></td>
                                        <td class="text-center">
                                            <?=date('M dS Y - H:i', strtotime($dtl['uni_dtl_start_date']));?></td>
                                        <td class="text-center">
                                            <?=date('M dS Y - H:i', strtotime($dtl['uni_dtl_end_date']));?></td>
                                        <td class="text-center"><?=$dtl['uni_dtl_duration'];?> <sup> Minutes</sup></td>
                                        <td class="text-center">
                                            <?php
                                                $start_time = date('Y-m-d H:i', strtotime($dtl['uni_dtl_start_date']));
                                                $end_time = date('Y-m-d H:i', strtotime($dtl['uni_dtl_end_date']));
                                                $duration = $dtl['uni_dtl_duration'];
                                                $diff = strtotime($end_time) - strtotime($start_time);
                                                $jam  = $diff / (60 * 60);
                                                $menit = $jam * 60;
                                                $jumlah_sesi = $menit/$duration;

                                                echo $jumlah_sesi;
                                            ?>
                                        </td>
                                        <td class="text-center"><?=$dtl['uni_dtl_zoom_link'];?></td>
                                        <td class="text-center pointer"><span class="uni-dtl"
                                                onclick='deleteDetail(<?=$dtl["uni_dtl_id"];?>, "<?=date("M dS Y", strtotime($dtl["uni_dtl_start_date"]));?>", <?=$uni["uni_id"];?>)'><i
                                                    class="fas fa-trash text-danger"></i></span></td>
                                    </tr>
                                    <?php } ?>
                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>

    <!-- Add Consultation  -->
    <div class="modal fade" id="addConsult" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" id="addConsultForm" class="needs-validation" novalidate>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?=$uni['uni_name'];?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input type="text" name="uni_id" value="<?=$uni['uni_id'];?>" hidden>
                                    <input type="datetime-local" class="form-control form-control-sm"
                                        name="uni_dtl_start_date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input type="datetime-local" class="form-control form-control-sm"
                                        name="uni_dtl_end_date" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Duration</label>
                                    <input type="number" class="form-control form-control-sm" name="uni_dtl_duration"
                                        max="60" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Zoom Link</label>
                            <input type="text" class="form-control form-control-sm" name="uni_dtl_zoom_link"
                                placeholder="https://www.zoom.us">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
    <?php $this->load->view('admin/template/footer'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function disableForm() {
        $("#addUni input").prop("readonly", true);
        $("#addUni select").prop("disabled", true);
        $("#addUni textarea").prop("readonly", true);
        $("#imgUpload").prop("disabled", true);
        $("#buttonSubmit").hide();
        $('#uniCountry').val('<?=$uni["uni_country"];?>');
        if (($('#uniCountry').val() == "Asia") || ($('#uniCountry').val() == "Europe")) {
            $.ajax({
                type: 'post',
                dataType: "json",
                url: "<?=base_url();?>/api/country/" + $('#uniCountry').val(),
                success: function(datas) {
                    $.each(datas, function(index, data) {
                        $('#countryDtl').append(
                            '<option value="' +
                            data.name +
                            '">' +
                            data.name +
                            '</option>'
                        )
                    });
                }
            });
            $('#uniCountryDtl').show();
            $('#countryDtl').val('<?=$uni["uni_detail_country"];?>');
        } else {
            $('#uniCountryDtl').hide();
        }
    }

    $(document).ready(function() {
        disableForm();
    });

    function editData() {
        if ($("#addUni input").prop("readonly")) {
            $("#editData").addClass('btn-warning text-dark');
            $("#addUni input").prop("readonly", false);
            $("#addUni select").prop("disabled", false);
            $("#addUni textarea").prop("readonly", false);
            $("#imgUpload").prop("disabled", false);
            $("#buttonSubmit").show();
        } else {
            $("#editData").removeClass('btn-warning text-dark');
            $("#addUni input").prop("readonly", true);
            $("#addUni select").prop("disabled", true);
            $("#addUni textarea").prop("readonly", true);
            $("#imgUpload").prop("disabled", true);
            $("#buttonSubmit").hide();
        }
    }

    function deleteData(id, data) {
        Swal.fire({
            title: 'Are you sure?',
            html: "Delete this university<br><b>" + data + "</b>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?=base_url('dashboard/admin/uni/delete/');?>" + id,
                    type: "POST",
                    success: function(msg) {
                        if (msg == "001") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Horee!',
                                text: 'The univeristy has been deleted.',
                                showConfirmButton: false
                            })
                            setTimeout(function() {
                                window.location.href =
                                    "<?=base_url('dashboard/admin/uni/');?>";
                            }, 2000)
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong! Please try again.'
                            });
                        }
                    }
                });
            }
        })
    }

    $('#uniCountry').change(function() {
        let country = $(this).val();
        if ((country == "Asia") || (country == "Europe")) {
            $('#uniCountryDtl').show();
            $("#countryDtl").empty();
            $.ajax({
                type: 'post',
                dataType: "json",
                url: "<?=base_url();?>/api/country/" + country,
                success: function(datas) {
                    $.each(datas, function(index, data) {
                        $('#countryDtl').append(
                            '<option value="' +
                            data.name +
                            '">' +
                            data.name +
                            '</option>'
                        )
                    });
                }
            });
            $('#countryDtl').focus();
            $('#countryDtl').removeClass('form-control form-control-sm');
            new SlimSelect({
                select: '#countryDtl',
                allowDeselect: true,
                placeholder: 'Select the country',
            })
        } else {
            $('#uniCountryDtl').hide();
            $('#countryDtl').val('');
        }
    });


    function readURL(input) {
        $('#uniBanner').val(input.files[0].name);
        $(".custom-file-label").addClass("selected text-dark").html(input.files[0].name);

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#photoPreview')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    // Submit
    $("#addUni").submit(function(event) {
        event.preventDefault();
        if ($("#addUni")[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
            Swal.showLoading();

            var file_data = $('#imgUpload').prop('files')[0];
            var form_data = new FormData($('#addUni')[0]);
            form_data.append('upload_banner',
                file_data); //menggunakan variable (nama form input 'file')

            $.ajax({
                url: "<?=base_url('dashboard/admin/uni/update');?>",
                type: "POST",
                data: form_data,
                processData: false,
                contentType: false,
                success: function(msg) {
                    if (msg > 0) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Horee!',
                            text: 'This university has been updated.',
                            showConfirmButton: false
                        })
                        setTimeout(function() {
                            window.location.href =
                                "<?php echo base_url('dashboard/admin/uni/edit/'); ?>" +
                                msg;
                        }, 2000)
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong! Please try again.'
                        });
                    }
                }
            });
        }
    });

    $("#addConsultForm").submit(function(event) {
        event.preventDefault();
        if ($("#addConsultForm")[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
            Swal.showLoading();

            var form_data = new FormData($('#addConsultForm')[0]);

            $.ajax({
                url: "<?=base_url('dashboard/admin/uni/consult/add');?>",
                type: "POST",
                data: form_data,
                processData: false,
                contentType: false,
                success: function(msg) {
                    if (msg > 0) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Horee!',
                            text: 'The consultation has been created.',
                            showConfirmButton: false
                        })
                        setTimeout(function() {
                            window.location.href =
                                "<?php echo base_url('dashboard/admin/uni/edit/'); ?>" +
                                msg;
                        }, 2000)
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong! Please try again.'
                        });
                    }
                }
            });
        }
    });

    function deleteDetail(id, data, uniId) {
        Swal.fire({
            title: 'Are you sure?',
            html: "Delete this data<br><b>" + data + "</b>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?=base_url('dashboard/admin/uni/consult/delete/');?>" + id,
                    type: "POST",
                    success: function(msg) {
                        if (msg == "001") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Horee!',
                                text: 'The consultation has been deleted.',
                                showConfirmButton: false
                            })
                            setTimeout(function() {
                                window.location.href =
                                    "<?=base_url('dashboard/admin/uni/edit/');?>" +
                                    uniId;
                            }, 2000)
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong! Please try again.'
                            });
                        }
                    }
                });
            }
        })
    }
    </script>
</body>

</html>