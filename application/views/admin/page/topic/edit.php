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
                    <h1 class="mt-4">Talk</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard/admin/topic');?>">Talk List</a>
                        </li>
                        <li class="breadcrumb-item active">Edit Talk</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="" method="post" class="needs-validation" novalidate id="addTopic"
                                enctype="multipart/form-data">
                                <div class="row flex-wrap-reverse">
                                    <div class="col-md-5 text-center">
                                        <div class="border shadow">
                                            <img src="<?=base_url('assets/topic/'.$topic['topic_banner']);?>" alt=""
                                                width="100%" id="photoPreview">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="topic_id" value="<?=$topic['topic_id'];?>" hidden>
                                        <div class="form-group">
                                            <label>Talk Name</label>
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="Talk name" name="topic_name"
                                                value="<?=$topic['topic_name'];?>" required>
                                            <div class="invalid-feedback">
                                                The talk name is required.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control form-control-sm" name="topic_desc" rows="5"
                                                minlength="6" required><?=$topic['topic_desc'];?></textarea>
                                            <div class="invalid-feedback">
                                                The talk description is required.
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Start Date</label>
                                                    <input type="datetime-local" class="form-control form-control-sm"
                                                        name="topic_start_date"
                                                        value="<?=date('Y-m-d\TH:i:s', strtotime($topic['topic_start_date']));?>"
                                                        required>
                                                </div>
                                            </div>
                                            <div class=" col-md-6">
                                                <div class="form-group">
                                                    <label>End Date</label>
                                                    <input type="datetime-local" class="form-control form-control-sm"
                                                        name="topic_end_date"
                                                        value="<?=date('Y-m-d\TH:i:s', strtotime($topic['topic_end_date']));?>"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Zoom Link</label>
                                            <input type="text" class="form-control form-control-sm"
                                                value="<?=$topic['topic_zoom_link'];?>" name="topic_zoom_link" required>
                                        </div>
                                        <div class="form-group">
                                            <label>List of University</label>
                                            <select name="uni_id[]" id="uniList" onchange="checkValue('uniList')"
                                                oninvalid="validation('uniList')" multiple>
                                                <option data-placeholder="true"></option>
                                                <?php foreach ($uni as $u) {?>
                                                <option value="<?=$u['uni_id'];?>"><?=$u['uni_name'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Photo Banner</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imgUpload"
                                                    onchange="readURL(this);">
                                                <input type="text" id="topicBanner" name="topic_banner" value="" hidden>
                                                <input type="text" id="topicBanner" name="topic_banner_old"
                                                    value="<?=$topic['topic_banner'];?>" hidden>
                                                <label class="custom-file-label"
                                                    for="imgUpload"><?=$topic['topic_banner'];?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="float-right">
                                    <input type="submit" value="Submit" class="btn btn-sm btn-success px-4"
                                        id="submitTopic">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php
    $uni_detail = $topic['uni_detail'];
    $uni_arr = [];
    foreach($uni_detail as $u) {
        array_push($uni_arr, $u['uni_id']);
    }
    ?>

    <?php $this->load->view('admin/template/footer'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    var uni = new SlimSelect({
        select: '#uniList',
        allowDeselect: true,
        placeholder: 'Select school name',
    })

    uni.set(<?=json_encode($uni_arr);?>)

    function readURL(input) {
        $('#topicBanner').val(input.files[0].name);
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


    function checkValue(param) {
        switch (param) {
            case "uniList":
                var is_filled = $("#uniList").siblings(".ss-main").has('.ss-multi-selected').has('.placeholder')
                    .html();
                if (is_filled) {
                    $("#uniList").siblings(".ss-main").has(".ss-multi-selected").css({
                        "border": "1px solid #28a745",
                        "border-radius": ".2rem"
                    }); //filled
                }
                break;
        }
    }

    function validation(param) {
        switch (param) {
            case "uniList":
                $("#uniList").siblings(".ss-main").has(".ss-multi-selected").css({
                    "border": "1px solid #dc3545",
                    "border-radius": ".2rem"
                });
                break;
        }
    }

    // Validation from bootstrap 
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
    $("#addTopic").submit(function(event) {
        event.preventDefault();
        if ($("#addTopic")[0].checkValidity() === false) {
            event.stopPropagation();
        } else {
            Swal.showLoading();

            var file_data = $('#imgUpload').prop('files')[0];
            var form_data = new FormData($('#addTopic')[0]);
            form_data.append('upload_banner', file_data); //menggunakan variable (nama form input 'file')

            $.ajax({
                url: "<?=base_url('dashboard/admin/topic/update');?>",
                type: "POST",
                data: form_data,
                processData: false,
                contentType: false,
                success: function(msg) {
                    if (msg == "001") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Horee!',
                            text: 'This topic has been updated.',
                            showConfirmButton: false
                        })
                        setTimeout(function() {
                            window.location.href =
                                "<?php echo base_url('dashboard/admin/topic'); ?>";
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
    </script>

</body>

</html>