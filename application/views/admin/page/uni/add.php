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
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="post" id="addUni" class="needs-validation" novalidate
                                enctype="multipart/form-data">
                                <div class="row flex-wrap-reverse">
                                    <div class="col-md-5">
                                        <div class="border shadow">
                                            <img src="<?=base_url('assets/img/default.jpeg');?>" alt="" width="100%"
                                                id="photoPreview">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>University Name</label>
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="University Name" name="uni_name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control form-control-sm" name="uni_country"
                                                id="uniCountry" required>
                                                <option value="">Select the country</option>
                                                <option value="Asia">Asia</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Europe">Europe</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="uniCountryDtl">
                                            <label>Country Detail</label>
                                            <select name="uni_detail_country" id="countryDtl">
                                                <option data-placeholder="true"></option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control form-control-sm" name="uni_description"
                                                rows="5" required></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control form-control-sm" name="uni_status">
                                                <option value="1">
                                                    Active</option>
                                                <option value="0">Inactive
                                                </option>
                                                <option value="2">Upcoming
                                                    Session</option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label>Photo Banner</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imgUpload"
                                                    onchange="readURL(this);">
                                                <input type="text" id="uniBanner" name="uni_photo_banner" hidden>
                                                <label class="custom-file-label" for="imgUpload">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="float-right">
                                    <button class="btn btn-sm btn-success px-4">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php $this->load->view('admin/template/footer'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function() {
        $('#uniCountryDtl').hide();
    });

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
            new SlimSelect({
                select: '#countryDtl',
                allowDeselect: true,
                placeholder: 'Select school name',
            })
        } else {
            $('#uniCountryDtl').hide();
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
            // Swal.showLoading();

            var file_data = $('#imgUpload').prop('files')[0];
            var form_data = new FormData($('#addUni')[0]);
            form_data.append('upload_banner', file_data); //menggunakan variable (nama form input 'file')

            $.ajax({
                url: "<?=base_url('dashboard/admin/uni/submit');?>",
                type: "POST",
                data: form_data,
                processData: false,
                contentType: false,
                success: function(msg) {
                    if (msg > 0) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Horee!',
                            text: 'This university has been created.',
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
    </script>
</body>

</html>